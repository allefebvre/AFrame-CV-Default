<?php

use PHPUnit\Framework\TestCase;

class DefaultTableGatewayTest extends TestCase {
    
    static private $connection;
    static private $defaultTableGW;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/DefaultTableGateway.php';
        require 'config/config.php';  
        self::$connection = new Connection($base, $login, $password);
        self::$defaultTableGW = new DefaultTableGateway(self::$connection);
    }
    
    public function testGetAllDefaultTables(){
        $defaultTableGW = new DefaultTableGateway(self::$connection);
        $result = $defaultTableGW->getAllDefaultTables("Diverse"); 
        $id = $result[0][0];
        $diverse = $result[1][0];
        
        $this->assertEquals("ID", $id);        
        $this->assertEquals("diverse", $diverse);
    }
    
    public function testDeleteDefaultLine(){
        self::$connection->executeQuery("INSERT INTO `Diverse`(`diverse`) VALUES (:diverse);", array(
            ':diverse' => array('_Diverse_Test_', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("SELECT id FROM Diverse WHERE diverse=:diverse;", array(
            ':diverse' => array('_Diverse_Test_', PDO::PARAM_STR)
        ));
        $result = self::$connection->getResults();
        $id = (int)$result[0][0];
        
        self::$defaultTableGW->deleteDefaultLine("Diverse", $id);
        self::$connection->executeQuery("SELECT * FROM Diverse WHERE id=:id;", array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        $nbRows = self::$connection->getNbResults();
        $this->assertEquals(0, $nbRows);
    }
}

