<?php

class Plane {
    private $pathHTML;
    private $targetId;
    private $posX;
    private $posY;
    private $posZ;
    private $rotation;
    private $scroll;
    private $action;

    public function __construct($pathHTML, $targetId ,$posX, $posY, $posZ, $rotation, $scroll, $action) {
        $this->pathHTML = $pathHTML;
        $this->targetId = $targetId;
        $this->posX = $posX;
        $this->posY = $posY;
        $this->posZ = $posZ;
        $this->rotation = $rotation;
        $this->scroll = $scroll;
        $this->action = $action;
    }
    
    public function getPathHTML(){
        return $this->pathHTML;
    }    
    
    public function getTargetId(){
        return $this->targetId;
    }
    
    public function getPosX(){
        return $this->posX;
    }
    
    public function getPosY(){
        return $this->posY;
    }
    
    public function getPosZ(){
        return $this->posZ;
    }
    
    public function getRotation(){
        return $this->rotation;
    }
    
    public function getScroll(){
        return $this->scroll;
    }
    
    public function getAction(){
        return $this->action;
    }
}
