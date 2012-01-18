  
	function principal(){
		var nombre=document.getElementById("nombre");
		var descripcion=document.getElementById("descripcion");
		var imagen=document.getElementById("imagen");
		var aaplicacion=document.getElementById("aaplicacion");
		if(nombre.value=="")
			cadena+="No le has dado nombre a tu aplicacion\n";
		if(descripcion.value=="")
			cadena+="Debes de pones una descripcion de la aplicacion\n";	
		validaImagen();
		validaAaplicacion();
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
		
	function validaAaplicacion(){
		var aaplicacion=document.getElementById("aaplicacion").value;
		if(aaplicacion!=""){
			var patron = /^(.+)\.(zip|rar|exe|tar)$/;
			if(!patron.test(aaplicacion)){
				cadena+="El formato de la aplicacion no es valido.\n";
			}
		}
	}
	