<?php
	session_start();
	
	//Crea juego.
	function crearJuego($Nombre,$Descripcion,$Imagen,$idUsuario,$conexion){
		if($imagen=="")
			$imagen="default_juego.jpg";
		$stmt=null;
		try{
			$SQL="INSERT INTO juegoes (idjuego,Nombre,Descripcion,Imagen,idUsuario) 
			VALUES('NULL','$Nombre','$Descripcion','$Imagen','$idUsuario')";
			$stmt=$conexion->exec($SQL);	
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al insertar la juego.";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;	
	}
	
	//Modifica los datos de una juego.
	function modificarJuego($juego,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("UPDATE juegos SET Nombre=:Nombre, Descripcion=:Descripcion, Imagen=:Imagen
			WHERE idjuego=:idjuego");
			$stmt->bindParam(':idjuego',$juego["idjuego"]);
			$stmt->bindParam(':Nombre',$juego["Nombre"]);
			$stmt->bindParam(':Descripcion',$juego["Descripcion"]);
			$stmt->bindParam(':Imagen',$juego["Imagen"]);
			$stmt->execute();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al modificar los datos de la juego.";
			header("Location: ../exception.php");
			die();
		}
			return $stmt;		
	}
		
	//Borra la juego correspondiente al id pasado tambien su imagen.
	function borrarjuego($idjuego,$imagen,$conexion){
		if($imagen!="default_juego.jpg" && file_exists("../imagenes/img_juegoes/".$imagen))
			unlink("../imagenes/Img_juegoes/".$imagen);
		$stmt=null;
		try{
			$stmt=$conexion->prepare("DELETE FROM juegos WHERE idjuego=:idjuego");
			$stmt->bindParam(':idjuego',$idjuego);
			$stmt->execute();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al borrar el juego";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;
	}
	
	//Devuelve las 5 ultimos juegos insertados
	function getJuego($conexion){
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
	function getjuego1($idjuego,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("SELECT * FROM juego WHERE idjuego=:idjuego");
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
	
	//Devuelve todas las juegoes creadas.
	function listaTodasjuegoes($conexion){
		$stmt=null;
		try{
			$stmt=$conexion->query("SELECT * FROM juegoes ORDER BY idjuego DESC");
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
			$stmt->bindParam(':idusuario',$idusuario);
			$stmt->execute();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener las juegoes subidas por el usuario";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;
	}
	


	
	
	
?>
