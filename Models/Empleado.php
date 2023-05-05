<?php
	
	class Empleado {
		
        private $db;
		private $empleados;
		
		public function __construct(){
			$this->db = Connect::connection();
			$this->empleados = array();
		}
		
		public function getEmpleados()
		{
            $query = "SELECT * FROM empleados_detalle";
            $result = $this->db->query($query);
            $message = "No se encuentran registros de empleados activos";

            if($result->num_rows == 0){
                return $message;
            }
            else{

                while($row = $result->fetch_assoc())
                {
                    $this->empleados[] = $row;
                }
                return $this->empleados;
            }
         
		}

        public function getEmpleado($idLegajo)
        {
            $stmt = $this->db->prepare("SELECT * FROM empleados_detalle WHERE IdLegajo = ?");
            $stmt->bind_param("s", $idLegajo);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($result->num_rows == 0){
                return "No se encuentra el empleado con IdLegajo: $idLegajo";
            } else {
                return $result->fetch_assoc();
            }
        }

        public function selectProvincias($provincia = null)
        {
            $select = [];
            $query = "SELECT * FROM provincia";
            $result = $this->db->query($query);
            while($row = mysqli_fetch_assoc($result)) {
                // Si el id_provincia coincide con el valor del parámetro $provincia, agrega el atributo "selected"
                $selected = ( $provincia && $row['id_provincia'] == $provincia) ? "selected" : "";
                $select[] =  "<option value=".$row['id_provincia']." $selected>".$row['provincia']."</option>";
            } 
            return $select;            
        }

        public function selectTipoDocumento($dni = null)
        {
            $select = [];
            $query = "SELECT * FROM tipo_documento";
            $result = $this->db->query($query);
            while($row = mysqli_fetch_assoc($result)) { 
                $selected = ($dni && $row['id_tipo_documento'] == $dni) ? "selected" : "";
                $select[] =  "<option value=".$row['id_tipo_documento']." $selected>".$row['tipo_documento']."</option>";
                } 
            return $select;   
        }
		
		public function insert($idLegajo, $apellido, $nombre,$direccion,$localidad,$idNroDocumento,$NroDocumento, $CodPostal, $IdProvincia){
            // Prepare and Bind
            $stmt =  $this->db->prepare("INSERT INTO empleados 
            (IdLegajo, Apellido,Nombre,Direccion,Localidad,ID_TIPO_DOCUMENTO,NroDocumento,CodigoPostal,ID_PROVINCIA) 
            VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssss", $idLegajo, $apellido, $nombre,$direccion,$localidad,$idNroDocumento,$NroDocumento, $CodPostal, $IdProvincia);
            $result = $stmt->execute();
            if(!$result) {
                die("Error Query");
            }
            $stmt->close();
            $this->db->close();
            $_SESSION['message'] = 'Empleado Agregado Exitosamente!';
            $_SESSION['style'] = 'success';
		}
		
        public function update($idLegajo, $apellido, $nombre, $direccion, $localidad, $idNroDocumento, $NroDocumento, $CodPostal, $IdProvincia) {
            $stmt = $this->db->prepare("UPDATE empleados SET Apellido=?, Nombre=?, Direccion=?, Localidad=?, ID_TIPO_DOCUMENTO=?, NroDocumento=?, CodigoPostal=?, ID_PROVINCIA=? WHERE IdLegajo=?");
            $stmt->bind_param("ssssssssi", $apellido, $nombre, $direccion, $localidad, $idNroDocumento, $NroDocumento, $CodPostal, $IdProvincia, $idLegajo);
            $result = $stmt->execute();
            if(!$result) {
                die("Error Query");
            }
            $stmt->close();
            $this->db->close();
            $_SESSION['message'] = 'Empleado Actualizado Exitosamente!';
            $_SESSION['style'] = 'success';
        }
        
		
		public function delete($idLegajo){
            $query = "UPDATE empleados SET Activo = 'N' WHERE IdLegajo = $idLegajo";
            $resultado = $this->db->query($query);
            if(!$resultado) {
              die("Error Query");
            }
            $_SESSION['message'] = 'Empleado Eliminado Existosamente!';
            $_SESSION['style'] = 'danger';
		}
		
	} 
?>