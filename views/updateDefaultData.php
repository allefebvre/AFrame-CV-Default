<?php
$tableName = $_REQUEST['table'];
$id = $_REQUEST['id'];

switch ($tableName) {
    /* --- Sections : --- */
    case "Information":
        $data = ModelInformation::getOneInformation($id);
        break;
    case "Education":
        $data = ModelEducation::getOneEducation($id);
        break;
    case "WorkExp":
        $data = ModelWorkExp::getOneWorkExp($id);
        break;
    case "Skill":
        $data = ModelSkill::getOneSkill($id);
        break;
    case "Diverse":
        $data = ModelDiverse::getOneDiverse($id);
        break;
    
    /* --- Publications : --- */
    case "Conference":
        $data = ModelConference::getOneConference($id);
        break;  
    case "Journal":
        $data = ModelJournal::getOneJournal($id);
        break;
    case "Other":
        $data = ModelOther::getOneConference($id);
        break;
    
    
}
?>

<div class="updateDefaultData">
    <div class="titleBar">
        <a href="admin.php?table=<?php echo $tableName; ?>&action=showTable"><button id="backButton">&#10229; Back</button></a>
        <div class="title">
            <h2>Table : <?php echo $tableName . " ID : " . $id; ?></h2> 
        </div>
    </div>
    <form method="post" >

        <?php
        echo $data->toStringUpdate();
        if (isset($alert) && $alert != null && $alert != "") {
            ?>
            <div class="alert"><?php echo $alert ?></div><br><br>
            <?php
        }
        ?>

        <input class="link" type="submit" value="GO">
<?php echo "<input type=\"hidden\" name=\"action\" value=\"update$tableName\">"; ?>
    </form>
</div>       