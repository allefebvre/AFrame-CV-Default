<?php

class AdminController {

    /**
     * Controller of administrator
     * @global string $dir
     * @global array $views
     */
    public function __construct($action = null) {
        global $dir, $views;
        $dataError = array();

        try {

            if (!$this->verifySession() && $action != "login") {
                $this->connection();
            } else {
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
                    case "updatePublication" :
                        $this->updatePublication();
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
                    case "updateSkill" :
                        $this->updateSkill();
                        break;
                    case "updateWorkExp" :
                        $this->updateWorkExp();
                        break;
                    case "deleteDefaultLine" :
                        $this->deleteDefaultLine();
                        break;
                    case "insertInBase" :
                        $this->insertInBase();
                        break;
                    case "insertInPublication" :
                        $this->insertInPublication();
                        break;
                    case "insertInDiverse" :
                        $this->insertInDiverse();
                        break;
                    case "insertInEducation" :
                        $this->insertInEducation();
                        break;
                    case "insertInInformation" :
                        $this->insertInInformation();
                        break;
                    case "insertInSkill" :
                        $this->insertInSkill();
                        break;
                    case "insertInWorkExp" :
                        $this->insertInWorkExp();
                        break;
                    case "login" :
                        $this->login();
                        break;
                    case "logout" :
                        $this->logout();
                        break;
                    case "changePassword" :
                        $this->changePassword();
                        break;
                    case "changePassword2" :
                        $this->changePassword2();
                        break;
                }
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
     * Verify that token of connection is correct
     * @return bool
     */
    public function verifySession(): bool {
        $token = filter_input(INPUT_COOKIE, 'token', FILTER_SANITIZE_STRING);
        if ($token != "" && $token != null && $token != FALSE) {
            $login = new Login();
            return $login->verifyToken($token);
        } else {
            return FALSE;
        }
    }

    /**
     * Display connection page
     * @global string $dir
     * @global array $views
     * @param array $dViewError
     */
    public function connection(array $dViewError = NULL) {
        global $dir, $views;
        require_once ($dir . $views['connection']);
    }

    /**
     * Verify that login and password are correct 
     */
    public function login() {
        $login = Validation::cleanString($_POST['pseudo']);
        $password = Validation::cleanString($_POST['password']);
        
        $dViewError = array();
        $validate = Validation::loginValidation($login, $password, $dViewError);
        
        if($validate) {
            $this->displayParametersAnd3DEnvironment();
        } else {
            $this->connection($dViewError);
        }
    }

    /**
     * Logout the admin
     */
    public function logout() {
        setcookie("token", "", time() - 1);
        $login = new Login();
        $login->deleteToken();
        $this->connection();
    }

    /**
     * Display the change password page
     * @global string $dir
     * @global array $views
     * @param array $dViewError
     */
    public function changePassword(array $dViewError = NULL) {
        global $dir, $views;
        require_once ($dir . $views['changePassword']);
    }

    /**
     * Change password in Database
     * @global string $dir
     * @global array $views
     */
    public function changePassword2() {
        $password_old = Validation::cleanString($_POST['password_old']);
        $password = Validation::cleanString($_POST['password']);
        $password_conf = Validation::cleanString($_POST['password_conf']);

        $dViewError = array();
        $validate = Validation::changePasswordValidation($password_old, $password, $password_conf, $dViewError);
        
        if($validate) {
            $login = new Login();
            $login->changePassword($password);
            global $dir, $views;
            $msg = "Password changed";
            require_once ($dir . $views['info']);
        } else {
            $this->changePassword($dViewError);
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
     * Recover Data and update Parameter in Database
     */
    private function updateParametersDatabase() {
        $parameters = ModelParameter::getAllParameter();
        foreach ($parameters as $parameter) {
            switch ($parameter->getName()) {
                case "obj3D" :
                case "spotlight" :
                case "light" :
                case "door" :
                    $param = filter_input(INPUT_POST, $parameter->getName(), FILTER_SANITIZE_STRING);
                    ModelParameter::updateParameter($parameter->getId(), count($param) > 0 ? "TRUE" : "FALSE", NULL, "FALSE");
                    break;
                case "Publications" :
                    $param = filter_input(INPUT_POST, 'publications', FILTER_SANITIZE_STRING);
                    ModelParameter::updateParameter($parameter->getId(), $param === "yes" ? "TRUE" : "FALSE", NULL, "FALSE");
                    break;
                default :
                    $display = "FALSE";
                    if (isset($_POST['planes'])) {
                        foreach ($_POST['planes'] as $plane) {
                            if ($plane == $parameter->getId()) {
                                $display = "TRUE";
                                break;
                            }
                        }
                    }
                    $scroll = "FALSE";
                    $section = NULL;
                    if ($display === "TRUE") {
                        if (isset($_POST['scroll'])) {
                            foreach ($_POST['scroll'] as $s) {
                                if ($s == $parameter->getId()) {
                                    $scroll = "TRUE";
                                    break;
                                }
                            }
                        }
                        if (isset($_POST['section' . $parameter->getName()])) {
                            $section = $_POST['section' . $parameter->getName()];
                        }
                    }
                    ModelParameter::updateParameter($parameter->getId(), $display, $section, $scroll);
            }
        }
    }

    /**
     * Save parameters in database and refresh the homeAdmin page
     * @global string $dir
     * @global array $views
     */
    public function saveParameters() {
        global $dir, $views;
        $this->updateParametersDatabase();
        $this->displayParametersAnd3DEnvironment();
    }

    /**
     * Display all Tables  
     * @global string $dir
     * @global array $views
     */
    public function showData() {
        global $dir, $views;
        require $dir . $views['showTables'];
    }

    /**
     * Display selected Table
     * @global string $dir
     * @global array $views
     */
    public function showTable() {
        global $dir, $views;
        require $dir . $views['defaultTable'];
    }

    /**
     * Display a form to update a line
     * @global string $dir
     * @global array $views
     * @param array $dViewError
     */
    public function showLine(array $dViewError = NULL) {
        global $dir, $views;
        require $dir . $views['updateDefaultData'];
    }

    /* --- Update --- */

    /**
     * Get data and update Conference Table
     */
    public function updatePublication() {
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
        $category_id = Validation::cleanInt((int) $_POST['categorie_id']);
        
        $dViewError = array();
        $validate = Validation::publicationValidation($reference, $authors, $title, $date, $dViewError);

        if ($validate) {
            ModelPublication::updateById($id, $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
            $this->showTable();
        } else {
            $this->showLine($dViewError);
        }
    }

    /**
     * Get data and update Diverse Table
     */
    public function updateDiverse() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $diverse = Validation::cleanString($_POST['diverse']);
        
        $dViewError = array();
        $validate = Validation::diverseValidation($diverse, $dViewError);
        
        if ($validate) {
            ModelDiverse::updateById($id, $diverse);
            $this->showTable();
        } else {
            $this->showLine($dViewError);
        }
    }

    /**
     * Get data and update Education Table
     */
    public function updateEducation() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $date = Validation::cleanString($_POST['date']);
        $education = Validation::cleanString($_POST['education']);

        $dViewError = array();
        $validate = Validation::educationValidation($date, $education, $dViewError);
        
        if ($validate) {
            ModelEducation::updateById($id, $date, $education);
            $this->showTable();
        } else {
            $this->showLine($dViewError);
        }
    }

    /**
     * Get data and update Information Table
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
        $mail = Validation::cleanMail($_POST['mail']);
        
        $dViewError = array();
        $validate = Validation::informationValidation($status, $name, $firstName, $mail, $dViewError);
        
        if ($validate) {
            ModelInformation::updateById($id, $status, $name, $firstName, $photo, $age, $address, $phone, $mail);
            $this->showTable();
        } else {
            $this->showLine($dViewError);
        }
    }

    /**
     * Get data and update Skill Table
     */
    public function updateSkill() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $category = Validation::cleanString($_POST['category']);
        $details = Validation::cleanString($_POST['details']);  
        
        $dViewError = array();
        $validate = Validation::skillValidation($category, $details, $dViewError);
        
        if ($validate) {
            ModelSkill::updateById($id, $category, $details);
            $this->showTable();
        } else {
            $this->showLine($dViewError);
        }
    }

    /**
     * Get data and update Work Experience Table
     */
    public function updateWorkExp() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $date = Validation::cleanString($_POST['date']);
        $workExp = Validation::cleanString($_POST['workExp']); 
        
        $dViewError = array();
        $validate = Validation::workExpValidation($date, $workExp, $dViewError);
        
        if ($validate) {
            ModelWorkExp::updateById($id, $date, $workExp);
            $this->showTable();
        } else {
            $this->showLine($dViewError);
        }
    }

    /**
     * Get table and id to delete the line in Database
     */
    public function deleteDefaultLine() {
        $table = Validation::cleanString($_REQUEST['table']);
        $id = Validation::cleanInt($_REQUEST['id']);

        ModelDefaultTable::deleteDefaultLine($table, $id);
        $this->showTable();
    }

    /* --- Insert --- */

    /**
     * Display form to insert in Database of the selected Table
     * @global string $dir
     * @global array $views
     * @param array $dViewError
     * @param $reload
     */
    public function insertInBase(array $dViewError = NULL, $reload = NULL) {
        global $dir, $views;

        require $dir . $views['insertInBase'];
    }

    /**
     * Get data and insert in Conference Table
     */
    public function insertInPublication() {
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
        $category_id = Validation::cleanInt((int) $_POST['categorie_id']);

        $dViewError = array();
        $validate = Validation::publicationValidation($reference, $authors, $title, $date, $dViewError);
                
        if($validate) {
            ModelPublication::insert($reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
            $this->showTable();
        } else {
            $reload = new Publication(0, $reference, $authors, $title, "", $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
            $this->insertInBase($dViewError, $reload);
        }
    }

    /**
     * Get data and insert in Diverse Table
     */
    public function insertInDiverse() {
        $diverse = Validation::cleanString($_POST['diverse']);
   
        $dViewError = array();
        $validate = Validation::diverseValidation($diverse, $dViewError);
        
        if ($validate) {
            ModelDiverse::insert($diverse);
            $this->showTable();
        } else {
            $reload = new Diverse(0, $diverse);
            $this->insertInBase($dViewError, $reload);
        }
    }

    /**
     * Get data and insert in Education Table 
     */
    public function insertInEducation() {
        $date = Validation::cleanString($_POST['date']);
        $education = Validation::cleanString($_POST['education']);

        $dViewError = array();
        $validate = Validation::educationValidation($date, $education, $dViewError);
        
        if ($validate) {
            ModelEducation::insert($date, $education);
            $this->showTable();
        } else {
            $reload = new Education(0, $date, $education);
            $this->insertInBase($dViewError, $reload);
        }
    }

    /**
     * Get data and insert in Information Table 
     */
    public function insertInInformation() {
        $status = Validation::cleanString($_POST['status']);
        $name = Validation::cleanString($_POST['name']);
        $firstName = Validation::cleanString($_POST['firstName']);
        $photo = Validation::cleanString($_POST['photo']);
        $age = Validation::cleanString($_POST['age']);
        $address = Validation::cleanString($_POST['address']);
        $phone = Validation::cleanString($_POST['phone']);
        $mail = Validation::cleanMail($_POST['mail']);
        
        $dViewError = array();
        $validate = Validation::informationValidation($status, $name, $firstName, $mail, $dViewError);
        
        if ($validate) {
            ModelInformation::insert($status, $name, $firstName, $photo, $age, $address, $phone, $mail);
            $this->showTable();
        } else {
            $reload = new Information(0, $status, $name, $firstName, $photo, $age, $address, $phone, "");
            $this->insertInBase($dViewError, $reload);
        }
    }

    /**
     * Get data and insert in Skill Table 
     */
    public function insertInSkill() {
        $category = Validation::cleanString($_POST['category']);
        $details = Validation::cleanString($_POST['details']);
        
        $dViewError = array();
        $validate = Validation::skillValidation($category, $details, $dViewError);
        
        if ($validate) {
            ModelSkill::insert($category, $details);
            $this->showTable();
        } else {
            $reload = new Skill(0, $category, $details);
            $this->insertInBase($dViewError, $reload);
        }
    }

    /**
     * Get data and insert in Work Experience Table 
     */
    public function insertInWorkExp() {
        $date = Validation::cleanString($_POST['date']);
        $workExp = Validation::cleanString($_POST['workExp']);
        
        $dViewError = array();
        $validate = Validation::workExpValidation($date, $workExp, $dViewError);
        
        if ($validate) {
            ModelWorkExp::insert($date, $workExp);
            $this->showTable();
        } else {
            $reload = new WorkExp(0, $date, $workExp);
            $this->insertInBase($dViewError, $reload);
        }
    }
}

?>
