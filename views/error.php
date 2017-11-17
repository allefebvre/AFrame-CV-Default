<h1>ERROR !</h1>
<?php
if (isset($dataError)) {
    foreach ($dataError as $valueError) {
        $error = $valueError[0];
        echo "<h3>$error</h3>";
        $message = $valueError[1];
        echo "<p>$message</p>";
    }
}
?>
