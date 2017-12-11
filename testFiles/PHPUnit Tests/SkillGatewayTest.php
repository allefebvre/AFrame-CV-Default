<?php

use PHPUnit\Framework\TestCase;

class SkillGatewayTest extends TestCase {

    static private $connection;
    static private $skillGW;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/SkillGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$skillGW = new SkillGateway(self::$connection);
    }
    
    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM Skill WHERE category=:category AND details=:details;", array(
            ':category' => array('_Category_Test_', PDO::PARAM_STR),
            ':details' => array('_Details_Test_', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("DELETE FROM Skill WHERE id=:id AND category=:category AND details=:details;", array(
            ':id' => array(100, PDO::PARAM_INT),
            ':category' => array('_Test_Category_', PDO::PARAM_STR),
            ':details' => array('_Test_Details_', PDO::PARAM_STR)
        ));
    }

    public function testGetAllSkills() {     
        $results = self::$skillGW->getAllSkills();
        $oldSize = count($results);
        
        self::$skillGW->insert('_Category_Test_', '_Details_Test_');

        $results = self::$skillGW->getAllSkills();
        
        $this->assertEquals(count($results), $oldSize+1);
        
        foreach($results as $result) {
            $this->assertTrue(isset($result['ID']));
            $this->assertTrue(isset($result['category']));
            $this->assertTrue(isset($result['details']));
        }
    }
    
    public function testGetOneSkill() {
        $id = 100;
        $category = "_Category_Test_";
        $details = "_Details_Test_";
        self::$connection->executeQuery("INSERT INTO `Skill` (id, category, details) VALUES (:id, :category, :details);", array(
            ':id' => array($id, PDO::PARAM_INT),
            ':category' => array($category, PDO::PARAM_STR),
            ':details' => array($details, PDO::PARAM_STR)
        ));
        
        $results = self::$skillGW->getOneSkill($id);
        
        $this->assertEquals($id, $results[0]['ID']);
        $this->assertEquals($category, $results[0]['category']);
        $this->assertEquals($details, $results[0]['details']);
    }
    
    public function testUpdateById() {
        $id = 100;
        $category = "_Test_Category_";
        $details = "_Test_Details_";
        self::$skillGW->updateById($id, $category, $details);
        
        $results = self::$skillGW->getOneSkill($id);
        
        $this->assertEquals($id, $results[0]['ID']);
        $this->assertEquals($category, $results[0]['category']);
        $this->assertEquals($details, $results[0]['details']);
    }
}
