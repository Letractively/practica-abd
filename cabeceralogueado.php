<div id="div_logo"> 
	 
			 <a href="index.php"><img src="imagenes/opendown.jpg" alt="logo"/></a>    
			  
			 <div id="div_logeo">
			 	<center> 
			<?
			$nombre=$dentro["usuario"];
					echo "<h4>Bienvenido $nombre </h4>";
			?>
			
			<form id='logout' method='post' action='php/logout.php'>
								<button id='submit'>Salir</button>
							</form>
			
			</center>
		
	
			
		<ul class="menu"> 
    				
    					<li><a href="#">Editar tu perfil</a>
      						<ul> 
        						<li>&nbsp;&nbsp;  <a href="registro.php">Cambia tus datos</a></li> 
        						<li>&nbsp;&nbsp;  <a href="borrar.php">Borrate</a></li> 
      						</ul> 
    					</li> 
    					<li><a href="#">Aplicaciones</a>
      						<ul> 
       							<li>&nbsp;&nbsp;  <a href="subeAplicacion.php">Subir Aplicacion</a></li> 
        						<li>&nbsp;&nbsp;  <a href="listaAplicaciones.php?index=verME"> Mis Aplicaciones</a></li>  
      						</ul> 
    					</li>
						<li><a href="#">Juegos</a>
      						<ul> 
       							<li>&nbsp;&nbsp;  <a href="subeAplicacion.php">Subir Juego</a></li> 
        						<li>&nbsp;&nbsp;  <a href="listaAplicaciones.php?index=verME"> Mis Juegos</a></li>  
      						</ul> 
    					</li>
    			
  					</ul>		
				
		
		
			
	
	</div> 
	
</div>