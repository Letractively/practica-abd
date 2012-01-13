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
	

	  
	}
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link rel="stylesheet" type="text/css"  href="estilos/cambiar.css" />
		<link rel="stylesheet" type="text/css"  href="estilos/cabecera.css" />
		<title>
			<?php 
				echo "Borrar Perfil";
			?>
		</title>	
	</head>
	
	<body>
			
	<div id="centro"> 
		<h1>ATENCI&Oacute;N <?php echo $estasDentro["usuario"]?></h1>
		
		
		<?php 
			
			echo "<img class='cambiarotro' src='imagenes/fotosUsuarios/$estasDentro[foto]' alt='fotopersonal' title='mi foto'/>";
				
			echo "<h2>Est&aacute;s a punto de darte de baja en nuestro portal, si continuas perder&aacute;s todos tus datos y no 
						podr&aacute;s acceder en nuestra p&aacute;gina con este usuario y contrase&ntilde;a.¿Deseas continuar?</h2>";
	
		?>
			
		<div id="div_form">
			<form method="post" action="PHP/procesoBorrar.php"> 	
				<div id="div_submit">
					<button id="submit">Confirmar</button>
				</div> 		
			</form>			
		</div>
		
		<div id="div_cancelar">  	
			<a href="index.php">
				<span><img alt="cancelar" src="imagenes/cancelar.jpg" title="cancelar"/></span>
			</a> 
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
            alt="ï¿½CSS Vï¿½lido!" />
   		 </a>
        </div>
        
		</div>	
	</body>
</html>