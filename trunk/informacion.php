<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <link rel="stylesheet" type="text/css"  href="estilos/index.css" />
     <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	 <script type="text/javascript" src="javascript/login.js" charset="utf-8"></script>
	 <title>Información</title>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

	 	
</head>

<body> 
<div id="pagina_entera">
	<?php 
		      include_once("php/gestionarConexionBD.php");
	          include_once("php/gestionUsuarios.php");
			  include_once("php/gestionAplicaciones.php");
			  include_once("php/gestionJuegos.php");
			  session_start();
			    		
    		if(!isset($_SESSION["login"])){
    			$login=array();
    			$_SESSION["login"]=$login;
    		}
    	?>
		
		
		<!--  Cabecera y login -->
    	
    		<?php 
    			if (!isset($_SESSION["estasDentro"])){
    				include_once("cabecera.php");	
    			}else{
    				$dentro= $_SESSION["estasDentro"];
    				include_once("cabeceralogueado.php");
    			}
			?>
    		 
         
        <hr/>
  
	
	<?php 
	include_once("menu.php");
	?>
	
			
	<div id="centro">
		<h1>Bienvenid@:</h1>
		<p>OpenDown es una página web para el intercambio de juegos y aplicaciones Open Source.</p><br>
		<p>Como usuario anónimo, tienes acceso a la descarga de todo el contenido disponible en nuestra web, sin limitaciones.</p>
		<p>Si deseas compartir tu propio contenido (seas o no el autor), deberas llevar a cabo el proceso de registro en la web.</p>
		<p>El registro es completamente gratuito y una vez completado este e identificado, se habilitará automáticamente un menu especial para llevar a cabo todas las tareas relacionadas
			con la compartición de contendo, donde podrás subir aplicaciones o juegos, modificar antiguas subidas, o si te arrepientes, eliminarlas de la web.</p>	
		<br><p>Un saludo y disfruta del contenido ofrecido en estas páginas.</p>	
		<p><center><a href="index.php"><img src="imagenes/volver.jpg"></a></p>			
	</div>
</html>