<?php

use PHPUnit\Framework\TestCase;

class InformationTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Information.php';
    }

    public function test() {
        $id = 0;
        $status = "status";
        $name = "name";
        $firstName = "firstName";
        $photo = "photo";
        $age = "age";
        $address = "address";
        $phone = "phone";
        $mail = "mail";

        $instance = new information($id, $status, $name, $firstName, $photo, $age, $address, $phone, $mail);
        
        $this->assertEquals($id, $instance->getId());
        $this->assertEquals($status, $instance->getStatus());
        $this->assertEquals($name, $instance->getName());
        $this->assertEquals($firstName, $instance->getFirstName());
        $this->assertEquals($photo, $instance->getPhoto());
        $this->assertEquals($age, $instance->getAge());
        $this->assertEquals($address, $instance->getAddress());
        $this->assertEquals($phone, $instance->getPhone());
        $this->assertEquals($mail, $instance->getMail());
        
        $expectedToString = "<td>$id</td>"
                . "<td>$status</td>"
                . "<td>$name</td>"
                . "<td>$firstName</td>"
                . "<td>$photo</td>"
                . "<td>$age</td>"
                . "<td>$address</td>"
                . "<td>$phone</td>"
                . "<td>$mail</td>";
        
        $this->assertEquals($expectedToString, $instance->toString());
        
        $expectedForm = "<table>"
                . "<tr>"
                    . "<td>Status* :</td>"
                    . "<td><input name=\"status\" value=\"$status\" type=\"text\" size=\"10\"></td>"
                . "</tr>"
                . "<tr>"
                    . "<td>Name* :</td>"
                    . "<td><input name=\"name\" value=\"$name\" type=\"text\" size=\"100\"></td>"
                . "</tr>"
                . "<tr>"
                    . "<td>First Name* :</td>"
                    . "<td><input name=\"firstName\" value=\"$firstName\" type=\"text\" size=\"100\"></td>"
                . "</tr>"
                . "<tr>"
                    . "<td>Photo :</td>"
                    . "<td><input name=\"photo\" value=\"$photo\" type=\"text\" size=\"100\"></td>"
                . "</tr>"
                . "<tr>"
                    . "<td>Age :</td>"
                    . "<td><input name=\"age\" value=\"$age\" type=\"text\" size=\"100\"></td>"
                . "</tr>"
                . "<tr>"
                    . "<td>Address :</td>"
                    . "<td><input name=\"address\" value=\"$address\" type=\"text\" size=\"100\"></td>"
                . "</tr>"
                . "<tr>"
                    . "<td>Phone :</td>"
                    . "<td><input name=\"phone\" value=\"$phone\" type=\"text\" size=\"100\"></td>"
                . "</tr>"
                . "<tr>"
                    . "<td>Mail :</td>"
                    . "<td><input name=\"mail\" value=\"$mail\" type=\"text\" size=\"100\"></td>"
                . "</tr>"
                . "</table>";
        
        $this->assertEquals($expectedForm, $instance->toStringForm());
    }
}
