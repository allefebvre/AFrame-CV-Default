<?php

use PHPUnit\Framework\TestCase;

class InformationGatewayTest extends TestCase {

    static private $connection;
    static private $informationGW;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/InformationGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$informationGW = new InformationGateway(self::$connection);
    }

    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM Information WHERE status=:status AND name=:name AND firstname=:firstname AND photo=:photo AND age=:age AND address=:address AND phone=:phone AND mail=:mail", array(
            ':status' => array('_Status_Test_', PDO::PARAM_STR),
            ':name' => array('_Name_Test_', PDO::PARAM_STR),
            ':firstname' => array('_Firstname_Test_', PDO::PARAM_STR),
            ':photo' => array('_Photo_Test_', PDO::PARAM_STR),
            ':age' => array('_Age_Test_', PDO::PARAM_STR),
            ':address' => array('_Address_Test_', PDO::PARAM_STR),
            ':phone' => array('_Phone_Test_', PDO::PARAM_STR),
            ':mail' => array('_Mail_Test_', PDO::PARAM_STR)
        ));
    }

    public function testGetAllInformation() {     
        $results = self::$informationGW->getAllInformation();
        $oldSize = count($results);
        
        self::$informationGW->insert('_Status_Test_', '_Name_Test_', '_Firstname_Test_', '_Photo_Test_', '_Age_Test_', '_Address_Test_', '_Phone_Test_', '_Mail_Test_');

        $results = self::$informationGW->getAllInformation();
        
        $this->assertEquals(count($results), $oldSize+1);
    }
}
