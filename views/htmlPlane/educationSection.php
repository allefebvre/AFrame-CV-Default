<div id="targetEducation" class="section">
    <div>
        <h1>Education</h1>
        <?php
        echo "<table>";
        foreach($data['myEducation'] as $myEduc) {
            $date = $myEduc->getDate();
            $education = $myEduc->getEducation();
            echo "<tr>
                    <td class=\"leftPlane\"><b>$date</b></td>
                    <td class=\"rightPlane\">$education</td>
                  </tr>";
        }
        echo "</table>";
        ?>
    </div>
</div>
