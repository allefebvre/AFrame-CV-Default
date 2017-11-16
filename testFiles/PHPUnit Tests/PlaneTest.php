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
        $posX = "var3";
        $posY = "var4";
        $posZ = "var5";
        $rotation = "var6";
        $scroll = "var7";
        $action = "var8";
        
        $instance = new Plane($pathHTML, $targetId ,$posX, $posY, $posZ, $rotation, $scroll, $action);
        
        $this->assertEquals($pathHTML, $instance->getPathHTML());
        $this->assertEquals($targetId, $instance->getTargetId());
        $this->assertEquals($posX, $instance->getPosX());
        $this->assertEquals($posY, $instance->getPosY());
        $this->assertEquals($posZ, $instance->getPosZ());
        $this->assertEquals($rotation, $instance->getRotation());
        $this->assertEquals($scroll, $instance->getScroll());
        $this->assertEquals($action, $instance->getAction());
    }
}