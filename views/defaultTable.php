<?php
$tableName = $_GET['table'];

$data['theTable'] = ModelDefaultTable::getAllDefaultTable($tableName);
$tableMain = $tableName;

switch ($tableName) {
    /* --- Sections --- */
    case "section":
        $data['dataTable'] = ModelSection::getAllSections();
        break;
    
    /* --- Publications --- */
    case "Conferences":
        $data['dataTable'] = ModelPublication::getAllConferences();
        $tableMain = "Publication";
        break;  
    case "Journals":
        $data['dataTable'] = ModelPublication::getAllJournals();
        $tableMain = "Publication";
        break;  
    case "Documentations":
        $data['dataTable'] = ModelPublication::getAllDocumentation();
        $tableMain = "Publication";
        break;  
    case "Thesis":
        $data['dataTable'] = ModelPublication::getAllThesis();
        $tableMain = "Publication";
        break;  
    case "Miscellaneous":
        $data['dataTable'] = ModelPublication::getAllMiscellaneous();
        $tableMain = "Publication";
        break; 
}
$data['theTable'] = ModelDefaultTable::getAllDefaultTable($tableMain);
?>

<div class="defaultTable">
    <div class="titleBarDefaultTable">
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