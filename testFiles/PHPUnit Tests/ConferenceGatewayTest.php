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
        self::$conferenceGW = new ConferenceGateway(self::$connection);
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
        $results = self::$conferenceGW->getAllConferences();
        $oldSize = count($results);
        
        self::$conferenceGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '0000-00-00', "", "", "", "", "", "", "", "", "", "", "", "", "");

        $results = self::$conferenceGW->getAllConferences();
        
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
        
        $results = self::$conferenceGW->getOneConference($id);
        
        $this->assertEquals($id, $results[0]['ID']);
        $this->assertEquals($reference, $results[0]['reference']);
        $this->assertEquals($authors, $results[0]['authors']);
        $this->assertEquals($title, $results[0]['title']);
        $this->assertEquals($date, $results[0]['date']);
        $this->assertEquals(NULL, $results[0]['journal']);
        $this->assertEquals(NULL, $results[0]['volume']);
        $this->assertEquals(NULL, $results[0]['number']);
        $this->assertEquals(NULL, $results[0]['pages']);
        $this->assertEquals(NULL, $results[0]['note']);
        $this->assertEquals(NULL, $results[0]['abstract']);
        $this->assertEquals(NULL, $results[0]['keywords']);
        $this->assertEquals(NULL, $results[0]['series']);
        $this->assertEquals(NULL, $results[0]['localite']);
        $this->assertEquals(NULL, $results[0]['publisher']);
        $this->assertEquals(NULL, $results[0]['editor']);
        $this->assertEquals(NULL, $results[0]['pdf']);
        $this->assertEquals(NULL, $results[0]['date_display']);
        $this->assertEquals(NULL, $results[0]['category_id']);
    }
    
    public function testUpdateById() {
        $id = 100;
        $reference = '_Test_Reference_';
        $authors = '_Test_Authors_';
        $title = '_Test_Title_';
        $date = '1111-11-11';
        self::$conferenceGW->updateById($id, $reference, $authors, $title, $date, "", "", "", "", "", "", "", "", "", "", "", "", "");
        
        $results = self::$conferenceGW->getOneConference($id);
        
        $this->assertEquals($id, $results[0]['ID']);
        $this->assertEquals($reference, $results[0]['reference']);
        $this->assertEquals($authors, $results[0]['authors']);
        $this->assertEquals($title, $results[0]['title']);
        $this->assertEquals($date, $results[0]['date']);
        $this->assertEquals(NULL, $results[0]['journal']);
        $this->assertEquals(NULL, $results[0]['volume']);
        $this->assertEquals(NULL, $results[0]['number']);
        $this->assertEquals(NULL, $results[0]['pages']);
        $this->assertEquals(NULL, $results[0]['note']);
        $this->assertEquals(NULL, $results[0]['abstract']);
        $this->assertEquals(NULL, $results[0]['keywords']);
        $this->assertEquals(NULL, $results[0]['series']);
        $this->assertEquals(NULL, $results[0]['localite']);
        $this->assertEquals(NULL, $results[0]['publisher']);
        $this->assertEquals(NULL, $results[0]['editor']);
        $this->assertEquals(NULL, $results[0]['pdf']);
        $this->assertEquals(NULL, $results[0]['date_display']);
        $this->assertEquals(NULL, $results[0]['category_id']);
    }
}
