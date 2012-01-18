<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <link rel="stylesheet" type="text/css"  href="estilos/index.css" />
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	 <script type="text/javascript" src="javascript/login.js" charset="utf-8"></script>
	 <title>Aplicaciones</title>
	
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
    	<div>
    		<?php 
    			if (!isset($_SESSION["estasDentro"])){
    				include_once("cabecera.php");	
    			}else{
    				$dentro= $_SESSION["estasDentro"];
    				include_once("cabeceralogueado.php");
    			}
			?>
    	</div>
    	<HR> 
    <div>
	<?php 
	include_once("menu.php");
	?>
	</div>
			
	<div id="centro">
		
		<p>
	<?php 
	$tipo=$_REQUEST["tipo"]; 
			switch($tipo){
	 			case "imagen":
	 				echo "<img src='imagenes/listaimagen.JPG' alt='listaimagen' title='lista de aplicaciones de imagen/audio/video'/>";
					echo "Imagen/Audio/Video";
	 				break;
	 			case "internet":
	 				echo "<img src='imagenes/listainternet.JPG' alt='listainternet' title='lista de aplicaciones de internet'/>";
	 				echo "Internet";
	 				break;
				case "utilidades":
	 				echo "<img src='imagenes/listautilidades.JPG' alt='listautilidades' title='lista de utilidades'/>";
	 				break;
	 			case "seguridad":
	 				echo "<img src='imagenes/listaseguridad.JPG' alt='listaseguridad' title='lista de aplicaciones de seguridad'/>";
	 				break;
	 			case "personalizacion":
	 				echo "<img src='imagenes/listapersonalizacion.JPG' alt='listapersonalizacion' title='lista de aplicaciones de personalizacion'/>";
	 				break;
	 			case "otros":
	 				echo "<img src='imagenes/listaotros.JPG' alt='listaotros' title='lista de otros'/>";
	 				break;		
	 		
			}
		?>
	
	<a href="index.php">Volver a portada</a>
	
		</p>
			<center>	
	        
	        	
 			    
 				    <?php 
 					  $conexion=crearConexionBD();
 					  $Aplicaciones=listaTodasAplicacionesTipo($tipo,$conexion);//Devuelve todos los Juegos subidos.
 					  CerrarConexionBD($conexion);
 					  foreach ($Aplicaciones as $row){//Por cada iteracion crea un elemento en la lista con los datos de la aplicacion subida
 						 echo "<div>";
 						 echo "<fieldset>";
 						 echo "<legend><a href='masinfoaplicaciones.php?idAplicacion=$row[idAplicacion]'>$row[Nombre]</a></legend>";
 						 echo "<img id='tamano' src='imagenes/img_juegos$row[Foto]' alt='img_juego'>";
 						 echo "<br>";
 						 echo "<br>";
 						 echo "$row[Descripcion]";
 						 echo "<br>";
 						 echo "</fieldset>";
 						 echo"</div>";
 						 }
 				     ?>
  			   
  			    
            
           	 </center>				
  	</div>
		
			
	

      	
        
    	<?php 
        	$errores=$_SESSION["errores_index"];
        	if(isset($errores) && is_array($errores)){
				echo "<div id='errores' class='error'>";
				foreach($errores as $error){
					echo "$error<br/>";
				}
				echo "</div>";
			}
         ?>
     </div>   
		
		
    </body>
</html>
