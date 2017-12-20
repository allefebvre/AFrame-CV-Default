<?php

use PHPUnit\Framework\TestCase;

class TableGatewayTest extends TestCase {
    
    static private $connection;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/TablesGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
    }
    
    public function testGetAllTables() {
        $tablesGW = new TablesGateway(self::$connection);       
        $expected = array("ByDate","Conference","Diverse","Education","Information","Journal","Login", "Other","Parameter","Skill", "Token", "WorkExp");
        $results = $tablesGW->getAllTables();
        
        $i = 0;       
        foreach ($results as $r) {
            $this->assertEquals($r[0], $expected[$i]);
            $i++;
        }
    }
}