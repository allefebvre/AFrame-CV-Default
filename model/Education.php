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
        $toReturn = "<td>$this->id</td><td>$this->date</td><td>$this->education</td>";
        return $toReturn;
    }
    
     function toStringUpdate(): string {
        $toReturn = "<table>"
                . "<tr><td>ID :</td><td><input name=\"id\" value=". $this->id ." type=\"text\" size=\"10\" disabled></td><tr>"
                . "<tr><td>Date :</td><td><input name=\"date\" value=".$this->date." type=\"text\" size=\"10\"></td><tr>"
                . "<tr><td>Education :</td><td><input name=\"education\" value=".$this->education."type=\"text\" size=\"100\"></td><tr>"
                . "</table>";
        return $toReturn;
     }
     
     function toStringInsert(): string {
        $toReturn = "<table>"
                . "<tr><td>ID :</td><td><input name=\"id\" value=\"\" type=\"text\" size=\"10\" disabled></td><tr>"
                . "<tr><td>Date :</td><td><input name=\"date\" value=\"\" type=\"text\" size=\"10\"></td><tr>"
                . "<tr><td>Education :</td><td><input name=\"education\" value=\"\" type=\"text\" size=\"100\"></td><tr>"
                . "</table>";
        return $toReturn;
     }
    
}
?>

