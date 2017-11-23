<?php
global $dir, $views;
require $dir . $views['displayPlane'];
?>

<!-- Display loading ... -->
<div class="loading">
    Loading ...<br>
    <!--<img style="height: 50px; width: 50px" src="resources/images/loading.gif" alt="loading ..."/>-->
</div>

<?php
require $dir.$views['parameters'];
?>

<div class="aframe">
    <a-scene physics inspector="url:resources/libraryJS/aframe-inspector.min.js" button-stats="p">

        <?php
        require $dir . $views['loft'];
        require $dir . $views['door'];
        require $dir . $views['publication'];

        $managementPlane->placeEntity();
        ?>

    </a-scene>
</div>