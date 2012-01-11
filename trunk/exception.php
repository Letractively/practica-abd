<?php
	session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Exception</title>
		<link rel="stylesheet" type="text/css"  href="estilos/estilo.css" />
	</head>
	
	<body>
		<div id="exception">
			<?php echo  $_SESSION["exception"];
				  session_destroy();
			?>
		</div>
		<div id="div_volver">
			<a href="index.php">Volver al inicio</a>
		</div>	
	</body>

</html>
