<div class="changePassword">
    <div class="titleBar">
        <a href="admin.php"><button id="backButton">&#10229; Back</button></a>
        <div class="title">
            <h2>Change password :</h2> 
        </div>
    </div>
    
    <form method="post" action="admin.php?action=changePassword2">
        <label for="password_old">Old password :</label><br>
        <input type="password" name="password_old" id="password_old"><br>
        <br>
        <label for="password">New password :</label><br>
        <input type="password" name="password" id="password"><br>
        <br>
        <label for="password_conf">New password again :</label><br>
        <input type="password" name="password_conf" id="password"><br>
        <br>
        <?php
            if(isset($alert) && $alert != null && $alert != ""){
                ?>
                    <div class="alert"><?php echo $alert ?></div><br><br>
                <?php
            }
        ?>
        <input type="submit" name="Change password">
    </form>
</div>