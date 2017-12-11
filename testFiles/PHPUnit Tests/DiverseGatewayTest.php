<?php

use PHPUnit\Framework\TestCase;

class DiverseGatewayTest extends TestCase {

    static private $connection;
    static private $diverseGW;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/DiverseGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$diverseGW = new DiverseGateway(self::$connection);
    }

    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM Diverse WHERE diverse=:diverse;", array(
            ':diverse' => array('_Diverse_Test_', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("DELETE FROM Diverse WHERE id=:id AND diverse=:diverse;", array(
            ':id' => array(100, PDO::PARAM_INT),
            ':diverse' => array('_Test_Diverse_', PDO::PARAM_STR)
        ));
    }

    public function testGetAllDiverse() {     
        $results = self::$diverseGW->getAllDiverse();
        $oldSize = count($results);
        
        self::$diverseGW->insert('_Diverse_Test_');

        $results = self::$diverseGW->getAllDiverse();
        
        $this->assertEquals(count($results), $oldSize+1);
        
        foreach($results as $result) {
            $this->assertTrue(isset($result['ID']));
            $this->assertTrue(isset($result['diverse']));
        }
    }
    
    public function testGetOneDiverse() {
        $id = 100;
        $diverse = "_Diverse_Test_";
        self::$connection->executeQuery("INSERT INTO `Diverse` (id, diverse) VALUES (:id, :diverse);", array(
            ':id' => array($id, PDO::PARAM_INT),
            ':diverse' => array($diverse, PDO::PARAM_STR)
        ));
        
        $results = self::$diverseGW->getOneDiverse($id);
        
        $this->assertEquals($id, $results[0]['ID']);
        $this->assertEquals($diverse, $results[0]['diverse']);
    }
    
    public function testUpdateById() {
        $id = 100;
        $diverse = "_Test_Diverse_";
        self::$diverseGW->updateById($id, $diverse);
        
        $results = self::$diverseGW->getOneDiverse($id);
        
        $this->assertEquals($id, $results[0]['ID']);
        $this->assertEquals($diverse, $results[0]['diverse']);
    }
}
