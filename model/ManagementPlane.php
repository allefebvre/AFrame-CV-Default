<?php
require_once 'model/Plane.php';

class ManagementPlane {

    private $listPLane = [];
    
    /**
     * Add a plane to loft
     * @param string $pathHTML path to html file to display
     * @param string $targetId
     * @param float $posX position X
     * @param float $posY position Y
     * @param float $posZ position Z
     * @param int $rotation rotation
     * @param bool $scroll enable scroll
     * @param string $action
     * @param float $scale
     */
    public function addPlane(string $pathHTML, string $targetId, float $posX, float $posY, float $posZ, int $rotation, bool $scroll, string $action, float $scale = 1) {
        $this->listPLane[] = new Plane($pathHTML, $targetId, $posX, $posY, $posZ, $rotation, $scroll, $action, $scale);
    }

    /**
     * Place a plane
     * @param array $data
     */
    public function placeHTML(array $data) {
        for ($index=0 ; $index<count($this->listPLane) ; $index++) {
            if(isset($data['rubriques'][$index])) {
                $content_en = $data['rubriques'][$index]->getContent_en();
                $targetId = $this->listPLane[$index]->getTargetId();
            }
            echo "<div class=\"hide\">";
            require $this->listPLane[$index]->getPathHTML();
            echo "</div>";
        }
    }

    /**
     * Using for tests
     */
    public function reset() {
        $this->listPLane = array();
    }

    /**
     * Call this function once in the scene
     */
    public function placeEntity() {
        for ($index=0 ; $index<count($this->listPLane) ; $index++) {
            $plane = $this->listPLane[$index];
            $scale = $plane->getScale();
            ?>

            <a-entity position="<?php echo $plane->getPosX() . " " . $plane->getPosY() . " " . $plane->getPosZ(); ?>" rotation="0 <?php echo $plane->getRotation(); ?> 0">
                <?php if ($plane->getScroll()) { ?>
                    <a-plane mixin="link" <?php echo $plane->getAction(); ?> scroll="<?php echo $plane->getTargetId(); ?>" id="display<?php echo $plane->getTargetId(); ?>" scale="6 3.375 1" 
                        html2canvas="target: <?php echo $plane->getTargetId(); ?>; width: 800; height: 450" color="#fff" shader="flat">
                    </a-plane>

                    <a-entity mixin="link" button-up="display<?php echo $plane->getTargetId(); ?>" position="3.6 0.2 0.05" rotation="0 0 0" scale="0.5 0.5 0.5">
                        <a-entity>
                            <a-triangle material="color:#b9a8a8" scale="0.5 0.5 0.5"></a-triangle>
                            <a-plane color="#b9a8a8" position="0.001 -0.25 -0.15" rotation="90 0 0" scale="0.5 0.3 0.5"></a-plane>
                            <a-plane color="#b9a8a8" position="-0.125 0 -0.15" rotation="-26.5 -90 -90" scale="0.558 0.3 0.5"></a-plane>
                            <a-plane color="#b9a8a8" position="0.125 0 -0.15" rotation="-26.5 90 -90" scale="0.558 0.3 0.5"></a-plane>
                        </a-entity>
                    </a-entity>

                    <a-entity mixin="link" button-down="display<?php echo $plane->getTargetId(); ?>" position="3.6 -0.2 0.05" rotation="0 0 180" scale="0.5 0.5 0.5">
                        <a-entity>
                            <a-triangle material="color:#b9a8a8" scale="0.5 0.5 0.5"></a-triangle>
                            <a-plane color="#b9a8a8" position="0.001 -0.25 -0.15" rotation="90 0 0" scale="0.5 0.3 0.5"></a-plane>
                            <a-plane color="#b9a8a8" position="-0.125 0 -0.15" rotation="-26.5 -90 -90" scale="0.558 0.3 0.5"></a-plane>
                            <a-plane color="#b9a8a8" position="0.125 0 -0.15" rotation="-26.5 90 -90" scale="0.558 0.3 0.5"></a-plane>
                        </a-entity>
                    </a-entity>

                <?php } else { ?>
                    <a-plane mixin="link" <?php echo $plane->getAction(); ?> scroll="htmlElement<?php echo $plane->getTargetId(); ?>" id="display<?php echo $plane->getTargetId(); ?>" scale="<?php echo 6 * $scale; ?> <?php echo 3.375 * $scale; ?> 1" shader="flat" html2canvas="target: <?php echo $plane->getTargetId(); ?>; width: 800; height: 450" color="#fff"></a-plane>
                    <?php } ?>
            </a-entity>
            <?php
        }
    }
}
