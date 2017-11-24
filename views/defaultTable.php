<?php
require_once(__DIR__ . '/../config/config.php');

require_once(__DIR__ . '/../config/Autoload.php');
Autoload::load();



$tableName = $_GET['table'];

$data['theTable'] = ModelDefaultTable::getAllDefaultTable($tableName);

switch ($tableName) {
    case "ByDate":
        $data['dateTable'] = ModelByDate::getAllByDates();
        break;
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

<html>
    <head>
        <title>Your <?php echo $tableName; ?></title>
    </head>
    <body>
    <center>
        <h2>Your <?php echo $tableName; ?></h2>
        <hr>   
        <form method="post" >
            <table>
                <tr>
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
                    echo "<tr>";
                    echo "<td><a href=\"\">Edit</a></td><td><a href=\"\">Delete</a></td>";
                    echo $table->toString();
                    echo "</tr>";
                }
                ?>
            </table>
            <a id="parametersSave" href="index.php?action=saveParameters">Save</a>
        </form>
    </center>       
</body>
</html>