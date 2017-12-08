<?php

use PHPUnit\Framework\TestCase;

class ParameterTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Parameter.php';
    }

    public function test() {
        $id = 0;
        $name = "name";
        $display = "TRUE";
        $section = NULL;
        $scroll = "FALSE";
        
        $instance = new Parameter($id, $name, $display, $section, $scroll);
        
        $this->assertEquals($id, $instance->getId());
        $this->assertEquals($name, $instance->getName());
        $this->assertEquals($display, $instance->getDisplay());
        $this->assertEquals($section, $instance->getSection());
        $this->assertEquals($scroll, $instance->getScroll());
    }
}
