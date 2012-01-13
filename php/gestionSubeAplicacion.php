<?php
	session_start();
	include_once("funciones.php");
	include_once("gestionarConexionBD.php");
	include_once("gestionAplicaciones.php");
	include_once("gestionUsuarios.php");
	
	$aplicacion=$_SESSION["aplicacion"];//Recuperamos la variable creada en aplicacion.php
	$errores=array();
	if(isset($aplicacion)){//Si no existe la variable quiere decir que no venimos de alli
		if(isset($_SESSION["modificar"]))
			$aplicacion["idAplicacion"]=$_SESSION["modificar"];
		$aplicacion["nombre"]=$_REQUEST["nombre"];
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
				array_push($errores,"Debes subir una foto");
			else if(file_exists("../imagenes/img_apli/".$_FILES['imagen']['name']))
				array_push($errores,"Ya existe una imagen/aplicacion con el mismo nombre, por favor cambielo");
		}
		
		$_SESSION["errores_aplicacion"]=$errores;
		
		if(count($errores)==0){//Si no hay errores nos conectamos a la BD
			$conexion=CrearConexionBD();
			subirFoto($_FILES['imagen'],"img_apli");
			$estasDentro=$_SESSION["estasDentro"];//Cogemos el nombre del usuario logueado 
			if(!isset($_SESSION["modificar"]))
				crearEvento($aplicacion["titulo"],$aplicacion["fecha"],$aplicacion["hora"],$aplicacion["ciudad"],$aplicacion["direccion"],$aplicacion["imagen"],$aplicacion["descripcion"],
				$aplicacion["recomendar"],$estasDentro["idusuario"],$conexion);//Creamos el aplicacion
			else{
				$ev=getEvento($aplicacion["idaplicacion"],$conexion);//Recupero los datos del aplicacion
				if($aplicacion["imagen"]==""){//Si el campo imagen lo he dejado vacio
					$aplicacion["imagen"]=$ev["imagen"];//Mantengo la foto que tenia
				}else if($ev["imagen"]!="default.jpg" && file_exists("../imagenes/fotosEventos/".$ev["imagen"])) //Si voy a cambiar la foto
					unlink("../imagenes/fotosEventos/".$ev["imagen"]);//Borro la anterior si no es la foto por defecto
					
				modificarEvento($aplicacion,$conexion);
			}
			CerrarConexionBD($conexion);
			unset($_SESSION["aplicacion"]);//Borramos la variable aplicacion de la sesion para no dejar datos sueltos
			unset($_SESSION["modificar"]);//Ya no la necesitaremos mas
			header("Location: ../portada.php");
		}else
				header("Location: ../aplicacion.php?idaplicacion=$_SESSION[modificar]");		
			
	}else
		header("Location: ../index.php");
?>