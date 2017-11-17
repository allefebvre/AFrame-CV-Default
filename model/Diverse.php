<?php 

class Diverse{
    
    private $id;
    private $diverse;
    
    function __construct(int $id, string $diverse) {
        $this->id = $id;
        $this->diverse = $diverse;
    }

    /* --- Getters --- */
    function getId() :int {
        return $this->id;
    }

    function getDiverse() :string {
        return $this->diverse;
    }
    
}
?>

