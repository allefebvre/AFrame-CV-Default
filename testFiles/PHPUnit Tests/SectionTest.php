<?php

use PHPUnit\Framework\TestCase;

class SectionTest extends TestCase {
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Section.php';
    }
    
    public function test() {
        $id = 0;
        $title = "title";
        
        $instance = new Section($id, $title);
        
        $this->assertEquals($id, $instance->getId());
        $this->assertEquals($title, $instance->getTitle());
        
        $expectedToString = "<td>$id</td>" 
                . "<td>$title</td>";
        
        $this->assertEquals($expectedToString, $instance->toString());
        
        $expectedForm = "<table>"
                        . "<tr>"
                            . "<td>Title* :</td>"
                            . "<td><input name=\"title\" value=\"$title\" type=\"text\" size=\"100\"></td>"
                        . "</tr>"
                . "</table>";
        
        $this->assertEquals($expectedForm, $instance->toStringForm());
    }
}