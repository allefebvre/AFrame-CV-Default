<?php

class Resume{
    
    private $id;
    private $dateCreation;
    private $dateModification;
    private $content;
    private $sectionId;
    
    function __construct(int $id, string $dateCreation, string $dateModification, string $content, int $sectionId) {
        $this->id = $id;
        $this->dateCreation = $dateCreation;
        $this->dateModification = $dateModification;
        $this->content = $content;
        $this->sectionId = $sectionId;
    }
    
    /* --- Getters --- */
    function getId() :int {
        return $this->id;
    }

    function getDateCreation() :string {
        return $this->dateCreation;
    }

    function getDateModification() :string {
        return $this->dateModification;
    }

    function getContent() :string {
        return $this->content;
    }

    function getSectionId() :int {
        return $this->sectionId;
    }
}
?>



