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
    
    /**
     * Get HTML to display a Resume
     * @return string
     */
    function toString(): string {
        $toReturn = "<td>$this->id</td>" 
                . "<td>$this->dateCreation</td>"
                . "<td>$this->dateModification</td>"
                . "<td>$this->content</td>";
        return $toReturn;
    }
    
    /**
     * Get HTML to build a form of a Resume
     * @return string
     */
    function toStringForm(): string {
        $toReturn = "<table>"
                        . "<tr>"
                            . "<td>Content* :</td>"
                            . "<td><textarea name=\"content\" rows=\"5\" cols=\"100\">".$this->content."</textarea></td>"
                        . "</tr>"
                        . "<tr>"
                            . "<td></td>"
                            . "<td><input type=\"hidden\" name=\"sectionId\" value=\"".$this->sectionId."\"></td>"
                        . "</tr>"
                . "</table>";
        return $toReturn;
    }
}
?>