<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <link rel="stylesheet" type="text/css"  href="estilos/index.css" />
     <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
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
		
		<p>
	<?php 
	$tipo=$_REQUEST["tipo"]; 
			echo "<h2>Lista de aplicaciones de $tipo:</h2>";
		?>
	
	
	
		</p>
			<center>	
	        
	        	
 			    
 				    <?php 
 					  $conexion=crearConexionBD();
 					  $Aplicaciones=listaTodasAplicacionesTipo($tipo,$conexion);
 					  CerrarConexionBD($conexion);
 					  foreach ($Aplicaciones as $aplis){
 						 
 						 echo "<fieldset>";
 						 echo "<legend><a href='masinfoaplicaciones.php?idAplicacion=$aplis[idAplicacion]'>$aplis[Nombre]</a></legend>";
 						 echo "<img id='tamano' src='imagenes/img_juegos$aplis[Foto]' alt='img_aplicacion'>";
 						 echo "<br>";
 						 echo "<br>";
 						 echo "$aplis[Descripcion]";
 						 echo "<br>";
 						 echo "</fieldset>";
 						 
 						 }
 				     ?>
  			   
  			    
            
           	 </center>	
           	 <p><center><a href="index.php"><img src="imagenes/volver.jpg"></a></p>			
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
