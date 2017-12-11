<?php

use PHPUnit\Framework\TestCase;

class DiverseGatewayTest extends TestCase {

    static private $connection;
    static private $diverseGW;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/DiverseGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$diverseGW = new DiverseGateway(self::$connection);
    }

    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM Diverse WHERE diverse=:diverse;", array(
            ':diverse' => array('_Diverse_Test_', PDO::PARAM_STR)
        ));
    }

    public function testGetAllDiverse() {     
        $results = self::$diverseGW->getAllDiverse();
        $oldSize = count($results);
        
        self::$diverseGW->insert('_Diverse_Test_');

        $results = self::$diverseGW->getAllDiverse();
        
        $this->assertEquals(count($results), $oldSize+1);
    }
}
