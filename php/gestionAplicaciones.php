<?php

	//Crea aplicacion.
	function subirAplicacion($nombre,$descripcion,$imagen,$idUsuario,$aaplicacion,$conexion){
		if($imagen=="")
			$imagen="default_aplicacion.jpg";
		$stmt=null;
		try{
			$SQL="INSERT INTO aplicaciones (idAplicacion,Nombre,Descripcion,Imagen,idUsuario,Aaplicacion) 
			VALUES('NULL','$nombre','$descripcion','$imagen','$idUsuario','$aaplicacion')";
			$stmt=$conexion->exec($SQL);	
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al subir la aplicacion.";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;	
	}
	
	//Devuelve las 5 ultimos aplicaciones insertadas
	function getAplicacion($conexion){
		$stmt=null;
		try{
			$stmt=$conexion->query("SELECT * FROM aplicaciones ORDER BY idAplicacion DESC LIMIT 5");
			$stmt->execute();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener las ultimas aplicaciones subidas.";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;
	}
	
	//Devuelve todas las aplicaciones creadas de un tipo
	function listaTodasAplicacionesTipo($tipo,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("SELECT * FROM aplicaciones WHERE tipo=:tipo");
			$stmt->bindParam(':tipo',$tipo);
			$stmt->execute();
			
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener la lista de todas las aplicaciones";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;
	}
	
	//Devuelve todas las aplicaciones creadas.
	function listaTodasAplicaciones($conexion){
		$stmt=null;
		try{
			$stmt=$conexion->query("SELECT * FROM aplicaciones ORDER BY idAplicacion DESC");
			$stmt->execute();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener la lista de todas las aplicaciones";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;
	}
	
	//Devuelve las aplicaciones subidas por el usuario al que corresponde el id
	function getAplicacionesSubidas($idusuario,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("SELECT * FROM aplicaciones WHERE idAplicacion=:idAplicacion");
			$stmt->bindParam(':idUsuario',$idusuario);
			$stmt->execute();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener las aplicaciones subidas por el usuario";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;
	}
?>
