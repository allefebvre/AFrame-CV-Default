<?php
require_once(__DIR__ . '/../config/config.php');

require_once(__DIR__ . '/../config/Autoload.php');
Autoload::load();



$tableName = $_GET['table'];
$id = $_GET['id'];

switch ($tableName) {
    case "Conference":
        $data = ModelConference::getOneConference($id);
        break;
    case "Diverse":
        $data = ModelDiverse::getOneDiverse($id);
        break;
    case "Education":
        $data = ModelEducation::getOneEducation($id);
        break;
    case "Information":
        $data = ModelInformation::getOneInformation($id);
        break;
    case "Journal":
        $data = ModelJournal::getOneJournal($id);
        break;
    case "Other":
        $data = ModelOther::getOneConference($id);
        break;
    case "Skill":
        $data = ModelSkill::getOneSkill($id);
        break;
    case "WorkExp":
        $data = ModelWorkExp::getOneWorkExo($id);
        break;
}

$table['theTable'] = ModelDefaultTable::getAllDefaultTable($tableName);
?>
<html>
    <head>
        <title>Table : <?php echo $tableName." ID : ". $id; ?></title>
    </head>
    <body>
    <center>
        <h2>Table : <?php echo $tableName." ID : ". $id; ?></h2>
        <hr>   
        <form method="post" >
            <?php echo $data->toStringUpdate(); ?>
            <a id="parametersSave" href="index.php?action=saveParameters">GO</a>
        </form>
    </center>       
</body>
</html>