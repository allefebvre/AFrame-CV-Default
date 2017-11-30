<?php 	
    //Directory
    $dir = __DIR__.'/../';
    
    //DB
    $base = "mysql:host=localhost;dbname=AFrame-CV-Default";
    $login = "root";
    $password = "root";

    //Views
    $views['head'] = "views/head.html";
    $views['foot'] = "views/foot.html";
    $views['error'] = "views/error.php";
    $views['home'] = "views/home.php";
    $views['homeAdmin'] = "views/homeAdmin.php";
    $views['parameters'] = "views/parameters.php";
    $views['loft'] = "views/3dElements/loft.php";
    $views['door'] = "views/3dElements/doors.html";
    $views['publication'] = "views/3dElements/publication.html";
    $views['displayPlane'] = "views/displayPlane.php";
    $views['showTables'] = "views/showTables.php";
    $views['defaultTable'] = "views/defaultTable.php";
    $views['updateDefaultData'] = "views/updateDefaultData.php";
    $views['connection'] = "views/connection.php";
    $views['insertInBase'] = "views/insertDefaultData.php";
    $views['changePassword'] = "views/changePassword.php";
    $views['info'] = "views/info.php";
?>
