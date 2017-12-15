<?php
$tableName = $_REQUEST['table'];

switch ($tableName) {
    /* --- Sections : --- */
    case "section":
        $data = new Section(0, "");
        $tableMain = "Section";
        break;

    /* --- Publications : --- */
    case "Journals":        
        $data = new Publication(0, "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", 1);
        $tableMain = "Publication";
        break;
    case "Conferences":
        $data = new Publication(0, "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", 2);
        $tableMain = "Publication";
        break;
    case "Documentations":
        $data = new Publication(0, "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", 3);
        $tableMain = "Publication";
        break;
    case "Thesis":
        $data = new Publication(0, "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", 4);
        $tableMain = "Publication";
        break;
    case "Miscellaneous":
        $data = new Publication(0, "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", 5);
        $tableMain = "Publication";
        break;
}
?>

<div class="insertDefaultData">
    <div class="titleBar">
        <a id="backButton" href="admin.php?table=<?php echo $tableName; ?>&action=showTable">&#10229; Back</a>
        <div class="title">
            <h2>Insert in <?php echo $tableName; ?></h2> 
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
        if (isset($reload)) {
            echo $reload->toStringForm();          
        } else {
            echo $data->toStringForm();
        }
        ?>
        
        <div class="requiredFields">(*) Required fields</div>
        <br>
        <input class="link" type="submit" value="GO">
        <?php 
        echo "<input type=\"hidden\" name=\"action\" value=\"insertIn$tableMain\">"; 
        ?>
    </form>
</div>       