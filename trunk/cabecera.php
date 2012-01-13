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