<?php

use PHPUnit\Framework\TestCase;

class EducationTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Education.php';
    }

    public function test() {
        $id = "var1";
        $date = "var2";
        $education = "var3";
        
        $instance = new Education($id, $date, $education);
        
        $this->assertEquals($id, $instance->getId());
        $this->assertEquals($date, $instance->getDate());
        $this->assertEquals($education, $instance->getEducation());
    }
}