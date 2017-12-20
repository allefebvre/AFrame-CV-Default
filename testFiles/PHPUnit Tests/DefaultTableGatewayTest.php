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
        $result = $defaultTableGW->getAllDefaultTables("section"); 
        $id = $result[0][0];
        $title = $result[1][0];
        
        $this->assertEquals("ID", $id);        
        $this->assertEquals("title", $title);
        }
    
    public function testDeleteDefaultLine(){
        self::$connection->executeQuery("INSERT INTO `section` (`title`) VALUES (:title);", array(
            ':title' => array('_Title_Test_', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("SELECT ID FROM section WHERE title=:title;", array(
            ':title' => array('_Title_Test_', PDO::PARAM_STR)
        ));
        $result = self::$connection->getResults();
        $id = (int)$result[0][0];
        
        self::$defaultTableGW->deleteDefaultLine("section", $id);
        self::$connection->executeQuery("SELECT * FROM section WHERE ID=:id;", array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        $nbRows = self::$connection->getNbResults();
        $this->assertEquals(0, $nbRows);
    }
}

