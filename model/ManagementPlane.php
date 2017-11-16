<?php
require_once 'model/Plane.php';

class ManagementPlane {

    private $listPLane = [];

    /**
     * Add a plane to loft
     * @param string $pathHTML path to html file to display
     * @param number $posX position X
     * @param number $posY position Y
     * @param number $posZ position Z
     * @param number $rotation rotation
     * @param boolean $scroll enable scroll
     */
    public function addPlane($pathHTML, $targetId, $posX, $posY, $posZ, $rotation, $scroll, $action) {
        $this->listPLane[] = new Plane($pathHTML, $targetId, $posX, $posY, $posZ, $rotation, $scroll, $action);
    }

    /**
     * Place a plane
     * @param type $data
     */
    public function placeHTML($data) {
        for ($index = 0; $index < count($this->listPLane); $index++) {
            echo "<div class=\"hide\">";
            require $this->listPLane[$index]->getPathHTML();
            echo "</div>";
        }
    }

    /**
     * Using for tests
     */
    public function reset() {
        $this->listPLane = [];
    }

    /**
     * Call this function once in the scene
     */
    public function placeEntity() {
        for ($index = 0; $index < count($this->listPLane); $index++) {
            $plane = $this->listPLane[$index];
            ?>

            <a-entity position="<?php echo $plane->getPosX() . " " . $plane->getPosY() . " " . $plane->getPosZ(); ?>" rotation="0 <?php echo $plane->getRotation(); ?> 0">
                <?php if ($plane->getScroll()) { ?>
                    <a-plane <?php echo $plane->getAction(); ?> scroll="<?php echo $plane->getTargetId(); ?>" id="display<?php echo $plane->getTargetId(); ?>" scale="6 3.375 1" 
                        material="shader: html; target: #<?php echo $plane->getTargetId(); ?>; width: 800; height: 450; fps:3" color="#fff">
                    </a-plane>

                    <a-entity button-up="display<?php echo $plane->getTargetId(); ?>" position="3.6 0.2 0.05" rotation="0 0 0" scale="0.5 0.5 0.5">
                        <a-entity>
                            <a-triangle material="color:#b9a8a8" scale="0.5 0.5 0.5"></a-triangle>
                            <a-plane color="#b9a8a8" position="0.001 -0.25 -0.15" rotation="90 0 0" scale="0.5 0.3 0.5"></a-plane>
                            <a-plane color="#b9a8a8" position="-0.125 0 -0.15" rotation="-26.5 -90 -90" scale="0.558 0.3 0.5"></a-plane>
                            <a-plane color="#b9a8a8" position="0.125 0 -0.15" rotation="-26.5 90 -90" scale="0.558 0.3 0.5"></a-plane>
                        </a-entity>
                    </a-entity>

                    <a-entity button-down="display<?php echo $plane->getTargetId(); ?>" position="3.6 -0.2 0.05" rotation="0 0 180" scale="0.5 0.5 0.5">
                        <a-entity>
                            <a-triangle material="color:#b9a8a8" scale="0.5 0.5 0.5"></a-triangle>
                            <a-plane color="#b9a8a8" position="0.001 -0.25 -0.15" rotation="90 0 0" scale="0.5 0.3 0.5"></a-plane>
                            <a-plane color="#b9a8a8" position="-0.125 0 -0.15" rotation="-26.5 -90 -90" scale="0.558 0.3 0.5"></a-plane>
                            <a-plane color="#b9a8a8" position="0.125 0 -0.15" rotation="-26.5 90 -90" scale="0.558 0.3 0.5"></a-plane>
                        </a-entity>
                    </a-entity>

                <?php } else { ?>
                    <a-plane <?php echo $plane->getAction(); ?> scroll="htmlElement<?php echo $plane->getTargetId(); ?>" id="display<?php echo $plane->getTargetId(); ?>" scale="6 3.375 1" material="shader: html; target: #<?php echo $plane->getTargetId(); ?>; width: 800; height: 450; fps:0" color="#fff"></a-plane>
                    <?php } ?>
            </a-entity>
            <?php
        }
    }

}
