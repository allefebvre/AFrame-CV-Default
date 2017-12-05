<?php

/**
 * Check if a parameter have already a section
 * @param string $section
 */
function checkSection(string $section = NULL) {
    switch ($section) {
        case NULL:
            echo "<option>Informations
                      <option>Education
                      <option>Work Experience
                      <option>Skills
                      <option>Diverse";
            break;
        case "Informations" :
            echo "<option selected>Informations
                      <option>Education
                      <option>Work Experience
                      <option>Skills
                      <option>Diverse";
            break;
        case "Education" :
            echo "<option>Informations
                      <option selected>Education
                      <option>Work Experience
                      <option>Skills
                      <option>Diverse";
            break;
        case "Work Experience" :
            echo "<option>Informations
                      <option>Education
                      <option selected>Work Experience
                      <option>Skills
                      <option>Diverse";
            break;
        case "Skills" :
            echo "<option>Informations
                      <option>Education
                      <option>Work Experience
                      <option selected>Skills
                      <option>Diverse";
            break;
        case "Diverse" :
            echo "<option>Informations
                      <option>Education
                      <option>Work Experience
                      <option>Skills
                      <option selected>Diverse";
            break;
    }
}
?>


<script type="text/javascript">
    var onActionCheckbox = function (el) {
        el.parentNode.children[3].disabled = !el.checked;
        el.parentNode.children[4].children[0].disabled = !el.checked;
    }
</script>


<aside class="parameters">
    <div>
        <h1>Parameters</h1>
        <h3>Display plane :</h3>
        <?php
        $parameters = ModelParameter::getAllParameter();
        $divers = [];
        ?>
        <form method="post">
            <ul class="listParam">
                <?php
                foreach ($parameters as $parameter) {
                    $str = $parameter->getName();
                    switch ($str) {
                        case "Publications" :
                            break;
                        case "obj3D" :
                        case "spotlight" :
                        case "light" :
                        case "fly" :
                        case "door" :
                            $divers[$parameter->getName()] = $parameter->getDisplay();
                            break;
                        default :
                            $id = $parameter->getId();
                            $name = $parameter->getName();
                            $section = $parameter->getSection();
                            $scroll = $parameter->getScroll();

                            if ($parameter->getDisplay() === "TRUE") {
                                ?>
                                <li>
                                    <input onchange="onActionCheckbox(this)" name="planes[]" id="<?php echo $name; ?>" type="checkbox" value="<?php echo $id; ?>" checked>
                                    <div class="checkButton"></div>
                                    <div class="label1"><label for="<?php echo $name; ?>"><?php echo $name; ?></label></div>
                                    <select name="section<?php echo $name; ?>">
                                        <?php checkSection($section); ?>
                                    </select>
                                    <?php
                                    if ($scroll === "TRUE") {
                                        ?>
                                        <div>
                                            <input name="scroll[]" id="scroll<?php echo $name; ?>" type="checkbox" value="<?php echo $id; ?>" checked>
                                            <div class="checkButton"></div>
                                            <div><label class="label2" for="<?php echo "scroll$name"; ?>"></label></div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div>
                                            <input name="scroll[]" id="scroll<?php echo $name; ?>" type="checkbox" value="<?php echo $id; ?>">
                                            <div class="checkButton"></div>
                                            <div><label class="label2" for="<?php echo "scroll$name"; ?>"></label></div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li>
                                    <input onchange="onActionCheckbox(this)" name="planes[]" id="<?php echo $name; ?>" type="checkbox" value="<?php echo $id; ?>">
                                    <div class="checkButton"></div>
                                    <div class="label1"><label for="<?php echo $name; ?>"><?php echo $name; ?></label></div>
                                    <select name="section<?php echo $name; ?>" disabled>
                                        <?php checkSection($section); ?>
                                    </select>
                                    <div>
                                        <input name="scroll[]" id="scroll<?php echo $name; ?>" type="checkbox" value="<?php echo $id; ?>" disabled>
                                        <div class="checkButton"></div>
                                        <div><label class="label2" for="<?php echo "scroll$name"; ?>"></label></div>
                                    </div>

                                </li>
                                <?php
                            }
                    }
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
                        <div><label for = "radio_1">Yes</label></div>
                    </li>
                    <li>
                        <input type = "radio" name = "publications" id = "radio_2" value = "no">
                        <div class = "radioButton"></div>
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
                        <div><label for = "radio_1">Yes</label></div>
                    </li>
                    <li>
                        <input type = "radio" name = "publications" id = "radio_2" value = "no" checked>
                        <div class = "radioButton"></div>
                        <div><label for = "radio_2">No</label></div>
                    </li>
                </ul>
                <?php
            }
            ?>    

            <h3>Divers :</h3>
            <ul class="listParam">
                <li>
                    <input name="obj3D" id="obj3D" type="checkbox" value="obj3D" <?php if ($divers["obj3D"] == "TRUE") {
                echo "checked";
            } ?>>
                    <div class="checkButton"></div>
                    <div class="label1"><label for="obj3D">Display object 3D</label></div>
                </li>
                <li>
                    <input name="spotlight" id="spotlight" type="checkbox" value="spotlight" <?php if ($divers["spotlight"] == "TRUE") {
                echo "checked";
            } ?>>
                    <div class="checkButton"></div>
                    <div class="label1"><label for="spotlight">Display spotlight</label></div>
                </li>
                <li>
                    <input name="light" id="light" type="checkbox" value="light" <?php if ($divers["light"] == "TRUE") {
                echo "checked";
            } ?>>
                    <div class="checkButton"></div>
                    <div class="label1"><label for="light">Display light</label></div>
                </li>
                <li>
                    <input name="door" id="door" type="checkbox" value="door" <?php if ($divers["door"] == "TRUE") {
                echo "checked";
            } ?>>
                    <div class="checkButton"></div>
                    <div class="label1"><label for="door">Display door</label></div>
                </li>
            </ul>


            <div style="text-align: center">
                <input class="link" id="parametersSave" type="submit" value="Save">
                <input type="hidden" name="action" value="saveParameters">
            </div>
        </form>
        <div style="text-align: center">
            <div id="addData">
                <a href="admin.php?action=showData" class="link">Add Data</a>
            </div>
            <div id="logout">
                <a href="admin.php?action=logout" class="link">Logout</a>
            </div>
            <div id="changePassword">
                <a href="admin.php?action=changePassword" class="link">Change password</a>
            </div>
        </div>
    </div>
</aside>