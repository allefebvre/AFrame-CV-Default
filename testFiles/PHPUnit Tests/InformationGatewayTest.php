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
        self::$connection->executeQuery("DELETE FROM Information WHERE status=:status AND name=:name AND firstName=:firstname AND photo=:photo AND age=:age AND address=:address AND phone=:phone AND mail=:mail;", array(
            ':status' => array('_Status_Test_', PDO::PARAM_STR),
            ':name' => array('_Name_Test_', PDO::PARAM_STR),
            ':firstname' => array('_Firstname_Test_', PDO::PARAM_STR),
            ':photo' => array('_Photo_Test_', PDO::PARAM_STR),
            ':age' => array('_Age_Test_', PDO::PARAM_STR),
            ':address' => array('_Address_Test_', PDO::PARAM_STR),
            ':phone' => array('_Phone_Test_', PDO::PARAM_STR),
            ':mail' => array('_Mail_Test_', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("DELETE FROM Information WHERE id=:id AND status=:status AND name=:name AND firstName=:firstname;", array(
            ':id' => array(100, PDO::PARAM_INT),
            ':status' => array('_Test_Status_', PDO::PARAM_STR),
            ':name' => array('_Test_Name_', PDO::PARAM_STR),
            ':firstname' => array('_Test_Firstname_', PDO::PARAM_STR)
        ));
    }

    public function testGetAllInformation() {     
        $results = self::$informationGW->getAllInformation();
        $oldSize = count($results);
        
        self::$informationGW->insert('_Status_Test_', '_Name_Test_', '_Firstname_Test_', '_Photo_Test_', '_Age_Test_', '_Address_Test_', '_Phone_Test_', '_Mail_Test_');

        $results = self::$informationGW->getAllInformation();
        
        $this->assertEquals(count($results), $oldSize+1);
        
        foreach($results as $result) {
            $this->assertTrue(isset($result['ID']));
            $this->assertTrue(isset($result['status']));
            $this->assertTrue(isset($result['name']));
            $this->assertTrue(isset($result['firstName']));
            $this->assertTrue(isset($result['photo']) || $result['photo'] == NULL);
            $this->assertTrue(isset($result['age']) || $result['age'] == NULL);
            $this->assertTrue(isset($result['address']) || $result['address'] == NULL);
            $this->assertTrue(isset($result['phone']) || $result['phone'] == NULL);
            $this->assertTrue(isset($result['mail'])  || $result['mail'] == NULL);
        }
    }
    
    public function testGetOneInformation() {
        $id = 100;
        $status = "_Status_Test_";
        $name = "_Name_Test_";
        $firstname = "_Firstname_Test_";
        self::$connection->executeQuery("INSERT INTO `Information` (id, status, name, firstName) VALUES (:id, :status, :name, :firstname);", array(
            ':id' => array($id, PDO::PARAM_INT),
            ':status' => array($status, PDO::PARAM_STR),
            ':name' => array($name, PDO::PARAM_STR),
            ':firstname' => array($firstname, PDO::PARAM_STR)
        ));
        
        $result = self::$informationGW->getOneInformation($id);
        
        $this->assertEquals($id, $result['ID']);
        $this->assertEquals($status, $result['status']);
        $this->assertEquals($name, $result['name']);
        $this->assertEquals($firstname, $result['firstName']);
        $this->assertEquals(NULL, $result['photo']);
        $this->assertEquals(NULL, $result['age']);
        $this->assertEquals(NULL, $result['address']);
        $this->assertEquals(NULL, $result['phone']);
        $this->assertEquals(NULL, $result['mail']);
    }
    
    public function testUpdateById() {
        $id = 100;
        $status = "_Test_Status_";
        $name = "_Test_Name_";
        $firstname = "_Test_Firstname_";
        $photo = "_Test_Photo_";
        $age = "_Test_Age_";
        $address = "_Test_Address_";
        $phone = "_Test_Phone_";
        $mail = "_Test_Mail_";
        self::$informationGW->updateById($id, $status, $name, $firstname, $photo, $age, $address, $phone, $mail);
        
        $result = self::$informationGW->getOneInformation($id);
        
        $this->assertEquals($id, $result['ID']);
        $this->assertEquals($status, $result['status']);
        $this->assertEquals($name, $result['name']);
        $this->assertEquals($firstname, $result['firstName']);
        $this->assertEquals($photo, $result['photo']);
        $this->assertEquals($age, $result['age']);
        $this->assertEquals($address, $result['address']);
        $this->assertEquals($phone, $result['phone']);
        $this->assertEquals($mail, $result['mail']);
    }
}
