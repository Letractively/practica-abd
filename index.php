<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <link rel="stylesheet" type="text/css"  href="estilos/index.css" />
     <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	 <script type="text/javascript" src="javascript/login.js" charset="utf-8"></script>
	 <title>OpenDown</title>
	 	
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
		<div id="centro_izq">
	        
 			    <ul>
 				    <?php 
 					  $conexion=crearConexionBD();
 					  $aplicaciones=getAplicaciones($conexion);//Devuelve las 5 ultimos aplicaciones subidas.
 					  CerrarConexionBD($conexion);
 					  foreach ($aplicaciones as $row1){//Por cada iteracion crea un elemento en la lista con los datos de la aplicacion subida
 						 echo "<li>";
 						 echo "<div>";
 						 echo "<fieldset>";
 						 echo "<legend>$row1[Nombre]</legend>";
 						 echo "<img id='tamano' src='imagenes/img_aplicaciones$row1[Foto]' alt='img_apli'>";
 						 echo "<br>";
 						 echo "<br>";
 						 echo "$row1[Descripcion]";
 						 echo "<br>";
						 echo "<a href='masInfoAplicaciones.php?idAplicacion=$row1[idAplicacion]'>Mas info</a>";
 						 echo "</fieldset>";
 						 echo"</div>";
 						 echo "</li>";
 					    }
 				     ?>
  			    </ul>	
            
            </div>	
            
       <div id="centro_der">
           
 			    <ul>
 				    <?php 
 					  $conexion=crearConexionBD();
 					  $Juegos=getJuegos($conexion);//Devuelve los 5 ultimos Juegos subidos.
 					  CerrarConexionBD($conexion);
 					  foreach ($Juegos as $row2){//Por cada iteracion crea un elemento en la lista con los datos de la aplicacion subida
 						 echo "<li>";
 						 echo "<div>";
 						 echo "<fieldset>";
 						 echo "<legend>$row2[Nombre]</legend>";
 						 echo "<img id='tamano' src='imagenes/img_juegos$row2[Foto]' alt='img_juego'>";
 						 echo "<br>";
 						 echo "<br>";
 						 echo "$row2[Descripcion]";
 						 echo "<br>";
 						 echo "<a href='masInfoJuegos.php?idJuego=$row2[idJuego]'>Mas info</a>";
 						 echo "</fieldset>";
 						 echo"</div>";
 						 echo "</li>";
 					    }
 				     ?>
  			    </ul>	
          	
           </div>					
  	</div>
		<?php 
			if(!isset($_SESSION["errores_index"])){
				$errores= array();
				$_SESSION["errores_index"]=$errores;
			}else{
				$errores=$_SESSION["errores_index"];
	        	if(is_array($errores)){
					echo "<div id='errores' class='error'>";
					foreach($errores as $error){
						echo "$error<br/>";
					}
					echo "</div>";
				}	
			}
         ?>
     </div> 
    
		
		
    </body>
</html>
