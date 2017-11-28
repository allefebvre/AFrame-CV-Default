<?php 

class Other{
    
    private $id;
    private $reference;
    private $authors;
    private $title;
    private $date;
    private $journal;
    private $volume;
    private $number;
    private $pages;
    private $note;
    private $abstract;
    private $keywords;
    private $series;
    private $localite;
    private $publisher;
    private $editor;
    private $pdf;
    private $date_display;
    private $categorie_id;
    
    function __construct(int $id, string $reference, string $authors, string $title, string $date, string $journal, string $volume, string $number, string $pages, string $note, string $abstract, string $keywords, string $series, string $localite, string $publisher, string $editor, string $pdf, string $date_display, int $categorie_id) {
        $this->id = $id;
        $this->reference = $reference;
        $this->authors = $authors;
        $this->title = $title;
        $this->date = $date;
        $this->journal = $journal;
        $this->volume = $volume;
        $this->number = $number;
        $this->pages = $pages;
        $this->note = $note;
        $this->abstract = $abstract;
        $this->keywords = $keywords;
        $this->series = $series;
        $this->localite = $localite;
        $this->publisher = $publisher;
        $this->editor = $editor;
        $this->pdf = $pdf;
        $this->date_display = $date_display;
        $this->categorie_id = $categorie_id;
    }

    /* --- Getters --- */
    function getId() :int {
        return $this->id;
    }

    function getReference() :string {
        return $this->reference;
    }

    function getAuthors() :string {
        return $this->authors;
    }

    function getTitle() :string {
        return $this->title;
    }

    function getDate() :string {
        return $this->date;
    }

    function getJournal() :string {
        return $this->journal;
    }

    function getVolume() :string {
        return $this->volume;
    }

    function getNumber() :string {
        return $this->number;
    }

    function getPages() :string {
        return $this->pages;
    }

    function getNote() :string {
        return $this->note;
    }

    function getAbstract() :string {
        return $this->abstract;
    }
    
    function getKeywords() :string {
        return $this->keywords;
    }

    function getSeries() :string {
        return $this->series;
    }

    function getLocalite() :string {
        return $this->localite;
    }

    function getPublisher() :string {
        return $this->publisher;
    }

    function getEditor() :string {
        return $this->editor;
    }

    function getPdf() :string {
        return $this->pdf;
    }

    function getDate_display() :string {
        return $this->date_display;
    }

    function getCategorie_id() :int {
        return $this->categorie_id;
    }
    
    function toString(): string {
       $toReturn = "<td>$this->id</td>"
                . "<td>$this->reference</td>"
                . "<td>$this->authors</td>"
                . "<td>$this->title</td>"
                . "<td>$this->date</td>"
                . "<td>$this->journal$</td>"
                . "<td>$this->volume</td>"
                . "<td>$this->number</td>"
                . "<td>$this->pages</td>"
                . "<td>$this->note</td>"
                . "<td>$this->abstract</td>"
                . "<td>$this->keywords</td>"
                . "<td>$this->series</td>"
                . "<td>$this->localite</td>"
                . "<td>$this->publisher</td>"
                . "<td>$this->editor</td>"
                . "<td>$this->pdf</td>"
                . "<td>$this->date_display</td>"
                . "<td>$this->categorie_id</td>";
        return $toReturn;
    }
    function toStringUpdate(): string {
        $toReturn = "<table>"
                . "<tr><td>ID :</td><td><input name=\"id\" value=". $this->id ." type=\"text\" size=\"10\" disabled></td><tr>"
                . "<tr><td>Reference :</td><td><input name=\"reference\" value=".$this->reference." type=\"text\" size=\"10\"></td><tr>"
                . "<tr><td>Authors :</td><td><input name=\"authors\" value=".$this->authors." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Title :</td><td><input name=\"title\" value=".$this->title." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Date :</td><td><input name=\"date\" value=".$this->date." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Journal :</td><td><input name=\"journal\" value=".$this->journal." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Valume :</td><td><input name=\"volume\" value=".$this->volume." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Number :</td><td><input name=\"number\" value=".$this->number." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Pages :</td><td><input name=\"pages\" value=".$this->pages." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Note :</td><td><textarea name=\"note\" rows=\"5\" cols=\"100\">" .$this->note."</textarea>"
                . "<tr><td>Abstract :</td><td><textarea name=\"abstract\" rows=\"5\" cols=\"100\">" .$this->abstract."</textarea>"
                . "<tr><td>Keyword :</td><td><input name=\"keywords\" value=".$this->keywords." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Series :</td><td><input name=\"series\" value=".$this->series." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Localite :</td><td><input name=\"localite\" value=".$this->localite." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Publisher :</td><td><input name=\"publisher\" value=".$this->publisher." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Editor :</td><td><input name=\"editor\" value=".$this->editor." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Pdf :</td><td><input name=\"pdf\" value=".$this->pdf." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Date display :</td><td><input name=\"date_display\" value=".$this->date_display." type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Categorie id :</td><td><input name=\"categorie_id\" value=".$this->categorie_id." type=\"text\" size=\"100\"></td><tr>"
                . "</table>";
        return $toReturn;
    }
}
?>
