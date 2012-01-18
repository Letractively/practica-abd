<?php
	
	
	//Crea aplicacion.
	function subirAplicacion($Nombre,$Descripcion,$Imagen,$idUsuario,$Aaplicacion,$conexion){
		if($imagen=="")
			$imagen="default_aplicacion.jpg";
		$stmt=null;
		try{
			$SQL="INSERT INTO aplicaciones (idAplicacion,Nombre,Descripcion,Imagen,idUsuario,Aaplicacion) 
			VALUES('NULL','$Nombre','$Descripcion','$Imagen','$idUsuario','$Aaplicacion')";
			$stmt=$conexion->exec($SQL);	
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al subir la aplicacion.";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;	
	}
	
	//Modifica los datos de una aplicacion.
	function modificarAplicacion($aplicacion,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("UPDATE aplicaciones SET Nombre=:Nombre, Descripcion=:Descripcion, Imagen=:Imagen, Aaplicacion:= Aaplicacion
			WHERE idAplicacion=:idAplicacion");
			$stmt->bindParam(':idAplicacion',$aplicacion["idAplicacion"]);
			$stmt->bindParam(':Nombre',$aplicacion["Nombre"]);
			$stmt->bindParam(':Descripcion',$aplicacion["Descripcion"]);
			$stmt->bindParam(':Imagen',$aplicacion["Imagen"]);
			$stmt->bindParam(':Aaplicacion',$aplicacion["Aaplicacion"]);
			$stmt->execute();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al modificar los datos de la aplicacion.";
			header("Location: ../exception.php");
			die();
		}
			return $stmt;		
	}
		
	//Borra la aplicacion correspondiente al id pasado tambien su imagen.
	function borrarAplicacion($idAplicacion,$imagen,$conexion){
		if($imagen!="default_aplicacion.jpg" && file_exists("../imagenes/img_Aplicaciones/".$imagen))
			unlink("../imagenes/Img_aplicaciones/".$imagen);
		if( file_exists("../aplicaciones/".$aaplicacion))
			unlink("../aplicaciones/".$aaplicacion);	
		$stmt=null;
		try{
			$stmt=$conexion->prepare("DELETE FROM aplicaciones WHERE idAplicacion=:idAplicacion");
			$stmt->bindParam(':idAplicacion',$idAplicacion);
			$stmt->execute();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al borrar la aplicacion";
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
	
	//Devuelve la aplicacion asociado al id
	function getAplicacionId($idAplicacion,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("SELECT * FROM aplicaciones WHERE idAplicacion=:idAplicacion");
			$stmt->bindParam(':idAplicacion',$idAplicacion);
			$stmt->execute();
			$aplicacion=$stmt->fetch();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener los datos de la aplicacion";
			header("Location: ../exception.php");
			die();
		}
		return $aplicacion;
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
