<?php 

class Parameter{
    
    private $id;
    private $name;
    private $value;
    
    function __construct(int $id, string $name, bool $value) {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
    }

    /* --- Getters --- */
    function getId() :int {
        return $this->id;
    }

    function getName() :string {
        return $this->name;
    }

    function getValue() :bool {
        return $this->value;
    }
    
}
?>
