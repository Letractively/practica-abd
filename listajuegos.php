<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <link rel="stylesheet" type="text/css"  href="estilos/index.css" />
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	 			case "accion":
	 				echo "<img src='imagenes/listaaccion.JPG' alt='listaaccion' title='lista de juegos de accion'/>";
					echo "Accion";
	 				break;
	 			case "simulacion":
	 				echo "<img src='imagenes/listasimulacion.JPG' alt='listasimulacion' title='lista de juegos de simulacion'/>";
	 				echo "Simulacion";
	 				break;
				case "aventura":
	 				echo "<img src='imagenes/listaaventura.JPG' alt='listaaventura' title='lista de juegos de aventuras graficas'/>";
	 				break;
	 			case "rpg":
	 				echo "<img src='imagenes/listarpg.JPG' alt='listarpg' title='lista de Juegos de RPG'/>";
	 				break;
	 			case "estrategia":
	 				echo "<img src='imagenes/listaestrategia.JPG' alt='listaestrategia' title='lista de juegos de estrategia'/>";
	 				break;
	 			case "deportes":
	 				echo "<img src='imagenes/listadeportes.JPG' alt='listadeportes' title='lista de juegos de deportes'/>";
	 				break;
				case "infantil":
	 				echo "<img src='imagenes/listainfantil.JPG' alt='listainfantil' title='lista de juegos infantiles'/>";
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
 					  $Juegos=listaTodasjuegos($conexion);//Devuelve todos los Juegos subidos.
 					  CerrarConexionBD($conexion);
 					  foreach ($Juegos as $row){//Por cada iteracion crea un elemento en la lista con los datos de la aplicacion subida
 						 echo "<div>";
 						 echo "<fieldset>";
 						 echo "<legend><a href='masinfojuegos.php?idJuego=$row[idJuego]'>$row[Nombre]</a></legend>";
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











