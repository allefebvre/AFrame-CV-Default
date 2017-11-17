<?php 

class Skill {
    
    private $id;
    private $category;
    private $details;
    
    function __construct(int $id, string $category, string $details) {
        $this->id = $id;
        $this->category = $category;
        $this->details = $details;
    }

    /* --- Getters --- */
    function getId() :int {
        return $this->id;
    }

    function getCategory() :string {
        return $this->category;
    }

    function getDetails() :string {
        return $this->details;
    }
    
}
?>

