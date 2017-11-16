<?php
class FrontController {
	/**
         * Allow the choice of the ussing controller (admin/visitor)
         * @global type $dir
         * @global type $views
         */
	public function __construct() {
		global $dir,$views;
		$dataError = array();
		try {
			$ctrl = new VisitorController();
		} catch (Exception $e) {
			$dataError[] = ['Error unpexted', $e->getMessage()];
			require($dir.$views['error']);
		} catch(PDOException $e2) {
			$dataError[] = ["Error database !", $e2->getMessage()];
			require ($dir.$views['error']);
		}
	}
}
?>
