<html>
    <head>
        <title>AFrame-CV-Default</title>

        <!-- Library A-FRAME -->
        <script src="resources/libraryJS/aframe.min.js"></script>
        <script src="resources/libraryJS/aframe-extras.min.js"></script>
        <script src="resources/libraryJS/aframe-animation-component.min.js"></script>
        <script src="resources/libraryJS/aframe-event-set-component.min.js"></script>
        <script src="resources/libraryJS/aframe-environment-component.min.js"></script>
        <script src="resources/libraryJS/aframe-html-shader.min.js"></script>
        <!-- End library A-FRAME -->
        
        <link rel="stylesheet" href="resources/css/style.css" />
	<link rel="stylesheet" href="resources/css/publication.css" />

        <script src="resources/scriptJS/scroll.js"></script>
        <script src="resources/scriptJS/persistence.js"></script>
        <script src="resources/scriptJS/height-correction.js"></script>
        <script src="resources/scriptJS/open-double-door.js"></script>
        <script src="resources/scriptJS/button-stats.js"></script>
        <script src="resources/scriptJS/light-toggle.js"></script>
        <script src="resources/scriptJS/go-pdf.js"></script>

       
    </head>

    <body>

        <?php
	    global $dir,$views;
            require $dir.$views['displayPlane'];
        ?>


        
    <a-scene physics inspector="url:resources/libraryJS/aframe-inspector.min.js" button-stats="p">

        <?php
	
        require $dir.$views['loft'];
        require $dir.$views['door'];
        require $dir.$views['publication'];

        $managementPlane->placeEntity();
        ?>

    </a-scene>

</body>
</html>
