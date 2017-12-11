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
    }

    public function testGetAllEducation() {     
        $results = self::$educationGW->getAllEducation();
        $oldSize = count($results);
        
        self::$educationGW->insert('_Date_Test_', '_Education_Test_');
        
        $results = self::$educationGW->getAllEducation();
        
        $this->assertEquals(count($results), $oldSize+1);
    }
}
