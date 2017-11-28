<?php
class FrontController {
    
    /**
     * Allow the choice of the using controller (admin/visitor)
     * @global string $dir
     * @global array $views
     */
    public function __construct(bool $admin = FALSE) {
        global $dir,$views;
	require ($dir.$views['head']);
        $dataError = array();
        $listAdminAction = array('saveParameters', 'showData', 'showTable', 'showLine', 'updateConference', 'updateDiverse', 'updateEducation', 'updateInformation', 'updateJournal', 'updateOther', 'updateSkill', 'updateWorkExp', 'deleteDefaultLine' );        
        try {
            if (isset($_REQUEST['action'])){
                $action = $_REQUEST['action'];
            } else {
                $action = null;
            }
            
            $admin_call = FALSE;
            
            if($admin){
                foreach($listAdminAction as $adminAction){
                    if($action === $adminAction){
                        $ctrl = new AdminController($action);
                        $admin_call = TRUE;
                    }
                }
                if(!$admin_call){
                    $ctrl = new AdminController($action);
                }
            } else {
                $ctrl = new VisitorController();
            }
            
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
