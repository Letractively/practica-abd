

<?php
	session_start();
	include_once("php/gestionarConexionBD.php");
	include_once("php/gestionAplicaciones.php");
	include_once("php/funciones.php");
	
	if(!isset($_SESSION["estasDentro"])){
		session_destroy();
		header("Location: index.php");
	}else{
		$estasDentro=$_SESSION["estasDentro"];
		$idJuego=$_REQUEST["idJuego"];
		
		
		if(isset($idJuego) && !esNulo($_REQUEST,"index")){
			$conexion=CrearConexionBD();
			$apli=getAplicacionId($idAplicacion,$conexion);
			CerrarConexionBD($conexion);
			if(isset($apli) && ($apli["idUsuario"]==$estasDentro["idUsuario"])){
				$modificar=true;   
				$_SESSION["modificar"]=$apli["idAplicacion"];//Guardo el id en la sesion para poder utilizarla en tratamientoAplicacion.php
			}
		}
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>
		 Subir Aplicacion
		</title>
		<link rel="stylesheet" type="text/css" href="estilos/index.css" />
		<script type="text/javascript" src="javascript/juego.js" charset="utf-8"></script>
            		
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
		?>
		
		<div id="centro">
	
				<div class='subetujuego'>"
					<img src='imagenes/subetujuego.JPG'  alt='juego' title='sube tu juego'/>
				</div>
		
   		<div id="div_form">
		
	    	<form id="form_juego" method="post" onsubmit="return principal()" action="PHP/gestionSubeJuegos.php" enctype="multipart/form-data">
		  
	        	<div id="div_datos_juegos">	
	          		<fieldset>
						<legend>Datos juego </legend>
	              			<div id="div_nombre">
	              				<label id="label_nombre" for="nombre">Nombre del Juego</label>
	              				<input id="nombre" name="nombre" type="text" maxlength="50" value=""/>
	              			</div>
	              			<div id="div_tipo">
				             	<label id="label_tipo" for="tipo">Tipo</label>
                	            <select id="tipo"  name="tipo" value=""/>
							          <option>Accion</option>
							          <option>Simulacion</option>
							          <option>Aventura Grafica</option>
							          <option>Rpg</option>
							          <option>Estrategia</option>
									  <option>Deportes</option>
									  <option>Infantil</option>
							          <option>Otros</option>
							          </select> 
				            </div>
							
							<div id="div_descripcion">
				             	<label id="label_descripcion" for="descripcion">Descripci&oacute;n </label>
				              	<input id="descripcion" name="descripcion" type="text" value=""/>
				       </div>
							
							<div id="div_imagen">
	  							<label id="label_imagen" for="imagen">Seleccione imagen: </label>
								<input id="imagen" type="file" name="imagen" value="" />
							</div> 
							<div id="div_aaplicacion">
	  							<label id="label_ajuego" for="ajuego">Seleccione Juego: </label>
								<input id="ajuego" type="file" name="ajuego" value="" />
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
			if(isset($_SESSION["errores_aplicacion"])){
				$errores=$_SESSION["errores_aplicacion"];
				if(isset($errores) && is_array($errores)){
					echo "<div id='errores' class='error'>";
					foreach($errores as $error){
						echo "$error<br/>";
					}
					echo "</div>";
				}
				echo "</div>";
			}
    	?>
	</div>
	</body>
</html>
