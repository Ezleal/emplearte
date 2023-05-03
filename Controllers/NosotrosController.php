<?php
	
	class NosotrosController {

		public function __construct(){
		}

		public function index(){
			require_once "Views/nosotros.php";	
		}

		public function informacion(){
			require_once "Views/informacion.php";	
		}

	}
?>