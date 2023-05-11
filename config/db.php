<?php
	
	class Connect {
		
		public static function connection(){
            $connection = mysqli_connect('localhost','root','root','test');
			return $connection;		
		}

		public static function connectionPDO(){
			$host = 'localhost';
			$dbname = 'test'; //  id20585116_test
			$user = 'root';  // id20585116_root
			$password = 'root'; // Admin12345678!
			$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
	
			try {
				$pdo = new PDO($dsn, $user, $password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $pdo;
			} catch(PDOException $e) {
				echo 'Error al conectar con la base de datos: ' . $e->getMessage();
			}
		}
	}
?>