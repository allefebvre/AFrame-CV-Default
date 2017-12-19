<?php
/**
 * Get the path of the file HTML and the target id of the div to display
 * @param string $section
 * @return array
 */
function getSectionToDisplay(string $section = NULL) :array{
    switch($section) {
        case NULL:
            return["", ""];
            break;
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

$obj3D = FALSE;
$spotlight = FALSE;
$light = FALSE;
$door = FALSE;

// Add plane of headings
foreach($parameters as $parameter) {      
    if($parameter->getDisplay() === "FALSE" || $parameter->getName() === "Publications") {
        continue;
    }
    
    $sectionDisplay = getSectionToDisplay($parameter->getSection());
    $scroll = filter_var($parameter->getScroll(), FILTER_VALIDATE_BOOLEAN);
    switch($parameter->getName()) {
        case "Front" :
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], -19.3, 3.5, 0, 90, $scroll, "", 1.6);
            break;
        case "Left1" : 
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], 5, 2.5, 14.35, 180, $scroll, "");    
            break;
        case "Left2" :
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], -5, 2.5, 14.35, 180, $scroll, ""); 
            break;
        case "Right1" :
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], 5, 2.5, -14.35, 0, $scroll, "");
            break;
        case "Right2" :
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], -5, 2.5, -14.35, 0, $scroll, "");
            break;
        case "Middle1" :
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], 3.2, 2.5, 0, 90, $scroll, "");
            break;
        case "Middle2" :
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], -2, 2.5, -5.2, 180, $scroll, "");
            break;
        case "Middle3" :    
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], -2, 2.5, 5.2, 0, $scroll, "");
            break;
        case "Middle4" :    
            $managementPlane->addPlane($sectionDisplay[0], $sectionDisplay[1], -7.1, 2.5, 0, -90, $scroll, "");
            break;
        case "obj3D" :
            $obj3D = TRUE;
            break;
        case "light" :
            $light = TRUE;
            break;
        case "spotlight" :
            $spotlight = TRUE;
            break;
        case "door" :
            $door = TRUE;
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

// Place the panels
$managementPlane->placeHTML($data);
?>
