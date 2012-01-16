<?php


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
	
	//Modifica los datos de un usuario
	function cambiarPerfil($perfil,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("UPDATE usuarios SET usuario=:nick,pass=:password,nombre=:nombre,
			apellidos=:apellidos,mail=:email,poblacion=:poblacion,provincia=:provincia,codigoPostal=:cp,sexo=:sexo 
			WHERE idusuario=:idusuario");
			$stmt->bindParam(':idUsuario',$perfil["idUsuario"]);
			$stmt->bindParam(':usuario',$perfil["usuario"]);
			$stmt->bindParam(':password',$perfil["password"]);
			$stmt->bindParam(':nombre',$perfil["nombre"]);
			$stmt->bindParam(':apellidos',$perfil["apellidos"]);
			$stmt->bindParam(':mail',$perfil["mail"]);
			$stmt->bindParam(':poblacion',$perfil["poblacion"]);
			$stmt->bindParam(':provincia',$perfil["provincia"]);
			$stmt->bindParam(':cp',$perfil["cp"]);
			$stmt->bindParam(':sexo',$perfil["sexo"]);
			$stmt->execute();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al modificar el perfil de usuario";
			header("Location: ../exception.php");
			die();
		}
			return $stmt;		
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
		if($foto!="default.jpg" && file_exists("../imagenes/fotosUsuarios/".$foto))
			unlink("../imagenes/fotosUsuarios/".$foto);
		$stmt=null;
		try{
			$stmt=$conexion->prepare("DELETE FROM usuarios WHERE idUsuario=:idUsuario");
			$stmt->bindParam(':idUsuario',$idusuario);
			$stmt->execute();
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

?>