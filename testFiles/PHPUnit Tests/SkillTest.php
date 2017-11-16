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
        $id = "var1";
        $category = "var2";
        $details = "var3";
        
        $instance = new Skill($id, $category, $details);
        
        $this->assertEquals($id, $instance->getId());
        $this->assertEquals($category, $instance->getCategory());
        $this->assertEquals($details, $instance->getDetails());
    }
}
