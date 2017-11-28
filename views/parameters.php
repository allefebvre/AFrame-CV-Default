<?php
    /**
     * Check if a parameter have already a section
     * @param string $section
     */
    function checkSection(string $section = NULL) {
        switch($section) {
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
    var onActionCheckbox = function(el){
        el.parentNode.children[3].disabled = !el.checked;
    }
</script>


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
                foreach ($parameters as $parameter) {
                    if ($parameter->getName() === "Publications") {
                        continue;
                    }
                    $id = $parameter->getId();
                    $name = $parameter->getName();
                    $section = $parameter->getSection();
                    if ($parameter->getDisplay() === "TRUE") {
                        ?>
                        <li>
                            <input onchange="onActionCheckbox(this)" name="planes[]" id="<?php echo $name; ?>" type="checkbox" value="<?php echo $id; ?>" checked>
                            <div class="checkButton"></div>
                            <div><label for="<?php echo $name; ?>"><?php echo $name; ?></label></div>
                            <select name="section<?php echo $name; ?>">
                                <?php checkSection($section); ?>
                            </select>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li>
                            <input onchange="onActionCheckbox(this)" name="planes[]" id="<?php echo $name; ?>" type="checkbox" value="<?php echo $id; ?>">
                            <div class="checkButton"></div>
                            <div><label for="<?php echo $name; ?>"><?php echo $name; ?></label></div>
                            <select name="section<?php echo $name; ?>" disabled>
                                <?php checkSection($section); ?>
                            </select>
                        </li>
                        <?php
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
            <div style="text-align: center">
                <input class="link" id="parametersSave" type="submit" value="Save">
                <input type="hidden" name="action" value="saveParameters">
            </div>
        </form>
        <div style="text-align: center">
            <a id="addData" href="admin.php?action=showData"><button class="link">Add Data</button></a>
        </div>
    </div>
</aside>