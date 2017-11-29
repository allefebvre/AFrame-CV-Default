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
        $toReturn = "<td>$this->id</td>"
                . "<td>$this->date</td>"
                . "<td>$this->workExp</td>";
        return $toReturn;
    }
    
    function toStringUpdate(): string {
        $toReturn = "<table>"
                . "<tr><td>ID :</td><td><input name=\"id\" value=" . $this->id . " type=\"text\" size=\"10\" disabled></td><tr>"
                . "<tr><td>Date :</td><td><input name=\"date\" value=" . $this->date . " type=\"text\" size=\"10\"></td><tr>"
                . "<tr><td>Work Experience :</td><td><input name=\"workExp\" value=" . $this->workExp . " type=\"text\" size=\"100\"></td><tr>"
                . "</table>";
        return $toReturn;
    }
    
    function toStringInsert(): string {
        $toReturn = "<table>"
                . "<tr><td>ID :</td><td><input name=\"id\" value=\"\" type=\"text\" size=\"10\" disabled></td><tr>"
                . "<tr><td>Date :</td><td><input name=\"date\" value=\"\" type=\"text\" size=\"10\"></td><tr>"
                . "<tr><td>Work Experience :</td><td><input name=\"workExp\" value=\"\"  type=\"text\" size=\"100\"></td><tr>"
                . "</table>";
        return $toReturn;
    }
    
}
?>

