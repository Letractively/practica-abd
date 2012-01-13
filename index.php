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
			  session_start();
			    		
    		if(!isset($_SESSION["login"])){//Comprobamos si tenemos la variable de sesion creada
    			$login=array();
    			$_SESSION["login"]=$login;
    		}
    	?>
		
		
		<!--  div con la logotipo de fondo y login-->
    	<div id="cabecera">
    		<?php 
    			if (!isset($_SESSION["estasDentro"])){
    				include_once("cabecera.php");	
    			}else{
    				$dentro= $_SESSION["estasDentro"];
    				$nombre=$dentro["usuario"];
					echo "<h3>Bienvenido $nombre</h3>";
					echo "<form id='logout' method='post' action='php/logout.php'>
								<button id='submit'>Salir</button>
							</form>";
    			}
			?>
    	</div>  	 
         
        
      
        
	Esta va ser nuestra pagina web para la practica.
	
	
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
	        <div id="ultimas_aplicaciones">
 			    <ul>
 				    <?php 
 					  $conexion=crearConexionBD();
 					  $aplicaciones=getAplicacion($conexion);//Devuelve las 5 ultimos aplicaciones subidas.
 					  CerrarConexionBD($conexion);
 					  foreach ($aplicaciones as $row){//Por cada iteracion crea un elemento en la lista con los datos de la aplicacion subida
 						 echo "<li>";
 						 echo "<div>";
 						 echo "<fieldset>";
 						 echo "<legend>$row[Nombre]</legend>";
 						 echo "<img id='tamano' src='imagenes/img_aplicaciones$row[Foto]' alt='img_apli'>";
 						 echo "<br>";
 						 echo "<br>";
 						 echo "$row[Descripcion]";
 						 echo "<br>";
 						 echo "<a href='masInfoAplicaciones.php?idAplicacion=$row[idAplicacion]'>Mas info</a>";//Paso una variable en la url para saber sobre que masInfo de los 5 he pinchado
 						 echo "</fieldset>";
 						 echo"</div>";
 						 echo "</li>";
 					    }
 				     ?>
  			    </ul>	
            </div>		
           <div id="ultimos_juegos">
 			    <ul>
 				    <?php 
 					  $conexion=crearConexionBD();
 					  $Juegos=getJuego($conexion);//Devuelve los 5 ultimos Juegos subidos.
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
