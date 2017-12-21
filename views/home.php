<?php
global $dir, $views;
require $dir . $views['displayPlane'];
?>

<!-- Display loading ... -->
<div class="loading" id="loading">
    Loading ...<br>
    <!--<img style="height: 50px; width: 50px" src="resources/images/loading.gif" alt="loading ..."/>-->
</div>

<script>
    var loading = document.getElementById("loading");
    setTimeout(function(){
        loading.innerHTML = "";
    }, 20000);
</script>

<?php if (!$mobile) { ?>
<a-scene id="a-scene" physics inspector="url:resources/libraryJS/aframe-inspector.min.js" button-stats="key: p">
<?php } else { ?>
<a-scene id="a-scene">
<?php }
    require $dir . $views['loft'];
    if (!isset($door)) {
        $door = TRUE;
    }
    if ($door && !$mobile) {
        require $dir . $views['door'];
    }

    $managementPlane->placeEntity($mobile); ?>
</a-scene>