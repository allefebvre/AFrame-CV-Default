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

    public function showData() {
        global $dir, $views;
        require $dir . $views['insertInDB'];
    }

    public function showTable() {
        global $dir, $views;
        require $dir . $views['defaultTable'];
    }

    public function showLine() {
        global $dir, $views;
        require $dir . $views['updateDefaultData'];
    }

    public function updateConference() {
        $this->showData();
    }
    public function updateDiverse() {
        $this->showData();
    }
    public function updateEducation() {
        $this->showData();
    }
    public function updateInformation() {
        $this->showData();
    }
    public function updateJournal() {
        $this->showData();
    }
    public function updateOther() {
        $this->showData();
    }
    public function updateSkill() {
        $this->showData();
    }
    public function updateWorkExp() {
        $this->showData();
    }

}

?>
