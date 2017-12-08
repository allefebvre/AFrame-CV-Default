<?php

use PHPUnit\Framework\TestCase;

class ParameterGatewayTest extends TestCase {

    static private $connection;
    static private $parameterGW;
       
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/ParameterGateway.php';  
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$parameterGW = new ParameterGateway(self::$connection);
    }
    
    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM Parameter WHERE ID=:id;", array(
            ':id' => array(100, PDO::PARAM_INT)
        ));
        self::$connection->executeQuery("DELETE FROM Parameter WHERE ID=:id;", array(
            ':id' => array(150, PDO::PARAM_INT)
        ));
        self::$connection->executeQuery("DELETE FROM Parameter WHERE name=:name;", array(
            ':name' => array('Test1', PDO::PARAM_STR)
        ));
    }
    
    public function testGetAllParameter() {
        $results = self::$parameterGW->getAllParameter();
        $oldSize = count($results);
        
        self::$connection->executeQuery("INSERT INTO `Parameter` (name, display, section, scroll) "
                . "VALUES (:name, :display, :section, :scroll);", array(
                ':name' => array('Test1', PDO::PARAM_STR),
                ':display' => array('FALSE', PDO::PARAM_STR),
                ':section' => array(NULL, PDO::PARAM_NULL),
                ':scroll' => array('FALSE', PDO::PARAM_STR)    
        ));
        
        $results = self::$parameterGW->getAllParameter();
        
        $this->assertEquals(count($results), $oldSize+1);
    }
    
    public function testGetParameterPublications() {
        $id = 100;
        self::$connection->executeQuery("INSERT INTO `Parameter` (id, name, display, section, scroll) "
                . "VALUES (:id, :name, :display, :section, :scroll);", array(
                ':id' => array($id, PDO::PARAM_INT),   
                ':name' => array('Publications', PDO::PARAM_STR),
                ':display' => array('FALSE', PDO::PARAM_STR),
                ':section' => array(NULL, PDO::PARAM_NULL),
                ':scroll' => array('FALSE', PDO::PARAM_STR)    
        ));
        
        $results = self::$parameterGW->getParameterPublications();
        
        $this->assertTrue(count($results) > 0);
        foreach($results as $result) {
            $this->assertEquals("Publications", $result['name']);
        }
    }
    
    public function testGetNbMiddlePlaneDisplay() {
        $id = 150;
        $oldSize = self::$parameterGW->getNbMiddlePlaneDisplay();

        self::$connection->executeQuery("INSERT INTO `Parameter` (id, name, display, section, scroll) "
                . "VALUES (:id, :name, :display, :section, :scroll);", array(
                ':id' => array($id, PDO::PARAM_INT),
                ':name' => array('Middle1', PDO::PARAM_STR),
                ':display' => array('TRUE', PDO::PARAM_STR),
                ':section' => array(NULL, PDO::PARAM_NULL),
                ':scroll' => array('FALSE', PDO::PARAM_STR)    
        ));
        
        $newSize = self::$parameterGW->getNbMiddlePlaneDisplay();

        $this->assertEquals($newSize, $oldSize+1);
    }
    
    public function testUpdateParameter() {
        $display = "DisplayTest";
        $section = "SectionTest";
        $scroll = "ScrollTest";
        self::$parameterGW->updateParameter(100, $display, $section, $scroll);
        
        $results = self::$parameterGW->getAllParameter();
        foreach($results as $result) {
            if($result['ID'] == 100) {
                $this->assertEquals($display, $result['display']);
                $this->assertEquals($section, $result['section']);
                $this->assertEquals($scroll, $result['scroll']);
            }
        }
    }
}