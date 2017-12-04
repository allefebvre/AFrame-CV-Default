<div class="connection">
    <div class="titleBar">
        <a href="index.php"><button id="backButton">&#10229; Back</button></a>
        <div class="title">
            <h2>Connection :</h2>
        </div>
    </div>
    
    <form method="post" action="admin.php">
        <label for="pseudo">Pseudo :</label><br>
        <input type="text" name="pseudo" id="pseudo"><br>
        <br>
        <label for="password">Password :</label><br>
        <input type="password" name="password" id="password"><br>
        <br>
        <?php
            if(isset($alert) && $alert != null && $alert != ""){
                ?>
                    <div class="alert"><?php echo $alert ?></div><br><br>
                <?php
            }
        ?>

        <input type="submit" name="Login">
        <input type="hidden" name="action" value="login">
    </form>
</div>