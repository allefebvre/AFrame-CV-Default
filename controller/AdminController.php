<?php

class AdminController {

    /**
     * Controller of administrator
     * @global string $dir
     * @global array $views
     */
    public function __construct($action) {
        global $dir, $views;
        $dataError = array();

        try {
            switch ($action) {
                case null:
                    $this->displayParametersAnd3DEnvironment();
                    break;
                case "saveParameters" :
                    $this->saveParameters();
                    break;
                case "showData" :
                    $this->showData();
                    break;
                case "showTable" :
                    $this->showTable();
                    break;
                case "showLine" :
                    $this->showLine();
                    break;
                case "updateConference" :
                    $this->updateConference();
                    break;
                case "updateDiverse" :
                    $this->updateDiverse();
                    break;
                case "updateEducation" :
                    $this->updateEducation();
                    break;
                case "updateInformation" :
                    $this->updateInformation();
                    break;
                case "updateJournal" :
                    $this->updateJournal();
                    break;
                case "updateOther" :
                    $this->updateOther();
                    break;
                case "updateSkill" :
                    $this->updateSkill();
                    break;
                case "updateWorkExp" :
                    $this->updateWorkExp();
                    break;
                
            }
        } catch (PDOException $e) {
            $dataError[] = ["Database error !", $e->getMessage()];
            require ($dir . $views['error']);
        } catch (Exception $e2) {
            $dataError[] = ["Unexpected error !", $e2->getMessage()];
            require ($dir . $views['error']);
        }
    }

    /**
     * Display parameters and the 3D environment 
     * @global string $dir
     * @global array $views
     */
    public function displayParametersAnd3DEnvironment() {
        global $dir, $views;
        require_once ($dir . $views['homeAdmin']);
    }

    /**
     * Save parameters in database and refresh the homeAdmin page
     * @global string $dir
     * @global array $views
     */
    public function saveParameters() {
        global $dir, $views;

        $parameters = ModelParameter::getAllParameter();

        foreach($parameters as $parameter) {
            if($parameter->getName() === "Publications") {
                if($_POST['publications'] === "yes") {
                    ModelParameter::updateParameterDisplay($parameter->getId(), "TRUE", NULL);
                } else {
                    ModelParameter::updateParameterDisplay($parameter->getId(), "FALSE", NULL);
                }
                continue;
            }

            $display = "FALSE";
            foreach ($_POST['planes'] as $plane) {
                if ($plane == $parameter->getId()) {
                    $display = "TRUE";
                    break;
                }
            }
            $section = $_POST['section'.$parameter->getName()];
            ModelParameter::updateParameterDisplay($parameter->getId(), $display, $section);
        }
        
        $this->displayParametersAnd3DEnvironment();
    }

    /**
     * 
     * @global string $dir
     * @global array $views
     */
    public function showData() {
        global $dir, $views;
        require $dir . $views['insertInDB'];
    }

    /**
     * 
     * @global string $dir
     * @global array $views
     */
    public function showTable() {
        global $dir, $views;
        require $dir . $views['defaultTable'];
    }

    /**
     * 
     * @global string $dir
     * @global array $views
     */
    public function showLine() {
        global $dir, $views;
        require $dir . $views['updateDefaultData'];
    }

    /**
     * 
     */
    public function updateConference() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $reference = Validation::cleanString($_POST['reference']);
        $authors = Validation::cleanString($_POST['authors']);
        $title = Validation::cleanString($_POST['title']);
        $date = Validation::cleanString($_POST['date']);
        $journal = Validation::cleanString($_POST['journal']);
        $volume = Validation::cleanString($_POST['volume']);
        $number = Validation::cleanString($_POST['number']);
        $pages = Validation::cleanString($_POST['pages']);
        $note = Validation::cleanString($_POST['note']);
        $abstract = Validation::cleanString($_POST['abstract']);
        $keywords = Validation::cleanString($_POST['keywords']);
        $series = Validation::cleanString($_POST['series']);
        $localite = Validation::cleanString($_POST['localite']);
        $publisher = Validation::cleanString($_POST['publisher']);
        $editor = Validation::cleanString($_POST['editor']);
        $pdf = Validation::cleanString($_POST['pdf']);
        $date_display = Validation::cleanString($_POST['date_display']);
        $category_id = Validation::cleanString($_POST['categorie_id']);
        
