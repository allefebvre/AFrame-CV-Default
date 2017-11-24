<?php

class Skill {

    private $id;
    private $category;
    private $details;

    function __construct(int $id, string $category, string $details) {
        $this->id = $id;
        $this->category = $category;
        $this->details = $details;
    }

    /* --- Getters --- */

    function getId(): int {
        return $this->id;
    }

    function getCategory(): string {
        return $this->category;
    }

    function getDetails(): string {
        return $this->details;
    }

    function toString(): string {
        $toReturn = "<td>$this->id</td>"
                . "<td>$this->category</td>"
                . "<td>$this->details</td>";
        return $toReturn;
    }

    function toStringUpdate(): string {
        $toReturn = "<table>"
                . "<tr><td>ID :</td><td><input name=\"txtBlason\" value=" . $this->id . " type=\"text\" size=\"10\" disabled></td><tr>"
                . "<tr><td>Category :</td><td><input name=\"txtBlason\" value=" . $this->category . " type=\"text\" size=\"10\"></td><tr>"
                . "<tr><td>Details :</td><td><input name=\"txtBlason\" value=" . $this->details . " type=\"text\" size=\"100\"></td><tr>"
                . "</table>";
        return $toReturn;
    }

}
?>

