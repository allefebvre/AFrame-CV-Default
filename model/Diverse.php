<?php

class Diverse {

    private $id;
    private $diverse;

    function __construct(int $id, string $diverse) {
        $this->id = $id;
        $this->diverse = $diverse;
    }

    /* --- Getters --- */

    function getId(): int {
        return $this->id;
    }

    function getDiverse(): string {
        return $this->diverse;
    }

    function toString(): string {
        $toReturn = "<td>$this->id</td><td>$this->diverse</td>";
        return $toReturn;
    }
    
    function toStringUpdate(): string {
        $toReturn = "<table>"
                . "<tr><td>ID :</td><td><input name=\"txtBlason\" value=". $this->id ." type=\"text\" size=\"10\" disabled></td><tr>"
                . "<tr><td>Diverse :</td><td><input name=\"txtBlason\" value=".$this->diverse." type=\"text\" size=\"10\"></td><tr>"
                . "</table>";
        return $toReturn;
    }

}
?>

