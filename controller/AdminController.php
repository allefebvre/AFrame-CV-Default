<?php

class AdminController {

    /**
     * Controller of administrator
     * @global string $dir
     * @global array $views
     */
    public function __construct($action) {
        global $dir, $views;
        $dataError = array ();

        try{
            switch($action) {
                case null:
                    $this->displayParametersAnd3DEnvironment();
                    break;
                case "saveParameters" :
                    $this->saveParameters();
                    break;
            }
        } 
        catch (PDOException $e) {
            $dataError[] = ["Database error !", $e->getMessage()];
            require ($dir.$views['error']);
        }
        catch (Exception $e2){
            $dataError[] = ["Unexpected error !", $e2->getMessage()];
            require ($dir.$views['error']);     
        }
    }
    
    /**
     * Display parameters and the 3D environment 
     * @global string $dir
     * @global array $views
     */
    public function displayParametersAnd3DEnvironment() {
        global $dir,$views;
        require ($dir.$views['homeAdmin']);
    }
    
    /**
     * Save parameters in database and refresh the homeAdmin page
     * @global string $dir
     * @global array $views
     */
    public function saveParameters() {
        global $dir,$views;
        require ($dir.$views['homeAdmin']);
    }
}
?>
