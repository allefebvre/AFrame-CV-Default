<aside class="parameters">
    <div>
        <h1>Parameters</h1>
        <h3>Display plane :</h3>

        <?php
        $parameters = ModelParameter::getAllParameter();
        ?>
        <form method="post">
            <ul class="listParam">
                <?php
                $index = 0;
                foreach ($parameters as $parameter) {
                    if ($parameter->getName() === "Publications") {
                        continue;
                    }
                    $id = $parameter->getId();
                    $name = $parameter->getName();
                    if ($parameter->getDisplay() === "TRUE") {
                        ?>
                        <li>
                            <input name="planes[]" id="plane<?php echo $index; ?>" type="checkbox" value="<?php echo $id; ?>" checked>
                            <div class="checkButton"></div>
                            <div class="inside"></div>
                            <div><label for="plane<?php echo $index; ?>">Plane <?php echo $id; ?></label></div>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li>
                            <input name="planes[]" id="plane<?php echo $index; ?>" type="checkbox" value="<?php echo $id; ?>">
                            <div class="checkButton"></div>
                            <div class="inside"></div>
                            <div><label for="plane<?php echo $index; ?>">Plane <?php echo $id; ?></label></div>
                        </li>
                        <?php
                    }
                    $index ++;
                }
                ?>
            </ul>

            <h3>Display publications ?</h3>
                <?php
                $parameterPublication = ModelParameter::getParameterPublications();
                if ($parameterPublication->getDisplay() === "TRUE") {
                    ?>
                <ul class = "listParam">
                    <li>
                        <input type = "radio" name = "publications" id = "radio_1" value = "yes" checked>
                        <div class = "radioButton"></div>
                        <div class = "inside"></div>
                        <div><label for = "radio_1">Yes</label></div>
                    </li>
                    <li>
                        <input type = "radio" name = "publications" id = "radio_2" value = "no">
                        <div class = "radioButton"></div>
                        <div class = "inside"></div>
                        <div><label for = "radio_2">No</label></div>
                    </li>
                </ul>
                <?php
            } else {
                ?>
                <ul class = "listParam">
                    <li>
                        <input type = "radio" name = "publications" id = "radio_1" value = "yes">
                        <div class = "radioButton"></div>
                        <div class = "inside"></div>
                        <div><label for = "radio_1">Yes</label></div>
                    </li>
                    <li>
                        <input type = "radio" name = "publications" id = "radio_2" value = "no" checked>
                        <div class = "radioButton"></div>
                        <div class = "inside"></div>
                        <div><label for = "radio_2">No</label></div>
                    </li>
                </ul>
                <?php
            }
            ?>    

            <div class="links">
                <input class="link" id="parametersSave" type="submit" value="Save">
                <input type="hidden" name="action" value="saveParameters">
            </div>
        </form>
        <div style="text-align: center">
            <a id="addData" href="views/insertInDatabase.php"><button class="link">Add Data</button></a>
        </div>
        
    </div>
</aside>