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
}

