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
        $id = "var1";
        $date = "var2";
        $workExp = "var3";
        
        $instance = new WorkExp($id, $date, $workExp);
        
        $this->assertEquals($id, $instance->getId());
        $this->assertEquals($date, $instance->getDate());
        $this->assertEquals($workExp, $instance->getWorkExp());
    }
}
