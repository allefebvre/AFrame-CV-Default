<?php

/**
 * Check if a parameter have already a section
 * @param string $sectionTitle
 * @return string
 */
function checkSection(string $sectionTitle = NULL) :string {
    $sections = ModelSection::getAllSections();
    $titles = array();
    foreach($sections as $section) {
        $titles[] = $section->getTitle();
    }
    $toReturn = "";
    foreach($titles as $title) {
        if ($sectionTitle === $title) {
            $toReturn .= "<option selected>$title";
        } else {
            $toReturn .= "<option>$title";
        }
    }
    
    return $toReturn;
}
?>


<script>
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
                <li>
                    <div class="label1"><label class="label_Plane"><b>Plane</b></label></div>
                    <label class="label_Contained"><b>Contained</b></label>


                    <div><label class="label_Scroll"><b>Scroll</b></label></div>
                </li>

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
                                        <?php echo checkSection($section); ?>
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
                                        <?php echo checkSection($section); ?>
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
                    <input name="obj3D" id="obj3D" type="checkbox" value="obj3D" <?php
                    if ($divers["obj3D"] == "TRUE") {
                        echo "checked";
                    }
                    ?>>
                    <div class="checkButton"></div>
                    <div class="label1"><label for="obj3D">Display object 3D</label></div>
                </li>
                <li>
                    <input name="spotlight" id="spotlight" type="checkbox" value="spotlight" <?php
                    if ($divers["spotlight"] == "TRUE") {
                        echo "checked";
                    }
                    ?>>
                    <div class="checkButton"></div>
                    <div class="label1"><label for="spotlight">Display spotlight</label></div>
                </li>
                <li>
                    <input name="light" id="light" type="checkbox" value="light" <?php
                    if ($divers["light"] == "TRUE") {
                        echo "checked";
                    }
                    ?>>
                    <div class="checkButton"></div>
                    <div class="label1"><label for="light">Display light</label></div>
                </li>
                <li>
                    <input name="door" id="door" type="checkbox" value="door" <?php
                    if ($divers["door"] == "TRUE") {
                        echo "checked";
                    }
                    ?>>
                    <div class="checkButton"></div>
                    <div class="label1"><label for="door">Display door</label></div>
                </li>
            </ul>


            <div style="text-align: center">
                <input class="link" id="parametersSave" type="submit" value="Save">
                <input type="hidden" name="action" value="saveParameters">
            </div>
        </form>
        <br>
        <div>
            <div id="addData"><a href="admin.php?action=showData" class="link">Add Data</a><div>
            <br><br><br><br>
            <div id="account">
                <a id="logout" href="admin.php?action=logout" class="link">Logout</a>
                <a id="changePassword" href="admin.php?action=changePassword" class="link">Change password</a>
            </div>
        </div>
    </div>
</aside>