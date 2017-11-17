<?php 

class Information{
    
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
    function getId() :int {
        return $this->id;
    }

    function getStatus() :string {
        return $this->status;
    }

    function getName() :string {
        return $this->name;
    }

    function getFirstName() :string {
        return $this->firstName;
    }

    function getPhoto() :string {
        return $this->photo;
    }

    function getAge() :string {
        return $this->age;
    }

    function getAddress() :string {
        return $this->address;
    }

    function getPhone() :string {
        return $this->phone;
    }

    function getMail() :string {
        return $this->mail;
    }
    
}
?>
