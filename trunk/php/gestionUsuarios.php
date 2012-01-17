<?php
	
	include_once("gestionarConexionBD.php");


	function insertarUsuario($registro){
		$conexion=crearConexionBD();
		$insertado=false;
		$fecha= date("Y-m-d",time());
		//$insertado=uploadImagen($registro);
		try{
			$query="insert into usuarios (nick, pass, mail, fechaRegistro, nombre, apellidos, poblacion, 
			provincia, codigoPostal, sexo) values ('$registro[nick]', '$registro[password]', '$registro[mail]', 
			'$fecha', '$registro[nombre]', '$registro[apellidos]', '$registro[poblacion]', '$registro[provincia]', 
			'$registro[codigoPostal]', '$registro[sexo]');";
			$conexion->exec($query);
			$insertado=true;
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al insertar los datos del usuario";
			header("Location: ../exception.php");
			die();
		}
		cerrarConexionBD($conexion);
		return $insertado;
	}
	
	function actualizarUsuario($idUsuario, $registro){
		$conexion=crearConexionBD();
		$insertado=false;
		$fecha= date("Y-m-d",time());
		//$insertado=uploadImagen($registro);
		try{
			$query="update usuarios set nick='$registro[nick]', pass='$registro[password]', mail='$registro[mail]', 
			nombre='$registro[nombre]', apellidos='$registro[apellidos]', poblacion='$registro[poblacion]', 
			provincia='$registro[provincia]', codigoPostal='$registro[codigoPostal]', sexo='$registro[sexo]'
				where idUsuario='$idUsuario';";
			$conexion->exec($query);
			$insertado=true;
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al actualizar los datos del usuario";
			header("Location: ../exception.php");
			die();
		}
		cerrarConexionBD($conexion);
		return $insertado;
	}
		
	//Modifica la imagen del usuario
	function cambiarFoto($idusuario,$fotoAnt,$fotoAct,$conexion){
		if($fotoAnt!="default.jpg" && file_exists("../imagenes/fotosUsuarios/".$fotoAnt))
			unlink("../imagenes/fotosUsuarios/".$fotoAnt);
		$stmt=null;
		if(file_exists("../imagenes/fotosUsuarios/".$fotoAct)){
			try{
				$stmt=$conexion->prepare("UPDATE usuarios SET foto=:foto WHERE idUsuario=:idUsuario");
				$stmt->bindParam(':idUsuario',$idusuario);
				$stmt->bindParam(':foto',$fotoAct);
				$stmt->execute();
			}catch(PDOException $e){
				$_SESSION["exception"]="Error al cambiar la foto del usuario";
				header("Location: ../exception.php");
				die();
			}
		}
		return $stmt;
	}
	
	//Elimina el usuario asociado al id de la BD y su foto
	function eliminarUsuario($idusuario,$foto,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("delete from usuarios where idUsuario=:idUsuario");
			$stmt->bindParam(':idUsuario',$idusuario);
			$stmt->execute();
			if($foto!="default.jpg" && file_exists("../imagenes/fotosUsuarios/".$foto))
				unlink("../imagenes/fotosUsuarios/".$foto);
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al eliminar el usuario";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;
	}
	
	//Comprueba si un usuario esta registrado
	function estaRegistrado($usuario,$password,$conexion){
		$registrado=false;
		try{
			$stmt=$conexion->prepare("SELECT nick, pass FROM usuarios WHERE nick=:nick");
			$stmt->bindParam(':nick',$usuario);
			$stmt->execute();
			$user=$stmt->fetch();
			if($user!=null){
				if($user["pass"]==$password){
					$registrado=true;
				}
			}
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al comprobar si el usuario esta registrado";
			header("Location: ../exception.php");
			die();
		}
		return $registrado;
		
	}
	
	//Comprueba si ya existe otro usuario con el mismo nombre registrado
	function nombreOcupado($nick){
		$conexion=crearConexionBD();
		$ocupado=false;
		try{
			$stmt=$conexion->prepare("SELECT * FROM usuarios WHERE nick=:nick");
			$stmt->bindParam(':nick',$nick);
			$stmt->execute();
			$usuario=$stmt->fetch();
			if($usuario!=null){
				$ocupado=true;
			}
			
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener los datos del usuario";
			header("Location: ../exception.php");
			die();
		}
		cerrarConexionBD($conexion);
		return $ocupado;	
	}
	
	//Devuelve todos los datos del usuario con ese nombre
	function getUsuario($usuario,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("SELECT * FROM usuarios WHERE nick=:nick");
			$stmt->bindParam(':nick',$usuario);
			$stmt->execute();
			$user=$stmt->fetch();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener los datos del usuario";
			header("Location: ../exception.php");
			die();
		}
		return $user;
	}
	
	function getNombreUsuario($idusuario,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("SELECT usuario FROM usuarios WHERE idUsuario=:idUsuario");
			$stmt->bindParam(':idUsuario',$idusuario);
			$stmt->execute();
			$usuario=$stmt->fetch();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener el nombre de usuario";
			header("Location: ../exception.php");
			die();
		}
		return $usuario["usuario"];
	}
	
	//Devuelve una lista con todos los usuarios registrados
	function listaUsuarios($conexion){
		$stmt=null;
		try{
			$stmt=$conexion->query("SELECT * FROM usuarios");
			$stmt->execute();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener los datos de todos los usuarios";
			header("Location: ../exception.php");
			die();
		}
		return $stmt;
	}
	
	//Cuenta el n� de tuplas de la lista pasada por parametro
	function cuentaTuplas($stmt){
		$num=0;
		foreach ($stmt as $row){
			$num+=1;
		}
		return $num;
	}
	
	function recuperarUsuario($nick){
		$conexion=crearConexionBD();
		$usuario=getUsuario($nick, $conexion);
		cerrarConexionBD($conexion);
		$registro=array();
		$registro["nick"]=$usuario["nick"];
		$registro["mail"]=$usuario["mail"];
		$registro["nombre"]=$usuario["nombre"];
		$registro["apellidos"]=$usuario["apellidos"];
		$registro["poblacion"]=$usuario["poblacion"];
		$registro["provincia"]=$usuario["provincia"];
		$registro["codigoPostal"]=$usuario["codigoPostal"];
		$registro["sexo"]=$usuario["sexo"];
		return $registro;
	}

?>