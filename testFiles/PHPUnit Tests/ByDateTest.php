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
        $id = "var1";
        $reference = "var2";
        $authors = "var3";
        $title = "var4";
        $date = "var5";
        $journal = "var6";
        $volume = "var7";
        $number = "var8";
        $pages = "var9";
        $note = "var10";
        $abstract = "var11";
        $keywords = "var12";
        $series = "var13";
        $localite = "var14";
        $publisher = "var15";
        $editor = "var16";
        $pdf = "var17";
        $date_display = "var18";
        $categorie_id = "var19";
        
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