<?php
$tableName = $_GET['table'];

$data['theTable'] = ModelDefaultTable::getAllDefaultTable($tableName);

switch ($tableName) {
    /* --- Sections --- */
    case "Information":
        $data['dataTable'] = ModelInformation::getAllInformation();
        break;
    case "Education":
        $data['dataTable'] = ModelEducation::getAllEducation();
        break;
    case "WorkExp":
        $data['dataTable'] = ModelWorkExp::getAllWorkExp();
        break;
    case "Skill":
        $data['dataTable'] = ModelSkill::getAllSkills();
        break;
    case "Diverse":
        $data['dataTable'] = ModelDiverse::getAllDiverse();
        break;
    
    /* --- Publications --- */
    case "Conference":
        $data['dataTable'] = ModelPublication::getAllPublication();
        break; 
    case "Journal":
        $data['dataTable'] = ModelJournal::getAllJournals();
        break;
    case "Other":
        $data['dataTable'] = ModelOther::getAllOthers();
        break;  
}
?>

<div class="defaultTable">
    <div class="titleBar">
        <a href="admin.php?action=showData" id="backButton">&#10229; Back</a>
        <div class="title">
            <h2>Your <?php echo $tableName; ?></h2>
        </div>
    </div>
    <form method="post">
        <table>
            <tr class="headTable">
                <td></td>
                <td></td>
                <?php
                for ($i = 0; $i < sizeof($data['theTable']); $i++) {
                    $var = $data['theTable'][$i][0];
                    echo "<td>$var</td>";
                }
                ?>
            </tr>

            <?php
            foreach ($data['dataTable'] as $table) {
                $id = $table->getId();
                echo "<tr class=\"contentTable\">";
                echo "<td>"
                        . "<a href=\"admin.php?action=showLine&table=$tableName&id=$id\">"
                            . "<div class=\"button\">Edit</div>"
                        . "</a>"
                        . "</td>"
                        . "<td>"
                        . "<a href=\"admin.php?action=deleteDefaultLine&table=$tableName&id=$id\">"
                            . "<div class=\"button\">Delete</div>"
                        . "</a>"
                    . "</td>";
                echo $table->toString();
                echo "</tr>";
            }
            ?>
        </table>
        <?php
            echo "<div class = \"link\">"
                    . "<a id = \"InsertData\" href = \"admin.php?action=insertInBase&table=$tableName\">"
                        . "<div class = \"link-div\">Insert</div>"
                    . "</a>"
                . "</div>";
        ?>
    </form>
</div>