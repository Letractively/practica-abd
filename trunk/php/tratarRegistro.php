<?php
	include_once("gestionarConexionBD.php");
	include_once("gestionUsuarios.php");

	session_start();
	$registro= $_SESSION["registro"];
	if (isset($registro)){
		$registro["nick"]=$_REQUEST["nick"];
		$registro["password"]=$_REQUEST["pass"];
		$registro["passwordBis"]=$_REQUEST["passwordBis"];
		$registro["mail"]=$_REQUEST["mail"];
		$registro["nombre"]=$_REQUEST["nombre"];
		$registro["apellidos"]=$_REQUEST["apellidos"];
		$registro["poblacion"]=$_REQUEST["poblacion"];
		$registro["provincia"]=$_REQUEST["provincia"];
		$registro["codigoPostal"]=$_REQUEST["codigoPostal"];
		$registro["sexo"]=$_REQUEST["sexo"];
		$registro["foto"]=$_FILES["foto"];
		$_SESSION["registro"]=$registro;
		if(verificaDatos($registro)){
			if(isset($_SESSION["estasDentro"])){
				$dentro= $_SESSION["estasDentro"];
				if (!actualizarUsuario($dentro["idUsuario"], $registro)){
					array_push($_SESSION["erroresRegistro"],"Se ha producido un error, intenrelo de nuevo");
					header("Location: ../registro.php");
				}else{
					header("Location: ../index.php");
				}
			}else{
				if(!insertarUsuario($registro)){
					array_push($_SESSION["erroresRegistro"],"Se ha producido un error, intenrelo de nuevo");
					header("Location: ../registro.php");
				}else{
					iniciarSesion($registro["nick"]);
					header("Location: ../index.php");	
				}	
			}
		}else{
			header("Location: ../registro.php");
		}
	}else{
		header("Location: ../registro.php");
	}
	
	function verificaDatos($registro){
		$verificado=true;
		$errores=array();
		$patron='/^(.+)@(.+)\.(.+)$/';
		if(isset($_SESSION["estasDentro"])){
			$dentro= $_SESSION["estasDentro"];
			if ($registro["nick"]!=$dentro["usuario"]){
				if($registro["nick"]==""){
					array_push($errores,"Introduzca el nick de usuario");
					$verificado=false;
				}elseif(nombreOcupado($registro["nick"])){
					array_push($errores,"Ese nick ya esta en uso");
					$verificado=false;
				}
			}
		}else{
			if($registro["nick"]==""){
				array_push($errores,"Introduzca el nick de usuario");
				$verificado=false;
			}elseif(nombreOcupado($registro["nick"])){
				array_push($errores,"Ese nick ya esta en uso");
				$verificado=false;
			}	
		}
		if (strlen($registro["password"])<4 || strlen($registro["password"])>8){
			array_push($errores,"La contraseña debe tener entre 4 y 8 caracteres");
			$verificado=false;
		}else if($registro["password"]!=$registro["passwordBis"]){
			array_push($errores,"Las contraseñas deben de ser identicas");
			$verificado=false;
		}
		if ($registro["mail"]==""){
			array_push($errores,"Debe introducir una direccion de correo");
			$verificado=false;
		}elseif(!preg_match($patron,$registro["mail"])){
			array_push($errores,"Debe introducir una direccion de correo valida");
			$verificado=false;
		}
		if($_FILES["foto"]["name"]!=null && $_FILES["foto"]["name"]!=""){
			if ($_FILES["foto"]["type"]!="image/jpeg" && $_FILES["foto"]["type"]!="image/png"){
				$tipo= $_FILES["foto"]["type"];
				array_push($errores,"Solo son valida imagenes en formato jpeg o png. El tipo insertado es $tipo");
				$verificado=false;	
			}
		}
		$_SESSION["erroresRegistro"]=$errores;
		return $verificado;
	}
	
	function uploadImagen($registro){
		$nombre= $registro["nick"];
		if($_FILES["foto"]["type"]!="image/jpeg"){
			move_uploaded_file($_FILES["foto"]["tmp_name"], "../imagenes/fotosUsuarios/" . $nick . ".jpg");	
		}
		if($_FILES["foto"]["type"]!="image/png"){
			move_uploaded_file($_FILES["foto"]["tmp_name"], "../imagenes/fotosUsuarios/" . $nick . ".png");
		}	
	}
	
	function iniciarSesion($nick){
		$conexion=crearConexionBD();
		$usuario=getUsuario($nick, $conexion);
		cerrarConexionBD($conexion);
		$estasDentro=array();//Creamos una variable para saber que nos hemos logueado
		$estasDentro["idUsuario"]=$usuario["idUsuario"];//Guardamos los datos que utilizaremos una vez dentro
		$estasDentro["usuario"]=$usuario["nick"];
		$estasDentro["foto"]=$usuario["foto"];
		$_SESSION["estasDentro"]=$estasDentro;
	}
?>