<?php
// Data for the headings
$data['menus'] = ModelMenu::getAllActiveMenus();
$data['rubriques'] = array();
foreach($data['menus'] as $menu) {
    $data['rubriques'][] = ModelRubrique::getRubriqueByMenuId($menu->getId());
}

$managementPlane = new ManagementPlane();

for ($index=0 ; $index<count($data['rubriques']) ; $index++) {
    $rubrique = $data['rubriques'][$index];
    switch($index) {
        case 0: //Front
            $managementPlane->addPlane("views/htmlPlane/rubriquePlane.php", "rubrique".$rubrique->getId(), -19.3, 3.5, 0, 90, FALSE, "", 1.6);
            break;
        case 1: //Left1
            $managementPlane->addPlane("views/htmlPlane/rubriquePlane.php", "rubrique".$rubrique->getId(), 5, 2.5, 14.35, 180, TRUE, "");
            break;
        case 2: //Left2
            $managementPlane->addPlane("views/htmlPlane/rubriquePlane.php", "rubrique".$rubrique->getId(), -5, 2.5, 14.35, 180, TRUE, "");
            break;
        case 3: //Right1
            $managementPlane->addPlane("views/htmlPlane/rubriquePlane.php", "rubrique".$rubrique->getId(), 5, 2.5, -14.35, 0, TRUE, "");
            break;
        case 4: //Right2
            $managementPlane->addPlane("views/htmlPlane/rubriquePlane.php", "rubrique".$rubrique->getId(), -5, 2.5, -14.35, 0, FALSE, "");
            break;
    }
}

// Data for publication
$data['conferences'] = ModelPublication::getAllConferences();
$data['journals'] = ModelPublication::getAllJournals();
$data['documentation'] = ModelPublication::getAllDocumentation();
$data['thesis'] = ModelPublication::getAllThesis();
$data['miscellaneous'] = ModelPublication::getAllMiscellaneous();
$data['byDates'] = ModelPublication::getAllPublication();

// Add publication panel 
$managementPlane->addPlane("views/htmlPlane/journals.php", "targetJournals", -10.24, 7.6, -9, 90, TRUE, "go-pdf-journals");
$managementPlane->addPlane("views/htmlPlane/conferences.php", "targetConferences", -10.24, 7.6, 1, 90, TRUE, "go-pdf-conferences");
$managementPlane->addPlane("views/htmlPlane/miscellaneous.php", "targetMiscellaneous", 6.89 , 7.6, 1, -90, TRUE, "go-pdf-others");
$managementPlane->addPlane("views/htmlPlane/byDates.php", "targetDates", 6.89, 7.6, -9, -90, TRUE, "go-pdf");  
$managementPlane->addPlane("views/htmlPlane/documentation.php", "targetDocumentation", -1.656, 7.6, -3, -90, TRUE, "go-pdf-others");
$managementPlane->addPlane("views/htmlPlane/thesis.php", "targetThesis", -1.548, 7.6, -3, 90, TRUE, "go-pdf-others");

// Place the panels
$managementPlane->placeHTML($data);
?>
