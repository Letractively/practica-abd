

<?php
	session_start();
	include_once("php/gestionarConexionBD.php");
	include_once("php/gestionAplicaciones.php");
	include_once("php/funciones.php");
	
	if(!isset($_SESSION["estasDentro"])){
		session_destroy();
		header("Location: index.php");
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>
		 Subir Aplicacion
		</title>
		<link rel="stylesheet" type="text/css" href="estilos/index.css" />
		<script type="text/javascript" src="javascript/aplicacion.js" charset="utf-8"></script>
            		
	</head>
	<body>
		<div id="paginaentera">
		    <div id="centro">
	            <div class='subetuaplicacion'>
					<img src='imagenes/subetuaplicacion.jpg'  alt='aplicacion' title='sube tu aplicacion'/>
		
   		<div id="div_form">
		
	    	<form id="form_aplicacion" method="post" onsubmit="return principal()" action="php/gestionSubeAplicacion.php" enctype="multipart/form-data">
		  
	        	<div id="div_datos_aplicacion">	
	          		<fieldset>
						<legend>Datos aplicacion </legend>
	              			<div id="div_nombre">
	              				<label id="label_nombre" for="nombre">Nombre de la aplicacion</label>
	              				<input id="nombre" name="nombre" type="text" maxlength="50" value=""/>
	              			</div>
							<div id="div_descripcion">
				             	<label id="label_descripcion" for="descripcion">Descripci&oacute;n </label>
				              	<input id="descripcion" name="descripcion" type="text" value=""/>
				            </div>
							
							<div id="div_imagen">
	  							<label id="label_imagen" for="imagen">Seleccione imagen: </label>
								<input id="imagen" type="file" name="imagen" value="" />
							</div> 
							
							<div id="div_tipo">
				             	<label id="label_tipo" for="tipo">Tipo</label>
                	            <select id="tipo"  name="tipo">
							          <option>imagen/audio/video</option>
							          <option>Internet</option>
							          <option>Utilidades</option>
							          <option>Seguridad</option>
							          <option>Personalizacion</option>
							          <option>Otros</option>
				            </div>
						
							<div id="div_aaplicacion">
							    <label for="archivo">  Archivo:  </label>
		                         <input type="file" name="archivo" id="archivo" />
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
