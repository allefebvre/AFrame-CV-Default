<?php

/**
 * A MODIFIER
 * 
 */
use PHPUnit\Framework\TestCase;

class ByDateGatewayTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/ByDateGateway.php';
    }

    public function test() {
        require 'config/config.php';

        $connection = new Connection($base, $login, $password);

        try {
            $connection->executeQuery("DELETE from Other WHERE reference = '__TEST__PHP__UNIT__';");
            $connection->executeQuery("DELETE from Conference WHERE reference = '__TEST__PHP__UNIT__';");
            $connection->executeQuery("DELETE from Journal WHERE reference = '__TEST__PHP__UNIT__';");
        } catch (Exception $ex) {
            
        }

        $connection->executeQuery("SELECT COUNT(*) FROM Other;");
        $nbrResultOther = $connection->getResults()[0];
        $connection->executeQuery("SELECT COUNT(*) FROM Conference;");
        $nbrResultConference = $connection->getResults()[0];
        $connection->executeQuery("SELECT COUNT(*) FROM Journal;");
        $nbrResultJournal = $connection->getResults()[0];

        $connection->executeQuery("INSERT INTO `Other` (reference, authors,"
                . " title, date, journal, volume, number, pages, note, abstract,"
                . " keywords, series, localite, publisher, editor, pdf,"
                . " date_display, category_id) VALUES ('__TEST__PHP__UNIT__',"
                . " 'auteur', 'titre', '2000-01-01', 'journal', 'volume', '1',"
                . " '50', 'note', 'abstract', 'keywords', 'series', 'localite',"
                . " 'publisher', 'editor', 'pdf', 'date_display', '5');");
        
        $connection->executeQuery("INSERT INTO `Conference` (reference, authors,"
                . " title, date, journal, volume, number, pages, note, abstract,"
                . " keywords, series, localite, publisher, editor, pdf,"
                . " date_display, category_id) VALUES ('__TEST__PHP__UNIT__',"
                . " 'auteur', 'titre', '2000-01-02', 'journal', 'volume', '1',"
                . " '50', 'note', 'abstract', 'keywords', 'series', 'localite',"
                . " 'publisher', 'editor', 'pdf', 'date_display', '5');");
                
        $connection->executeQuery("INSERT INTO `Journal` (reference, authors,"
                . " title, date, journal, volume, number, pages, note, abstract,"
                . " keywords, series, localite, publisher, editor, pdf,"
                . " date_display, category_id) VALUES ('__TEST__PHP__UNIT__',"
                . " 'auteur', 'titre', '2000-01-03', 'journal', 'volume', '1',"
                . " '50', 'note', 'abstract', 'keywords', 'series', 'localite',"
                . " 'publisher', 'editor', 'pdf', 'date_display', '5');");

        $gw = new ByDateGateway(new Connection($base, $login, $password));
        $result = $gw->getAllByDates();

        $connection->executeQuery("DELETE from Other WHERE reference = '__TEST__PHP__UNIT__';");
        $connection->executeQuery("DELETE from Conference WHERE reference = '__TEST__PHP__UNIT__';");
        $connection->executeQuery("DELETE from Journal WHERE reference = '__TEST__PHP__UNIT__';");

        $this->assertEquals(38, count($result[0]));

        $nbr = $nbrResultOther[0] + $nbrResultConference[0] + $nbrResultJournal[0] + 2;

        $this->assertTrue(isset($result[$nbr]["ID"]));
        $this->assertTrue(isset($result[$nbr]["reference"]));
        $this->assertTrue(isset($result[$nbr]["authors"]));
        $this->assertTrue(isset($result[$nbr]["title"]));
        $this->assertTrue(isset($result[$nbr]["date"]));
        $this->assertTrue(isset($result[$nbr]["journal"]));
        $this->assertTrue(isset($result[$nbr]["volume"]));
        $this->assertTrue(isset($result[$nbr]["number"]));
        $this->assertTrue(isset($result[$nbr]["pages"]));
        $this->assertTrue(isset($result[$nbr]["note"]));
        $this->assertTrue(isset($result[$nbr]["abstract"]));
        $this->assertTrue(isset($result[$nbr]["keywords"]));
        $this->assertTrue(isset($result[$nbr]["series"]));
        $this->assertTrue(isset($result[$nbr]["localite"]));
        $this->assertTrue(isset($result[$nbr]["publisher"]));
        $this->assertTrue(isset($result[$nbr]["editor"]));
        $this->assertTrue(isset($result[$nbr]["pdf"]));
        $this->assertTrue(isset($result[$nbr]["date_display"]));
        $this->assertTrue(isset($result[$nbr]["category_id"]));
    }

}
