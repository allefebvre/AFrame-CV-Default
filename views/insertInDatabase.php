<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
require_once(__DIR__ . '/../config/config.php');

require_once(__DIR__ . '/../config/Autoload.php');
Autoload::load();


$data['tables'] = ModelTables::getAllTables();
?>
<html>
    <head>
        <title>Panels</title>
    </head>
    <body>
        <center>
            <h2>Your diferent panels </h2>
            <hr>
            <!-- affichage de données provenant du modèle -->      
            <form method="post" >
                <table>
                    <?php
                    foreach ($data['tables'] as $table) {
                        $div = $table[0];
                        echo "<tr>
                        <td><a href=\"\">$div</a></td> 
                         </tr>";
                    }
                    ?>
                </table>
                <!-- action--> 
                <input type="hidden" name="action" value="personnageValidation">
            </form>
        </center>       
    </body>
</html>
