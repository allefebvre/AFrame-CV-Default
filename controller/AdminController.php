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
                    case "deleteDefaultLine" :
                        $this->deleteDefaultLine();
                        break;
                    case "insertInBase" :
                        $this->insertInBase();
                        break;
                    /* --- Publication's Actions : --- */
                    case "insertInPublication" :
                        $this->insertInPublication();
                        break;
                    case "updatePublication" :
                        $this->updatePublication();
                        break; 
                    /* --- Section's Actions : --- */
                    case "insertInSection" :
                        $this->insertInSection();
                        break;
                    case "updateSection" :
                        $this->updateSection();
                        break;
                    /* --- Account's Actions : --- */
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
                    /* --- Resume's Actions : --- */
                    case "showResume" :
                        $this->showResume();
                        break;
                    case "editResume" :
                        $this->editResume();
                        break;
                    case "updateResume" :
                        $this->updateResume();
                        break;
                    case "insertResume" : 
                        $this->insertResume();
                        break;
                    case "insertInResume" :
                        $this->insertInResume();
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

        if ($validate) {
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

        if ($validate) {
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
     * Display resume of selected Section
     * @global string $dir
     * @global array $views
     * @param string $sectionId
     * @param array $dViewError
     */
    public function showResume(string $sectionId = NULL, array $dViewError = NULL) {
        global $dir, $views;
        if(isset($_REQUEST['sectionId'])) {
            $sectionId = $_REQUEST['sectionId'];
        }
        $section = ModelSection::getSectionById($sectionId);
        $sectionTitle = $section->getTitle();
        $count = ModelResume::countResumeBySectionId($sectionId);
        if ($count > 0) {
            $resume = ModelResume::getResumeBySectionId($sectionId);
        }
        $data['tableHead'] = ModelDefaultTable::getAllDefaultTable('resume');
        
        require $dir . $views['resumeTable'];
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

    /**
     * Display a form to edit a row of Resume
     * @global string $dir
     * @global array $views
     * @param array $dViewError
     */
    public function editResume(array $dViewError = NULL) {
        global $dir, $views;
        $id = $_REQUEST['id'];
        $data = ModelResume::getResumeById($id);
        require $dir . $views['updateResume'];
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
     * Get data and update Section Table
     */
    public function updateSection() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $title = Validation::cleanString($_POST['title']);

        $dViewError = array();
        $validate = Validation::sectionValidation($title, $dViewError);

        if ($validate) {
            ModelSection::updateById($id, $title);
            $this->showTable();
        } else {
            $this->showLine($dViewError);
        }
    }
    
    /**
     * Get data and update Section Table
     */
    public function updateResume() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $content = $_POST['content'];

        $dViewError = array();
        $validate = Validation::resumeValidation($content, $dViewError);

        if ($validate) {
            ModelResume::updateById($id, $content);
            $resume = ModelResume::getResumeById($id);
            $this->showResume($resume->getSectionId());
        } else {
            $this->editResume($dViewError);
        }
    }

    /**
     * Get table and id to delete the line in Database
     */
    public function deleteDefaultLine() {
        $table = Validation::cleanString($_REQUEST['table']);
        $id = Validation::cleanInt($_REQUEST['id']);

        switch ($table) {
            case "Conferences":
            case "Journals":
            case "Documentations":
            case "Thesis":
            case "Miscellaneous":
                $table = "Publication";
                break;
        }
        
        if($table == "resume") {
            $sectionId = ModelResume::getResumeById($id)->getSectionId();
            ModelDefaultTable::deleteDefaultLine($table, $id);
            $this->showResume($sectionId);
        }
        else {
            ModelDefaultTable::deleteDefaultLine($table, $id);
            $this->showTable();
        }
    }

    /* --- Insert --- */

    /**
     * Display form to insert in Database a Resume
     * @global string $dir
     * @global array $views
     * @param array $dViewError
     * @param $reload
     */
    public function insertResume(array $dViewError = NULL, $reload = NULL) {
        global $dir, $views;
        $id = $_REQUEST['id'];
        $count = ModelResume::countResumeBySectionId($id);
        if($count === 0) {
            $section = ModelSection::getSectionById($id);
            $data = new Resume(0, "", "", "", $id);
            require $dir . $views['insertResume'];
        } else {
            $this->showResume($id, array("You have already a row !"));
        }
    }
    
    /**
     * Get data and insert in Resume Table
     */
    public function insertInResume() {
        $sectionId = $_POST['sectionId'];
        $content = $_POST['content'];

        $dViewError = array();
        $validate = Validation::resumeValidation($content, $dViewError);
        
        if ($validate) {
            ModelResume::insert($content, $sectionId);
            $this->showResume($sectionId);
        } else {
            $reload = new Resume(0, "", "", $content, $sectionId);
            $this->insertResume($dViewError, $reload);
        }
    }
    
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

        if ($validate) {
            ModelPublication::insert($reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
            $this->showTable();
        } else {
            $reload = new Publication(0, $reference, $authors, $title, "", $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
            $this->insertInBase($dViewError, $reload);
        }
    }

    /**
     * Get data and insert in Section Table 
     */
    public function insertInSection() {
        $title = Validation::cleanString($_POST['title']);

        $dViewError = array();
        $validate = Validation::sectionValidation($title, $dViewError);

        if ($validate) {
            ModelSection::insert($title);
            $this->showTable();
        } else {
            $reload = new Section(0, $title);
            $this->insertInBase($dViewError, $reload);
        }
    }
}

?>
