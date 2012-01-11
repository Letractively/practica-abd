<?php 
	session_start();
	include_once("PHP/gestionarConexionBD.php");
	include_once("PHP/gestionUsuarios.php");
	//incluimos los php de la bd y la gestion de usuarios
	unset($_SESSION["errores_index"]);//Borramos los errores procedentes de index
	$estasDentro=$_SESSION["estasDentro"];
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>
	<?php if(!isset($estasDentro))
    		echo "Registrate";
    	  else
    	  	echo "Cambia de Usuario";
    ?>
	</title>
	
	
	<script type="text/javascript" src="javascript/registro.js"></script>
</head>

<body>
	<form id="registroUsuario" method="post">
		<fieldset>
			<table summary="Datos Imprescindibles">
				<tr>
				<td><b>Nick:</b></td>
				<td>
					<input type="text" name="nick" id="nick" title="Nick del usuario" size="16"/>
				</td>
				</tr>
				<tr>
					<td><b>Contraseña:</b></td>
					<td>
						<input id="contraseña" name="contraseña" type="password" size="8" maxlength="8" title="La contraseña 
						debe de tener entre 4 y 8 caracteres"/>
					</td>
				</tr>
				<tr>
					<td><b>Repite contraseña:</b></td>
					<td>
						<input id="contraseñaBis" name="contraseñaBis" type="password" size="8" title="La contraseña 
						debe de ser identica a la anterior"/>
					</td>
				</tr>
				<tr>
					<td><b>Correo electronico:</b></td>
					<td>
						<input id="mail" name="mail" type="email" title="Direccion de correo electronico valida"/>
					</td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend>Datos personales</legend>
			<table summary="Datos Personales">
				<tr>
				<td>Nombre:</td>
				<td colspan="3">
					<input id="nombre" name="nombre" type="text" title="Nombre de usuario"/>
				</td>
				</tr>
				<tr>
					<td>Apellidos:</td>
					<td colspan="3">
						<input id="apellidos" name="apellidos" type="text" title="Apellidos de usuario"/>
					</td>
				</tr>
				<tr>
					<td>Población:</td>
					<td colspan="3">
						<input id="poblacion" name="poblacion" type="text" title="Localidad de residencia"/>
					</td>
				</tr>
				<tr>
					<td>Provincia:</td>
					<td>
						<input id="provincia" name="provincia" type="text" title="Provincia de residencia"/>
					</td>
					<td>C.P.:</td>
					<td>
						<input id="codigoPostal" name="codigoPostal" type="number" size="5" maxlength="5" 
						title="Codigo Postal" />
					</td>
				</tr>
				<tr>
					<td>Sexo:</td>
					<td>
						<label for="varon">Hombre</label>
						<input id="varon" name="sexo" type="radio" title="Hombre"/>
					</td>
					<td>
						<label for="mujer">Mujer</label>
						<input id="mujer" name="sexo" type="radio" title="Mujer"/>
					</td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<label for="foto">Avatar:</label>
			<input id="foto" name="foto" type="file" title="Direccion del la imagen para el avatar"/>
			<img src="images/emptyAvatar.png" alt="Avatar vacio" />
		</fieldset>
		<div id="botonera">
			<input id="enviar" name="enviar" type="submit" value="Enviar Datos"/>
     		<input value="Limpiar formulario" type="reset" />
		</div>
	</form>
</body>
</html>