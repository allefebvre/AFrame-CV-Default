<?php 

class Conference{
    
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
        $theId = $this->getId();
        $theReference = $this->getReference();
        $theAuthors = $this->getAuthors();
        $getTitle = $this->getTitle();
        $theDate = $this->getDate();
        $theJournal = $this->getJournal();
        $theVolume = $this->getVolume();
        $theNumber = $this->getNumber();
        $thePages = $this->getPages();
        $theNote = $this->getNote();
        $theAbstract = $this->getAbstract();
        $theKeywords = $this->getKeywords();
        $theSeries = $this->getSeries();
        $theLocalite = $this->getLocalite();
        $thePublicher = $this->getPublisher();
        $theEditor = $this->getEditor();
        $thePdf = $this->getPdf();
        $theDate_display = $this->getDate_display();
        $theCategorie_id = $this->getCategorie_id();
        $toReturn = "<td>$theId</td>"
                . "<td>$theReference</td>"
                . "<td>$theAuthors</td>"
                . "<td>$getTitle</td>"
                . "<td>$theDate</td>"
                . "<td>$theJournal</td>"
                . "<td>$theVolume</td>"
                . "<td>$theNumber</td>"
                . "<td>$thePages</td>"
                . "<td>$theNote</td>"
                . "<td>$theAbstract</td>"
                . "<td>$theKeywords</td>"
                . "<td>$theSeries</td>"
                . "<td>$theLocalite</td>"
                . "<td>$thePublicher</td>"
                . "<td>$theEditor</td>"
                . "<td>$thePdf</td>"
                . "<td>$theDate_display</td>"
                . "<td>$theCategorie_id</td>";
        return $toReturn;
    }
}
?>
