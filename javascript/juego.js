 var cadena;
	cadena= String("");
  
	function principal(){
		var nombre=document.getElementById("nombre");
		var descripcion=document.getElementById("descripcion");
		var imagen=document.getElementById("imagen");
		var aaplicacion=document.getElementById("ajuego");
		if(nombre.value=="")
			cadena+="No le has dado nombre a tu Juego\n";
		if(descripcion.value=="")
			cadena+="Debes de pones una descripcion de el Juego\n";	
		validaImagen();
		validaAjuego();
		
		if(cadena==""){
			return true;
		}else{
			window.alert(cadena);
			cadena=String("");
			return false;
	 }
	}
	
	function formatoIncorrecto(imagen) {
		file=imagen.value;
		extArray = new Array(".gif",".jpeg",".jpg",".png",".bmp",".JPG",".PNG",".GIF",".BMP",".JPEG");
		allowSubmit = false;
		if (!file) return;
		while (file.indexOf("\\") != -1) file = file.slice(file.indexOf("\\") + 1);
		ext = file.slice(file.indexOf(".")).toLowerCase();
		for (var i = 0; i < extArray.length; i++) {
		if (extArray == ext) {
		allowSubmit = true;
		break;
		}
		}
		if (allowSubmit) {
		} else {
		imagen.value="";
		alert("Solo son validas los imagenes en formato: " + (extArray.join(" ")) + "\nPor favor seleccione una nueva imagen.");
		}
		} 
	
	
	function validaImagen(){
		var imagen=document.getElementById("imagen").value;
		if(imagen!=""){
			var patron = /^(.+)\.(jpg|png|gif|bmp|JPG|PNG|GIF|BMP)$/;
			if(!patron.test(imagen)){
				cadena+="Formato de imagen incorrecto\n";
			}
		}
	}
		
	function validaAjuego(){
		var aaplicacion=document.getElementById("ajuego").value;
		if(aaplicacion!=""){
			var patron = /^(.+)\.(zip|rar|exe|tar)$/;
			if(!patron.test(aaplicacion)){
				cadena+="El formato de el juego no es valido.\n";
			}
		}
	}