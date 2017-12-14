<?php
$tableName = $_REQUEST['table'];
$id = $_REQUEST['id'];

switch ($tableName) {
    /* --- Sections : --- */
    case "section":
        $data = ModelSection::getSectionById($id);
        $tableMain = "Section";
        break;
    
    /* --- Publications : --- */
    case "Conferences":
    case "Journals": 
    case "Documentations": 
    case "Thesis": 
    case "Miscellaneous":
        $data = ModelPublication::getOnePublication($id);
        $tableMain = "Publication";
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
        echo "<input type=\"hidden\" name=\"action\" value=\"update$tableMain\">"; 
        ?>
    </form>
</div>       