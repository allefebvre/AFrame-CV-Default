<?php 

if (!isset($vive)) {
    $vive = FALSE;
}

if($vive) { ?>

<a-entity id="cameraRig">
    <a-entity position="0 0 0" control-height>
        <!-- CAMERA -->
        <a-entity camera="userHeight: 1.6" look-controls wasd-controls="fly: true; acceleration: 150">
            <a-box static-body material="visible:false" scale="0.2 0.2 0.2"></a-box>
        </a-entity>
        <!-- LEFT CONTROL -->
        <a-entity id="left-control" left-controls vive-controls="hand: left" teleport-controls="cameraRig: #cameraRig; button: trackpad; collisionEntities: #floor, #floor1, #floor2, #ramp, #ramp1, [mixin = platform]; curveShootingSpeed:15;">
            <a-cylinder static-body visible="false" radius="0.07" height="0.4" rotation="90 0 0" color="#555555"></a-cylinder>
            <a-cylinder static-body visible="false" radius="0.07" height="0.4" rotation="90 0 0" color="#555555">
                <a-animation attribute="position" dur="100" from="0 0 0" to="0 0 -0.4" begin="up" easing="linear"></a-animation>
                <a-animation attribute="position" dur="100" to="0 0 0" from="0 0 -0.4" begin="down" easing="linear"></a-animation>
            </a-cylinder>
            <a-cylinder static-body visible="false" radius="0.07" height="0.4" rotation="90 0 0" color="#555555">
                <a-animation attribute="position" dur="200" from="0 0 0" to="0 0 -0.8" begin="up" easing="linear"></a-animation>
                <a-animation attribute="position" dur="200" to="0 0 0" from="0 0 -0.8" begin="down" easing="linear"></a-animation>
            </a-cylinder>
            <a-cylinder static-body visible="false" radius="0.07" height="0.4" rotation="90 0 0" color="#555555">
                <a-animation attribute="position" dur="300" from="0 0 0" to="0 0 -1.2" begin="up" easing="linear"></a-animation>
                <a-animation attribute="position" dur="300" to="0 0 0" from="0 0 -1.2" begin="down" easing="linear"></a-animation>
            </a-cylinder>
            <a-entity id="menu-left">
                <a-box visible="false" color="#22EEFF" position="0 0.05 -0.1" rotation="30 0 0" scale="0.2 0.005 0.2" opacity="0.25">
                    <a-box mixin="link" position="0 0.1 -0.3" scale="0.9 1 0.2" event-set__enter="_event: mouseenter; color: #AAFFBB" event-set__leave="_event: mouseleave; color: #FFFFFF">
                        <a-text rotation="-90 0 0" scale="1 3.3 1" position="0 0.6 0"text="anchor:center; align:center" value="Teleport" color="red"></a-text>
                    </a-box>
                    <a-box mixin="link" position="0 0.1 0" scale="0.9 1 0.2" event-set__enter="_event: mouseenter; color: #AAFFBB" event-set__leave="_event: mouseleave; color: #FFFFFF">
                        <a-text rotation="-90 0 0" scale="1 3.3 1" position="0 0.6 0" text="anchor:center; align:center" value="Trackpad" color="black"></a-text>
                    </a-box>
                    <a-box mixin="link" position="0 0.1 0.3" scale="0.9 1 0.2" event-set__enter="_event: mouseenter; color: #AAFFBB" event-set__leave="_event: mouseleave; color: #FFFFFF">
                        <a-text rotation="-90 0 0" scale="1 3.3 1" position="0 0.6 0" text="anchor:center; align:center" value="Run" color="black"></a-text>
                    </a-box>
                </a-box>
            </a-entity>
        </a-entity>
        <!-- RIGHT CONTROL -->
        <a-entity id="right-control" right-controls laser-controls="hand: right" raycaster="far: 10; interval: 200; objects: [mixin = link];" cursor="downEvents: trackpaddown; upEvents: trackpadup">
            <a-cylinder static-body visible="false" radius="0.07" height="0.4" rotation="90 0 0" color="#555555"></a-cylinder>
            <a-cylinder static-body visible="false" radius="0.07" height="0.4" rotation="90 0 0" color="#555555">
                <a-animation attribute="position" dur="100" from="0 0 0" to="0 0 -0.4" begin="up" easing="linear"></a-animation>
                <a-animation attribute="position" dur="100" to="0 0 0" from="0 0 -0.4" begin="down" easing="linear"></a-animation>
            </a-cylinder>
            <a-cylinder static-body visible="false" radius="0.07" height="0.4" rotation="90 0 0" color="#555555">
                <a-animation attribute="position" dur="200" from="0 0 0" to="0 0 -0.8" begin="up" easing="linear"></a-animation>
                <a-animation attribute="position" dur="200" to="0 0 0" from="0 0 -0.8" begin="down" easing="linear"></a-animation>
            </a-cylinder>
            <a-cylinder static-body visible="false" radius="0.07" height="0.4" rotation="90 0 0" color="#555555">
                <a-animation attribute="position" dur="300" from="0 0 0" to="0 0 -1.2" begin="up" easing="linear"></a-animation>
                <a-animation attribute="position" dur="300" to="0 0 0" from="0 0 -1.2" begin="down" easing="linear"></a-animation>
            </a-cylinder>
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