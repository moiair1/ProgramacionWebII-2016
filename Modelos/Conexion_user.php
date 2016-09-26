<?php


class ConexionUser{

	public function conectar(){
		
		$host 		=	'localhost';
		$db		=       'copia_DB_user';
		$usuario 	= 	'root';
		$password	=	'';
		
		$conexion 	= new PDO("mysql:host=$host; dbname=$db", $usuario, $password);
		$conexion->exec("SET NAMES UTF8");

		return $conexion;
			
		
		}
    
    
}


?>
