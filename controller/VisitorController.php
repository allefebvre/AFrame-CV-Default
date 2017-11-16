<?php

class VisitorController {

    /**
     * Controller of visitor
     * @global type $dir
     * @global type $views
     */
    public function __construct() {
        global $dir, $views;
        $dataError = array ();

        try{
		$this->display3DEnvironment();
        } 
        catch (PDOException $e) {
            $dataError[] = ["Error database !", $e->getMessage()];
            require ($dir.$views['error']);
        }
        catch (Exception $e2){
            $dataError[] = ["Error unexpected !", $e2->getMessage()];
            require ($dir.$views['error']);     
        }
        exit(0);
    }
    /**
     * Display the 3D environment 
     * @global type $dir
     * @global type $views
     */
    public function display3DEnvironment() {
        global $dir,$views;
        require ($dir.$views['home']);
    }
}
?>
