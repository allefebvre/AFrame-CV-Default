<?php
if (!isset($vive)) {
    $vive = FALSE;
}

if ($vive) {
    ?>

    <a-entity id="cameraRig">
        <a-entity position="0 0 0" control-height>
            <!-- CAMERA -->
            <a-entity camera="userHeight: 1.6" look-controls wasd-controls="fly: true; acceleration: 150" id="camera">
                <a-box static-body material="visible:false" scale="0.2 0.2 0.2"></a-box>
            </a-entity>
            <!-- LEFT CONTROL -->
            <a-entity id="left-control"
                      menu-controls="value1: Teleport; value2: Trackpad; value3: Run"
                      spawn-sphere="distance: 0.2; event:menudown"
                      trackpad-move="menuSelect: 2"
                      walls-run-move
                      run-move="menuSelect: 3"
                      vive-controls="hand: left"
                      teleport-controls="cameraRig: #cameraRig; button: trackpad; collisionEntities: #floor, #floor1, #floor2, #ramp, #ramp1, [mixin = platform]; curveShootingSpeed:15;"
                      interaction-cylinder>
            </a-entity>
            <!-- RIGHT CONTROL -->
            <a-entity id="right-control"
                      spawn-sphere="distance: 0.2; event:menudown"
                      laser-controls="hand: right"
                      raycaster="far: 10; interval: 200; objects: [mixin = link];"
                      cursor="downEvents: trackpaddown; upEvents: trackpadup"
                      interaction-cylinder
                      interaction-controller>
            </a-entity>
        </a-entity>
    </a-entity>


<?php } else { ?>


    <a-entity camera="userHeight: 1.6"
              persistence-position
              position="-10 0 0"
              rotation="10 90 0"
              jump-ability
              border-position
              height-correction
              universal-controls
              kinematic-body
              spawn-sphere>

        <a-entity cursor="fuse: false; fuseTimeout: 500; downEvents: triggerdown; upEvents: triggerup"
                  position="0 0 -1"
                  raycaster="far:10; objects: [mixin = link];"
                  geometry="primitive: ring; radiusInner: 0.01; radiusOuter: 0.015"
                  material="color: black; shader: flat">
            <a-entity vive-controls="hand: left; model:false"></a-entity>
            <a-entity vive-controls="hand: right; model:false"></a-entity>
        </a-entity>

    </a-entity>

<?php } ?>