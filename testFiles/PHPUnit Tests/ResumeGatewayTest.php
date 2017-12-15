<?php

use PHPUnit\Framework\TestCase;

class ResumeGatewayTest extends TestCase {

    static private $connection;
    static private $resumeGW;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/ResumeGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$resumeGW = new ResumeGateway(self::$connection);
    }
    
    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM resume WHERE date_creation=:dateCreation AND date_modification=:dateModification AND content=:content AND section_id=:sectionId;", array(
            ':date_creation' => array(date("Y-m-d"), PDO::PARAM_STR),
            ':date_modification' => array(date("Y-m-d"), PDO::PARAM_STR),
            ':content' => array('_Content_Test_', PDO::PARAM_STR),
            ':sectionId' => array(0, PDO::PARAM_INT)
        ));
        self::$connection->executeQuery("DELETE FROM resume WHERE ID=:id AND date_creation=:dateCreation AND date_modification=:dateModification AND content=:content AND section_id=:sectionId;", array(
            ':id' => array(0, PDO::PARAM_INT),
            ':date_creation' => array('0000-00-00', PDO::PARAM_STR),
            ':date_modification' => array(date("Y-m-d"), PDO::PARAM_STR),
            ':content' => array('_Test_Content_', PDO::PARAM_STR),
            ':sectionId' => array(0, PDO::PARAM_INT)
        ));
    }
    
    public function testGetResumeBySectionId() {
        $dateCreation = date("Y-m-d");
        $dateModification = date("Y-m-d");
        $content = "_Content_Test_";
        $sectionId = 0;
        
        self::$resumeGW->insert($dateCreation, $dateModification, $content, $sectionId);
        
        $result = self::$resumeGW->getResumeBySectionId($sectionId);
        
        $this->assertEquals($dateCreation, $result['date_creation']);
        $this->assertEquals($dateModification, $result['date_modification']);
        $this->assertEquals($content, $result['content']);
        $this->assertEquals($sectionId, $result['section_id']);
    }
    
    public function testCountResumeBySectionId() {
        $dateCreation = date("Y-m-d");
        $dateModification = date("Y-m-d");
        $content = "_Content_Test_";
        $sectionId = 0;
        
        $oldSize = self::$resumeGW->countResumeBySectionId($sectionId);
        
        self::$resumeGW->insert($dateCreation, $dateModification, $content, $sectionId);
        
        $newSize = self::$resumeGW->countResumeBySectionId($sectionId);
        
        $this->assertEquals($newSize, $oldSize+1);
    }
    
    public function testGetResumeById() {
        $id = 100;
        $dateCreation = "0000-00-00";
        $dateModification = "0000-00-00";
        $content = "_Content_Test_";
        $sectionId = 0;
        
        self::$connection->executeQuery("INSERT INTO `resume` (ID, date_creation, date_modification, content, section_id) VALUES (:id, :dateCreation, :dateModification, :content, :sectionId);", array(
            ':id' => array($id, PDO::PARAM_INT),
            ':dateCreation' => array($dateCreation, PDO::PARAM_STR),
            ':dateModification' => array($dateModification, PDO::PARAM_STR),
            ':content' => array($content, PDO::PARAM_STR),
            ':sectionId' => array($sectionId, PDO::PARAM_INT)
        ));
        
        $result = self::$resumeGW->getResumeById($id);
        
        $this->assertEquals($id, $result['ID']);
        $this->assertEquals($dateCreation, $result['date_creation']);
        $this->assertEquals($dateModification, $result['date_modification']);
        $this->assertEquals($content, $result['content']);
        $this->assertEquals($sectionId, $result['section_id']);
    }
    
    public function testUpdateById() {
        $id = 100;
        $dateCreation = "0000-00-00";
        $dateModification = date("Y-m-d");
        $content = "_Test_Content_";
        $sectionId = 0;
        
        self::$resumeGW->updateById($id, $content);
        
        $result = self::$resumeGW->getResumeById($id);
        
        $this->assertEquals($id, $result['ID']);
        $this->assertEquals($dateCreation, $result['date_creation']);
        $this->assertEquals($dateModification, $result['date_modification']);
        $this->assertEquals($content, $result['content']);
        $this->assertEquals($sectionId, $result['section_id']);
    }
}
