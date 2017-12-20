<?php

use PHPUnit\Framework\TestCase;

class PublicationTest extends TestCase {
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Publication.php';
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
        
        $instance = new Publication($id, $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $categorie_id);
        
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
        
        $expectedToString = "<td>$id</td>"
                . "<td>$reference</td>"
                . "<td>$authors</td>"
                . "<td>$title</td>"
                . "<td>$date</td>"
                . "<td>$journal</td>"
                . "<td>$volume</td>"
                . "<td>$number</td>"
                . "<td>$pages</td>"
                . "<td>$note</td>"
                . "<td>$abstract</td>"
                . "<td>$keywords</td>"
                . "<td>$series</td>"
                . "<td>$localite</td>"
                . "<td>$publisher</td>"
                . "<td>$editor</td>"
                . "<td>$pdf</td>"
                . "<td>$date_display</td>"
                . "<td>$categorie_id</td>";
        
        $this->assertEquals($expectedToString, $instance->toString());
        
        $expectedForm = "<table>"                
                    . "<tr>"
                        . "<td>Reference* :</td>"
                        . "<td><input name=\"reference\" value=\"$reference\" type=\"text\" size=\"10\"></td>"
                    . "</tr>"
                    . "<tr>"
                        . "<td>Authors* :</td>"
                        . "<td><input name=\"authors\" value=\"$authors\" type=\"text\" size=\"100\"></td>"
                    . "</tr>"
                    . "<tr>"
                        . "<td>Title* :</td>"
                        . "<td><input name=\"title\" value=\"$title\" type=\"text\" size=\"100\"></td></tr>"
                    . "<tr>"
                        . "<td>Date* (YYYY-MM-DD) :</td>"
                        . "<td><input name=\"date\" value=\"$date\" type=\"text\"></td>"
                    . "</tr>"
                    . "<tr>"
                        . "<td>Journal :</td>"
                        . "<td><input name=\"journal\" value=\"$journal\" type=\"text\" size=\"100\"></td></tr>"
                    . "<tr>"
                        . "<td>Volume :</td>"
                        . "<td><input name=\"volume\" value=\"$volume\" type=\"text\" size=\"100\"></td>"
                    . "</tr>"
                    . "<tr>"
                        . "<td>Number :</td>"
                        . "<td><input name=\"number\" value=\"$number\" type=\"text\" size=\"100\"></td></tr>"
                    . "<tr>"
                        . "<td>Pages :</td>"
                        . "<td><input name=\"pages\" value=\"$pages\" type=\"text\" size=\"100\"></td></tr>"
                    . "<tr>"
                        . "<td>Note :</td>"
                        . "<td><textarea name=\"note\" rows=\"5\" cols=\"100\">".$note."</textarea></td>"
                    . "<tr>"
                        . "<td>Abstract :</td>"
                        . "<td><textarea name=\"abstract\" rows=\"5\" cols=\"100\">" .$abstract."</textarea></td>"
                    . "<tr>"
                        . "<td>Keyword :</td>"
                        . "<td><input name=\"keywords\" value=\"$keywords\" type=\"text\" size=\"100\"></td>"
                    . "</tr>"
                    . "<tr>"
                        . "<td>Series :</td>"
                        . "<td><input name=\"series\" value=\"$series\" type=\"text\" size=\"100\"></td>"
                    . "</tr>"
                    . "<tr>"
                        . "<td>Localite :</td>"
                        . "<td><input name=\"localite\" value=\"$localite\" type=\"text\" size=\"100\"></td>"
                    . "</tr>"
                    . "<tr>"
                        . "<td>Publisher :</td>"
                        . "<td><input name=\"publisher\" value=\"$publisher\" type=\"text\" size=\"100\"></td>"
                    . "</tr>"
                    . "<tr>"
                        . "<td>Editor :</td>"
                        . "<td><input name=\"editor\" value=\"$editor\" type=\"text\" size=\"100\"></td>"
                    . "</tr>"
                    . "<tr>"
                        . "<td>Pdf :</td>"
                        . "<td><input name=\"pdf\" value=\"$pdf\" type=\"text\" size=\"100\"></td>"
                    . "</tr>"
                    . "<tr>"
                        . "<td>Date display :</td>"
                        . "<td><input name=\"date_display\" value=\"$date_display\" type=\"text\" size=\"100\"></td>"
                    . "</tr>"
                    . "<tr>"
                        . "<td>Categorie id* :</td>"
                        . "<td><input name=\"categorie_id\" value=\"$categorie_id\" type=\"text\" size=\"100\"></td>"
                    . "</tr>"
                . "</table>";
        
        $this->assertEquals($expectedForm, $instance->toStringForm());
    }
}