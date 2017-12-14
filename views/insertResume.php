<div class="insertDefaultData">
    <div class="titleBar">
        <a id="backButton" href="admin.php?sectionId=<?php echo $id; ?>&action=showResume">&#10229; Back</a>
        <div class="title">
            <h2>Insert for <?php echo $section->getTitle(); ?> Section</h2> 
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
        echo "<input type=\"hidden\" name=\"action\" value=\"insertInResume\">"; 
        ?>
    </form>
</div>       

