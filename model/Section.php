<?php

class Section {
    
    private $id;
    private $title;
    
    function __construct(int $id, string $title) {
        $this->id = $id;
        $this->title = $title;
    }
    
    /* --- Getters --- */
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }
    
    /**
     * Get HTML to display a Section
     * @return string
     */
    function toString(): string {
        $toReturn = "<td>$this->id</td>" 
                . "<td>$this->title</td>";
        return $toReturn;
    }
    
    /**
     * Get HTML to build a form of a Section
     * @return string
     */
    function toStringForm(): string {
        $toReturn = "<table>"
                        . "<tr>"
                            . "<td>Title* :</td>"
                            . "<td><input name=\"title\" value=\"$this->title\" type=\"text\" size=\"100\"></td>"
                        . "</tr>"
                . "</table>";
        return $toReturn;
    }
}

