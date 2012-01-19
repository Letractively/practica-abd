<?php
	
	
	//Crea juego.
	function crearJuego($Nombre,$Descripcion,$Imagen,$idUsuario,$ajuego,$tipo,$conexion){
		if($imagen=="")
			$imagen="default_juego.jpg";
		$stmt=null;
		try{
			$SQL="INSERT INTO juegos (idjuego,Nombre,Descripcion,Imagen,idUsuario,ajuego,tipo) 
			VALUES('NULL','$Nombre','$Descripcion','$Imagen','$idUsuario','$ajuego','$tipo')";
			$stmt=$conexion->exec($SQL);	
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al insertar la juego.";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;	
	}

	
	//Devuelve las 5 ultimos juegos insertados
	function getJuegos($conexion){
		$stmt=null;
		try{
			$stmt=$conexion->query("SELECT * FROM juegos ORDER BY idjuego DESC LIMIT 5");
			$stmt->execute();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener los ultimas juegos subidos.";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;
	}
	
	//Devuelve la juego asociado al id
	function getJuegoid($idjuego,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("SELECT * FROM juegos WHERE idjuego=:idjuego");
			$stmt->bindParam(':idjuego',$idjuego);
			$stmt->execute();
			$juego=$stmt->fetch();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener los datos de la juego";
			header("Location: ../exception.php");
			die();
		}
		return $juego;
	}
	
	//Devuelve todas los juegos creadas de un tipo
	function listaTodosJuegosTipo($tipo,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("SELECT * FROM juegos WHERE tipo=:tipo");
			$stmt->bindParam(':tipo',$tipo);
			$stmt->execute();
			
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener la lista de todas las aplicaciones";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;
	}
	
	//Devuelve todas los juegos creadas.
	function listaTodosjuegos($conexion){
		$stmt=null;
		try{
			$stmt=$conexion->query("SELECT * FROM juegos ORDER BY idjuego DESC");
			$stmt->execute();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener la lista de todas las juegoes";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;
	}
	
	//Devuelve las juegoes subidas por el usuario al que corresponde el id
	function getjuegoesSubidas($idusuario,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("SELECT * FROM juegoes WHERE idjuego=:idjuego");
			$stmt->bindParam(':idUsuario',$idusuario);
			$stmt->execute();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener las juegoes subidas por el usuario";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;
	}
	


	
	
	
?>
