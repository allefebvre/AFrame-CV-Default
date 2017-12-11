<?php

use PHPUnit\Framework\TestCase;

class WorkExpGatewayTest extends TestCase {

    static private $connection;
    static private $workExpGW;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/WorkExpGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$workExpGW = new WorkExpGateway(self::$connection);
    }
    
    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM WorkExp WHERE date=:date AND workExp=:workExp;", array(
            ':date' => array('_Date_Test_', PDO::PARAM_STR),
            ':workExp' => array('_WorkExp_Test_', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("DELETE FROM WorkExp WHERE id=:id AND date=:date AND workExp=:workExp;", array(
            ':id' => array(100, PDO::PARAM_INT),
            ':date' => array('_Test_Date_', PDO::PARAM_STR),
            ':workExp' => array('_Test_WorkExp_', PDO::PARAM_STR)
        ));
    }

    public function testGetAllWorkExps() {     
        $results = self::$workExpGW->getAllWorkExps();
        $oldSize = count($results);
        
        self::$workExpGW->insert('_Date_Test_', '_WorkExp_Test_');

        $results = self::$workExpGW->getAllWorkExps();
        
        $this->assertEquals(count($results), $oldSize+1);
        
        foreach($results as $result) {
            $this->assertTrue(isset($result['ID']));
            $this->assertTrue(isset($result['date']));
            $this->assertTrue(isset($result['workExp']));
        }
    }
    
    public function testGetOneWorkExp() {
        $id = 100;
        $date = "_Date_Test_";
        $workExp = "_WorkExp_Test_";
        self::$connection->executeQuery("INSERT INTO `WorkExp` (id, date, workExp) VALUES (:id, :date, :workExp);", array(
            ':id' => array($id, PDO::PARAM_INT),
            ':date' => array($date, PDO::PARAM_STR),
            ':workExp' => array($workExp, PDO::PARAM_STR)
        ));
        
        $result = self::$workExpGW->getOneWorkExp($id);
        
        $this->assertEquals($id, $result['ID']);
        $this->assertEquals($date, $result['date']);
        $this->assertEquals($workExp, $result['workExp']);
    }
    
    public function testUpdateById() {
        $id = 100;
        $date = "_Test_Date_";
        $workExp = "_Test_workExp_";
        self::$workExpGW->updateById($id, $date, $workExp);
        
        $result = self::$workExpGW->getOneWorkExp($id);
        
        $this->assertEquals($id, $result['ID']);
        $this->assertEquals($date, $result['date']);
        $this->assertEquals($workExp, $result['workExp']);
    }
}