        ModelConference::updateById($id, $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
        $this->showData();
    }
    /**
     * 
     */
    public function updateDiverse() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $diverse = Validation::cleanString($_POST['diverse']);

        ModelDiverse::updateById($id, $diverse);
        
        $this->showData();
    }
    /**
     * 
     */
    public function updateEducation() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $date = Validation::cleanString($_POST['date']);
        $education = Validation::cleanString($_POST['education']);
        
        ModelEducation::updateById($id, $date, $education);
        $this->showData();
    }
    /**
     * 
     */
    public function updateInformation() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $status = Validation::cleanString($_POST['status']);
        $name = Validation::cleanString($_POST['name']);
        $firstName = Validation::cleanString($_POST['firstName']);
        $photo = Validation::cleanString($_POST['photo']);
        $age = Validation::cleanString($_POST['age']);
        $address = Validation::cleanString($_POST['address']);
        $phone = Validation::cleanString($_POST['phone']);
        $mail = Validation::cleanString($_POST['mail']);
        
        ModelInformation::updateById($id, $status, $name, $firstName, $photo, $age, $address, $phone, $mail);
        $this->showData();
    }
    /**
     * 
     */
    public function updateJournal() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $reference = Validation::cleanString($_POST['reference']);
        $authors = Validation::cleanString($_POST['authors']);
        $title = Validation::cleanString($_POST['title']);
        $date = Validation::cleanString($_POST['date']);
        $journal = Validation::cleanString($_POST['journal']);
        $volume = Validation::cleanString($_POST['volume']);
        $number = Validation::cleanString($_POST['number']);
        $pages = Validation::cleanString($_POST['pages']);
        $note = Validation::cleanString($_POST['note']);
        $abstract = Validation::cleanString($_POST['abstract']);
        $keywords = Validation::cleanString($_POST['keywords']);
        $series = Validation::cleanString($_POST['series']);
        $localite = Validation::cleanString($_POST['localite']);
        $publisher = Validation::cleanString($_POST['publisher']);
        $editor = Validation::cleanString($_POST['editor']);
        $pdf = Validation::cleanString($_POST['pdf']);
        $date_display = Validation::cleanString($_POST['date_display']);
        $category_id = Validation::cleanString($_POST['categorie_id']);
        
        ModelJournal::updateById($id, $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
        $this->showData();
    }
    /**
     * 
     */
    public function updateOther() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $reference = Validation::cleanString($_POST['reference']);
        $authors = Validation::cleanString($_POST['authors']);
        $title = Validation::cleanString($_POST['title']);
        $date = Validation::cleanString($_POST['date']);
        $journal = Validation::cleanString($_POST['journal']);
        $volume = Validation::cleanString($_POST['volume']);
        $number = Validation::cleanString($_POST['number']);
        $pages = Validation::cleanString($_POST['pages']);
        $note = Validation::cleanString($_POST['note']);
        $abstract = Validation::cleanString($_POST['abstract']);
        $keywords = Validation::cleanString($_POST['keywords']);
        $series = Validation::cleanString($_POST['series']);
        $localite = Validation::cleanString($_POST['localite']);
        $publisher = Validation::cleanString($_POST['publisher']);
        $editor = Validation::cleanString($_POST['editor']);
        $pdf = Validation::cleanString($_POST['pdf']);
        $date_display = Validation::cleanString($_POST['date_display']);
        $category_id = Validation::cleanString($_POST['categorie_id']);
        
        ModelJournal::updateById($id, $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
        $this->showData();
    }
    /**
     * 
     */
    public function updateSkill() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $category = Validation::cleanString($_POST['category']);
        $details = Validation::cleanString($_POST['details']);
        
        ModelSkill::updateById($id, $category, $details);
        $this->showData();
    }
    /**
     * 
     */
    public function updateWorkExp() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $date = Validation::cleanString($_POST['date']);
        $workExp = Validation::cleanString($_POST['workExp']);
        
        ModelWorkExp::updateById($id, $date, $workExp);
        $this->showData();
    }

}

?>
