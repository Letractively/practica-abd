<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <link rel="stylesheet" type="text/css"  href="estilos/index.css" />
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	 <script type="text/javascript" src="javascript/login.js" charset="utf-8"></script>
	 <title>Pagina de Inicio</title>
	
</head>

<body>

<div id="container">
    	<?php 
		      include_once("php/gestionarConexionBD.php");
	          include_once("php/gestionUsuarios.php");
			  include_once("php/gestionAplicaciones.php");
			  include_once("php/gestionJuegos.php");
			  
    		$tipo=$_REQUEST["tipo"];
			
    		if(!isset($_SESSION["login"])){//Comprobamos si tenemos la variable de sesion creada
    			$login=array();
    			$_SESSION["login"]=$login;
    		}
    	?>
		
		
		<!--  div con la logotipo de fondo y login-->
    	  
    	
           <?php 
       	include_once("cabecera.php");
		?> 
         
       
         
        
      
        
	Esta va ser nuestra pagina web para la practica.
	
	
	<?php 
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
	
	
	<div id="div_menu_izq">
		
					<ul> 
    				
    					<li><a>Juegos</a>
      						<ul> 
        						<li><a href="listajuegos.php?tipo=accion">Accion</a></li> 
        						<li><a href="listajuegos.php?tipo=simulacion">Simulacion</a></li> 
        						<li><a href="listajuegos.php?tipo=aventura">Aventura Grafica</a></li> 
        						<li><a href="listajuegos.php?tipo=rpg">RPG</a></li> 
        						<li><a href="listajuegos.php?tipo=estrategia">Estrategia</a></li> 
        						<li><a href="listajuegos.php?tipo=deportes">Deportes</a></li>       						
      						    <li><a href="listajuegos.php?tipo=infantil">Infantil</a></li> 
								<li><a href="listajuegos.php?tipo=otros">Otros</a></li> 
       						</ul> 
    					</li> 
    					<li><a>Aplicaciones</a>
      						<ul> 
       							<li><a href="listaaplicaciones.php?tipo=imagen">Imagen/Audio/Video</a></li> 
        						<li><a href="listaaplicaciones.php?tipo=internet">Internet</a></li> 
								<li><a href="listaaplicaciones.php?tipo=utilidades">Utilidades</a></li> 
								<li><a href="listaaplicaciones.php?tipo=seguridad">Seguridad</a></li>
								<li><a href="listaaplicaciones.php?tipo=personalizacion">Personalizacion</a></li>
								<li><a href="listaaplicaciones.php?tipo=otros">Otros</a></li>
      						</ul> 
    					</li>
    			
  					</ul>	
  					
  					<!-- div validacion css  -->
		<div id="div_valcss">
        	<a href="http://jigsaw.w3.org/css-validator/check/referer">
        		<img class="val"
            		src="http://jigsaw.w3.org/css-validator/images/vcss"
            		alt="�CSS V�lido!" />
   			 </a>
        
    	</div>
		
		<!-- div pie  -->
		<div id="div_linea" class="colorb">  	
			<div id="div_copyright" class="colorb" >
					Copyright ® 2011 ABD-US
			</div>
				
			<div id="div_ayuda" >
				<a href ="informacion.php" class="colorb" target="_blank" >INFORMACI&Oacute;N</a>					
			</div>
		
			<div id="div_contacto" class="colorb" >
				<a href="" onclick="location.href='mailto:opendown@opendown.es?subject=Asunto del mensaje&body=Texto del mensaje'" class="colorb">CONTACTA CON NOSOTROS</a>
			</div>
		</div>	
	</div>	
			
	<div id="centro">
		
		
				
	        <div id="lista_aplicaciones">
 			    <ul>
 				    <?php 
 					  $conexion=crearConexionBD();
 					  $Juegos=listaTodasaplicaciones($conexion);//Devuelve todos los Juegos subidos.
 					  CerrarConexionBD($conexion);
 					  foreach ($Juegos as $row){//Por cada iteracion crea un elemento en la lista con los datos de la aplicacion subida
 						 echo "<li>";
 						 echo "<div>";
 						 echo "<fieldset>";
 						 echo "<legend>$row[Nombre]</legend>";
 						 echo "<img id='tamano' src='imagenes/img_juegos$row[Foto]' alt='img_juego'>";
 						 echo "<br>";
 						 echo "<br>";
 						 echo "$row[Descripcion]";
 						 echo "<br>";
 						 echo "<a href='masInfoJuegos.php?idJuego=$row[idJuego]'>Mas info</a>";//Paso una variable en la url para saber sobre que masInfo de los 5 
 						 echo "</fieldset>";
 						 echo"</div>";
 						 echo "</li>";
 					    }
 				     ?>
  			    </ul>	
            </div>						
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
