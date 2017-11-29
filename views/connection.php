<div class="connection">
    <h2>Connection :</h2>
    
    <form method="post" action="admin.php?action=login">
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
    </form>
</div>