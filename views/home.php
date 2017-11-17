<?php
global $dir, $views;
require $dir . $views['displayPlane'];
?>



<a-scene physics inspector="url:resources/libraryJS/aframe-inspector.min.js" button-stats="p">

    <?php
    require $dir . $views['loft'];
    require $dir . $views['door'];
    require $dir . $views['publication'];

    $managementPlane->placeEntity();
    ?>

</a-scene>