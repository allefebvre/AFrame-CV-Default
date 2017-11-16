<?php

use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase {
    static private $connection;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass()
    {
        require_once 'model/Connection.php';
    }
    
    public function testConnection(){
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        $this->assertEquals(0, self::$connection->errorCode());
    }
    
    /**
     * @depends testConnection
     */
    public function testAddTable(){
        try {
            self::$connection->executeQuery("DROP TABLE `AFrame-CV-Default`.`testPHPUnit`;");
        } catch (Exception $e) {}
        
        self::$connection->executeQuery("CREATE TABLE `AFrame-CV-Default`.`testPHPUnit` ( `test1` INT NOT NULL , `test2` INT NOT NULL );");
        $this->assertEquals(0, self::$connection->errorCode());
    }
    
    /**
     * @depends testAddTable
     */
    public function testAddRow(){
        self::$connection->executeQuery("INSERT INTO `testPHPUnit` (`test1`, `test2`) VALUES (5, 10)");
        self::$connection->executeQuery("INSERT INTO `testPHPUnit` (`test1`, `test2`) VALUES (10, 15)");
        self::$connection->executeQuery("INSERT INTO `testPHPUnit` (`test1`, `test2`) VALUES (-10, 11)");
        $this->assertEquals(self::$connection->errorCode(), 0);
        
        self::$connection->executeQuery("SELECT * FROM `testPHPUnit`");
        
        $result = self::$connection->getNbResults();
        $this->assertEquals(3, $result);
    }
    
    /**
     * @depends testAddRow
     */
    public function testDropTable(){
        self::$connection->executeQuery("DROP TABLE `AFrame-CV-Default`.`testPHPUnit`;");
        $this->assertEquals(0, self::$connection->errorCode());
    }
}
