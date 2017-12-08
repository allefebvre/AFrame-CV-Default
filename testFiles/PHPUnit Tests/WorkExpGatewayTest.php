<?php

use PHPUnit\Framework\TestCase;

class WorkExpGatewayTest extends TestCase {

    static private $connection;
    static private $workExpGW;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/WorkExpGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$workExpGW = new WorkExpGateway(self::$connection);
    }
    
    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM WorkExp WHERE date=:date AND workExp=:workExp;", array(
            ':date' => array('_Date_Test_', PDO::PARAM_STR),
            ':workExp' => array('_WorkExp_Test_', PDO::PARAM_STR)
        ));
    }

    public function testGetAllWorkExps() {     
        $results = self::$workExpGW->getAllWorkExps();
        $oldSize = count($results);
        
        self::$workExpGW->insert('_Date_Test_', '_WorkExp_Test_');

        $results = self::$workExpGW->getAllWorkExps();
        
        $this->assertEquals(count($results), $oldSize+1);
    }
}
