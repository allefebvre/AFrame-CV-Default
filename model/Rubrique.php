<?php

class Rubrique{
    
    private $id;
    private $date_creation;
    private $date_modification;
    private $content_fr;
    private $content_en;
    private $menu_id;
    
    function __construct(int $id, string $date_creation, string $date_modification, string $content_fr, string $content_en, int $menu_id) {
        $this->id = $id;
        $this->date_creation = $date_creation;
        $this->date_modification = $date_modification;
        $this->content_fr = $content_fr;
        $this->content_en = $content_en;
        $this->menu_id = $menu_id;
    }
    
    /* --- Getters --- */
    function getId() :int {
        return $this->id;
    }

    function getDate_creation() :string {
        return $this->date_creation;
    }

    function getDate_modification() :string {
        return $this->date_modification;
    }

    function getContent_fr() :string {
        return $this->content_fr;
    }

    function getContent_en() :string {
        return $this->content_en;
    }

    function getMenu_id() :int {
        return $this->menu_id;
    }
}
?>



