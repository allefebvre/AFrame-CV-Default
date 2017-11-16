<?php 

class Skill {
    private $id;
    private $category;
    private $details;
    
    function __construct($id, $category, $details) {
        $this->id = $id;
        $this->category = $category;
        $this->details = $details;
    }

    
    public function getId() {return $this->id;}

    public function getCategory() {return $this->category;}

    public function getDetails() {return $this->details;}
    
}
?>

