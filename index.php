<?php
	session_start(); // Iniciar la sesión

	require_once "config/config.php";
	require_once "routes.php";
	require_once "config/db.php";
	require_once "Controllers/EmpleadosController.php";
	require_once "Controllers/NosotrosController.php";
	require_once "Controllers/UsuariosController.php";
	require_once "Controllers/ErrorController.php";

	if (!isset($_COOKIE['usuario']) || ( (isset($_GET['a']) && $_GET['a'] == 'registrar') && (isset($_GET['c']) && $_GET['c'] == 'usuarios'))) {
		$action = (isset($_GET['a']) && $_GET['a'] == 'registrar') && (isset($_GET['c']) && $_GET['c'] == 'usuarios') ? 'registrar' : 'login';
		$controller = loadController('Usuarios');
		$controller->$action();
		exit;
	}
	
	if(isset($_GET['c'])){
		
		$controller = loadController($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id'])){
				loadController($controller, $_GET['a'], $_GET['id']);
				} else {
                loadAction($controller, $_GET['a']);
			}
			} else {
                loadAction($controller, ACTION);
		}
		
		} else {
		
		$controller = loadController(MAIN_CONTROLLER);
		$action = ACTION;
		$controller->$action();
	}
?>