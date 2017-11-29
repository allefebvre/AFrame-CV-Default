<?php

class Information {

    private $id;
    private $status;
    private $name;
    private $firstName;
    private $photo;
    private $age;
    private $address;
    private $phone;
    private $mail;

    function __construct(int $id, string $status, string $name, string $firstName, string $photo, string $age, string $address, string $phone, string $mail) {
        $this->id = $id;
        $this->status = $status;
        $this->name = $name;
        $this->firstName = $firstName;
        $this->photo = $photo;
        $this->age = $age;
        $this->address = $address;
        $this->phone = $phone;
        $this->mail = $mail;
    }

    /* --- Getters --- */

    function getId(): int {
        return $this->id;
    }

    function getStatus(): string {
        return $this->status;
    }

    function getName(): string {
        return $this->name;
    }

    function getFirstName(): string {
        return $this->firstName;
    }

    function getPhoto(): string {
        return $this->photo;
    }

    function getAge(): string {
        return $this->age;
    }

    function getAddress(): string {
        return $this->address;
    }

    function getPhone(): string {
        return $this->phone;
    }

    function getMail(): string {
        return $this->mail;
    }

    function toString(): string {
        $toReturn = "<td>$this->id</td>"
                . "<td>$this->status</td>"
                . "<td>$this->name</td>"
                . "<td>$this->firstName</td>"
                . "<td>$this->photo</td>"
                . "<td>$this->age</td>"
                . "<td>$this->address</td>"
                . "<td>$this->phone</td>"
                . "<td>$this->mail</td>";

        return $toReturn;
    }

    function toStringUpdate(): string {
        $toReturn = "<table>"
                . "<tr><td>ID :</td><td><input name=\"id\" value=" . $this->id . " type=\"text\" size=\"10\" disabled></td><tr>"
                . "<tr><td>Status :</td><td><input name=\"status\" value=" . $this->status . " type=\"text\" size=\"10\"></td><tr>"
                . "<tr><td>Name :</td><td><input name=\"name\" value=" . $this->name . " type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>First Name :</td><td><input name=\"firstName\" value=" . $this->firstName . " type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Photo :</td><td><input name=\"photo\" value=" . $this->photo . " type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Age :</td><td><input name=\"age\" value=" . $this->age . " type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Address :</td><td><input name=\"address\" value=" . $this->address . " type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Phone :</td><td><input name=\"phone\" value=" . $this->phone . " type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Mail :</td><td><input name=\"mail\" value=" . $this->mail . " type=\"text\" size=\"100\"></td><tr>"
                . "</table>";
        return $toReturn;
    }
    
    function toStringInsert(): string {
        $toReturn = "<table>"
                . "<tr><td>ID :</td><td><input name=\"id\" value=\"\" type=\"text\" size=\"10\" disabled></td><tr>"
                . "<tr><td>Status :</td><td><input name=\"status\" value=\"\" type=\"text\" size=\"10\"></td><tr>"
                . "<tr><td>Name :</td><td><input name=\"name\" value=\"\" type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>First Name :</td><td><input name=\"firstName\" value=\"\" type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Photo :</td><td><input name=\"photo\" value=\"\" type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Age :</td><td><input name=\"age\" value=\"\" type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Address :</td><td><input name=\"address\" value=\"\" type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Phone :</td><td><input name=\"phone\" value=\"\" type=\"text\" size=\"100\"></td><tr>"
                . "<tr><td>Mail :</td><td><input name=\"mail\" value=\"\" type=\"text\" size=\"100\"></td><tr>"
                . "</table>";
        return $toReturn;
    }

}

?>
