<?php
		//Iniciamos la sesion e importamos las librerias necesarias
		session_start();
		include_once("gestionarConexionBD.php");
		include_once("gestionUsuarios.php");
		include_once("funciones.php");
		
		$login=$_SESSION["login"];//Recuperamos la variable creada en index.php
		$errores=array();
		if(isset($login)){/*si no existe la variable login quiere decir que no viene de la pagina index.php*/
			$login["usuario"]=$_REQUEST["usuario"];//Guardamos los valores enviados en el formulario
			$login["password"]=$_REQUEST["password"];
			if(esNulo($login,"usuario"))
				array_push($errores,"Introduzca su nombre de usuario");
			if(esNulo($login,"password"))
				array_push($errores,"Introduzca su contrase&ntilde;a");
			$_SESSION["errores_index"]=$errores;
			if(count($errores)==0){//Si no hay errores nos conectamos a la BD y comprobamos que el usuario esta registrado
				$conexion=crearConexionBD();
				$registrado=estaRegistrado($login["usuario"],$login["password"],$conexion);
				if($registrado){
					unset($_SESSION["errores_index"]);//Borramos los  errores de index.php
					$usuario=getUsuario($login["usuario"],$conexion);
					cerrarConexionBD($conexion);
					$estasDentro=array();//Creamos una variable para saber que nos hemos logueado
					$estasDentro["idUsuario"]=$usuario["idUsuario"];//Guardamos los datos que utilizaremos una vez dentro
					$estasDentro["usuario"]=$usuario["nick"];
					$estasDentro["foto"]=$usuario["foto"];
					$_SESSION["estasDentro"]=$estasDentro;//Y la guardamos en la sesion
					header("Location: ../index.php");//Redireccionamos a index
				}else{//Si se produce algun error redireccionamos a index.php y guardamos el error, pero en este caso no lleva el estasDentro
					cerrarConexionBD($conexion);
					array_push($errores,"Debes estar registrado");
					$_SESSION["errores_index"]=$errores;
					header("Location: ../index.php");
					
				}
			}else{
				header("Location: ../index.php");
				}
				
			
		}else{
			header("Location: ../index.php");
			}
?>