<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <link rel="stylesheet" type="text/css"  href="estilos/index.css" />
     <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	 
	 <title>Borrar Perfil</title>
	 	
</head>

<body> 
<div id="pagina_entera">
	<?php 
		      include_once("php/gestionarConexionBD.php");
	          include_once("php/gestionUsuarios.php");
			  include_once("php/gestionAplicaciones.php");
			  include_once("php/gestionJuegos.php");
			  session_start();
			    		
    		if(!isset($_SESSION["estasDentro"])){
			session_destroy();
			header("Location: index.php");
	  		}else{
			$estasDentro=$_SESSION["estasDentro"];
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
	



	
			
	<div id="centro"> <center>
		<h1>ATENCI&Oacute;N <?php echo $estasDentro["usuario"]?></h1>
		
		
		<?php 
			
			
				
			echo "<h2>Est&aacute;s a punto de darte de baja en nuestro portal, si continuas perder&aacute;s todos tus datos y no 
						podr&aacute;s acceder en nuestra p&aacute;gina con este usuario y contrase&ntilde;a. ¿Desea continuar?</h2>";
	
		?>
			
		
			<form method="post" action="php/procesoBorrar.php"> 	
				
					<button id="submit">Confirmar</button>
					
			</form>			
	
		<form method="post" action="index.php"> 	
				
					<button id="submit">Cancelar</button>
					
			
			
		</form>	
		<?php //En caso de que halla errores se creara un div para mostrarlos
			if(!isset($_SESSION["errores_foto"])){
				$errores= array();
				$_SESSION["errores_foto"]=$errores;
			}
			else{
				$errores= $_SESSION["errores_foto"];
				if(isset($errores) && is_array($errores)){
					echo "<div id='errores' class='error'>";
					foreach($errores as $error){
						echo "$error<br/>";
					}
					echo "</div>";
				}
			}
        ?>
     </center>
		</div>	
	</div>
		
	
	</body>
</html>