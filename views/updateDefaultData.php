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
        <a id="backButton" href="admin.php?table=<?php echo $tableName; ?>&action=showTable">&#10229; Back</a>
        <div class="title">
            <h2>Table : <?php echo $tableName . " ID : " . $id; ?></h2> 
        </div>
    </div>
    <br>
    <?php
    if (isset($dViewError) && count($dViewError)>0) {
        foreach($dViewError as $error) {
        ?>
        <div class="alert">- <?php echo $error; ?></div>
        <?php
        }
    }
    ?>
    <form method="post" >
        <?php
        echo $data->toStringForm();
        ?>
        <div class="requiredFields">(*) Required fields</div>
        <br>
        <input class="link" type="submit" value="GO">
        <?php 
        echo "<input type=\"hidden\" name=\"action\" value=\"update$tableName\">"; 
        ?>
    </form>
</div>       