<?php

use PHPUnit\Framework\TestCase;

class PublicationGatewayTest extends TestCase {

    static private $connection;
    static private $publicationGW;

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/PublicationGateway.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$publicationGW = new PublicationGateway(self::$connection);
    }

    /**
     * @afterClass
     */
    public static function tearDownAfterClass() {
        self::$connection->executeQuery("DELETE FROM Publication WHERE reference=:reference AND authors=:authors AND title=:title AND date=:date;", array(
            ':reference' => array('_Reference_Test_', PDO::PARAM_STR),
            ':authors' => array('_Authors_Test_', PDO::PARAM_STR),
            ':title' => array('_Title_Test_', PDO::PARAM_STR),
            ':date' => array('0000-00-00', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("DELETE FROM Publication WHERE ID=:id AND reference=:reference AND authors=:authors AND title=:title AND date=:date;", array(
            ':id' => array(100, PDO::PARAM_INT),
            ':reference' => array('_Test_Reference_', PDO::PARAM_STR),
            ':authors' => array('_Test_Authors_', PDO::PARAM_STR),
            ':title' => array('_Test_Title_', PDO::PARAM_STR),
            ':date' => array('1111-11-11', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("DELETE FROM Publication WHERE ID=:id AND reference=:reference AND authors=:authors AND title=:title", array(
            ':id' => array(100, PDO::PARAM_INT),
            ':reference' => array('_Test_Reference_Insert', PDO::PARAM_STR),
            ':authors' => array('_Test_Authors_Insert', PDO::PARAM_STR),
            ':title' => array('_Test_Title_Insert', PDO::PARAM_STR)
        ));
        self::$connection->executeQuery("DELETE FROM Publication WHERE ID=:id AND reference=:reference AND authors=:authors AND title=:title", array(
            ':id' => array(100, PDO::PARAM_INT),
            ':reference' => array('_Test_Reference_Update', PDO::PARAM_STR),
            ':authors' => array('_Test_Authors_Update', PDO::PARAM_STR),
            ':title' => array('_Test_Title_Update', PDO::PARAM_STR)
        ));
    }

    public function testGetAllPublication() {

        $results = self::$publicationGW->getAllPublications();
        $oldSize = count($results);

        self::$publicationGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '0000-00-00','', '', '', '', '', '', '', '', '', '', '', '', '', 0);

        $results = self::$publicationGW->getAllPublications();

        $this->assertEquals(count($results), $oldSize + 1);

        foreach ($results as $result) {
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
            $this->assertTrue(isset($result['categorie_id']) || $result['categorie_id'] == NULL);
        }
    }

    public function testGetAllPublicationByDate() {
        $results = self::$publicationGW->getAllPublicationsByDate();
        $oldSize = count($results);

        self::$publicationGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);

        $results = self::$publicationGW->getAllPublicationsByDate();

        $this->assertEquals(count($results), $oldSize + 1);

        foreach ($results as $result) {
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
            $this->assertTrue(isset($result['categorie_id']) || $result['categorie_id'] == NULL);
        }
    }

    public function testGetAllJournals() {
        $results = self::$publicationGW->getAllJournals();
        $oldSize = count($results);

        self::$publicationGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', 1);

        $results = self::$publicationGW->getAllJournals();

        $this->assertEquals(count($results), $oldSize + 1);

        foreach ($results as $result) {
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
            $this->assertTrue(isset($result['categorie_id']) || $result['categorie_id'] == NULL);
        }
    }

    public function testGetAllConferences() {
         $results = self::$publicationGW->getAllConferences();
        $oldSize = count($results);

        self::$publicationGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '0000-00-00',  '', '', '', '', '', '', '', '', '', '', '', '', '', 2);

        $results = self::$publicationGW->getAllConferences();

        $this->assertEquals(count($results), $oldSize + 1);

        foreach ($results as $result) {
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
            $this->assertTrue(isset($result['categorie_id']) || $result['categorie_id'] == NULL);
        }
    }

    public function testGetAllThesis() {
         $results = self::$publicationGW->getAllThesis();
        $oldSize = count($results);

        self::$publicationGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', 4);

        $results = self::$publicationGW->getAllThesis();

        $this->assertEquals(count($results), $oldSize + 1);

        foreach ($results as $result) {
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
            $this->assertTrue(isset($result['categorie_id']) || $result['categorie_id'] == NULL);
        }
    }

    public function testGetAllMiscellaneous() {
         $results = self::$publicationGW->getAllMiscellaneous();
        $oldSize = count($results);

        self::$publicationGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', 5);

        $results = self::$publicationGW->getAllMiscellaneous();

        $this->assertEquals(count($results), $oldSize + 1);

        foreach ($results as $result) {
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
            $this->assertTrue(isset($result['categorie_id']) || $result['categorie_id'] == NULL);
        }
    }
    
        public function testGetAllDocumentation() {
         $results = self::$publicationGW->getAllDocumentations();
        $oldSize = count($results);

        self::$publicationGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', 3);

        $results = self::$publicationGW->getAllDocumentations();

        $this->assertEquals(count($results), $oldSize + 1);

        foreach ($results as $result) {
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
            $this->assertTrue(isset($result['categorie_id']) || $result['categorie_id'] == NULL);
        }
    }

    public function testGetOnePublication() {
        $id = 250;
        $reference = '_Reference_Test_';
        $authors = '_Authors_Test_';
        $title = '_Title_Test_';    
        $date = '0000-00-00';
        $categorie_id = 2;
        self::$connection->executeQuery("INSERT INTO `Publication` (ID, reference, authors, title, date, categorie_id) VALUES (:id, :reference, :authors, :title, :date, :categorie_id);", array(
            ':id' => array($id, PDO::PARAM_INT),
            ':reference' => array($reference, PDO::PARAM_STR),
            ':authors' => array($authors, PDO::PARAM_STR),
            ':title' => array($title, PDO::PARAM_STR),
            ':date' => array($date, PDO::PARAM_STR),
            ':categorie_id' => array($categorie_id, PDO::PARAM_INT)
        ));

        $result = self::$publicationGW->getOnePublication($id);

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
        $this->assertEquals(2, $result['categorie_id']);
    }

    public function testUpdateById() {
        $id = 300;
        $reference = '_Reference_Test_';
        $authors = '_Authors_Test_';
        $title = '_Title_Test_';    
        $date = '0000-00-00';
        $categorie_id = 2;
          self::$connection->executeQuery("INSERT INTO `Publication` (ID, reference, authors, title, date, categorie_id) VALUES (:id, :reference, :authors, :title, :date, :categorie_id);", array(
            ':id' => array($id, PDO::PARAM_INT),
            ':reference' => array($reference, PDO::PARAM_STR),
            ':authors' => array($authors, PDO::PARAM_STR),
            ':title' => array($title, PDO::PARAM_STR),
            ':date' => array($date, PDO::PARAM_STR),
            ':categorie_id' => array($categorie_id, PDO::PARAM_INT)
        ));
        self::$publicationGW->updateById($id, $reference, $authors, $title, $date, '',  '', '', '', '', '', '', '', '', '', '', '', '', 1);

        $result = self::$publicationGW->getOnePublication($id);

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
        $this->assertEquals(1, $result['categorie_id']);
    }

    public function testInsert() {        
        $results = self::$publicationGW->getAllPublications();
        $oldSize = count($results);
        
        self::$publicationGW->insert('_Reference_Test_', '_Authors_Test_', '_Title_Test_', '0000-00-00',  '', '', '', '', '', '', '', '', '', '', '', '', '', 2);

        $results = self::$publicationGW->getAllPublications();
        $this->assertEquals(count($results), $oldSize + 1);
    }

}
