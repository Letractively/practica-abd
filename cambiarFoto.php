<?php
	session_start();
	if(!isset($_SESSION["estasDentro"])){//Comprobamos que estamos logueado, de lo contrario destruimos la sesion y volvemos a index.php
		session_destroy();
		header("Location: index.php");
	}else
		$estasDentro=$_SESSION["estasDentro"];//Esta variable guardara los datos de usuario
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link rel="stylesheet" type="text/css"  href="estilos/cambiar.css" />
		<script type="text/javascript" src="javascript/foto.js" charset="utf-8"></script>
		<title>Cambiar foto de tu perfil.</title>	
	</head>
	
	<body>
		
		<div id="centro"> 	
		<h1>Cambiar Foto</h1>
		<div id="div_foto">
			<img class="fotousuario" src="imagenes/fotosUsuarios/<?php echo $estasDentro["foto"]?>" alt="fotopersonal" title="mi foto"/>
		</div>
		
		<div id="div_form">
			<form method="post" onsubmit="return vacio()" action="PHP/cambiaFoto.php" enctype="multipart/form-data">
				<div id="div_imagen">
	  				<label id="label_imagen" for="imagen">Nueva imagen: </label>
	  				<input id="imagen" type="file" name="imagen"/>
				</div> 
				
				<div id="div_submitfoto">
					<button id="submit">Cambiar</button>
				</div> 		
			</form>			
		</div>
		
		<?php //En caso de que halla errores se creara un div para mostrarlos
        	$errores=$_SESSION["errores_foto"];
        	if(isset($errores) && is_array($errores)){
				echo "<div id='errores' class='error'>";
				foreach($errores as $error){
					echo "$error<br/>";
				}
				echo "</div>";
			}
        ?>
        
        <div id="div_valcss">
		 <a href="http://jigsaw.w3.org/css-validator/check/referer">
        		<img class="valua"
            			src="http://jigsaw.w3.org/css-validator/images/vcss"
            			alt="�CSS V�lido!" />
    	</a>
		</div>
		</div>
		</div>
	</body>
</html>