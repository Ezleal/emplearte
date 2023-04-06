<?php
	
	function loadController($controller){
		
		$controllerName = ucwords($controller)."Controller";
		$controllerFile = 'Controllers/'.ucwords($controllerName).'.php';
		
		if(!is_file($controllerFile)){
			$controllerFile= 'Controllers/'.MAIN_CONTROLLER.'.php';
			require_once 'Views/error.php';
			exit;
		}
		else{
			require_once $controllerFile;

			$control = new $controllerName();
			return $control;
		}
		
	}
	
	function loadAction($controller, $action, $id = null){
		
		if(isset($action) && method_exists($controller, $action)){
			if($id == null){
				$controller->$action();
				} else {
				$controller->$action($id);
			}
			} else {
			$controller->MAIN_ACTION();
		}	
	}
?>