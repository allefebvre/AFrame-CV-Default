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
                    case "deleteDefaultLine" :
                        $this->deleteDefaultLine();
                        break;
                    case "insertInBase" :
                        $this->insertInBase();
                        break;
                    case "insertInConference" :
                        $this->insertInConference();
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
                    case "insertInJournal" :
                        $this->insertInJournal();
                        break;
                    case "insertInOther" :
                        $this->insertInOther();
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

    public function verifySession(): bool {
        $token = filter_input(INPUT_COOKIE, 'token', FILTER_SANITIZE_STRING);
        if ($token != "" && $token != null && $token != FALSE) {
            $login = new Login();
            return $login->verifyToken($token);
        } else {
            return FALSE;
        }
    }

    public function connection(string $alert = "") {
        global $dir, $views;
        require_once ($dir . $views['connection']);
    }

    public function login() {
        $login = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if ($login != null && $login != "" && $password != null && $password != "") {
            $login2 = new Login();
            $result = $login2->Login("$login", "$password");
            if ($result != "") {
                setcookie("token", $result, time() + 3600 * 4);
                $this->displayParametersAnd3DEnvironment();
            } else {
                $this->connection("wrong login/password");
            }
        } else {
            $this->connection("please enter login and password");
        }
    }

    public function logout() {
        setcookie("token", "", time() - 1);
        $login = new Login();
        $login->deleteToken();
        $this->connection();
    }

    public function changePassword($alert = "") {
        global $dir, $views;
        require_once ($dir . $views['changePassword']);
    }

    public function changePassword2() {
        $password_old = filter_input(INPUT_POST, 'password_old', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $password_conf = filter_input(INPUT_POST, 'password_conf', FILTER_SANITIZE_STRING);
        if ($password !== $password_conf) {
            $this->changePassword("passwords are not the same");
        } else {
            $login = new Login();
            if ($login->changePassword($password_old, $password)) {
                global $dir, $views;
                $msg = "Password changed";
                require_once ($dir . $views['info']);
            } else {
                $this->changePassword("wrong old password");
            }
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
            if ($parameter->getName() === "Publications") {
                if ($_POST['publications'] === "yes") {
                    ModelParameter::updateParameter($parameter->getId(), "TRUE", NULL, "FALSE");
                } else {
                    ModelParameter::updateParameter($parameter->getId(), "FALSE", NULL, "FALSE");
                }
                continue;
            }
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
     */
    public function showLine() {
        global $dir, $views;
        require $dir . $views['updateDefaultData'];
    }

    /* --- Update --- */

    /**
     * Get data and update Conference Table
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
        $category_id = Validation::cleanInt((int) $_POST['categorie_id']);

        if (preg_match("#^[1-2]([0-9]){3}-[0-1][0-9]-[0-3][0-9]$#", $date)) {
            ModelConference::updateById($id, $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
            $this->showTable();
        } else {
            
        }
    }

    /**
     * Get data and update Diverse Table
     */
    public function updateDiverse() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $diverse = Validation::cleanString($_POST['diverse']);

        ModelDiverse::updateById($id, $diverse);

        $this->showTable();
    }

    /**
     * Get data and update Education Table
     */
    public function updateEducation() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $date = Validation::cleanString($_POST['date']);
        $education = Validation::cleanString($_POST['education']);

        ModelEducation::updateById($id, $date, $education);
        $this->showTable();
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
        $mail = Validation::cleanInt((int) $_POST['mail']);

        ModelInformation::updateById($id, $status, $name, $firstName, $photo, $age, $address, $phone, $mail);
        $this->showTable();
    }

    /**
     * Get data and update Journal Table
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
        $category_id = Validation::cleanInt((int) $_POST['categorie_id']);

        if (preg_match("#^[1-2]([0-9]){3}-[0-1][0-9]-[0-3][0-9]$#", $date)) {
            ModelJournal::updateById($id, $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
            $this->showTable();
        } else {
            
        }
    }

    /**
     * Get data and update Other Table
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
        $category_id = Validation::cleanInt((int) $_POST['categorie_id']);

        if (preg_match("#^[1-2]([0-9]){3}-[0-1][0-9]-[0-3][0-9]$#", $date)) {
            ModelOther::updateById($id, $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
            $this->showTable();
        } else {
            
        }
    }

    /**
     * Get data and update Skill Table
     */
    public function updateSkill() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $category = Validation::cleanString($_POST['category']);
        $details = Validation::cleanString($_POST['details']);

        ModelSkill::updateById($id, $category, $details);
        $this->showTable();
    }

    /**
     * Get data and update Work Experience Table
     */
    public function updateWorkExp() {
        $id = Validation::cleanInt($_REQUEST['id']);
        $date = Validation::cleanString($_POST['date']);
        $workExp = Validation::cleanString($_POST['workExp']);

        ModelWorkExp::updateById($id, $date, $workExp);
        $this->showTable();
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
     */
    public function insertInBase() {
        global $dir, $views;

        require $dir . $views['insertInBase'];
    }

    /**
     * Get data and insert in Conference Table
     */
    public function insertInConference() {
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

        if ($reference !== "" && $authors !== "" && $title !== "" && $date !== "") {
            if (preg_match("#^[1-2]([0-9]){3}-[0-1][0-9]-[0-3][0-9]$#", $date)) {
                ModelConference::insert($reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
                $this->showTable();
            } else {
                
            }
        }
    }

    /**
     * Get data and insert in Diverse Table
     */
    public function insertInDiverse() {
        $diverse = Validation::cleanString($_POST['diverse']);

        ModelDiverse::insert($diverse);

        $this->showTable();
    }

    /**
     * Get data and insert in Education Table 
     */
    public function insertInEducation() {
        $date = Validation::cleanString($_POST['date']);
        $education = Validation::cleanString($_POST['education']);

        ModelEducation::insert($date, $education);
        $this->showTable();
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
        $mail = Validation::cleanInt((int) $_POST['mail']);

        ModelInformation::insert($status, $name, $firstName, $photo, $age, $address, $phone, $mail);
        $this->showTable();
    }

    /**
     * Get data and insert in Journal Table 
     */
    public function insertInJournal() {

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

        if ($reference !== "" && $authors !== "" && $title !== "" && $date !== "") {
            if (preg_match("#^[1-2]([0-9]){3}-[0-1][0-9]-[0-3][0-9]$#", $date)) {
                ModelJournal::insert($reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
                $this->showTable();
            } else {
                
            }
        }
    }

    /**
     * Get data and insert in Other Table 
     */
    public function insertInOther() {

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

        if ($reference !== "" && $authors !== "" && $title !== "" && $date !== "") {
            if (preg_match("#^[1-2]([0-9]){3}-[0-1][0-9]-[0-3][0-9]$#", $date)) {
                ModelOther::insert($reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
                $this->showTable();
            } else {
                
            }
        }
    }

    /**
     * Get data and insert in Skill Table 
     */
    public function insertInSkill() {
        $category = Validation::cleanString($_POST['category']);
        $details = Validation::cleanString($_POST['details']);

        ModelSkill::insert($category, $details);
        $this->showTable();
    }

    /**
     * Get data and insert in Work Experience Table 
     */
    public function insertInWorkExp() {
        $date = Validation::cleanString($_POST['date']);
        $workExp = Validation::cleanString($_POST['workExp']);

        ModelWorkExp::insert($date, $workExp);
        $this->showTable();
    }

}

?>
