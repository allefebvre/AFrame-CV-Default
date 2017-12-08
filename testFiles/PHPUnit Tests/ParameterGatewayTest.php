<?php

use PHPUnit\Framework\TestCase;

class ParameterGatewayTest extends TestCase {

    private $connection;
    private $parameterGW;
       
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/ParameterGateway.php';       
    }
   
    /**
     * @before	
     */
    public function setUp() { 
        require 'config/config.php';
        $this->connection = new Connection($base, $login, $password); 
        $this->parameterGW = new ParameterGateway($this->connection);
    }
    
    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        require 'config/config.php';
        $connection = new Connection($base, $login, $password); 
        $connection->executeQuery("DELETE FROM Parameter WHERE ID=:id;", array(
            ':id' => array(100, PDO::PARAM_INT)
        ));
        $connection->executeQuery("DELETE FROM Parameter WHERE ID=:id;", array(
            ':id' => array(150, PDO::PARAM_INT)
        ));
        $connection->executeQuery("DELETE FROM Parameter WHERE name=:name;", array(
            ':name' => array('Test1', PDO::PARAM_STR)
        ));
    }
    
    public function testGetAllParameter() {
        $results = $this->parameterGW->getAllParameter();
        $oldSize = count($results);
        
        $this->connection->executeQuery("INSERT INTO `Parameter` (name, display, section, scroll) "
                . "VALUES (:name, :display, :section, :scroll);", array(
                ':name' => array('Test1', PDO::PARAM_STR),
                ':display' => array('FALSE', PDO::PARAM_STR),
                ':section' => array(NULL, PDO::PARAM_NULL),
                ':scroll' => array('FALSE', PDO::PARAM_STR)    
        ));
        
        $results = $this->parameterGW->getAllParameter();
        
        $this->assertEquals(count($results), $oldSize+1);
    }
    
    public function testGetParameterPublications() {
        $id = 100;
        $this->connection->executeQuery("INSERT INTO `Parameter` (id, name, display, section, scroll) "
                . "VALUES (:id, :name, :display, :section, :scroll);", array(
                ':id' => array($id, PDO::PARAM_INT),   
                ':name' => array('Publications', PDO::PARAM_STR),
                ':display' => array('FALSE', PDO::PARAM_STR),
                ':section' => array(NULL, PDO::PARAM_NULL),
                ':scroll' => array('FALSE', PDO::PARAM_STR)    
        ));
        
        $results = $this->parameterGW->getParameterPublications();
        
        $this->assertTrue(count($results) > 0);
        foreach($results as $result) {
            $this->assertEquals("Publications", $result['name']);
        }
    }
    
    public function testGetNbMiddlePlaneDisplay() {
        $id = 150;
        $oldSize = $this->parameterGW->getNbMiddlePlaneDisplay();

        $this->connection->executeQuery("INSERT INTO `Parameter` (id, name, display, section, scroll) "
                . "VALUES (:id, :name, :display, :section, :scroll);", array(
                ':id' => array($id, PDO::PARAM_INT),
                ':name' => array('Middle1', PDO::PARAM_STR),
                ':display' => array('TRUE', PDO::PARAM_STR),
                ':section' => array(NULL, PDO::PARAM_NULL),
                ':scroll' => array('FALSE', PDO::PARAM_STR)    
        ));
        
        $newSize = $this->parameterGW->getNbMiddlePlaneDisplay();

        $this->assertEquals($newSize, $oldSize+1);
    }
    
    public function testUpdateParameter() {
        $display = "DisplayTest";
        $section = "SectionTest";
        $scroll = "ScrollTest";
        $this->parameterGW->updateParameter(100, $display, $section, $scroll);
        
        $results = $this->parameterGW->getAllParameter();
        foreach($results as $result) {
            if($result['ID'] == 100) {
                $this->assertEquals($display, $result['display']);
                $this->assertEquals($section, $result['section']);
                $this->assertEquals($scroll, $result['scroll']);
            }
        }
    }
}