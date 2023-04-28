<?php
	
	class Connect {
		
		public static function connection(){
			session_start();
            $connection = mysqli_connect('localhost','root','root','test');
			return $connection;		
		}
	}
?>