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
    }
}
