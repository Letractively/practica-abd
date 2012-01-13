<?php
	session_start();
	include_once("gestionarConexionBD.php");
	include_once("gestionUsuarios.php");
	include_once("funciones.php");
	
	if(!isset($_SESSION["estasDentro"])){//Comprobamos que estamos logueado, de lo contrario destruimos la sesion y volvemos a index.php
		session_destroy();
		header("Location: index.php");
	}else{
		$estasDentro=$_SESSION["estasDentro"];
		$errores=array();
				
		if(isset($_FILES['imagen']) && ($_FILES['imagen']['error']==UPLOAD_ERR_OK)){
			if(!validaFoto($_FILES['imagen']['name']))
				array_push($errores,"Debes subir una foto");
			else if(file_exists("../imagenes/fotosUsuarios/".$_FILES['imagen']['name']))
				array_push($errores,"Ya existe una foto con el mismo nombre, por favor cambielo");
				
		}else
			array_push($errores,"Debe insertar una imagen");
				
		$_SESSION["errores_foto"]=$errores;
		
		if(count($errores)==0){
			$conexion=CrearConexionBD();
			subirFoto($_FILES['imagen'],"fotosUsuarios");
			cambiarFoto($estasDentro["idusuario"],$estasDentro["foto"],$_FILES['imagen']['name'],$conexion);
			CerrarConexionBD($conexion);
			$estasDentro["foto"]=$_FILES['imagen']['name'];
			$_SESSION["estasDentro"]=$estasDentro;
			header("Location: ../index.php");
		}else
			header("Location: ../cambiarFoto.php");
	}
?>