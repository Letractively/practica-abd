
	
		<div id="cabecera" class="cabecera">
			<img alt="logoletra" src="imagenes/logof.jpg"> 
			<a href="PHP/salirSesion.php">
				<span><img alt="salida" src="imagenes/iconosalida.JPG" title="Cerrar sesi&oacute;n"></span>
			</a>
			<a href="informacion.php">
				<span><img alt="iconoinformacion" src="imagenes/iconoinformacion.JPG" title="informaci&oacute;n"></span>
			</a>
			<a href="" onclick="location.href='mailto:opendown@opendown.com?subject=Asunto del mensaje& body=Texto del mensaje'">
				<span><img alt="email" src="imagenes/iconoEmail.jpg" title="Contacta con nosotros"></span>
			</a>
			                  	<!--  el alt ndica un texto alternat�vo a un elemento no textual--> 
			
					
		</div>
		
	<div id="div_menuderecha">
		
			
			<div class="marco">
					<img class="foto" src='imagenes/fotosUsuarios/<?php echo "$estasDentro[foto]" ?>' alt="fotopersonal" title="mi foto">
					<h3>Bienvenido <?php echo $estasDentro["usuario"]?></h3>
								<!-- Muestra el nombre de usuario tomandolo de la sesion -->
			</div> 
			
			<div id="div_menu">
					<ul> 
    				
    					<li><a href="#">Editar tu perfil</a>
      						<ul> 
        						<li><a href="cambiarFoto.php">Cambia tu foto</a></li> 
        						<li><a href="registro.php">Cambia tus datos</a></li> 
        						<li><a href="borrar.php">Borrate</a></li> 
      						</ul> 
    					</li> 
    					<li><a href="#">Aplicaciones</a>
      						<ul> 
       							<li><a href="subeAplicacion.php">Subir Aplicacion</a></li> 
        						<li><a href="listaAplicaciones.php?index=verME">Mis Aplicaciones</a></li>  
      						</ul> 
    					</li>
						<li><a href="#">Juegos</a>
      						<ul> 
       							<li><a href="subeAplicacion.php">Subir Juego</a></li> 
        						<li><a href="listaAplicaciones.php?index=verME">Mis Juegos</a></li>  
      						</ul> 
    					</li>
    			
  					</ul>		
			</div>	
		
		
	</div>					
	</div>
				
	<div id="div_verTodos_Juegos"  >  	
		<a href="listaJuegos.php?index=verTodos">
			<span><img alt="verTodosJuegos" src="imagenes/verTodosJuegos.jpg" title="Ver Todos Juegos"></span>
		</a> 				
	</div>
	
	<div id="div_verTodas_Aplicaciones"  >  	
		<a href="listaAplicaciones.php?index=verTodos">
			<span><img alt="verTodasAplicaciones" src="imagenes/verTodasAplicaciones.jpg" title="Ver Todas Aplicaciones"></span>
		</a> 				
	</div>
  