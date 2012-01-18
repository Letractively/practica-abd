<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <link rel="stylesheet" type="text/css"  href="estilos/index.css" />
     <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	 <script type="text/javascript" src="javascript/login.js" charset="utf-8"></script>
	 <title>Juegos</title>
	 	
</head>

<body> 
<div id="pagina_entera">
	<?php 
		      include_once("php/gestionarConexionBD.php");
	          include_once("php/gestionUsuarios.php");
			  include_once("php/gestionAplicaciones.php");
			  include_once("php/gestionJuegos.php");
			  session_start();
			    		
    		if(!isset($_SESSION["login"])){//Comprobamos si tenemos la variable de sesion creada
    			$login=array();
    			$_SESSION["login"]=$login;
    		}
    	?>
		
		
		<!--  div con la logotipo de fondo y login-->
    	
    		<?php 
    			if (!isset($_SESSION["estasDentro"])){
    				include_once("cabecera.php");	
    			}else{
    				$dentro= $_SESSION["estasDentro"];
    				include_once("cabeceralogueado.php");
    			}
			?>
    		 
         
        <HR>
  
	
	<?php 
	include_once("menu.php");
	?>
	
			
	<div id="centro">

	<?php
	
	$idJuego=$_REQUEST["idJuego"]; 
	if($idJuego!=""){ // Comprueba que el parametro pasado en la url no es nulo.
			$conexion=CrearConexionBD();
			$juego=getJuegoId($idJuego,$conexion);// Obtiene la aplicacion solicitada.
			CerrarConexionBD($conexion);
			if($juego=="")// Comprueba que la aplicacion exista.
				header("Location: index.php");
			else
				$_SESSION["idJuego"]=$idJuego;// Si existe guardo el id de la aplicacion en la sesion.
		}else
			header("Location: index.html");
	
?>



			<legend><?php echo "$juego[Nombre]"?></legend>
		
		<br/>
		
		
			<img class="img_apli" src="imagenes/img_apli/<?php echo "$juego[Foto]"?>"title="Imagen Juego" alt="imgJuego"/>
		
		
		
				<label id="label_descripcion">Descripci&oacute;n:</label>
				<fieldset>
					<p>
						<?php echo "$juego[Descripcion]"?>
					</p>
				</fieldset>
					
				<label id="label_descarga">Descarga</label>
				<fieldset>
					<p>
						<?php echo "PNER AKI CODIGO DE DESCARGA"?>
					</p>
				</fieldset>
				
		
			
		</div>
		
		</html>

