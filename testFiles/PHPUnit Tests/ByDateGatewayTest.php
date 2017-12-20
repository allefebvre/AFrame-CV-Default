<?php
use PHPUnit\Framework\TestCase;

class ByDateGatewayTest extends TestCase {

    static private $connection;
    static private $byDateGW;
    static private $otherGW;
    static private $journalGW;
    static private $conferenceGW;
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/ByDateGateway.php';
        require_once 'model/OtherGateway.php';
        require_once 'model/JournalGateway.php';
        require_once 'model/ConferenceGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$otherGW = new OtherGateway(self::$connection);
        self::$journalGW = new JournalGateway(self::$connection);
        self::$conferenceGW = new ConferenceGateway(self::$connection);
    }
    
    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM Other WHERE reference=:reference AND authors=:authors AND title=:title AND date=:date;", array(
            ':reference' => array('_Reference_Test_', PDO::PARAM_STR),
            ':authors' => array('_Authors_Test_', PDO::PARAM_STR),
            ':title' => array('_Title_Test_', PDO::PARAM_STR),
            ':date' => array('_Date_Test_', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("DELETE FROM Conference WHERE reference=:reference AND authors=:authors AND title=:title AND date=:date;", array(
            ':reference' => array('_Reference_Test_', PDO::PARAM_STR),
            ':authors' => array('_Authors_Test_', PDO::PARAM_STR),
            ':title' => array('_Title_Test_', PDO::PARAM_STR),
            ':date' => array('_Date_Test_', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("DELETE FROM Journal WHERE reference=:reference AND authors=:authors AND title=:title AND date=:date;", array(
            ':reference' => array('_Reference_Test_', PDO::PARAM_STR),
            ':authors' => array('_Authors_Test_', PDO::PARAM_STR),
            ':title' => array('_Title_Test_', PDO::PARAM_STR),
            ':date' => array('_Date_Test_', PDO::PARAM_STR)
        ));
    }

    public function testGetAllByDates() {  
        $byDateGW = new ByDateGateway(self::$connection);
        $results = $byDateGW->getAllByDates();
        $oldSize = count($results);
        
        self::$otherGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '0000-00-00');
        self::$journalGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '0000-00-00');
        self::$conferenceGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '0000-00-00');

        $results = $byDateGW->getAllByDates();
        
        $this->assertEquals(count($results), $oldSize+3);
        
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
}
