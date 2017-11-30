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
    
    /**
     * Get HTML to display a WorkExp
     * @return string
     */
    function toString(): string {
        $toReturn = "<td>$this->id</td>"
                . "<td>$this->date</td>"
                . "<td>$this->workExp</td>";
        return $toReturn;
    }
    
    /**
     * Get HTML to update a WorkExp in Database
     * @return string
     */
    function toStringForm(): string {
        $toReturn = "<table>"
                . "<tr><td>Date :</td><td><input name=\"date\" value=\"$this->date\" type=\"text\" size=\"10\"></td><tr>"
                . "<tr><td>Work Experience :</td><td><input name=\"workExp\" value=\"$this->workExp\" type=\"text\" size=\"100\"></td><tr>"
                . "</table>";
        return $toReturn;
    }   
}
?>

