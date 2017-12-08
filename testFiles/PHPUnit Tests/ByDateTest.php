<?php

use PHPUnit\Framework\TestCase;

class ByDateTest extends TestCase {
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass()
    {
        require_once 'model/ByDate.php';
    }
    
    public function test() {
        $id = 0;
        $reference = "reference";
        $authors = "authors";
        $title = "title";
        $date = "date";
        $journal = "journal";
        $volume = "volume";
        $number = "number";
        $pages = "pages";
        $note = "note";
        $abstract = "abstract";
        $keywords = "keywords";
        $series = "series";
        $localite = "localite";
        $publisher = "publisher";
        $editor = "editor";
        $pdf = "pdf";
        $date_display = "date_display";
        $categorie_id = 0;
        
        $instance = new ByDate($id, $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $categorie_id);
        
        $this->assertEquals($id, $instance->getId());
        $this->assertEquals($reference, $instance->getReference());
        $this->assertEquals($authors, $instance->getAuthors());
        $this->assertEquals($title, $instance->getTitle());
        $this->assertEquals($date, $instance->getDate());
        $this->assertEquals($journal, $instance->getJournal());
        $this->assertEquals($volume, $instance->getVolume());
        $this->assertEquals($number, $instance->getNumber());
        $this->assertEquals($pages, $instance->getPages());
        $this->assertEquals($note, $instance->getNote());
        $this->assertEquals($abstract, $instance->getAbstract());
        $this->assertEquals($keywords, $instance->getKeywords());
        $this->assertEquals($series, $instance->getSeries());
        $this->assertEquals($localite, $instance->getLocalite());
        $this->assertEquals($publisher, $instance->getPublisher());
        $this->assertEquals($editor, $instance->getEditor());
        $this->assertEquals($pdf, $instance->getPdf());
        $this->assertEquals($date_display, $instance->getDate_display());
        $this->assertEquals($categorie_id, $instance->getCategorie_id());
    }
}