<?php

class VisitorController {

    /**
     * Controller of visitor
     * @global string $dir
     * @global array $views
     */
    public function __construct($action = null) {
        global $dir, $views;
        $dataError = array ();

        try{
            switch ($action){
                case null :
                    $this->displayHome();
                    break;
                case 'viewPCVersion' :
                    $this->display3DEnvironment();
                    break;
                case 'viewHTCViveVersion' :
                    $this->display3DEnvironment(TRUE);
                    break;
                case 'viewMobileVersion' :
                    $this->display3DEnvironment(FALSE, TRUE);
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
    
    public function displayHome(){
        global $dir,$views;
        require ($dir.$views['homeStart']);
    }
    
    /**
     * Display the 3D environment 
     * @global string $dir
     * @global array $views
     */
    public function display3DEnvironment($vive = FALSE, $mobile = FALSE) {
        global $dir,$views;
        require ($dir.$views['home']);
    }
}
?>
