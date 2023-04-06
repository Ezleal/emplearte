<?php
	
	class Empleado {
		
		private $empleados;
		
		public function __construct(){
			$this->empleados = array();
		}
		
		public function getEmpleados()
		{
            $message = "No se encuentran registros de empleados activos";

            return $message;
         
		}

        public function selectProvincias()
        {

            $select[] =  "<option value='BuenosAires'>Buenos Aires</option>";
    
            return $select;    
        }

        public function selectTipoDocumento()
        {
            $select[] =  "<option value='DNI'>DNI</option>";
            return $select;    
        }
		
		public function insert($idLegajo, $apellido, $nombre,$direccion,$localidad,$idNroDocumento,$NroDocumento, $CodPostal, $IdProvincia){
            //EN DESARROLLO;
            return false;
		}
		
		
		public function delete($idLegajo){
            //EN DESARROLLO;
               return false;
		}
		
	} 
?>