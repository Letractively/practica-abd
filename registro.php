<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <link rel="stylesheet" type="text/css"  href="estilos/index.css" />
     <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	 <script type="text/javascript" src="javascript/registro.js"></script>
	 <title>Registro</title>
	 	
</head>


 
<body>
<div id="pagina_entera">	
	
	
	<?php
		session_start(); 
    	if (!isset($_SESSION["estasDentro"])){
    		include_once("cabecera.php");
			if(!isset($_SESSION["registro"])){//Variable para el formulario de registro
	  			$registro=array();
	  			$_SESSION["registro"]=$registro;
	  		}else{
	  			$registro= $_SESSION["registro"];
	  		}
    	}else{
    		$dentro= $_SESSION["estasDentro"];
    		include_once("cabeceralogueado.php");
			include_once ("php/gestionUsuarios.php");
			$registro= recuperarUsuario($dentro["usuario"]);
			$_SESSION["registro"]=$registro;
    	}
	?>
	<hr/>
  
	
	<?php 
	include_once("menu.php");
	?>
	
			
	<div id="centro">
		
	<center>
	
	<form id="registroUsuario" enctype="multipart/form-data" method="post" onsubmit="return validarFormulario()" 
	action="php/tratarRegistro.php">
		<div id="imprescindibles">
			<fieldset>
				<legend><b><u>Datos de registro</u></b></legend>
				<label for="nick"><b>Nick:</b></label><br />
				<input type="text" name="nick" id="nick" title="Nick del usuario" size="16" 
					value="<?php if (isset($registro["nick"])) echo $registro["nick"];?>"/><br />
				<label for="password"><b>Contraseña:</b></label><br />
				<input id="pass" name="pass" type="password" size="8" maxlength="8" title="La contraseña
				debe de tener entre 4 y 8 caracteres"/><br />
				<label for="passwordBis"><b>Repite la contraseña:</b></label><br />
				<input id="passwordBis" name="passwordBis" type="password" size="8" maxlength="8" title="La contraseña
				debe de ser identica a la anterior" onchange="verificarContraseña()"/><br />
				<label for="mail"><b>E-Mail:</b></label><br />
				<input id="mail" name="mail" type="email" title="Direccion de correo electronico valida"
					value="<?php if (isset($registro["mail"])) echo $registro["mail"]; ?>"/><br />
			</fieldset>
		</div>
		<div id="datosPersonales">
			<fieldset>
				<legend><b><u>Datos personales</u></b></legend>
				<label for="nombre">Nombre:</label><br />
				<input id="nombre" name="nombre" type="text" title="Nombre de usuario" 
					value="<?php if (isset($registro["nombre"])) echo $registro["nombre"]; ?>"/><br />
				<label for="apellidos">Apellidos:</label><br />
				<input id="apellidos" name="apellidos" type="text" title="Apellidos de usuario"
					value="<?php if (isset($registro["apellidos"])) echo $registro["apellidos"]; ?>"/><br />
				<label for="poblacion">Población:</label><br />
				<input id="poblacion" name="poblacion" type="text" title="Localidad de residencia"
					value="<?php if (isset($registro["poblacion"])) echo $registro["poblacion"];?>"/><br />
				<label for="provincia">Provincia:</label><br />
				<input id="provincia" name="provincia" type="text" title="Provincia de residencia"
					value="<?php if (isset($registro["provincia"])) echo $registro["provincia"];?>"/><br />
				<label for="codigoPostal">CP:</label><br />
				<input id="codigoPostal" name="codigoPostal" type="number" size="5" maxlength="5" title="Codigo Postal"
					value="<?php if (isset($registro["codigoPostal"])) echo $registro["codigoPostal"];?>"/><br />
				Sexo: <input id="varon" name="sexo" type="radio" title="Hombre" value="hombre"
				<?php if (isset($registro["sexo"])) {
						if($registro["sexo"]=="hombre") echo "checked=checked";
					}else echo "checked=checked"?>/>
				<label for="varon">Hombre</label>
				<input id="mujer" name="sexo" type="radio" title="Mujer" value="mujer"
				<?php if (isset($registro["nombre"])){
						if($registro["sexo"]=="mujer") echo "checked=checked";
					}?>/>
				<label for="mujer">Mujer</label>
			</fieldset>
		</div>
		
		<div id="botonera">
			<input id="enviar" name="enviar" type="submit" value="Enviar Datos"/>
     		<input value="Limpiar formulario" type="reset" />
		</div>
	</form>
	<?php //En caso de que halla errores se creara un div para mostrarlos
		if (isset($_SESSION["erroresRegistro"])){
			$errores=$_SESSION["erroresRegistro"];
	       	if(isset($errores) && is_array($errores)){
				echo "<div id='errores' class='error'>";
				foreach($errores as $error){
					echo "$error<br/>";
				}
				echo "</div>";
			}	
		}
    ?>
		</center>  
		<p><center><a href="index.php"><img src="imagenes/volver.jpg"></a></p>			  
       </div>					
  	</div>
</body>
</html>
