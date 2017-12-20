<?php 	
    //Directory
    $dir = __DIR__.'/../';
    
    //DB
    $base = "mysql:host=localhost;dbname=AFrame-CV-Default";
    $login = "root";
    $password = "root";
    $GLOBALS['base'] = $base;
    $GLOBALS['login'] = $login;
    $GLOBALS['password'] = $password;

    //Views
    $views['head'] = "views/head.html";
    $views['foot'] = "views/foot.html";
    $views['error'] = "views/error.php";
    $views['home'] = "views/home.php";
    $views['homeStart'] = "views/homeStart.html";   
    $views['loft'] = "views/3dElements/loft.php";
    $views['controlsCamera'] = "views/3dElements/controlsCamera.php";
    $views['door'] = "views/3dElements/doors.html";
    $views['displayPlane'] = "views/displayPlane.php";
    
    //Views admin interface
    $views['connection'] = "views/connection.php";
    $views['homeAdmin'] = "views/homeAdmin.php";
    $views['parameters'] = "views/parameters.php";   
    $views['showTables'] = "views/showTables.php";
    $views['defaultTable'] = "views/defaultTable.php";   
    $views['updateDefaultData'] = "views/updateDefaultData.php";
    $views['insertInBase'] = "views/insertDefaultData.php";
    $views['resumeTable'] = "views/resumeTable.php";
    $views['updateResume'] = "views/updateResume.php";
    $views['insertResume'] = "views/insertResume.php";
    $views['changePassword'] = "views/changePassword.php";
    $views['info'] = "views/info.php";
    
?>