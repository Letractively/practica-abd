<?php
	
	
	function CrearConexionBD(){
		$host="localhost";
		$usuario="root";//Usuario y contraseña por defecto en xampp
		$password="";
		$conexion=null;
		try{
			$conexion=new PDO("mysql:host=$host;dbname=abd",$usuario,$password);
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al tratar de conectarse con la base de datos";
			header("Location: ../exception.php");
		}
		return $conexion;
	}
	
	function CerrarConexionBD($conexion){
		$conexion=null;
	}
?>