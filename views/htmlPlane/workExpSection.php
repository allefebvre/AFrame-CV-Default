<div id="targetWorkPro" class="section">
    <div>
        <h1>Work Experience</h1>
        <?php
        echo "<table>";
        foreach($data['myWorkExp'] as $myWorkExp) {
            $date = $myWorkExp->getDate();
            $workExp = $myWorkExp->getWorkExp();
            echo "<tr>
                    <td class=\"leftPlane\"><b>$date</b></td>
                    <td class=\"rightPlane\">$workExp</td>
                  </tr>";
        }
        echo "</table>";
        ?>
    </div>
</div>
