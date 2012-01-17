<?php
	session_start();
	include_once("gestionarConexionBD.php");
	include_once("gestionUsuarios.php");
	
	if(!isset($_SESSION["estasDentro"])){//Comprobamos que estamos logueado, de lo contrario destruimos la sesion y volvemos a index.php
		session_destroy();
		header("Location: ../index.php");
	}else{
		$estasDentro=$_SESSION["estasDentro"];//Esta variable guardara los datos de usuario
		$conexion=CrearConexionBD();
		eliminarUsuario($estasDentro["idUsuario"],$estasDentro["foto"],$conexion);
		CerrarConexionBD($conexion);
		session_destroy();
		header("Location: ../index.php");
		
	}
?>