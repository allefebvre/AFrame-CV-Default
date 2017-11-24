<?php 

class Parameter{
    
    private $id;
    private $name;
    private $display;
    
    function __construct(int $id, string $name, string $display) {
        $this->id = $id;
        $this->name = $name;
        $this->display = $display;
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
    
}
?>
