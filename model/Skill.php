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
    function getId() :int {
        return $this->id;
    }

    function getCategory() :string {
        return $this->category;
    }

    function getDetails() :string {
        return $this->details;
    }
    function toString(): string {
        $theId = $this->getId();
        $theCategory = $this->getCategory();
        $theDetails = $this->getDetails();
        $toReturn = "<td>$theId</td>"
                . "<td>$theCategory</td>"
                . "<td>$theDetails</td>";
        return $toReturn;
    }
}
?>

