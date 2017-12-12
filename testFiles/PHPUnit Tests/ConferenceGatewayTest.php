<?php

use PHPUnit\Framework\TestCase;

class ConferenceGatewayTest extends TestCase {

    static private $connection;
    static private $conferenceGW;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/ConferenceGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$conferenceGW = new PublicationGateway(self::$connection);
    }
    
    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM Conference WHERE reference=:reference AND authors=:authors AND title=:title AND date=:date;", array(
            ':reference' => array('_Reference_Test_', PDO::PARAM_STR),
            ':authors' => array('_Authors_Test_', PDO::PARAM_STR),
            ':title' => array('_Title_Test_', PDO::PARAM_STR),
            ':date' => array('0000-00-00', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("DELETE FROM Conference WHERE id=:id AND reference=:reference AND authors=:authors AND title=:title AND date=:date;", array(
            ':id' => array(100, PDO::PARAM_INT),
            ':reference' => array('_Test_Reference_', PDO::PARAM_STR),
            ':authors' => array('_Test_Authors_', PDO::PARAM_STR),
            ':title' => array('_Test_Title_', PDO::PARAM_STR),
            ':date' => array('1111-11-11', PDO::PARAM_STR)
        ));
    }

    public function testGetAllConferences() {     
        $results = self::$conferenceGW->getAllPublication();
        $oldSize = count($results);
        
        self::$conferenceGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '0000-00-00');

        $results = self::$conferenceGW->getAllPublication();
        
        $this->assertEquals(count($results), $oldSize+1);
        
        foreach($results as $result) {
            $this->assertTrue(isset($result['ID']));
            $this->assertTrue(isset($result['reference']));
            $this->assertTrue(isset($result['authors']));
            $this->assertTrue(isset($result['title']));
            $this->assertTrue(isset($result['date']));
            $this->assertTrue(isset($result['journal']) || $result['journal'] == NULL);
            $this->assertTrue(isset($result['volume']) || $result['volume'] == NULL);
            $this->assertTrue(isset($result['number']) || $result['number'] == NULL);
            $this->assertTrue(isset($result['pages']) || $result['pages'] == NULL);
            $this->assertTrue(isset($result['note']) || $result['note'] == NULL);
            $this->assertTrue(isset($result['abstract']) || $result['abstract'] == NULL);
            $this->assertTrue(isset($result['keywords']) || $result['keywords'] == NULL);
            $this->assertTrue(isset($result['series']) || $result['series'] == NULL);
            $this->assertTrue(isset($result['localite']) || $result['localite'] == NULL);
            $this->assertTrue(isset($result['publisher']) || $result['publisher'] == NULL);
            $this->assertTrue(isset($result['editor']) || $result['editor'] == NULL);
            $this->assertTrue(isset($result['pdf']) || $result['pdf'] == NULL);
            $this->assertTrue(isset($result['date_display']) || $result['date_display'] == NULL);
            $this->assertTrue(isset($result['category_id']) || $result['category_id'] == NULL);
        }
    }
    
    public function testGetOneOther() {
        $id = 100;
        $reference = '_Reference_Test_';
        $authors = '_Authors_Test_';
        $title = '_Title_Test_';
        $date = '0000-00-00';
        self::$connection->executeQuery("INSERT INTO `Conference` (id, reference, authors, title, date) VALUES (:id, :reference, :authors, :title, :date);", array(
            ':id' => array($id, PDO::PARAM_INT),
            ':reference' => array($reference, PDO::PARAM_STR),
            ':authors' => array($authors, PDO::PARAM_STR),
            ':title' => array($title, PDO::PARAM_STR),
            ':date' => array($date, PDO::PARAM_STR)
        ));
        
        $result = self::$conferenceGW->getOnePublication($id);
        
        $this->assertEquals($id, $result['ID']);
        $this->assertEquals($reference, $result['reference']);
        $this->assertEquals($authors, $result['authors']);
        $this->assertEquals($title, $result['title']);
        $this->assertEquals($date, $result['date']);
        $this->assertEquals(NULL, $result['journal']);
        $this->assertEquals(NULL, $result['volume']);
        $this->assertEquals(NULL, $result['number']);
        $this->assertEquals(NULL, $result['pages']);
        $this->assertEquals(NULL, $result['note']);
        $this->assertEquals(NULL, $result['abstract']);
        $this->assertEquals(NULL, $result['keywords']);
        $this->assertEquals(NULL, $result['series']);
        $this->assertEquals(NULL, $result['localite']);
        $this->assertEquals(NULL, $result['publisher']);
        $this->assertEquals(NULL, $result['editor']);
        $this->assertEquals(NULL, $result['pdf']);
        $this->assertEquals(NULL, $result['date_display']);
        $this->assertEquals(NULL, $result['category_id']);
    }
    
    public function testUpdateById() {
        $id = 100;
        $reference = '_Test_Reference_';
        $authors = '_Test_Authors_';
        $title = '_Test_Title_';
        $date = '1111-11-11';
        self::$conferenceGW->updateById($id, $reference, $authors, $title, $date);
        
        $result = self::$conferenceGW->getOnePublication($id);
        
        $this->assertEquals($id, $result['ID']);
        $this->assertEquals($reference, $result['reference']);
        $this->assertEquals($authors, $result['authors']);
        $this->assertEquals($title, $result['title']);
        $this->assertEquals($date, $result['date']);
        $this->assertEquals(NULL, $result['journal']);
        $this->assertEquals(NULL, $result['volume']);
        $this->assertEquals(NULL, $result['number']);
        $this->assertEquals(NULL, $result['pages']);
        $this->assertEquals(NULL, $result['note']);
        $this->assertEquals(NULL, $result['abstract']);
        $this->assertEquals(NULL, $result['keywords']);
        $this->assertEquals(NULL, $result['series']);
        $this->assertEquals(NULL, $result['localite']);
        $this->assertEquals(NULL, $result['publisher']);
        $this->assertEquals(NULL, $result['editor']);
        $this->assertEquals(NULL, $result['pdf']);
        $this->assertEquals(NULL, $result['date_display']);
        $this->assertEquals(NULL, $result['category_id']);
    }
}
