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
    }

    public function testGetAllSkills() {     
        $results = self::$skillGW->getAllSkills();
        $oldSize = count($results);
        
        self::$skillGW->insert('_Category_Test_', '_Details_Test_');

        $results = self::$skillGW->getAllSkills();
        
        $this->assertEquals(count($results), $oldSize+1);
    }
}
