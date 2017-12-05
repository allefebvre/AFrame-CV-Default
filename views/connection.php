<div class="connection">
    <div class="titleBar">
        <a href="index.php" id="backButton">&#10229; Back</a>
        <div class="title">
            <h2>Connection :</h2>
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
    <form method="post" action="admin.php">
        <label for="pseudo">Pseudo :</label><br>
        <input type="text" name="pseudo" id="pseudo"><br>
        <br>
        <label for="password">Password :</label><br>
        <input type="password" name="password" id="password"><br>
        <br>
        <input type="submit" name="Login" value="Login">
        <input type="hidden" name="action" value="login">
    </form>
</div>