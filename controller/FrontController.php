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
        try {
            $ctrl = new VisitorController();
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
