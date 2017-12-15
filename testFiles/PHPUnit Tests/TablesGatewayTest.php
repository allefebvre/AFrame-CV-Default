<?php

use PHPUnit\Framework\TestCase;

class TableGatewayTest extends TestCase {

    static private $connection;
    static private $tablesGW;

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/TablesGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$tablesGW = new TablesGateway(self::$connection);
    }

    public function testGetAllTables() {
        $exepted = array("Login","Parameter","Publication","Token","categorie","resume","section");
        $results = self::$tablesGW->getAllTables();
        $i = 0;
        foreach ($results as $r) {
            $this->assertEquals($r[0], $exepted[$i]);
            $i++;
        }
    }

}
