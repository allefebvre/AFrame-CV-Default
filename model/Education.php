<?php 

class Education{
    
    private $id;
    private $date;
    private $education;
    
    function __construct(int $id, string $date, string $education) {
        $this->id = $id;
        $this->date = $date;
        $this->education = $education;
    }

    /* --- Getters --- */
    function getId() :int {
        return $this->id;
    }

    function getDate() :string {
        return $this->date;
    }

    function getEducation() :string {
        return $this->education;
    }
    
}
?>

