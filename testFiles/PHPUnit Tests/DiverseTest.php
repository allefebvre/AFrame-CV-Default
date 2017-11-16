<?php

use PHPUnit\Framework\TestCase;

class DiversTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Diverse.php';
    }

    public function test() {
        $id = "var1";
        $diverse = "var2";
        
        $instance = new Diverse($id, $diverse);
        
        $this->assertEquals($id, $instance->getId());
        $this->assertEquals($diverse, $instance->getDiverse());
    }
}
