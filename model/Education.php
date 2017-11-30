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
    
    /**
     * Get HTML to display an Education
     * @return string
     */
    function toString(): string {
        $toReturn = "<td>$this->id</td><td>$this->date</td><td>$this->education</td>";
        return $toReturn;
    }
    
    /**
     * Get HTML to update an Education in Database
     * @return string
     */
    function toStringForm(): string {
        $toReturn = "<table>"
                . "<tr><td>Date :</td><td><input name=\"date\" value=\"$this->date\" type=\"text\" size=\"10\"></td><tr>"
                . "<tr><td>Education :</td><td><input name=\"education\" value=\"$this->education\" type=\"text\" size=\"100\"></td><tr>"
                . "</table>";
        return $toReturn;
    }
}
?>

