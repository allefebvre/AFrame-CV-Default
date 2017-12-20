<?php 

class Parameter{
    
    private $id;
    private $name;
    private $display;
    private $section;
    private $scroll;
    
    function __construct(int $id, string $name, string $display, string $section = NULL, string $scroll) {
        $this->id = $id;
        $this->name = $name;
        $this->display = $display;
        $this->section = $section;
        $this->scroll = $scroll;
    }

    /* --- Getters --- */
    function getId() :int {
        return $this->id;
    }

    function getName() :string {
        return $this->name;
    }

    function getDisplay() :string {
        return $this->display;
    }
    
    function getSection() {
        return $this->section;
    } 
    
    function getScroll() :string {
        return $this->scroll;
    }
}
?>