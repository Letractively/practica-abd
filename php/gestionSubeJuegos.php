<?php
	session_start();
	include_once("funciones.php");
	include_once("gestionarConexionBD.php");
	include_once("gestionAplicaciones.php");
	include_once("gestionUsuarios.php");
	
	$aplicacion=$_SESSION["aplicacion"];//Recuperamos la variable creada en subeJuego.php
	$errores=array();
	if(isset($aplicacion)){//Si no existe la variable quiere decir que no venimos de alli
		if(isset($_SESSION["modificar"]))
			$aplicacion["idAplicacion"]=$_SESSION["modificar"];
		$aplicacion["nombre"]=$_REQUEST["nombre"];
		$aplicacion["tipo"]=$_REQUEST["tipo"];
		$aplicacion["descripcion"]=$_REQUEST["descripcion"];
		
		$aplicacion["imagen"]=$_FILES['imagen']['name'];
		$aplicacion["aaplicacion"]=$_FILES['aaplicacion']['name'];
		
		$_SESSION["aplicacion"]=$aplicacion;
		if(esNulo($aplicacion,"nombre"))
			array_push($errores,"Introduzca el nombre de la aplicacion");

		if(esNulo($aplicacion,"descripcion"))
			array_push($errores,"Introduzca la descripcion de la aplicacion");		
				
		if(isset($_FILES['imagen']) && ($_FILES['imagen']['error']==UPLOAD_ERR_OK)){
			if(!validaFoto($aplicacion["imagen"]))
				array_push($errores,"Debes subir una foto para la aplicacion.");
			else if(file_exists("../imagenes/img_apli/".$_FILES['imagen']['name']))
				array_push($errores,"Ya existe una imagen/aplicacion con el mismo nombre, por favor cambielo");
		}		
		if(isset($_FILES['aaplicacion']) && ($_FILES['aaplicacion']['error']==UPLOAD_ERR_OK)){
			if(!validaAaplicacion($aplicacion["aaplicacion"]))
				array_push($errores,"Debes subir una aplicacion.");
			else if(file_exists("../aplicaciones/".$_FILES['aaplicaciones']['name']))
				array_push($errores,"Ya existe una aplicacion con el mismo nombre.");		
		}		
		$_SESSION["errores_aplicacion"]=$errores;
		
		if(count($errores)==0){//Si no hay errores nos conectamos a la BD
			$conexion=CrearConexionBD();
			subirFoto($_FILES['imagen'],"img_apli");
			$estasDentro=$_SESSION["estasDentro"];//Cogemos el nombre del usuario logueado 
			if(!isset($_SESSION["modificar"]))
				subirAplicacion($aplicacion["nombre"],$aplicacion["tipo"],$aplicacion["descripcion"],$aplicacion["imagen"],$aplicacion["idUsuario"],$aplicacion["aaplicacion"],$conexion);
			else{
				modificarAplicacion($aplicacion,$conexion);
			}
			CerrarConexionBD($conexion);
			unset($_SESSION["aplicacion"]);//Borramos la variable aplicacion de la sesion para no dejar datos sueltos
			unset($_SESSION["modificar"]);//Ya no la necesitaremos mas
			header("Location: ../index.php");
		}else
				header("Location: ../masinfoaplicaciones.php?idaplicacion=$_SESSION[modificar]");		
			
	}else
		header("Location: ../index.php");
	
?>