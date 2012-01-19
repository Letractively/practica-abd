<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

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
		<div id="centro_izq">
	        	<center>
 			    <img src="imagenes/ultimos_juegos.jpg"</img>
 			    </center>
 				    <?php 
 					  $conexion=crearConexionBD();
 					  $Juegos=getJuegos($conexion);
 					  CerrarConexionBD($conexion);
 					  foreach ($Juegos as $jues){
 						 
 						 
 						 echo "<fieldset>";
 						 echo "<legend><h3>$jues[Nombre]</h3></legend>";
 						 echo "$jues[Descripcion]";
 						 echo "<br><br>";
 						 echo "<center>";
 						 echo "<a href='masInfoJuegos.php?idJuego=$jues[idJuego]'>";
 						 echo "<img src='imagenes/masinfo.jpg'>";
						 echo "</a>";
						 echo "</center>";
 						 echo "</fieldset>";
						 echo "<br>";
 						 
 						 
 					    }
 				     ?>
  			  
            
            </div>	
            
       <div id="centro_der">
       			<center>
           			<img src="imagenes/ultimas_aplicaciones.jpg"</img>
           		</center>
 			    <?php 
 					  $conexion=crearConexionBD();
 					  $aplicaciones=getAplicaciones($conexion);
 					  CerrarConexionBD($conexion);
 					  foreach ($aplicaciones as $aplis){
 						 
 						 echo "<fieldset>";
 						 echo "<legend><h3>$aplis[Nombre]</h3></legend>";
 						 echo "$aplis[Descripcion]";
 						 echo "<br><br>";
 						 echo "<center>";
						 echo "<a href='masInfoAplicaciones.php?idAplicacion=$aplis[idAplicacion]'>";
						 echo "<img src='imagenes/masinfo.jpg'>";
						 echo "</a>";
						 echo "</center>";
 						 echo "</fieldset>";
						 echo "<br>";
 						 
 					    }
 				     ?>
 				    
  			   	
          	
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
