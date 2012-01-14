<div id="div_logo"> 
	 
			 <img src="imagenes/opendown.JPG" alt="logo"/>  
			  
			 <div id="div_logeo">
			 	<fieldset>
			<?
			$nombre=$dentro["usuario"];
					echo "<h4>Bienvenido $nombre </h4>";
			?>
			
			<form id='logout' method='post' action='php/logout.php'>
								<button id='submit'>Salir</button>
							</form>
			
			
		
	
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
		
		
			
	<div id="div_verTodos_Juegos">  

	   <form id='verTodosJuegos' method='post' action='listaJuegos.php?index=verTodos'>
								<button id='submit'>Ver todos mis Juegos.</button>
							</form>				
	</div>
	
	<div id="div_verTodas_Aplicaciones">  
	
	 <form id='verTodosJuegos' method='post' action='listaAplicaciones.php?index=verTodos'>
								<button id='submit'>Ver todas mis Aplicaciones.</button>
							</form>	
					
	</div>
	</div> 
	</fieldset>
</div>