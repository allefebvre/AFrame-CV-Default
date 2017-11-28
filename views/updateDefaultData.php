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
<html>
    <head>
        <title>Table : <?php echo $tableName." ID : ". $id; ?></title>
    </head>
    <body>
    <center>
        <h2>Table : <?php echo $tableName." ID : ". $id; ?></h2>
        <hr>   
        <form method="post" >
            
            <?php echo $data->toStringUpdate();?>
            
            <input type="submit" value="GO">
            <?php echo "<input type=\"hidden\" name=\"action\" value=\"update$tableName\">"; ?>
        </form>
    </center>       
</body>
</html>