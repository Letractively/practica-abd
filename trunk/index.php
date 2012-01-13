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
		      include_once("PHP/gestionarConexionBD.php");
	          include_once("PHP/gestionUsuarios.php");
			  include_once("PHP/gestionAplicaciones.php");
			  include_once("PHP/gestionJuegos.php");
			  
    		
    		$login=$_SESSION["login"];
    		if(!isset($login)){//Comprobamos si tenemos la variable de sesion creada
    			$login=array();
    			$_SESSION["login"]=$login;
    		}
    	?>
		
		
		<!--  div con la logotipo de fondo y login-->
    	  	<div id="div_logo"> 
    	    	  <img src="imagenes/opendown.JPG" alt="logo"/>    
    	     	  <div id="div_login"> 
                  	
        	<fieldset id="fieldset2">
        	
        	<div class="logoLogin">  
						<img src="imagenes/logo1.jpg"  alt="logoLogin" title="OpenDown" />
		
			</div>
        	
        	<form id="form_login" method="post" onsubmit="return principal()" action="PHP/logeadoIndex.php">
        		<fieldset id="fieldset1">
        			<label id="label_usuario" for="usuario">Usuario</label>
					<input id="usuario" type="text" value="" name="usuario"/>
        			
					<label id="label_password" for="password">Contrase&ntilde;a</label>
					<input id="password" type="password" value="" name="password"/>
												
					<div id="div_submit">
						<button id="submit">Entrar</button>
					</div>
        		</fieldset>
        		
        	</form>
			
			<div id="div_registrarse">
				<a href="registro.php">Registrate</a>
			</div>
			
			<div id="div-recupera">
			<a href="recupera.php">¿Olvidaste tu contraseña? </a>
			</div>
			
			</fieldset>	
			
        </div>
    	
              </div>    
         
       
         
        
      
        
	Esta va ser nuestra pagina web para la practica.
	
	
	<div id="div_menu_izq">
					<ul> 
    				
    					<li><a>Juegos</a>
      						<ul> 
        						<li><a href="accion.php">Accion</a></li> 
        						<li><a href="simulacion.php">Simulacion</a></li> 
        						<li><a href="aventura.php">Aventura Grafica</a></li> 
        						<li><a href="rpg.php">RPG</a></li> 
        						<li><a href="estrategia.php">Estrategia</a></li> 
        						<li><a href="Deportes.php">Deportes</a></li>       						
      						    <li><a href="Infantil.php">Infantil</a></li> 
								<li><a href="Otros.php">Otros</a></li> 
       						</ul> 
    					</li> 
    					<li><a>Aplicaciones</a>
      						<ul> 
       							<li><a href="imagen.php">Imagen/Audio/Video</a></li> 
        						<li><a href="internet.php">Internet</a></li> 
								<li><a href="utilidades.php">Utilidades</a></li> 
								<li><a href="seguridad.php">Seguridad</a></li>
								<li><a href="personalizacion.php">Personalizacion</a></li>
								<li><a href=" sinCatalogar.php">Otros</a></li>
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
 						 echo "$row[descripcion]";
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
