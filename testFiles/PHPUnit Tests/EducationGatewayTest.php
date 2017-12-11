<?php

use PHPUnit\Framework\TestCase;

class EducationGatewayTest extends TestCase {

    static private $connection;
    static private $educationGW;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/EducationGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$educationGW = new EducationGateway(self::$connection);
    }

    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM Education WHERE date=:date AND education=:education;", array(
            ':date' => array('_Date_Test_', PDO::PARAM_STR),
            ':education' => array('_Education_Test_', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("DELETE FROM Education WHERE id=:id AND date=:date AND education=:education;", array(
            ':id' => array(100, PDO::PARAM_INT),
            ':date' => array('_Test_Date_', PDO::PARAM_STR),
            ':education' => array('_Test_Education_', PDO::PARAM_STR)
        ));
    }

    public function testGetAllEducation() {     
        $results = self::$educationGW->getAllEducation();
        $oldSize = count($results);
        
        self::$educationGW->insert('_Date_Test_', '_Education_Test_');
        
        $results = self::$educationGW->getAllEducation();
        
        $this->assertEquals(count($results), $oldSize+1);
        
        foreach($results as $result) {
            $this->assertTrue(isset($result['ID']));
            $this->assertTrue(isset($result['date']));
            $this->assertTrue(isset($result['education']));
        }
    }
    
    public function testGetOneEducation() {
        $id = 100;
        $date = "_Date_Test_";
        $education = "_Education_Test_";
        self::$connection->executeQuery("INSERT INTO `Education` (id, date, education) VALUES (:id, :date, :education);", array(
            ':id' => array($id, PDO::PARAM_INT),
            ':date' => array($date, PDO::PARAM_STR),
            ':education' => array($education, PDO::PARAM_STR)
        ));
        
        $result = self::$educationGW->getOneEducation($id);
        
        $this->assertEquals($id, $result['ID']);
        $this->assertEquals($date, $result['date']);
        $this->assertEquals($education, $result['education']);
    }
    
    public function testUpdateById() {
        $id = 100;
        $date = "_Test_Date_";
        $education = "_Test_Education_";
        self::$educationGW->updateById($id, $date, $education);
        
        $result = self::$educationGW->getOneEducation($id);
        
        $this->assertEquals($id, $result['ID']);
        $this->assertEquals($date, $result['date']);
        $this->assertEquals($education, $result['education']);
    }
}
