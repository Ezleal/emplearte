<?php
	
	class EmpleadosController {
		
		public function __construct(){
			require_once "Models/Empleado.php";
		}
		
		public function index(){
			$instance = new Empleado();
			$empleados = $instance->getEmpleados();
			$provincias = $instance->selectProvincias();
			$tipoDoc = $instance->selectTipoDocumento();
			require_once "Views/empleados/Empleados.php";	
		}
		
		public function modificar(){
			
			$idLegajo = $_GET['IdLegajo'];
			$instance = new Empleado();
			$empleado = $instance->getEmpleado($idLegajo);
			$provincias = $instance->selectProvincias($empleado['ID_PROVINCIA']);
			$tipoDoc = $instance->selectTipoDocumento($empleado['ID_TIPO_DOCUMENTO']);
			require_once "Views/empleados/modificar.php";
		}

		public function update(){
			$idLegajo = $_POST['IdLegajo'];
			$apellido = $_POST['Apellido'];
			$nombre = $_POST['Nombre'];
			$direccion = $_POST['Direccion'];
			$localidad = $_POST['Localidad'];
			$idNroDocumento = $_POST['ID_TIPO_DOCUMENTO'];
			$NroDocumento = $_POST['NroDocumento'];
			$CodPostal = $_POST['CodPostal'];
			$IdProvincia = $_POST['ID_PROVINCIA'];
	
			$empleado = new Empleado();
			$empleado->update($idLegajo, $apellido, $nombre, $direccion, $localidad, $idNroDocumento, $NroDocumento, $CodPostal, $IdProvincia);
			header('Location: index.php?c=empleados&a=index');
		}
		
		public function save(){		
				// $idLegajo = $_POST['IdLegajo'];
				$apellido = $_POST['Apellido'];
				$nombre = $_POST['Nombre'];
				$direccion = $_POST['Direccion'];
				$localidad = $_POST['Localidad'];
				$idNroDocumento = $_POST['ID_TIPO_DOCUMENTO'];
				$NroDocumento = $_POST['NroDocumento'];
				$CodPostal = $_POST['CodPostal'];
				$IdProvincia = $_POST['ID_PROVINCIA'];

			$empleado = new Empleado();
			$empleado->insert( $apellido, $nombre,$direccion,$localidad,$idNroDocumento,$NroDocumento, $CodPostal, $IdProvincia);
			header('Location: index.php?c=empleados&a=index');
		}
		
		public function delete(){
			$idLegajo = $_GET['IdLegajo'];
			$empleado = new Empleado();
			$empleado->delete($idLegajo);
			header('Location: index.php?c=empleados&a=index');
		}	
	}
?>