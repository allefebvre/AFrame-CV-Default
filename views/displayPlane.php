<?php


// Data for the headings
$data['myInformation'] = ModelInformation::getAllInformation();
$data['myEducation'] = ModelEducation::getAllEducation();
$data['myWorkExp'] = ModelWorkExp::getAllWorkExp();
$data['mySkills'] = ModelSkill::getAllSkills();
$data['diverse'] = ModelDiverse::getAllDiverse();

$managementPlane = new ManagementPlane();
$nbRows = 3;


// Add plane of headings
$managementPlane->addPlane("views/htmlPlane/infoSection.php", "targetInformation", 3.2, 2.5, 0, 90, FALSE, "");

if (count($data['myEducation']) >= $nbRows) {
    $scroll = TRUE;
} else {
    $scroll = FALSE;
}
$managementPlane->addPlane("views/htmlPlane/educationSection.php", "targetEducation", -2, 2.5, -5.2, 180, $scroll, "");

if (count($data['myWorkExp']) >= $nbRows) {
    $scroll = TRUE;
} else {
    $scroll = FALSE;
}
$managementPlane->addPlane("views/htmlPlane/workExpSection.php", "targetWorkPro", -2, 2.5, 5.2, 0, $scroll, "");

if (count($data['mySkills']) >= $nbRows) {
    $scroll = TRUE;
} else {
    $scroll = FALSE;
}
$managementPlane->addPlane("views/htmlPlane/skillSection.php", "targetSkill", -7.1, 2.5, 0, -90, $scroll, "");

$managementPlane->addPlane("views/htmlPlane/diverseSection.php", "targetDiverse", -19.3, 2.5, 0, 90, FALSE,"");


// Data for publication
$data['conferences'] = ModelConference::getAllConferences();
$data['journals'] = ModelJournal::getAllJournals();
$data['others'] = ModelOther::getAllOthers();
$data['byDates'] = ModelByDate::getAllByDates();

// Add publication panel
$managementPlane->addPlane("views/htmlPlane/conferences.php", "targetConferences", -10.24, 7.6, 1, 90, FALSE, "go-pdf-conferences");
$managementPlane->addPlane("views/htmlPlane/journals.php", "targetJournals", -10.24, 7.6, -9, 90, FALSE, "go-pdf-journals");
$managementPlane->addPlane("views/htmlPlane/others.php", "targetOthers", 6.89, 7.6, 1, -90, FALSE, "go-pdf-others");
$managementPlane->addPlane("views/htmlPlane/byDates.php", "targetDates", 6.89, 7.6, -9, -90, TRUE, "go-pdf");

// Place the panels
$managementPlane->placeHTML($data);
?>
