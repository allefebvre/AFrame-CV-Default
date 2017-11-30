<?php
// Loading of the camera position from the GET and the COOKIES (GET first) //

$posX = filter_input(INPUT_GET, 'posX', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
if ($posX == NULL || $posX == false) {
    $posX = filter_input(INPUT_COOKIE, 'posX', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    if ($posX == NULL || $posX == false || $posX > 19.5 || $posX < -19.5) {
        $posX = -10;
    }
}

$posY = filter_input(INPUT_GET, 'posY', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
if ($posY == NULL || $posY == false) {
    $posY = filter_input(INPUT_COOKIE, 'posY', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    if ($posY == NULL || $posY == false || $posY > 10.5 || $posY < 0) {
        $posY = 0;
    }
}

$posZ = filter_input(INPUT_GET, 'posZ', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
if ($posZ == NULL || $posZ == false) {
    $posZ = filter_input(INPUT_COOKIE, 'posZ', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    if ($posZ == NULL || $posZ == false || $posZ > 14.5 || $posZ < -14.5) {
        $posZ = 0;
    }
}

$rotationX = filter_input(INPUT_GET, 'rotationX', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
if ($rotationX == NULL || $rotationX == false) {
    $rotationX = filter_input(INPUT_COOKIE, 'rotationX', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    if ($rotationX == NULL || $rotationX == false) {
        $rotationX = 10;
    }
}

$rotationY = filter_input(INPUT_GET, 'rotationY', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
if ($rotationY == NULL || $rotationY == false) {
    $rotationY = filter_input(INPUT_COOKIE, 'rotationY', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    if ($rotationY == NULL || $rotationY == false) {
        $rotationY = 90;
    }
}
?>



<!-- Camera settings-->
<a-entity camera="userHeight: 1.6"
          persistence-position
          height-correction
          border-position
          jump-ability
          universal-controls
          position="<?php echo $posX . " " . $posY . " " . $posZ ?>"
          rotation="<?php echo $rotationX; ?> <?php echo $rotationY; ?> 0"
          kinematic-body>
    
    <a-entity cursor="fuse: false; fuseTimeout: 500; downEvents: gripdown; upEvents: gripup"
              position="0 0 -1"
              raycaster="far:10"
              geometry="primitive: ring; radiusInner: 0.01; radiusOuter: 0.015"
              material="color: black; shader: flat">
        
        <a-entity vive-controls="hand: left; model:true" position="-0.40 -1.6 1.2"></a-entity>
        <a-entity vive-controls="hand: right; model:true" position="-0.40 -1.6 1.2"></a-entity>
        <a-entity laser-controls="hand: left"></a-entity>
        <a-entity laser-controls="hand: right"></a-entity>
    </a-entity>

</a-entity>



<!-- End camera settings -->


<!-- PHP variables to control the dimensions of the loft -->
<?php
// Don't modify //

$loftLenght = 40;
$loftWidth = 30;

$height = 10;

$window1 = TRUE;
$window2 = TRUE;

$a = $loftLenght / 2 - 0.5;
$b = $loftWidth / 2 - 0.5;

$d = $loftLenght / 2 - 5.75;
$c = $loftWidth / 2 - 5.75;

$f = $loftLenght - 19;
$e = $loftWidth - 19;

$h = $loftLenght / 2 - 1;
$g = $loftWidth / 2 - 1;

$i = $height / 2;
$j = $height - 0.25;


if ($loftWidth < 22) {
    $window1 = FALSE;
}
if ($loftLenght < 22) {
    $window2 = FALSE;
}

if (!$window1) {
    $e = $loftWidth;
}
if (!$window2) {
    $f = $loftLenght;
}
?>
<!-- End PHP variables -->


<!-- Loading textures -->
<a-assets>
    <img id="wallTexture" src="resources/textures/whiteWall.jpg" alt="whiteWall"/>
    <img id="floorTexture" src="resources/textures/blueFloor.jpeg" alt="blueFloor"/>
    <img id="roofTexture" src="resources/textures/roof.jpg" alt="roof"/>
    <img id="woodTexture" src="resources/textures/wood.jpg" alt="wood"/>
    <a-mixin id="wall" material="roughness:0.7"></a-mixin>
    <div id="assets_canvas"></div>
    <img id="panneau" src="resources/textures/panneau.png"/>

    <a-asset-item id="desk_obj" src="resources/model3D/desk.obj"></a-asset-item>
    <a-asset-item id="desk_mtl" src="resources/model3D/desk.mtl"></a-asset-item>


</a-assets>
<!-- End loading textures -->


<!-- Forest environment -->
<a-entity position="0 -1 0" environment="preset: forest; lightPosition: 0 0 0; lighting: non" scale="1.2 1.2 1.2"></a-entity>

<!-- Floor -->
<a-box src="#floorTexture" mixin="wall" static-body position="0 -1 0" scale="<?php echo $loftLenght; ?> 2 <?php echo $loftWidth; ?>"></a-box>
<a-box static-body position="0 -1 0" scale="250 2 250" material="visible:false"></a-box>

<!-- Roof -->
<a-box src="#roofTexture" mixin="wall" static-body position="0 <?php echo $height + 0.5; ?> 0" scale="<?php echo $loftLenght; ?> 1 <?php echo $loftWidth; ?>"></a-box>


<!-- Lighting --> 
<a-entity light-toggle position="<?php echo $loftLenght / 2 - 2; ?> <?php echo $height; ?> <?php echo $loftWidth / 2 - 2; ?>">
    <a-light intensity="0.16"  type="point"></a-light>
    <a-sphere radius="0.5" shader="flat"></a-sphere>
</a-entity>

<a-entity light-toggle position="<?php echo -($loftLenght / 2 - 2); ?> <?php echo $height; ?> <?php echo $loftWidth / 2 - 2; ?>">
    <a-light intensity="0.16"  type="point"></a-light>
    <a-sphere radius="0.5" shader="flat"></a-sphere>
</a-entity>

<a-entity light-toggle position="<?php echo $loftLenght / 2 - 2; ?> <?php echo $height; ?> <?php echo -($loftWidth / 2 - 2); ?>">
    <a-light intensity="0.16"  type="point"></a-light>
    <a-sphere radius="0.5" shader="flat"></a-sphere>
</a-entity>

<a-entity light-toggle position="<?php echo -($loftLenght / 2 - 2); ?> <?php echo $height; ?> <?php echo -($loftWidth / 2 - 2); ?>">
    <a-light intensity="0.16" type="point"></a-light>
    <a-sphere radius="0.5" shader="flat"></a-sphere>
</a-entity>

<a-entity light-toggle position="0 <?php echo $height; ?> 0">
    <a-light intensity="0.2" type="point"></a-light>
    <a-sphere radius="0.5" shader="flat"></a-sphere>
</a-entity>
<!-- End lighting -->

<!-- 1st wall -->
<a-box src="#wallTexture" mixin="wall" static-body position="<?php echo -$a; ?> <?php echo $i; ?> 0" scale="0.25 <?php echo $height; ?> <?php echo $e; ?>" ></a-box>
<?php if ($window1) { ?>
    <a-box src="#wallTexture" mixin="wall" static-body position="<?php echo -$a; ?> <?php echo $i; ?> <?php echo $g; ?>" scale="0.25 <?php echo $height; ?> 2" ></a-box>
    <a-box src="#wallTexture" mixin="wall" static-body position="<?php echo -$a; ?> <?php echo $i; ?> <?php echo -$g; ?>" scale="0.25 <?php echo $height; ?> 2" ></a-box>

    <a-entity position="<?php echo -$a; ?> <?php echo $i; ?> <?php echo $c; ?>">
        <a-box src="#woodTexture" mixin="wall" static-body scale="0.15 <?php echo $height; ?> 0.25" color="#995522"></a-box>
        <a-box static-body scale="0.1 <?php echo $height; ?> 7.5" material="opacity:0.3;color:#b1d9e7" ></a-box>
    </a-entity>

    <a-entity position="<?php echo -$a; ?> <?php echo $i; ?> <?php echo -$c; ?>">
        <a-box src="#woodTexture" mixin="wall" static-body scale="0.15 <?php echo $height; ?> 0.25" color="#995522"></a-box>
        <a-box static-body scale="0.1 <?php echo $height; ?> 7.5" material="opacity:0.3;color:#b1d9e7"></a-box>
    </a-entity>

<?php } ?>
<!-- End 1st wall -->

<!-- 2nd wall -->
<a-box src="#wallTexture" mixin="wall" static-body position="<?php echo $a; ?> <?php echo $i; ?> 0" scale="0.25 <?php echo $height; ?> <?php echo $e; ?>" ></a-box>
<?php if ($window1) { ?>
    <a-box src="#wallTexture" mixin="wall" static-body position="<?php echo $a; ?> <?php echo $i; ?> <?php echo $g; ?>" scale="0.25 <?php echo $height; ?> 2" material=""></a-box>
    <a-box src="#wallTexture" mixin="wall" static-body position="<?php echo $a; ?> <?php echo $i; ?> <?php echo -$g; ?>" scale="0.25 <?php echo $height; ?> 2" material=""></a-box>

    <a-entity position="<?php echo $a; ?> <?php echo $i; ?> <?php echo $c; ?>">
        <a-box src="#woodTexture" mixin="wall" static-body scale="0.15 <?php echo $height; ?> 0.25" color="#995522"></a-box>
        <a-box static-body scale="0.1 <?php echo $height; ?> 7.5" material="opacity:0.3;color:#b1d9e7" ></a-box>
    </a-entity>

    <a-entity position="<?php echo $a; ?> <?php echo $i; ?> <?php echo -$c; ?>">
        <a-box src="#woodTexture" mixin="wall" static-body scale="0.15 <?php echo $height; ?> 0.25" color="#995522"></a-box>
        <a-box static-body scale="0.1 <?php echo $height; ?> 7.5" material="opacity:0.3;color:#b1d9e7"></a-box>
    </a-entity>
<?php } ?>
<!-- End 2nd wall -->

<!-- 3rd wall -->
<a-box src="#wallTexture" mixin="wall" static-body position="0 <?php echo $i; ?> <?php echo $b; ?>"  scale="0.25 <?php echo $height; ?> <?php echo $f; ?>" rotation="0 90 0"></a-box>
<?php if ($window2) { ?>
    <a-box src="#wallTexture" mixin="wall" static-body position="<?php echo $h; ?> <?php echo $i; ?> <?php echo $b; ?>" scale="0.25 <?php echo $height; ?> 2" rotation="0 90 0"></a-box>
    <a-box src="#wallTexture" mixin="wall" static-body position="<?php echo -$h; ?> <?php echo $i; ?> <?php echo $b; ?>" scale="0.25 <?php echo $height; ?> 2" rotation="0 90 0"></a-box>

    <a-entity position="<?php echo $d; ?> <?php echo $i; ?> <?php echo $b; ?>" rotation="0 90 0">
        <a-box src="#woodTexture" mixin="wall" static-body scale="0.15 <?php echo $height; ?> 0.25" color="#995522"></a-box>
        <a-box static-body scale="0.1 <?php echo $height; ?> 7.5" material="opacity:0.3;color:#b1d9e7" ></a-box>
    </a-entity>

    <a-entity position="<?php echo -$d; ?> <?php echo $i; ?> <?php echo $b; ?>" rotation="0 90 0">
        <a-box src="#woodTexture" mixin="wall" static-body scale="0.15 <?php echo $height; ?> 0.25" color="#995522"></a-box>
        <a-box static-body scale="0.1 <?php echo $height; ?> 7.5" material="opacity:0.3;color:#b1d9e7"></a-box>
    </a-entity>
<?php } ?>
<!-- End 3rd wall -->

<!-- 4th wall -->
<!--<a-box src="#wallTexture" mixin="wall" static-body position="0 <?php echo $i; ?> <?php echo -$b; ?>"  scale="0.25 <?php echo $height; ?> <?php echo $f; ?>" rotation="0 90 0"></a-box>-->
<a-box src="#wallTexture" mixin="wall" static-body position="0 2.5 -14.5" scale="0.25 5 21" rotation="0 90 0"></a-box>
<a-box src="#wallTexture" mixin="wall" static-body position="7.5 7.5 -14.5" scale="0.25 5 6" rotation="0 90 0"></a-box>
<a-box src="#wallTexture" mixin="wall" static-body position="-9.4 7.5 -14.5" scale="0.25 5 2.8" rotation="0 90 0"></a-box>
<a-box src="#wallTexture" mixin="wall" static-body position="-1.753 5.065 -15.5" scale="0.25 13.228 2" rotation="0 0 90"></a-box>
<a-box static-body position="4.719 7.554 -15.492" scale="0.25 5 2.022" material="visible:false"></a-box>
<a-box static-body position="-8.2 7.554 -15.492" scale="0.25 5 2.022" material="visible:false"></a-box>
<a-box static-body position="-1.775 7.55 -16" scale="0.25 5 13.51" rotation="0 90 0" material="visible:false"></a-box>
<a-box static-body position="-1.775 10.033 -15.482" scale="0.25 1.726 13.51" rotation="0 90 90" material="visible:false"></a-box>
<a-box src="#wallTexture" mixin="wall" static-body position="-1.753 9.5 -14.5" scale="0.24 13.228 1.045" rotation="90 0 90"></a-box>
<a-box static-body src="#woodTexture" mixin="wall" position="-1.753 6.5 -16.473" scale="0.07 0.15 13.081" color="#e1a975" rotation="0 90 0"></a-box>
<a-box static-body src="#woodTexture" mixin="wall" position="4.75 6.5 -15.54" scale="0.07 0.15 1.936" color="#e1a975"></a-box>
<a-box static-body src="#woodTexture" mixin="wall" position="-8.29 6.5 -15.54" scale="0.07 0.15 1.936" color="#e1a975"></a-box>
<?php
fence(20, -8, 4.4, -16.473, 5.750, TRUE);
fence(2, -16.2, -14.9, 4.75, 5.750);
fence(2, -16.2, -14.9, -8.29, 5.750);
?>



<?php if ($window2) { ?>
    <a-box src="#wallTexture" mixin="wall" static-body position="<?php echo $h; ?> <?php echo $i; ?> <?php echo -$b; ?>" scale="0.25 <?php echo $height; ?> 2" rotation="0 90 0"></a-box>
    <a-box src="#wallTexture" mixin="wall" static-body position="<?php echo -$h; ?> <?php echo $i; ?> <?php echo -$b; ?>" scale="0.25 <?php echo $height; ?> 2" rotation="0 90 0"></a-box>

    <a-entity position="<?php echo $d; ?> <?php echo $i; ?> <?php echo -$b; ?>" rotation="0 90 0">
        <a-box src="#woodTexture" mixin="wall" static-body scale="0.15 <?php echo $height; ?> 0.25" color="#995522"></a-box>
        <a-box static-body scale="0.1 <?php echo $height; ?> 7.5" material="opacity:0.3;color:#b1d9e7" ></a-box>
    </a-entity>

    <a-entity position="<?php echo -$d; ?> <?php echo $i; ?> <?php echo -$b; ?>" rotation="0 90 0">
        <a-box src="#woodTexture" mixin="wall" static-body scale="0.15 <?php echo $height; ?> 0.25" color="#995522"></a-box>
        <a-box static-body scale="0.1 <?php echo $height; ?> 7.5" material="opacity:0.3;color:#b1d9e7"></a-box>
    </a-entity>
<?php } ?>
<!-- End 4th wall-->



<!-- 1st floor -->
<a-box static-body src="#wallTexture" mixin="wall" position="0 <?php echo $height / 2; ?> 0" scale="<?php echo $f - 0.01; ?> 0.4 <?php echo $loftWidth - 0.8; ?>"></a-box>

<!-- Access ramp on the 1st floor -->
<a-box static-body src="#wallTexture" mixin="wall" position="<?php echo $f / 2 + 2; ?> <?php echo $height / 2; ?> 8" scale="4 0.4 6"></a-box>
<a-box static-body src="#wallTexture" mixin="wall" position="12.5 2.292 -0.350" scale="4 0.4 12.171" rotation="-26.699833253096365 0 0"></a-box>

<a-box static-body src="#wallTexture" position="12.5 1.2 1.161" scale="4 3.176 0.602" material="visible:false"></a-box>
<a-box static-body src="#wallTexture" position="12.5 0.395 -0.681" scale="4 1.822 3.084" material="visible:false"></a-box>
<a-box static-body src="#wallTexture" position="10.428 4 1.793" scale="0.129 1.822 3.789" material="visible:false"></a-box>
<!-- End access ramp on the 1st floor -->

<!-- Fence -->
<a-box static-body src="#woodTexture" mixin="wall" position="<?php echo -($f / 2 - 0.15); ?> <?php echo $height / 2 + 1.5; ?> 0" scale="0.07 0.15 <?php echo $loftWidth - 0.8; ?>" color="#e1a975"></a-box>
<a-box static-body src="#woodTexture" mixin="wall" position="10.35 6.5 -4.458" scale="0.07 0.15 19.86" color="#e1a975"></a-box>
<a-box static-body src="#woodTexture" mixin="wall" position="10.35 5.75 5.284" scale="0.069 1.5 0.15" color="#e1a975"></a-box>
<a-box static-body src="#woodTexture" mixin="wall" position="10.35 6.5 12.694" scale="0.07 0.15 3.482" color="#e1a975"></a-box>
<a-box static-body src="#woodTexture" mixin="wall" position="12.355 6.5 10.919" scale="0.07 0.15 4.08" color="#e1a975" rotation="0 90 0"></a-box>
<a-box static-body src="#woodTexture" mixin="wall" position="14.379 6.5 8.14" scale="0.07 0.15 5.63" color="#e1a975"></a-box>
<a-box static-body src="#woodTexture" mixin="wall" position="14.379 5.75 5.5" scale="0.069 1.5 0.15" color="#e1a975"></a-box>

<?php

/**
 * Build fences
 * @param int $number
 * @param float $position_min
 * @param float $position_max
 * @param float $position_x
 * @param float $position_y
 * @param bool $rotation
 */
function fence(int $number, float $position_min, float $position_max, float $position_x, float $position_y, bool $rotation = FALSE) {
    $nbr = $number;
    $pos_min = $position_min;
    $pos_max = $position_max;
    $diffPos = abs($pos_max - $pos_min);
    $step = $diffPos / ($nbr);
    $pos = $pos_min;
    for ($index = 0; $index <= $nbr; $index++) {
        if (!$rotation) {
            ?>
            <a-box static-body mixin="wall" src="#woodTexture" position="<?php echo $position_x; ?> <?php echo $position_y; ?> <?php echo $pos; ?>" scale="0.05 1.5 0.08" color="#e1a975"></a-box>
            <?php
        } else {
            ?>
            <a-box static-body mixin="wall" src="#woodTexture" position="<?php echo $pos; ?> <?php echo $position_y; ?> <?php echo $position_x; ?>" scale="0.05 1.5 0.08" color="#e1a975" rotation="0 90 0"></a-box>
            <?php
        }
        $pos = $pos + $step;
    }
}

fence(16, 6, $loftWidth / 2 - 0.5, -($f / 2 - 0.15), 5.750);
fence(30, -($loftWidth / 2 - 0.5), $loftWidth / 2 - 10.3, ($f / 2 - 0.15), 5.750);
fence(8, -($loftWidth / 2 - 26), $loftWidth / 2 - 0.5, ($f / 2 - 0.15), 5.750);
fence(8, -($loftWidth / 2 - 21.1), $loftWidth / 2 - 4.4, 14.379, 5.750);
fence(8, 10.75, 14.2, 10.919, 5.750, TRUE);
?>
<!-- End fence -->


<!-- Interior walls -->
<?php
$numberMiddle = ModelParameter::getNbMiddlePlaneDisplay();
if($numberMiddle > 0) {
?>
    <a-box static-body mixin="wall" position="-2 <?php echo $height / 4; ?> 0" scale="10 <?php echo $height / 2; ?> 10"></a-box>
<?php
}
?>
<a-box static-body mixin="wall" position="<?php echo -($f / 2 - 0.15); ?> <?php echo $height * 0.75; ?> -4.5" scale="0.2 <?php echo $height / 2; ?> 20"></a-box>
<a-box static-body mixin="wall" position="7 7.5 -4.5" scale="0.2 <?php echo $height / 2; ?> 20"></a-box>

<a-box static-body mixin="wall" position="4.294 7.5 5.44" scale="0.2 5 5.611" rotation="0 90 0"></a-box>
<a-box static-body mixin="wall" position="-6.609 7.5 5.44" scale="0.2 5 7.655" rotation="0 90 0"></a-box>

<a-box mixin="wall" src="#wallTexture" static-body position="10 2.4 0" scale="0.1 5 8"></a-box>

<a-box mixin="wall" src="#wallTexture" static-body position="16.5 5 -8" scale="0.1 10.3 1.7"></a-box>

<?php
$parameterPublication = ModelParameter::getParameterPublications();
if ($parameterPublication->getDisplay() === "TRUE") {
    echo "<a-plane src=\"#panneau\" scale=\"1.5 1.5 1\" position=\"16.4 2 -8\" rotation=\"0 -90 0\"></a-plane>";
}
?>


<!-- End interior walls -->

<!-- Spots -->
<?php

/**
 * Build light spot
 * @param float $x
 * @param float $y
 * @param float $z
 * @param int $rotation
 */
function spot(float $x, float $y, float $z, int $rotation) {
    ?>
    <a-entity light-toggle-spot position="<?php echo $x; ?> <?php echo $y; ?> <?php echo $z; ?>" rotation="-16 <?php echo $rotation; ?> 0">
        <a-light light="distance:8;intensity:0.6;type:spot"></a-light>
        <a-light light="distance:0.5;type:point;intensity:5" position="0 0 -0.05"></a-light>
        <a-box color="#222" position="0 0 0.2" scale="0.15 0.15 0.3"></a-box>
        <a-cylinder color="#222" rotation="90 0 0" position="0 0 0.025" radius="0.07" height="0.05"></a-cylinder>
        <a-cylinder rotation="16 0 0" radius="0.01" height="0.75" color="#222" position="0 0.387 0.26"></a-cylinder>
        <a-cylinder color="white" rotation="90 0 0" position="0 0 0" radius="0.07" height="0.005"></a-cylinder>

        <a-entity position="0 -0.16 0.02" rotation="25.1 0 0">
            <a-triangle material="side:double" color="#111" scale="0.3 0.2 0.2" geometry="vertexA:0.24 0.5 0"></a-triangle>
            <a-triangle material="side:double" color="#111" scale="0.3 0.2 0.2" geometry="vertexA:-0.24 0.5 0"></a-triangle>
            <a-plane material="side:double" color="#111" scale="0.15 0.2 1"></a-plane>
        </a-entity>

        <a-entity position="0 0.16 0.02" rotation="154.9 0 0">
            <a-triangle material="side:double" color="#111" scale="0.3 0.2 0.2" geometry="vertexA:0.24 0.5 0"></a-triangle>
            <a-triangle material="side:double" color="#111" scale="0.3 0.2 0.2" geometry="vertexA:-0.24 0.5 0"></a-triangle>
            <a-plane material="side:double" color="#111" scale="0.15 0.2 1"></a-plane>
        </a-entity>

        <a-entity position="0.16 0 0.02" rotation="0 25.1 90">
            <a-triangle material="side:double" color="#111" scale="0.3 0.2 0.2" geometry="vertexA:0.24 0.5 0"></a-triangle>
            <a-triangle material="side:double" color="#111" scale="0.3 0.2 0.2" geometry="vertexA:-0.24 0.5 0"></a-triangle>
            <a-plane material="side:double" color="#111" scale="0.15 0.2 1"></a-plane>
        </a-entity>

        <a-entity position="-0.16 0 0.02" rotation="0 154.9 90">
            <a-triangle material="side:double" color="#111" scale="0.3 0.2 0.2" geometry="vertexA:0.24 0.5 0"></a-triangle>
            <a-triangle material="side:double" color="#111" scale="0.3 0.2 0.2" geometry="vertexA:-0.24 0.5 0"></a-triangle>
            <a-plane material="side:double" color="#111" scale="0.15 0.2 1"></a-plane>
        </a-entity>
    </a-entity>
<?php } ?>

<?php
spot(0, 4, -7, 0);
spot(0, 4, 7, 180);
spot(-10, 4, 0, 90);
//spot(-2, 4, 8, 0);
//spot(-2, 4, -8, 180);
//spot(6, 4, 0, 90);
//spot(-10, 4, 0, -90);
?>
<!-- End spots -->

<a-box dynamic-body position="15 0.5 10" rotation="0 30 0" color="#FF3333"></a-box>
<a-box dynamic-body position="14.5 1.5 10.5" rotation="0 10 0" color="#33FF33"></a-box>
<a-box dynamic-body position="14 0.5 11" rotation="0 -20 0" color="#3333FF"></a-box>
<a-sphere dynamic-body position="8 6 13" color="#FFFF33" radius="0.5"></a-sphere>
<a-entity obj-model="obj:#desk_obj;mtl:#desk_mtl" position="-6.646 5.158 13.17" rotation="0 -90 0" scale="0.3 0.3 0.3"></a-entity>
<a-box static-body position="-6.828 5.751 13.69" scale="2.947 1.308 1.375" material="visible:false"></a-box>

<a-entity obj-model="mtl:resources/model3D/HP_Laptop_High_Poly/Laptop_High-Polay_HP_BI_2_obj.mtl;obj:resources/model3D/HP_Laptop_High_Poly/Laptop_High-Polay_HP_BI_2_obj.obj" position="-6.646 6.378 13.648" rotation="0 180 0" scale="0.2 0.2 0.2"></a-entity>
<a-entity static-body obj-model="obj:resources/model3D/table.obj" position="-1.44 5.57 -4.598" scale="0.029 0.029 0.029"></a-entity>
<a-entity obj-model="mtl:resources/model3D/pen/pen_parker.mtl;obj:resources/model3D/pen/pen_parker.obj" position="-0.849 6.591 -4.598" scale="0.035 0.035 0.035"></a-entity>
<a-entity obj-model="obj:resources/model3D/Pen.obj" position="-7.609 6.369 13.648" rotation="0 180 0" scale="0.0005 0.0005 0.0005"></a-entity>
<a-entity obj-model="obj:resources/model3D/Canape.obj" position="-16.61 -0.01 5.639" scale="2 2 2"></a-entity>
<a-entity static-body obj-model="mtl:resources/model3D/house plant.mtl;obj:resources/model3D/house plant.obj" position="-18.513 -0.01 7.619" scale="0.002 0.002 0.002"></a-entity>
<a-entity obj-model="mtl:resources/model3D/Pendule.mtl;obj:resources/model3D/Pendule.obj" position="16.436 3.62 -8" scale="0.02 0.02 0.02" rotation="0 -90 0"></a-entity>