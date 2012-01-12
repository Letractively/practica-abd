<?php
	include_once("gestionarConexionBD.php");

	session_start();
	$registro= $_SESSION["registro"];
	if (isset($registro)){
		$registro["nick"]=$_REQUEST["nick"];
		$registro["password"]=$_REQUEST["password"];
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
			if (!insertarUsuario($registro)){
				array_push($_SESSION["erroresRegistro"],"Se ha producido un error, intenrelo de nuevo");
				header("Location: ../registro.php");
			}else{
				header("Location: ../index.php");	
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
		if($registro["nick"]==""){
			array_push($errores,"Introduzca el nick de usuario");
			$verificado=false;
		}elseif(nombreOcupado($registro["nick"])){
			array_push($errores,"Ese nick ya esta en uso");
			$verificado=false;
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
	
	function nombreOcupado($nick){
		$conexion=crearConexionBD();
		$ocupado=false;
		try{
			$stmt=$conexion->prepare("SELECT * FROM Usuarios WHERE nick=:nick");
			$stmt->bindParam(':nick',$nick);
			$stmt->execute();
			$usuario=$stmt->fetch();
			if($usuario!=null){
				$ocupado=true;
			}
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener los datos del usuario";
			header("Location: ../exception.php");
			echo "Imposible leer de la BD";
			die();
		}
		cerrarConexionBD($conexion);
		return $ocupado;
	}
	
	function insertarUsuario($registro){
		$conexion=crearConexionBD();
		$insertado=false;
		$fecha= date("Y-m-d",time());
		$insertado=uploadImagen($registro);
		try{
			$query="insert into Usuarios (nick, pass, mail, fechaRegistro, nombre, apellidos, poblacion, 
			provincia, codigoPostal, sexo, foto) values ('$registro[nick]', '$registro[password]', '$registro[mail]', 
			'$fecha', '$registro[nombre]', '$registro[apellidos]', '$registro[poblacion]', '$registro[provincia]', 
			'$registro[codigoPostal]', '$registro[sexo]', '$registro[foto]');";
			$conexion->exec($query);
			$insertado=true;
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener los datos del usuario";
			header("Location: ../exception.php");
			echo "Imposible escribir en la BD";
			die();
		}
		cerrarConexionBD($conexion);
		return $insertado;
	}
	
	function uploadImagen($registro){
		$nombre= $registro["nick"];
		if($_FILES["foto"]["name"]!=null && $_FILES["foto"]["name"]!=""){
			if($_FILES["foto"]["type"]!="image/jpeg"){
				move_uploaded_file($_FILES["foto"]["tmp_name"], "../res/avatar/" . $nick.".avatar.jpg");	
			}
			if($_FILES["foto"]["type"]!="image/png"){
				move_uploaded_file($_FILES["foto"]["tmp_name"], "../res/avatar/" . $nick.".avatar.png");
			}	
		}
	}
?>