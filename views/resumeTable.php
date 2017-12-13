<div class="defaultTable">
    <div class="titleBarDefaultTable">
        <a href="admin.php?action=showData" id="backButton">&#10229; Back</a>
        <div class="title">
            <h2>Your <?php echo $sectionTitle; ?></h2>
        </div>
    </div>
    
    <form method="post">
        <table>
            <tr class="headTable">
                <td></td>
                <td></td>
                <?php
                
                for ($i = 0; $i < sizeof($data['tableHead']); $i++) {
                    $var = $data['tableHead'][$i][0];
                    if($var != "section_id") {
                        echo "<td>$var</td>";
                    }
                }
                ?>
            </tr>

            <?php
            $resumeId = $resume->getId();
            echo "<tr class=\"contentTable\">";
            echo "<td>"
                    . "<a href=\"admin.php?action=showLine&table=resume&id=$resumeId\">"
                        . "<div class=\"button\">Edit</div>"
                    . "</a>"
                    . "</td>"
                    . "<td>"
                    . "<a href=\"admin.php?action=deleteDefaultLine\">"
                        . "<div class=\"button\">Delete</div>"
                    . "</a>"
                . "</td>";
            echo $resume->toString();
            echo "</tr>";
            ?>
        </table>
        <?php
            echo "<div class = \"link\">"
                    . "<a id = \"InsertData\" href = \"admin.php?action=insertInBase\">"
                        . "<div class = \"link-div\">Insert</div>"
                    . "</a>"
                . "</div>";
        ?>
    </form>
</div>