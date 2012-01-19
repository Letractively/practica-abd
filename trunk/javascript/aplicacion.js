  
	function principal(){
		var nombre=document.getElementById("nombre");
		var descripcion=document.getElementById("descripcion");
		var imagen=document.getElementById("imagen");
		var aaplicacion=document.getElementById("aaplicacion");
		if(nombre.value==""){
			alert("No le has dado nombre a tu aplicacion");
			return false;
		}
		if(descripcion.value==""){
			alert("Debes de pones una descripcion de la aplicacion");
			return false;
		}
		if (validaImagen()==false){
			return false;
		}
		if (validaAaplicacion()==false){
			return false;
		}
	}	
	
	function validaImagen(){
		var imagen=document.getElementById("imagen").value;
		if(imagen!=""){
			var patron = /^(.+)\.(jpg|png|gif|bmp|JPG|PNG|GIF|BMP)$/;
			if(!patron.test(imagen)){
				alert("Formato de imagen incorrecto. Solo se admiten: jpg, png, gif y bmp");
				return false;
			}
		}
	}
		
	function validaAaplicacion(){
		var aaplicacion=document.getElementById("aaplicacion").value;
		if(aaplicacion!=""){
			var patron = /^(.+)\.(zip|rar|exe|tar)$/;
			if(!patron.test(aaplicacion)){
				alert("El formato de la aplicacion no es valido. Solo se admiten zip, rar, exe y tar");
				return false;
			}
		}
	}