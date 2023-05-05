<?php

require_once "Models/Usuario.php";

class UsuariosController {
	
	public function login()
	{
		if (isset($_SESSION['usuario'])) {
			// Si ya existe una sesión, redirigir a otra página
			header('Location: index.php?c=nosotros&a=index');
			exit;
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Validar formulario
			if (isset($_POST['email']) && isset($_POST['password'])) {
				$email = $_POST['email'];
				$password = $_POST['password'];

				// Verificar si las credenciales son válidas
				$usuario = $this->validarLogin($email, $password);
				
				if ($usuario) {
				    $_SESSION['usuario'] = $usuario;
					setcookie('usuario', $usuario, time() + 3600, '/');
					// Iniciar sesión y redirigir al usuario a la página de inicio
					header('Location: index.php?c=Nosotros&a=index');
					exit;
				} else {
					// Establecer mensaje de error y mostrarlo en la vista
					$_SESSION['message'] = 'Email o contraseña incorrectos';
					$_SESSION['style'] = 'danger';
				}
			}
		}

		// Cargar vista del formulario de inicio de sesión
		require_once('Views/login.php');
	}


	public function logout(){
		setcookie("usuario", "", time() - 3600, "/");
		session_start();
		session_unset();
		session_destroy();
		header('Location: index.php?c=Usuarios&a=login');
	}

	public function validarLogin($email, $password){
		if (isset($email) && isset($password)) {
			$usuario = (new Usuario())->getUsuarioByEmailAndPassword($email, $password);

			if ($usuario) {
				session_start();
				$_SESSION['usuario'] = $usuario;
				$_SESSION['usuario_id'] = $usuario->getId();
				$_SESSION['usuario_email'] = $usuario->getEmail();
				$_SESSION['usuario_nombre'] = $usuario->getNombre();
				$_SESSION['usuario_apellido'] = $usuario->getApellido();
				return true;
			} else {
				// echo "Usuario o contraseña incorrectos";
				return false;
			}
		} else {
			// echo "Ingrese su email y contraseña";
			return false;
		}
	}

	public function registrar(){
		require_once "Views/registrar.php";
	}

	public function guardarRegistro(){
		if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nombre']) && isset($_POST['apellido'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];

			$usuario = new Usuario();
			$usuario->setEmail($email);
			$usuario->setPassword($password);
			$usuario->setNombre($nombre);
			$usuario->setApellido($apellido);

			$usuario->insertUsuario();

			header('Location: index.php');
		} else {
			echo "Todos los campos son obligatorios";
		}
	}

	public function editar(){
		if (isset($_SESSION['usuario_id'])) {
			$id = $_SESSION['usuario_id'];
			$usuario = Usuario::getUsuarioById($id);
			require_once "Views/editar.php";
		} else {
			echo "Debe estar logueado para acceder a esta sección";
		}
	}

	public function actualizar(){
		if (isset($_SESSION['usuario_id']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nombre']) && isset($_POST['apellido'])) {
			$id = $_SESSION['usuario_id'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];

			$usuario = new Usuario();
			$usuario->setId($id);
			$usuario->setEmail($email);
			$usuario->setPassword($password);
			$usuario->setNombre($nombre);
			$usuario->setApellido($apellido);

			$usuario->updateUsuario();

			header('Location: index.php');
		} else {
			echo "Debe estar logueado y todos los campos son obligatorios";
		}
	}

	public function borrar(){
		if (isset($_SESSION['usuario_id'])) {
			$id = $_SESSION['usuario_id'];
			$usuario = new Usuario();
			$usuario->setId($id);
			$usuario->deleteUsuario();
			header('Location: index.php');
		} else {
			echo "Debe estar logueado para acceder a esta sección";
		}
	}

}
