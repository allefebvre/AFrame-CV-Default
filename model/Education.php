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
    
    function toString(): string {
        $theId = $this->getId();
        $theDate = $this->getDate();
        $theEducation = $this->getEducation();
        $toReturn = "<td>$theId</td><td>$theDate</td><td>$theEducation</td>";
        return $toReturn;
    }
    
}
?>

