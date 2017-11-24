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

// Data for the headings
$data['myInformation'] = ModelInformation::getAllInformation();
$data['myEducation'] = ModelEducation::getAllEducation();
$data['myWorkExp'] = ModelWorkExp::getAllWorkExp();
$data['mySkills'] = ModelSkill::getAllSkills();
$data['diverse'] = ModelDiverse::getAllDiverse();

$managementPlane = new ManagementPlane();
$nbRows = 3;

$parameters = ModelParameter::getAllParameter();


foreach($parameters as $parameter) {
    // Add plane of headings
    
    if($parameter->getName() === "Plane1" && $parameter->getDisplay() === "TRUE") {
        $managementPlane->addPlane("views/htmlPlane/infoSection.php", "targetInformation", -19.3, 3.5, 0, 90, FALSE,"", 1.6);
        //$managementPlane->addPlane("views/htmlPlane/infoSection.php", "targetInformation", 3.2, 2.5, 0, 90, FALSE, "");
    }
    
    if($parameter->getName() === "Plane2" && $parameter->getDisplay() === "TRUE") {
        $scroll = checkScroll($data['myEducation'], $nbRows);
        $managementPlane->addPlane("views/htmlPlane/educationSection.php", "targetEducation", 5, 2.5, 14.35, 180, $scroll,"");
        //$managementPlane->addPlane("views/htmlPlane/educationSection.php", "targetEducation", -2, 2.5, -5.2, 180, $scroll, "");
    }
    
    if($parameter->getName() === "Plane3" && $parameter->getDisplay() === "TRUE") {
        $scroll = checkScroll($data['myWorkExp'], $nbRows);
        $managementPlane->addPlane("views/htmlPlane/workExpSection.php", "targetWorkPro", -5, 2.5, 14.35, 180, $scroll,"");
        //$managementPlane->addPlane("views/htmlPlane/workExpSection.php", "targetWorkPro", -2, 2.5, 5.2, 0, $scroll, "");
    }
    
    if($parameter->getName() === "Plane4" && $parameter->getDisplay() === "TRUE") {
        $scroll = checkScroll($data['mySkills'], $nbRows);
        $managementPlane->addPlane("views/htmlPlane/skillSection.php", "targetSkill", 5, 2.5, -14.35, 0, $scroll,"");
        //$managementPlane->addPlane("views/htmlPlane/skillSection.php", "targetSkill", -7.1, 2.5, 0, -90, $scroll, "");
    }
    
    if($parameter->getName() === "Plane5" && $parameter->getDisplay() === "TRUE") {
        $scroll = checkScroll($data['diverse'], 5);
        $managementPlane->addPlane("views/htmlPlane/diverseSection.php", "targetDiverse", -5, 2.5, -14.35, 0, $scroll,"");
    }

    if($parameter->getName() === "Publications" && $parameter->getDisplay() === "TRUE") {
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
}
?>
