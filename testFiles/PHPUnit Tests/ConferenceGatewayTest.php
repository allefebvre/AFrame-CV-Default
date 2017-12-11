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
        self::$connection->executeQuery("DELETE FROM Conference WHERE reference=:reference AND authors=:authors AND title=:title AND date=:date AND journal=:journal AND volume=:volume AND number=:number AND pages=:pages AND note=:note AND abstract=:abstract AND keywords=:keywords AND series=:series AND localite=:localite AND publisher=:publisher AND editor=:editor AND pdf=:pdf AND date_display=:date_display AND category_id=:category_id;", array(
            ':reference' => array('_Reference_Test_', PDO::PARAM_STR),
            ':authors' => array('_Authors_Test_', PDO::PARAM_STR),
            ':title' => array('_Title_Test_', PDO::PARAM_STR),
            ':date' => array('_Date_Test_', PDO::PARAM_STR),
            ':journal' => array('_Journal_Test_', PDO::PARAM_STR),
            ':volume' => array('_Volume_Test_', PDO::PARAM_STR),
            ':number' => array('_Number_Test_', PDO::PARAM_STR),
            ':pages' => array('_Pages_Test_', PDO::PARAM_STR),
            ':note' => array('_Note_Test_', PDO::PARAM_STR),
            ':abstract' => array('_Abstract_Test_', PDO::PARAM_STR),
            ':keywords' => array('_Keywords_Test_', PDO::PARAM_STR),
            ':series' => array('_Series_Test_', PDO::PARAM_STR),
            ':localite' => array('_Localite_Test_', PDO::PARAM_STR),
            ':publisher' => array('_Publisher_Test_', PDO::PARAM_STR),
            ':editor' => array('_Editor_Test_', PDO::PARAM_STR),
            ':pdf' => array('_Pdf_Test_', PDO::PARAM_STR),
            ':date_display' => array('_Date_Display_Test_', PDO::PARAM_STR),
            ':category_id' => array(0, PDO::PARAM_INT)
        ));
    }

    public function testGetAllConferences() {     
        $results = self::$conferenceGW->getAllConferences();
        $oldSize = count($results);
        
        self::$conferenceGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '_Date_Test_', '_Journal_Test_', '_Volume_Test_', '_Number_Test_', '_Pages_Test_', '_Note_Test_', '_Abstract_Test_', '_Keywords_Test_', '_Series_Test_', '_Localite_Test_', '_Publisher_Test_', '_Editor_Test_', '_Pdf_Test_', '_Date_Display_Test_', 0);

        $results = self::$conferenceGW->getAllConferences();
        
        $this->assertEquals(count($results), $oldSize+1);
    }
}
