<?php 

class ByDate {
    
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
    
}
?>