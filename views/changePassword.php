<div class="changePassword">
    <div class="titleBar">
        <a href="admin.php"><button id="backButton">&#10229; Back</button></a>
        <div class="title">
            <h2>Change password :</h2> 
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
        <input type="submit" name="Change password" value="GO">
    </form>
</div>