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
    
    function __construct($id, $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $categorie_id) {
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

    
    function getId() {return $this->id;}

    public function getReference() {return $this->reference;}

    function getAuthors() {return $this->authors;}

    function getTitle() {return $this->title;}

    function getDate() {return $this->date;}

    function getJournal() {return $this->journal;}

    function getVolume() {return $this->volume;}

    function getNumber() {return $this->number;}

    function getPages() {return $this->pages;}

    function getNote() {return $this->note;}

    function getAbstract() {return $this->abstract;}
    
    function getKeywords() {return $this->keywords;}

    function getSeries() {return $this->series;}

    function getLocalite() {return $this->localite;}

    function getPublisher() {return $this->publisher;}

    function getEditor() {return $this->editor;}

    function getPdf() {return $this->pdf;}

    function getDate_display() {return $this->date_display;}

    function getCategorie_id() {return $this->categorie_id;}
    
}
?>
