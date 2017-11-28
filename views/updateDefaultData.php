<?php
$tableName = $_REQUEST['table'];
$id = $_REQUEST['id'];

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
?>

<div class="updateDefaultData">
    <h2>Table : <?php echo $tableName . " ID : " . $id; ?></h2> 
    <form method="post" >

        <?php echo $data->toStringUpdate(); ?>

        <input class="link" type="submit" value="GO">
        <?php echo "<input type=\"hidden\" name=\"action\" value=\"update$tableName\">"; ?>
    </form>
</div>       