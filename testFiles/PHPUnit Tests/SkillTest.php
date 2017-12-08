<?php

use PHPUnit\Framework\TestCase;

class SkillTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Skill.php';
    }

    public function test() {
        $id = 0;
        $category = "category";
        $details = "details";
        
        $instance = new Skill($id, $category, $details);
        
        $this->assertEquals($id, $instance->getId());
        $this->assertEquals($category, $instance->getCategory());
        $this->assertEquals($details, $instance->getDetails());
        
        $expectedToString = "<td>$id</td>"
                . "<td>$category</td>"
                . "<td>$details</td>";
        
        $this->assertEquals($expectedToString, $instance->toString());

        $expectedForm = "<table>"
                . "<tr>"
                    . "<td>Category* :</td>"
                    . "<td><input name=\"category\" value=\"$category\" type=\"text\" size=\"10\"></td>"
                . "</tr>"
                . "<tr>"
                    . "<td>Details* :</td>"
                    . "<td><input name=\"details\" value=\"$details\" type=\"text\" size=\"100\"></td>"
                . "</tr>"
                . "</table>";
        
        $this->assertEquals($expectedForm, $instance->toStringForm());
    }
}
