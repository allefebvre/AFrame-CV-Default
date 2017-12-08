<?php

use PHPUnit\Framework\TestCase;

class DiverseTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Diverse.php';
    }

    public function test() {
        $id = 0;
        $diverse = "var2";
        
        $instance = new Diverse($id, $diverse);
        
        $this->assertEquals($id, $instance->getId());
        $this->assertEquals($diverse, $instance->getDiverse());
        
        $expectedToString = "<td>$id</td>"
                . "<td>$diverse</td>";
        
        $this->assertEquals($expectedToString, $instance->toString());
        
        $expectedForm = "<table>"
                        . "<tr>"
                            . "<td>Diverse* :</td>"
                            . "<td><input name=\"diverse\" value=\"$diverse\" type=\"text\" size=\"10\"></td>"
                        . "</tr>"
                . "</table>";
        
        $this->assertEquals($expectedForm, $instance->toStringForm());
    }
}
