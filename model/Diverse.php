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

    /**
     * Get HTML to display a Diverse
     * @return string
     */
    function toString(): string {
        $toReturn = "<td>$this->id</td><td>$this->diverse</td>";
        return $toReturn;
    }
    
    /**
     * Get HTML to update a Diverse in Database
     * @return string
     */
    function toStringForm(): string {
        $toReturn = "<table>"
                . "<tr><td>Diverse :</td><td><input name=\"diverse\" value=\"$this->diverse\" type=\"text\" size=\"10\"></td><tr>"
                . "</table>";
        return $toReturn;
    }
}
?>

