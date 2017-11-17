<?php
	//Loading config
	require_once(__DIR__.'/config/config.php');

	//Loading autoloader for autoloading classes
	require_once(__DIR__.'/config/Autoload.php');
	Autoload::load();

	$ctrl = new FrontController();
?>
