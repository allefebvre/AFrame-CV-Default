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
        self::$byDateGW = new ByDateGateway(self::$connection);
        self::$otherGW = new OtherGateway(self::$connection);
        self::$journalGW = new JournalGateway(self::$connection);
        self::$conferenceGW = new ConferenceGateway(self::$connection);
    }
    
    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM Other WHERE reference=:reference AND authors=:authors AND title=:title AND date=:date AND journal=:journal AND volume=:volume AND number=:number AND pages=:pages AND note=:note AND abstract=:abstract AND keywords=:keywords AND series=:series AND localite=:localite AND publisher=:publisher AND editor=:editor AND pdf=:pdf AND date_display=:date_display AND category_id=:category_id;", array(
            ':reference' => array('ReferenceTest', PDO::PARAM_STR),
            ':authors' => array('AuthorsTest', PDO::PARAM_STR),
            ':title' => array('TitleTest', PDO::PARAM_STR),
            ':date' => array('DateTest', PDO::PARAM_STR),
            ':journal' => array('JournalTest', PDO::PARAM_STR),
            ':volume' => array('VolumeTest', PDO::PARAM_STR),
            ':number' => array('NumberTest', PDO::PARAM_STR),
            ':pages' => array('PagesTest', PDO::PARAM_STR),
            ':note' => array('NoteTest', PDO::PARAM_STR),
            ':abstract' => array('AbstractTest', PDO::PARAM_STR),
            ':keywords' => array('KeywordsTest', PDO::PARAM_STR),
            ':series' => array('SeriesTest', PDO::PARAM_STR),
            ':localite' => array('LocaliteTest', PDO::PARAM_STR),
            ':publisher' => array('PublisherTest', PDO::PARAM_STR),
            ':editor' => array('EditorTest', PDO::PARAM_STR),
            ':pdf' => array('PdfTest', PDO::PARAM_STR),
            ':date_display' => array('DateDisplayTest', PDO::PARAM_STR),
            ':category_id' => array(0, PDO::PARAM_INT)
        ));
        self::$connection->executeQuery("DELETE FROM Conference WHERE reference=:reference AND authors=:authors AND title=:title AND date=:date AND journal=:journal AND volume=:volume AND number=:number AND pages=:pages AND note=:note AND abstract=:abstract AND keywords=:keywords AND series=:series AND localite=:localite AND publisher=:publisher AND editor=:editor AND pdf=:pdf AND date_display=:date_display AND category_id=:category_id;", array(
            ':reference' => array('ReferenceTest', PDO::PARAM_STR),
            ':authors' => array('AuthorsTest', PDO::PARAM_STR),
            ':title' => array('TitleTest', PDO::PARAM_STR),
            ':date' => array('DateTest', PDO::PARAM_STR),
            ':journal' => array('JournalTest', PDO::PARAM_STR),
            ':volume' => array('VolumeTest', PDO::PARAM_STR),
            ':number' => array('NumberTest', PDO::PARAM_STR),
            ':pages' => array('PagesTest', PDO::PARAM_STR),
            ':note' => array('NoteTest', PDO::PARAM_STR),
            ':abstract' => array('AbstractTest', PDO::PARAM_STR),
            ':keywords' => array('KeywordsTest', PDO::PARAM_STR),
            ':series' => array('SeriesTest', PDO::PARAM_STR),
            ':localite' => array('LocaliteTest', PDO::PARAM_STR),
            ':publisher' => array('PublisherTest', PDO::PARAM_STR),
            ':editor' => array('EditorTest', PDO::PARAM_STR),
            ':pdf' => array('PdfTest', PDO::PARAM_STR),
            ':date_display' => array('DateDisplayTest', PDO::PARAM_STR),
            ':category_id' => array(0, PDO::PARAM_INT)
        ));
        self::$connection->executeQuery("DELETE FROM Journal WHERE reference=:reference AND authors=:authors AND title=:title AND date=:date AND journal=:journal AND volume=:volume AND number=:number AND pages=:pages AND note=:note AND abstract=:abstract AND keywords=:keywords AND series=:series AND localite=:localite AND publisher=:publisher AND editor=:editor AND pdf=:pdf AND date_display=:date_display AND category_id=:category_id;", array(
            ':reference' => array('ReferenceTest', PDO::PARAM_STR),
            ':authors' => array('AuthorsTest', PDO::PARAM_STR),
            ':title' => array('TitleTest', PDO::PARAM_STR),
            ':date' => array('DateTest', PDO::PARAM_STR),
            ':journal' => array('JournalTest', PDO::PARAM_STR),
            ':volume' => array('VolumeTest', PDO::PARAM_STR),
            ':number' => array('NumberTest', PDO::PARAM_STR),
            ':pages' => array('PagesTest', PDO::PARAM_STR),
            ':note' => array('NoteTest', PDO::PARAM_STR),
            ':abstract' => array('AbstractTest', PDO::PARAM_STR),
            ':keywords' => array('KeywordsTest', PDO::PARAM_STR),
            ':series' => array('SeriesTest', PDO::PARAM_STR),
            ':localite' => array('LocaliteTest', PDO::PARAM_STR),
            ':publisher' => array('PublisherTest', PDO::PARAM_STR),
            ':editor' => array('EditorTest', PDO::PARAM_STR),
            ':pdf' => array('PdfTest', PDO::PARAM_STR),
            ':date_display' => array('DateDisplayTest', PDO::PARAM_STR),
            ':category_id' => array(0, PDO::PARAM_INT)
        ));
    }

    public function testGetAllByDates() {     
        $results = self::$byDateGW->getAllByDates();
        $oldSize = count($results);
        
        self::$otherGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '_Date_Test_', '_Journal_Test_', '_Volume_Test_', '_Number_Test_', '_Pages_Test_', '_Note_Test_', '_Abstract_Test_', '_Keywords_Test_', '_Series_Test_', '_Localite_Test_', '_Publisher_Test_', '_Editor_Test_', '_Pdf_Test_', '_Date_Display_Test_', 0);
        self::$journalGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '_Date_Test_', '_Journal_Test_', '_Volume_Test_', '_Number_Test_', '_Pages_Test_', '_Note_Test_', '_Abstract_Test_', '_Keywords_Test_', '_Series_Test_', '_Localite_Test_', '_Publisher_Test_', '_Editor_Test_', '_Pdf_Test_', '_Date_Display_Test_', 0);
        self::$conferenceGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '_Date_Test_', '_Journal_Test_', '_Volume_Test_', '_Number_Test_', '_Pages_Test_', '_Note_Test_', '_Abstract_Test_', '_Keywords_Test_', '_Series_Test_', '_Localite_Test_', '_Publisher_Test_', '_Editor_Test_', '_Pdf_Test_', '_Date_Display_Test_', 0);

        $results = self::$byDateGW->getAllByDates();
        
        $this->assertEquals(count($results), $oldSize+3);
    }
}
