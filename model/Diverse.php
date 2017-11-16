<?php 

class Diverse{
    private $id;
    private $diverse;
    
    function __construct($id, $diverse) {
        $this->id = $id;
        $this->diverse = $diverse;
    }

    
    public function getId() {return $this->id;}

    public function getDiverse() {return $this->diverse;}
    
}
?>

