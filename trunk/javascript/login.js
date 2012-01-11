	var cadena;
	cadena= String("");

	function principal(){
		var usuario=document.getElementById("usuario");
		var password=document.getElementById("password");
		if(usuario.value=="")
			cadena+="Usuario vac\xedo\n";
		if(password.value=="")
			cadena+="Contrase\xf1a vac\xeda\n";
			
		if(cadena==""){
			return true;
		}else{
			window.alert(cadena);
			cadena=String("");
			return false;
		}
	}
