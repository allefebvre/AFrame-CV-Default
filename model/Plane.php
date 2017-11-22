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
    private $scale;

    public function __construct(string $pathHTML, string $targetId, float $posX, float $posY, float $posZ, int $rotation, bool $scroll, string $action, float $scale) {
        $this->pathHTML = $pathHTML;
        $this->targetId = $targetId;
        $this->posX = $posX;
        $this->posY = $posY;
        $this->posZ = $posZ;
        $this->rotation = $rotation;
        $this->scroll = $scroll;
        $this->action = $action;
        $this->scale = $scale;
    }
    
    /* --- Getters --- */
    public function getPathHTML() :string {
        return $this->pathHTML;
    }    
    
    public function getTargetId() :string {
        return $this->targetId;
    }
    
    public function getPosX() :float {
        return $this->posX;
    }
    
    public function getPosY() :float {
        return $this->posY;
    }
    
    public function getPosZ() :float {
        return $this->posZ;
    }
    
    public function getRotation() :int {
        return $this->rotation;
    }
    
    public function getScroll() :bool{
        return $this->scroll;
    }
    
    public function getAction() :string {
        return $this->action;
    }
    
    public function getScale() : float {
        return $this->scale;
    }
}
