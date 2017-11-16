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
    
    function __construct($id, $status, $name, $firstName, $photo, $age, $address, $phone, $mail) {
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

    
    public function getId() {return $this->id;}

    public function getStatus() {return $this->status;}

    public function getName() {return $this->name;}

    public function getFirstName() {return $this->firstName;}

    public function getPhoto() {return $this->photo;}

    public function getAge() {return $this->age;}

    public function getAddress() {return $this->address;}

    public function getPhone() {return $this->phone;}

    public function getMail() {return $this->mail;}
    
}
?>
