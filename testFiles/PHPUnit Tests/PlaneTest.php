<?php

use PHPUnit\Framework\TestCase;

class PlaneTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Plane.php';
    }

    public function test() {
        $pathHTML = "var1";
        $targetId = "var2";
        $posX = 0.0;
        $posY = 0.0;
        $posZ = 0.0;
        $rotation = 0;
        $scroll = FALSE;
        $action = "var8";
        $scale = 0.0;
        
        $instance = new Plane($pathHTML, $targetId ,$posX, $posY, $posZ, $rotation, $scroll, $action, $scale);
        
        $this->assertEquals($pathHTML, $instance->getPathHTML());
        $this->assertEquals($targetId, $instance->getTargetId());
        $this->assertEquals($posX, $instance->getPosX());
        $this->assertEquals($posY, $instance->getPosY());
        $this->assertEquals($posZ, $instance->getPosZ());
        $this->assertEquals($rotation, $instance->getRotation());
        $this->assertEquals($scroll, $instance->getScroll());
        $this->assertEquals($action, $instance->getAction());
        $this->assertEquals($scale, $instance->getScale());
    }
}