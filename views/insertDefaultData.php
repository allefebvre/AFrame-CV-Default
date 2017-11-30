<?php
$tableName = $_REQUEST['table'];

switch ($tableName) {
    /* --- Sections : --- */
    case "Information":
        $data = new Information(0, "", "", "", "", "", "", "", "");
        break;
    case "Education":
        $data = new Education(0, "", "");
        break;
    case "WorkExp":
        $data = new WorkExp(0, "", "");
        break;
    case "Skill":
        $data = new Skill(0, "", "");
        break;
    case "Diverse":
        $data = new Diverse(0,"");
        break;
    
    /* --- Publications : --- */
    case "Conference":
        $data = new Conference(0, "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", 0);
        break;   
    case "Journal":
        $data = new Journal(0, "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", 0);
        break;
    case "Other":
        $data = new Other(0, "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", 0);
        break;  
}
?>

<div class="updateDefaultData">
    <div class="titleBar">
        <a href="admin.php?table=<?php echo $tableName; ?>&action=showTable"><button id="backButton">&#10229; Back</button></a>
        <div class="title">
            <h2>Insert in <?php echo $tableName; ?></h2> 
        </div>
    </div>
    
    <form method="post" >

        <?php echo $data->toStringInsert(); ?>

        <input class="link" type="submit" value="GO">
        <?php echo "<input type=\"hidden\" name=\"action\" value=\"insertIn$tableName\">"; ?>
    </form>
</div>       