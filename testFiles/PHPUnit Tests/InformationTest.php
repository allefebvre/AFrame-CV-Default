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
        $id = "var1";
        $status = "var2";
        $name = "var3";
        $firstName = "var4";
        $photo = "var5";
        $age = "var6";
        $address = "var7";
        $phone = "var8";
        $mail = "var9";

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
    }
}
