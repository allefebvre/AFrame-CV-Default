<?php

/**
 * Check if a plane need scroll
 * @param array $data
 * @param int $nbRows
 * @return bool
 */
function checkScroll(array $data, int $nbRows) : bool {
    if(count($data) >= $nbRows) {
        return TRUE;
    } else {
        return FALSE;
    }
}

/**
 * Get the path of the file HTML and the target id of the div to display
 * @param string $section
 * @return array
 */
function getSectionToDisplay(string $section) :array{
    switch($section) {
        case "Informations" :
            return ["views/htmlPlane/infoSection.php", "targetInformation"];
            break;
        case "Education" :
            return ["views/htmlPlane/educationSection.php", "targetEducation"];
            break;
        case "Work Experience":
            return ["views/htmlPlane/workExpSection.php", "targetWorkPro"];
            break;
        case "Skills":
            return ["views/htmlPlane/skillSection.php", "targetSkill"];
            break;
        case "Diverse":
            return ["views/htmlPlane/diverseSection.php", "targetDiverse"];
            break;
    }
}

// Data for the headings
$data['myInformation'] = ModelInformation::getAllInformation();
$data['myEducation'] = ModelEducation::getAllEducation();
$data['myWorkExp'] = ModelWorkExp::getAllWorkExp();
$data['mySkills'] = ModelSkill::getAllSkills();
$data['diverse'] = ModelDiverse::getAllDiverse();

$managementPlane = new ManagementPlane();
$nbRows = 3;

$parameters = ModelParameter::getAllParameter();

// Add plane of headings
foreach($parameters as $parameter) {      
    if($parameter->getDisplay() === "FALSE" || $parameter->getName() === "Publications") {
        continue;
    }
    
    $sectionDisplay = getSectionToDisplay($parameter->getSection());
    
    switch($parameter->getName()) {
        case "Plane1" :
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], -19.3, 3.5, 0, 90, FALSE, "", 1.6);
            break;
        case "Plane2" : 
            $scroll = checkScroll($data['myEducation'], $nbRows);
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], 5, 2.5, 14.35, 180, $scroll, "");    
            break;
        case "Plane3" :
            $scroll = checkScroll($data['myWorkExp'], $nbRows);
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], -5, 2.5, 14.35, 180, $scroll, ""); 
            break;
        case "Plane4" :
            $scroll = checkScroll($data['mySkills'], $nbRows);
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], 5, 2.5, -14.35, 0, $scroll, "");
            break;
        case "Plane5" :
            $scroll = checkScroll($data['diverse'], 5);
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], -5, 2.5, -14.35, 0, $scroll, "");
            break;
    }     
}

$parameterPublication = ModelParameter::getParameterPublications();
if($parameterPublication->getDisplay() === "TRUE") {
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
}

//Middle room
//$managementPlane->addPlane("views/htmlPlane/infoSection.php", "targetInformation", 3.2, 2.5, 0, 90, FALSE, "");
//$managementPlane->addPlane("views/htmlPlane/educationSection.php", "targetEducation", -2, 2.5, -5.2, 180, $scroll, "");
//$managementPlane->addPlane("views/htmlPlane/workExpSection.php", "targetWorkPro", -2, 2.5, 5.2, 0, $scroll, "");
//$managementPlane->addPlane("views/htmlPlane/skillSection.php", "targetSkill", -7.1, 2.5, 0, -90, $scroll, "");

// Place the panels
$managementPlane->placeHTML($data);
?>
