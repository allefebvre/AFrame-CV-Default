<?php
$data['tables'] = ModelTables::getAllTables();
?>

<div  class="panels">
    <h2>Your diferent panels </h2>  
    <form method="post" >
        <div class="liste">
            <ul>
                <?php
                foreach ($data['tables'] as $table) {
                    $div = $table[0];
                    if ($div !== "ByDate" && $div !== "Parameter") {
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
