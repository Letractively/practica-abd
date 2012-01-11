<?php
	session_start();

	//Registra un usuario en la BD
	function registrarUsuario($usuario,$password,$nombre,$apellidos,$email,$direccion,$provincia,$cp,$sexo,$conexion){
		$stmt=null;
		try{
			$SQL="INSERT INTO usuarios (idusuario,usuario,password,nombre,apellidos,email,direccion,provincia,cp,sexo,foto) 
			VALUES('NULL','$usuario','$password','$nombre','$apellidos','$email','$direccion','$provincia','$cp','$sexo','default.jpg')";
			$stmt=$conexion->exec($SQL);
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al registrar al usuario";
			header("Location: ../exception.php");
			die();
		}		
		return $stmt;
	}
	
	//Modifica los datos de un usuario
	function cambiarPerfil($perfil,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("UPDATE usuarios SET usuario=:usuario,password=:password,nombre=:nombre,
			apellidos=:apellidos,email=:email,direccion=:direccion,provincia=:provincia,cp=:cp,sexo=:sexo 
			WHERE idusuario=:idusuario");
			$stmt->bindParam(':idusuario',$perfil["idusuario"]);
			$stmt->bindParam(':usuario',$perfil["usuario"]);
			$stmt->bindParam(':password',$perfil["password"]);
			$stmt->bindParam(':nombre',$perfil["nombre"]);
			$stmt->bindParam(':apellidos',$perfil["apellidos"]);
			$stmt->bindParam(':email',$perfil["email"]);
			$stmt->bindParam(':direccion',$perfil["direccion"]);
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
				$stmt=$conexion->prepare("UPDATE usuarios SET foto=:foto WHERE idusuario=:idusuario");
				$stmt->bindParam(':idusuario',$idusuario);
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
			$stmt=$conexion->prepare("DELETE FROM usuarios WHERE idusuario=:idusuario");
			$stmt->bindParam(':idusuario',$idusuario);
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
			$stmt=$conexion->prepare("SELECT * FROM usuarios WHERE usuario=:usuario AND password=:password");
			$stmt->bindParam(':usuario',$usuario);
			$stmt->bindParam(':password',$password);
			$stmt->execute();
			$usuario=$stmt->fetch();;
			if($usuario!="")
				$registrado=true;
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al comprobar si el usuario esta registrado";
			header("Location: ../exception.php");
			die();
		}
		return $registrado;
		
	}
	
	//Comprueba si ya existe otro usuario con el mismo nombre registrado
	function nombreOcupado($usuario,$conexion){
		$estasDentro=$_SESSION["estasDentro"];
		$usuario=getUsuario($usuario,$conexion);
		$ocupado=false;
		if($usuario!=null && isset($estasDentro)&& $usuario["idusuario"]!=$estasDentro["idusuario"])//Si estamos cambiando el perfil y
			$ocupado=true; //existe un usuario con el mismo nombre que no somos nosostros
		else if($usuario!=null && !isset($estasDentro))//Si nos estamos registrando y existe otro usuario con el mismo nombre
			$ocupado=true;
		return $ocupado;
		
	}
	
	//Devuelve todos los datos del usuario con ese nombre
	function getUsuario($usuario,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("SELECT * FROM usuarios WHERE usuario=:usuario");
			$stmt->bindParam(':usuario',$usuario);
			$stmt->execute();
			$usuario=$stmt->fetch();
		}catch(PDOException $e){
			$_SESSION["exception"]="Error al obtener los datos del usuario";
			header("Location: ../exception.php");
			die();
		}
		return $usuario;
	}
	
	function getNombreUsuario($idusuario,$conexion){
		$stmt=null;
		try{
			$stmt=$conexion->prepare("SELECT usuario FROM usuarios WHERE idusuario=:idusuario");
			$stmt->bindParam(':idusuario',$idusuario);
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
	
	//Cuenta el nº de tuplas de la lista pasada por parametro
	function cuentaTuplas($stmt){
		$num=0;
		foreach ($stmt as $row){
			$num+=1;
		}
		return $num;
	}

?>