<?php


class Conexion{

	public function conectar(){
		
		$host 		=	'localhost';
		$db			=	'DBII';
		$usuario 	= 	'root';
		$password	=	'';
		
		$conexion 	= new PDO("mysql:host=$host; dbname=$db", $usuario, $password);
		$conexion->exec("SET NAMES UTF8");

		return $conexion;
			
		
		}
    
    
}


?>
