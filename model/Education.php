<?php 

class Education{
    private $id;
    private $date;
    private $education;
    
    function __construct($id, $date, $education) {
        $this->id = $id;
        $this->date = $date;
        $this->education = $education;
    }

    
    public function getId() {return $this->id;}

    public function getDate() {return $this->date;}

    public function getEducation() {return $this->education;}
    
}
?>

