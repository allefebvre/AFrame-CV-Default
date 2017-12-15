<?php

use PHPUnit\Framework\TestCase;

class SectionGatewayTest extends TestCase {

    static private $connection;
    static private $sectionGW;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/SectionGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$sectionGW = new SectionGateway(self::$connection);
    }
    
    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM section WHERE title=:title;", array(
            ':title' => array('_Title_Test_', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("DELETE FROM section WHERE ID=:id AND title=:title;", array(
            ':id' => array(100, PDO::PARAM_INT),
            ':title' => array('_Test_Title_', PDO::PARAM_STR)
        ));
    }

    public function testGetAllSections() {     
        $results = self::$sectionGW->getAllSections();
        $oldSize = count($results);
        
        self::$sectionGW->insert('_Title_Test_');

        $results = self::$sectionGW->getAllSections();
        
        $this->assertEquals(count($results), $oldSize+1);
        
        foreach($results as $result) {
            $this->assertTrue(isset($result['ID']));
            $this->assertTrue(isset($result['title']));
        }
    }
    
    public function testGetSectionByTitle() {
        $id = 100;
        $title = "_Title_Test_";
        
        self::$connection->executeQuery("INSERT INTO `section` (ID, title) VALUES (:id, :title);", array(
            ':id' => array($id, PDO::PARAM_INT),
            ':title' => array($title, PDO::PARAM_STR)
        ));
        
        $result = self::$sectionGW->getSectionByTitle($title);
        
        $this->assertEquals($id, $result['ID']);
        $this->assertEquals($title, $result['title']);
    }
    
    public function testGetSectionById() {
        $id = 100;
        $title = "_Title_Test_";
        
        $result = self::$sectionGW->getSectionById($id);
        
        $this->assertEquals($id, $result['ID']);
        $this->assertEquals($title, $result['title']);
    }
    
    public function testUpdateById() {
        $id = 100;
        $title = "_Test_Title_";
        self::$sectionGW->updateById($id, $title);
        
        $result = self::$sectionGW->getSectionById($id);
        
        $this->assertEquals($id, $result['ID']);
        $this->assertEquals($title, $result['title']);
    }
}
