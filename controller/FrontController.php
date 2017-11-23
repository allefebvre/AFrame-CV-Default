<?php
class FrontController {
    
    /**
     * Allow the choice of the using controller (admin/visitor)
     * @global string $dir
     * @global array $views
     */
    public function __construct() {
        global $dir,$views;
	require ($dir.$views['head']);
        $dataError = array();
        $listAdminAction = array('saveParameters');
        
        try {
            if (isset($_REQUEST['action'])){
                $action = $_REQUEST['action'];
            } else {
                $action = null;
            }
            
            foreach($listAdminAction as $adminAction){
                if($action === $adminAction){
                    $ctrl = new AdminController($action);
                }
            }
            //$ctrl = new VisitorController();
            $ctrl = new AdminController($action);
        } catch (Exception $e) {
            $dataError[] = ['Unexpected error !', $e->getMessage()];
            require($dir.$views['error']);
        } catch(PDOException $e2) {
            $dataError[] = ["Database error !", $e2->getMessage()];
            require ($dir.$views['error']);
        }
        
	require ($dir.$views['foot']);
    }
}
?>
