<?php
	function crearConexionBD(){
		$host="localhost";
		$usuario="root";//Usuario y contrase�a por defecto en xampp
		$password="";
		$conexion=null;
		try{
			$conexion=new PDO("mysql:host=$host;dbname=abd",$usuario,$password);
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al tratar de conectarse con la base de datos";
			//header("Location: ../exception.php");
			echo "Imposible conectar";
		}
		return $conexion;
	}
	
	function cerrarConexionBD($conexion){
		$conexion=null;
	}
?>