<?php
	
	require_once "config/config.php";
	require_once "routes.php";
	require_once "config/db.php";
	require_once "Controllers/EmpleadosController.php";
	require_once "Controllers/NosotrosController.php";
	require_once "Controllers/ErrorController.php";

	if(isset($_GET['c'])){
		
		$controller = loadController($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id'])){
				loadController($controller, $_GET['a'], $_GET['id']);
				} else {
                loadAction($controller, $_GET['a']);
			}
			} else {
				var_dump($controller);exit;
                loadAction($controller, ACTION);
		}
		
		} else {
		
		$controller = loadController(MAIN_CONTROLLER);
		$action = ACTION;
		$controller->$action();
	}
?>