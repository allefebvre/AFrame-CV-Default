<?php
$tableName = $_GET['table'];

$data['theTable'] = ModelDefaultTable::getAllDefaultTable($tableName);

switch ($tableName) {
    case "Conference":
        $data['dateTable'] = ModelConference::getAllConferences();
        break;
    case "Diverse":
        $data['dateTable'] = ModelDiverse::getAllDiverse();
        break;
    case "Education":
        $data['dateTable'] = ModelEducation::getAllEducation();
        break;
    case "Information":
        $data['dateTable'] = ModelInformation::getAllInformation();
        break;
    case "Journal":
        $data['dateTable'] = ModelJournal::getAllJournals();
        break;
    case "Other":
        $data['dateTable'] = ModelOther::getAllOthers();
        break;
    case "Skill":
        $data['dateTable'] = ModelSkill::getAllSkills();
        break;
    case "WorkExp":
        $data['dateTable'] = ModelWorkExp::getAllWorkExp();
        break;
}
?>

<div class="defaultTable">
    <h2>Your <?php echo $tableName; ?></h2>

    <form method="post">
        <table cellpadding="0" cellspacing="0" border="0">
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
            foreach ($data['dateTable'] as $table) {
                $id = $table->getId();
                echo "<tr class=\"contentTable\">";
                echo "<td><a href=\"admin.php?action=showLine&table=$tableName&id=$id\"><button>Edit</button></a></td><td><a href=\"\"><button>Delete</button></a></td>";
                echo $table->toString();
                echo "</tr>";
            }
            ?>
        </table>
        <div class="link"><a id="parametersSave" href="admin.php?action="><div>Insert</div></a></div>
    </form>
</div>