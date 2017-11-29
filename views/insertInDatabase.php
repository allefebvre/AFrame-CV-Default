<?php
$data['tables'] = ModelTables::getAllTables();
?>

<div  class="panels">
    <div class="titleBar">
        <a href="admin.php"><button id="backButton">&#10229; Back</button></a>
        <div class="title">
            <h2>Your different panels </h2> 
        </div>
    </div>
    <form method="post" >
        <div class="list">
            <ul>
                <?php
                foreach ($data['tables'] as $table) {
                    $div = $table[0];
                    if ($div !== "ByDate" && $div !== "Parameter" && $div !== "Login" && $div !== "Token") {
                        echo "<li>
                            <a href=\"admin.php?table=$div&action=showTable\"><div>$div</div></a>
                             </li>";
                    }
                }
                ?>
            </ul>    
        </div>            
    </form>
</div>       
