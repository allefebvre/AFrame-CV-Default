<div id="targetSkill" class="section">
	<div>
		<h1>Skills</h1>
		<?php
		  echo "<table>";
		  foreach($data['mySkills'] as $skill) {
			$category = $skill->getCategory();
			$details = $skill->getDetails();
			echo "<tr>
				<td class=\"leftPlane\"><b>$category</b></td>
				<td class=\"rightPlane\">$details</td>
		              </tr>";
		  }
		  echo "</table>";
		?>
	</div>
</div>
