<?php

use PHPUnit\Framework\TestCase;

class WorkExpTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/WorkExp.php';
    }

    public function test() {
        $id = 0;
        $date = "date";
        $workExp = "workExp";
        
        $instance = new WorkExp($id, $date, $workExp);
        
        $this->assertEquals($id, $instance->getId());
        $this->assertEquals($date, $instance->getDate());
        $this->assertEquals($workExp, $instance->getWorkExp());
        
        $expectedToString = "<td>$id</td>"
                . "<td>$date</td>"
                . "<td>$workExp</td>";
        
        $this->assertEquals($expectedToString, $instance->toString());
        
        $expectedForm = "<table>"
                . "<tr>"
                    . "<td>Date* :</td>"
                    . "<td><input name=\"date\" value=\"$date\" type=\"text\" size=\"10\"></td>"
                . "</tr>"
                . "<tr>"
                    . "<td>Work Experience* :</td>"
                    . "<td><input name=\"workExp\" value=\"$workExp\" type=\"text\" size=\"100\"></td>"
                . "</tr>"
                . "</table>";
        
        $this->assertEquals($expectedForm, $instance->toStringForm());
    }
}
