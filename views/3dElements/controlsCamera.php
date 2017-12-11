<?php 

if (!isset($vive)) {
    $vive = FALSE;
}

if($vive) { ?>

<a-entity id="cameraRig">
    <a-entity position="0 0 0" control-height>
        <a-entity camera="userHeight: 1.6" look-controls wasd-controls="fly: true; acceleration: 150">
            <a-box static-body material="visible:false" scale="0.2 0.2 0.2"></a-box>
        </a-entity>
        <a-entity spawn-sphere="event: menudown; distanceStart: 0.3" interaction vive-controls="hand: left" teleport-controls="cameraRig: #cameraRig; button: trigger; collisionEntities: #floor, #floor1, #floor2, #ramp, #ramp1, [mixin = platform]; curveShootingSpeed:15;">
            <a-cylinder static-body visible="false" radius="0.07" height="0.4" rotation="90 0 0" color="#555555"> </a-cylinder>
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
        <a-entity interaction laser-controls="hand: right" raycaster="far: 10; interval: 200; objects: [mixin = link];">
            <a-cylinder static-body visible="false" radius="0.07" height="0.4" rotation="90 0 0" color="#555555"> </a-cylinder>
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