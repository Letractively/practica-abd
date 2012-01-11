<?php
	session_start();
	include_once("PHP/gestionarConexionBD.php");
	include_once("PHP/gestionAplicaciones.php");
	include_once("PHP/gestionUsuarios.php");
	
	if(!isset($_SESSION["estasDentro"])){ // Comprueba que estamos logados.
		session_destroy();
		header("Location: index.html");
	}else{
		$idaplicacion=$_REQUEST["idAplicacion"]; // Obtiene la variable de la url.
		if($idAplicacion!=""){ // Comprueba que el parametro pasado en la url no es nulo.
			$conexion=CrearConexionBD();
			$aplicacion=getAplicacion($idAplicacion,$conexion);// Obtiene la aplicacion solicitada.
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
		<div id="div_tituloevento">
			<legend><?php echo "$evento[titulo]"?></legend>
		</div>
		
		<br/>
		
		<div id="div_imagen" class="marco">
			<img class="fotoevento" src="imagenes/fotosEventos/<?php echo "$evento[imagen]"?>"title="foto del evento" alt="fotoevento"/>
		</div>
		
		<div id="div_descripcion">
			<div id="div_datos">
				<label id="label_datos">Fecha y hora:</label>
				<fieldset>
					<p>
						<?php echo "$evento[fecha] $evento[hora]"?>
					</p>
				</fieldset>	
			</div>
			
			<div>
				<label id="label_direccion">Lugar:</label>
				<fieldset>
					<p>
						<?php echo "$evento[direccion], $evento[ciudad]"?>
					</p>
				</fieldset>
			</div>
			
			<div>
				<label id="label_descripcion">Descripci&oacute;n:</label>
				<fieldset>
					<p>
						<?php echo "$evento[descripcion]"?>
					</p>
				</fieldset>
			</div>
		
			<div>
				<label id="label_recomendaciones">Recomendaciones:</label>
				<fieldset>
					<p>
						<?php echo "$evento[recomendar]"?>
					</p>
				</fieldset>
			</div>
		</div>
		
		<?php
			$conexion=CrearConexionBD();
			$estasDentro=$_SESSION["estasDentro"];
			$unido=usuarioUnido($estasDentro["idusuario"],$idevento,$conexion);//Compruebo si el usuario ya esta unido a este evento
			CerrarConexionBD($conexion);
			echo "<form id='form_masInfo' method='post' action='PHP/tratamientoUnirseEvento.php?unido=$unido'>";//Paso la funcion a realizar mediante una variable en la url
				if(!$unido){//Si no lo esta le doy la opcion de unirse
					echo "<div id='div_unirse'>";
						echo" <button id='unirse'>Unirse</button>";
					echo "</div>";
				}else{//Si ya esta unido le doy la opcion de borrarse
					echo "<span><h3>Ya estas unido a este evento</h3></span>";
					echo "<div id='div_borrarse'>";
						echo" <button id='borrarse'>Borrarse</button>";
					echo "</div>";
				}	
			echo"</form>";
		?>
		
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
