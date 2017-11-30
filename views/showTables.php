<?php
$data['tables'] = ModelTables::getAllTables();

$data['sectionsTables'] = array();
$data['publicationsTables'] = array();

foreach ($data['tables'] as $table) {
    $tableName = $table[0];
    if ($tableName !== "ByDate" && $tableName !== "Parameter" && $tableName !== "Login" && $tableName !== "Token") {
        switch ($tableName) {
            /* --- Sections : --- */
            case "Information":
            case "Education":
            case "WorkExp":
            case "Skill":
            case "Diverse":
                $data['sectionsTables'][] = $tableName;
                break;

            /* --- Publications : --- */
            case "Conference": 
            case "Journal":
            case "Other":
                $data['publicationsTables'][] = $tableName;
                break;   
        }
    }
}
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
            <div>
                <h3>Sections :</h3>
                <ul>
                <?php
                foreach ($data['sectionsTables'] as $tableName) {
                    echo "<li>"
                            . "<a href=\"admin.php?table=$tableName&action=showTable\">"
                                . "<div>$tableName</div>"
                            . "</a>"
                        . "</li>";
                }
                ?>
                </ul> 
            </div>    
            <div>
                <h3>Publications :</h3>
                <ul>
                <?php
                foreach ($data['publicationsTables'] as $tableName) {
                    echo "<li>"
                            . "<a href=\"admin.php?table=$tableName&action=showTable\">"
                                . "<div>$tableName</div>"
                            . "</a>"
                        . "</li>";
                }
                ?>
                </ul> 
            </div>     
        </div>            
    </form>
</div>       
