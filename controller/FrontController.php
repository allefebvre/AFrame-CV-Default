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

        
        
        $listVisitorAction = array('viewPCVersion', 'viewHTCViveVersion');

        try {
            $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
            if($action == null){
                $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
            }
            
            $visitor_call = FALSE;           
            
            foreach ($listVisitorAction as $visitorAction) {
                if ($action === $visitorAction) {
                    $ctrl = new VisitorController($action);
                    $visitor_call = TRUE;
                }
            }
            if (!$visitor_call) {
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
