<div id="targetDiverse" class="section">
    <div>
        <h1>Diverse</h1>
        <?php
        foreach($data['diverse'] as $diverse) {
            $div = $diverse->getDiverse();
            echo "<p>$div</p>";
        }
        ?>
    </div>
</div>