<?php
	session_start();
	include_once("PHP/gestionarConexionBD.php");
	include_once("PHP/gestionAplicaciones.php");
	include_once("PHP/gestionUsuarios.php");
	
	if(!isset($_SESSION["estasDentro"])){ // Comprueba que estamos logados.
		session_destroy();
		header("Location: index.html");
	}else{
		$idAplicacion=$_REQUEST["idAplicacion"]; // Obtiene la variable de la url.
		if($idAplicacion!=""){ // Comprueba que el parametro pasado en la url no es nulo.
			$conexion=CrearConexionBD();
			$aplicacion=getAplicacionId($idAplicacion,$conexion);// Obtiene la aplicacion solicitada.
			CerrarConexionBD($conexion);
			if($aplicacion=="")// Comprueba que la aplicacion exista.
				header("Location: index.html");
			else
				$_SESSION["idAplicacion"]=$idAplicacion;// Si existe guardo el id de la aplicacion en la sesion.
		}else
			header("Location: index.html");
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css"  href="estilos/masinfoAplicacion.css"/>
		<link rel="stylesheet" type="text/css"  href="estilos/cabecera.css"/>
		<title>Mas Info Aplicaciones</title>
	</head>
	<body>
	<div id="paginaentera">
	<?php include_once("cabecera.php");?>
	
	<div id="centro"> 
		<div id="div_nombreAplicacion">
			<legend><?php echo "$aplicacion[Nombre]"?></legend>
		</div>
		
		<br/>
		
		<div id="div_imagen" class="marco">
			<img class="img_apli" src="imagenes/img_apli/<?php echo "$aplicacion[Foto]"?>"title="Imagen Aplicacion" alt="imgAplicacion"/>
		</div>
		
		<div id="div_descripcion">
			<div>
				<label id="label_descripcion">Descripci&oacute;n:</label>
				<fieldset>
					<p>
						<?php echo "$aplicacion[Descripcion]"?>
					</p>
				</fieldset>
			</div>
			
		<div id="div_descarga">
			<div>
				<label id="label_descarga">Descarga</label>
				<fieldset>
					<p>
						<?php echo "PNER AKI CODIGO DE DESCARGA"?>
					</p>
				</fieldset>
			</div>	
		
			
		</div>
		
		
		<div id="div_valcss">
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
       				 <img class="valua"
            		src="http://jigsaw.w3.org/css-validator/images/vcss"
            		alt="�CSS V�lido!" />
    		</a>
		</div>
	
		<br/>
		<?php include_once("pie.php");?>
		</div>
	</body>
</html>
