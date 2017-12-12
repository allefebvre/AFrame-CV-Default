<?php

class Menu {
    
    private $id;
    private $title_fr;
    private $title_en;
    private $active;
    private $position;
    
    function __construct(int $id, string $title_fr, string $title_en, int $active, int $position) {
        $this->id = $id;
        $this->title_fr = $title_fr;
        $this->title_en = $title_en;
        $this->active = $active;
        $this->position = $position;
    }
    
    /* --- Getters --- */
    function getId() {
        return $this->id;
    }

    function getTitle_fr() {
        return $this->title_fr;
    }

    function getTitle_en() {
        return $this->title_en;
    }

    function getActive() {
        return $this->active;
    }

    function getPosition() {
        return $this->position;
    }
}

