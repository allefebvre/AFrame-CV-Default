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
        $id = 0;
        $date = "date";
        $education = "education";
        
        $instance = new Education($id, $date, $education);
        
        $this->assertEquals($id, $instance->getId());
        $this->assertEquals($date, $instance->getDate());
        $this->assertEquals($education, $instance->getEducation());
        
        $expectedToString = "<td>$id</td>"
                . "<td>$date</td>"
                . "<td>$education</td>";
        
        $this->assertEquals($expectedToString, $instance->toString());

        $expectedForm = "<table>"
                . "<tr>"
                    . "<td>Date* :</td>"
                    . "<td><input name=\"date\" value=\"$date\" type=\"text\" size=\"10\"></td>"
                . "</tr>"
                . "<tr>"
                    . "<td>Education* :</td>"
                    . "<td><input name=\"education\" value=\"$education\" type=\"text\" size=\"100\"></td>"
                . "</tr>"
                . "</table>";
        
        $this->assertEquals($expectedForm, $instance->toStringForm());
    }
}