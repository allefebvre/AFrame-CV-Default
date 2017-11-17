<?php

class VisitorController {

    /**
     * Controller of visitor
     * @global string $dir
     * @global array $views
     */
    public function __construct() {
        global $dir, $views;
        $dataError = array ();

        try{
            $this->display3DEnvironment();
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
     * Display the 3D environment 
     * @global string $dir
     * @global array $views
     */
    public function display3DEnvironment() {
        global $dir,$views;
        require ($dir.$views['home']);
    }
}
?>
