<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php

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
            <form method="post" >
                <table>
                    <?php
                    foreach ($data['tables'] as $table) {
                        $div = $table[0];
                        if ($div !== "ByDate" && $div !== "Parameter") {
                            echo "<tr>
                        <td><a href=\"admin.php?table=$div&action=showTable\">$div</a></td> 
                         </tr>";
                        }
                    }
                    ?>
                </table>                
            </form>
        </center>       
    </body>
</html>
