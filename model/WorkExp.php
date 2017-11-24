<?php 

class WorkExp {
    
    private $id;
    private $date;
    private $workExp;
    
    function __construct(int $id, string $date, string $workExp) {
        $this->id = $id;
        $this->date = $date;
        $this->workExp = $workExp;
    }

    /* --- Getters --- */
    function getId() :int {
        return $this->id;
    }

    function getDate() :string {
        return $this->date;
    }

    function getWorkExp() :string {
        return $this->workExp;
    }
    function toString(): string {
        $theId = $this->getId();
        $theDate = $this->getDate();
        $theWorkExp = $this->getWorkExp();
        
        $toReturn = "<td>$theId</td>"
                . "<td>$theDate</td>"
                . "<td>$theWorkExp</td>";
        return $toReturn;
    }
}
?>

