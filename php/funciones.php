<?php
	//Comprueba que existe la variable y que no es nula
	function esNulo ($var,$nombre){
		$nulo=false;
		if(isset($var[$nombre])&& $var[$nombre]=="")
			$nulo=true;
		return $nulo;
	}
	
	//Comprueba que el email sigue un determinado patron
	function validaEmail($email){
		$patron='/^(.+)@(.+)\.(.+)$/';
		$valido=false;
		if(preg_match($patron,$email))
			$valido=true;
		return $valido;
	}
	
	//Comprueba que es un CP valido
	function validaCP($cp){
		$valido=false;
		if(is_numeric($cp) && $cp>9999)
			$valido=true;
		return $valido;
	}
	
	
	
	//Comprueba que la fecha es correcta
	function validaFecha($fecha){
		$patron='/^(((0[1-9]|[12][0-9])\/(02))|((0[1-9]|[12][0-9]|30)\/(04|06|09|11))|((0[1-9]|[12][0-9]|3[01])\/(01|03|05|07|08|10|12)))\/((20[1-9][0-9])|(2[1-9][0-9][0-9]))$/';
		$valido=false;
		if(preg_match($patron,$fecha))
			$valido=true;
		return $valido;
	}
	
	
	
	//Comprueba que el formato de la imagen es valido
	function validaFoto($foto){
		$patron='/^(.+)\.(jpg|png|gif|bmp|JPG|PNG|GIF|BMP)$/';
		$valido=false;
		if(preg_match($patron,$foto))
			$valido=true;
		return $valido;
	}
	
	//Comprueba que el formato de el archivo es valido
	function validaAaplicacion($aaplicacion){
		$patron='/^(.+)\.(exe|zip|rar|tar)$/';
		$valido=false;
		if(preg_match($patron,$aaplicacion))
			$valido=true;
		return $valido;
	}
	
	//Permite subir una imagen, dependiendo de $carpeta sera en img_Apli o img_juego
	function subirFoto($imagen,$carpeta){
		$subida=false;
		if(!file_exists("../imagenes/img_aplicaciones/".$imagen['name'])){
			$ruta="C:\\xampplite\\htdocs\\ABD\\imagenes\\$carpeta/".basename($imagen['name']);
			move_uploaded_file($imagen['tmp_name'],$ruta);
			$subida=true;
		}
		return $subida;		
	}
	
	
?>
