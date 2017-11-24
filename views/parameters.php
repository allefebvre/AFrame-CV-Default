<aside class="parameters">
    <div id="parametersContent">
        <h1>Parameters</h1>
        <h3>Display plane :</h3>
        <?php
        $parameters = ModelParameter::getAllParameter();
        ?>
        <form method="post">
            <table>
                <?php
                foreach($parameters as $parameter) {
                    if($parameter->getName() === "Publications") { continue; }
                    $id = $parameter->getId();
                    $name = $parameter->getName();
                    echo "<tr>";
                    if($parameter->getDisplay() === "TRUE") {
                        echo "<td><input name=\"planes[]\" type=\"checkbox\" value=\"$id\" checked></td>";
                    } else {
                        echo "<td><input name=\"planes[]\" type=\"checkbox\" value=\"$id\"></td>";
                    }
                    echo "<td>$name</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <h3>Display publications ?</h3>
            <p id="pRadioInput">
                <?php
                $parameterPublication = ModelParameter::getParameterPublications();
                if($parameterPublication->getDisplay() === "TRUE") {
                    echo "<input type=\"radio\" name=\"publications\" value=\"yes\" checked> Yes<br>";
                    echo "<input type=\"radio\" name=\"publications\" value=\"no\"> No<br>";
                } else {
                    echo "<input type=\"radio\" name=\"publications\" value=\"yes\"> Yes<br>";
                    echo "<input type=\"radio\" name=\"publications\" value=\"no\" checked> No<br>";
                }
                ?>    
            </p>
            <p class="button-parameter">
                <input id="parametersSave" type="submit" value="Save">
            </p>
            <input type="hidden" name="action" value="saveParameters">
        </form>
        <p class="button-parameter">
            <a id="addData" href="views/insertInDatabase.php">Add Data</a>
        </p>
    </div>
</aside>

