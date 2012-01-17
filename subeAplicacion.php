

<?php
	session_start();
	include_once("PHP/gestionarConexionBD.php");
	include_once("PHP/gestionAplicaciones.php");
	include_once("PHP/funciones.php");
	
	if(!isset($_SESSION["estasDentro"])){
		session_destroy();
		header("Location: index.php");
	}else{
		$estasDentro=$_SESSION["estasDentro"];
		$idAplicacion=$_REQUEST["idAplicacion"];
		if(isset($idAplicacion) && !esNulo($_REQUEST,"index")){
			$conexion=CrearConexionBD();
			$apli=getAplicacion($idAplicacion,$conexion);
			CerrarConexionBD($conexion);
			if(isset($apli) && ($apli["idUsuario"]==$estasDentro["idUsuario"])){
				$_SESSION["modificar"]=$apli["idAplicacion"];//Guardo el id en la sesion para poder utilizarla en tratamientoAplicacion.php
			}
		}
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>
		<?php 
			if(isset($modificar))
				echo "Modificar Aplicacion";
			else
				echo "Subir Aplicacion";
		?>
		</title>
		<link rel="stylesheet" type="text/css" href="estilos/cabecera.css" />
		<script type="text/javascript" src="javascript/aplicacion.js" charset="utf-8"></script>
            		
	</head>
	<body>
		<div id="paginaentera">

		<?php
			$aplicacion=$_SESSION["aplicacion"];
			if(!isset($aplicacion) && !isset($modificar)){
				$aplicacion=array();
				$_SESSION["aplicacion"]=$aplicacion;
			}else if(!isset($aplicacion) && isset($modificar)){
				$aplicacion=$apli;
				$_SESSION["aplicacion"]=$aplicacion;
			}
			
			include_once("cabecera.php");
		?>
		
		<div id="centro">
		
		<?php 
			if(isset($modificar)){
				echo "<div class='modificartuaplicacion'>"; 
					echo "<img src='imagenes/modificartuaplicacion.JPG'  alt='aplicaciones' title='modifica tu aplicacion'/>";
				echo "</div>";
			}else{
				echo "<div class='subetuaplicacion'>"; 
					echo "<img src='imagenes/subetuaplicacion.JPG'  alt='aplicacion' title='sube tu aplicacion'/>";
				echo "</div>";	
			}
		?>
		
   		<div id="div_form">
		<!-- El codigo php asociado al atributo value de los input sirve para que en caso de que halla errores no 
		obligar al usuario a tener que escribir de nuaplio todos los campos, sino que conservan su valor -->
	    	<form id="form_aplicacion" method="post" onsubmit="return principal()" action="PHP/gestionSubeAplicacion.php" enctype="multipart/form-data">
		  
	        	<div id="div_datos_aplicacion">	
	          		<fieldset>
						<legend>Datos aplicacion </legend>
	              			<div id="div_nombre">
	              				<label id="label_nombre" for="nombre">Nombre de la aplicacion</label>
	              				<input id="nombre" name="nombre" type="text" maxlength="50" value="<?php echo $aplicacion["nombre"]?>"/>
	              			</div>
							<div id="div_descripcion">
				             	<label id="label_descripcion" for="descripcion">Descripci&oacute;n </label>
				              	<input id="descripcion" name="descripcion" type="text" value="<?php echo $aplicacion["descripcion"]?>"/>
				            </div>
							
							<div id="div_imagen">
	  							<label id="label_imagen" for="imagen">Seleccione imagen: </label>
								<input id="imagen" type="file" name="imagen"/>
							</div> 
							<div id="div_aaplicacion">
	  							<label id="label_aaplicacion" for="imagen">Seleccione Aplicacion: </label>
								<input id="aaplicacion" type="file" name="aaplicacion"/>
							</div>
				    </fieldset>
	
				<div id="div_submit">
					<button id="submit">Enviar</button>
				</div>	
			</form>
		</div>
		
		<div id="div_valcss">
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
        		<img class="valua"
            		src="http://jigsaw.w3.org/css-validator/images/vcss"
            		alt="�CSS V�lido!" />
    		</a>
    	</div>
		
		
	
		<?php //En caso de que halla errores se creara un div para mostrarlos
        	$errores=$_SESSION["errores_aplicacion"];
        	if(isset($errores) && is_array($errores)){
				echo "<div id='errores' class='error'>";
				foreach($errores as $error){
					echo "$error<br/>";
				}
				echo "</div>";
			}
			echo "</div>";
			include_once("pie.php");
    	?>
	</div>
	</body>
</html>
