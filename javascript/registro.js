/**
 * @author saruman dice "no puedes pasar"
 */
var cadena;
cadena= String("");


function principal(){
	datosUsuario();
	validaNombreYApellidos();
	validaEmail();
	validaCodigoPostal();
	validaProvincia();
	if (cadena == "") {
		return true;
	}else {
		window.alert(cadena);
		cadena = String("");
		return false;
	}
}

function datosUsuario(){
	var usuario=document.getElementById("usuario");
	var password=document.getElementById("password");
	var rep_password=document.getElementById("rep_password");
	if(usuario.value=="")
		cadena+="Usuario vac\xedo\n";
	if(password.value=="")
		cadena+="\xa1tienes que introducir una contrase\xf1a!\n";
	else if(rep_password.value=="")
		cadena+="\xa1tienes que repetir la contrase\xf1a!\n";
	else if(password.value!=rep_password.value)
		cadena+="La contrase\xf1a no coincide\n";
}
function validaNombreYApellidos(){
	var nombre=document.getElementById("nombre");
	var apellidos=document.getElementById("apellidos");
	if(nombre.value=="")
		cadena+="\xa1tienes que introducir tu nombre!\n";
	if(apellidos.value=="")
		cadena+="\xa1tienes que introducir tus apellidos!\n";
}

function validaEmail(){
	var email=document.getElementById("email").value;
	if((email==""))
		cadena+="Email nulo\n";
	else{
		var patron=/^(.+)@(.+)\.(.+)$/;
		if(!patron.test(email))
			cadena+="Formato del email incorrecto\n";
	}
}
/* el email no puede ser nulo y debe cumplir el formato de email (^=comienzo cadena,(.+)=al menos un caracter,$=fin cadena)*/

function validaProvincia(){
	var provincia= document.getElementById("provincia").value;
	if(provincia=="")
		cadena+="Debes seleccionar una provincia";
}


/* valida que se ha seleccionado una opcion de la lista (para ello se ha dado un valor en html a [select <option value="un numero">provincia</option> ]
     si el valor es cero se debe seleccionar una opcion en otro caso lo acepta)*/

function validaCodigoPostal(){
	var codigopostal = document.getElementById("codigopostal").value;
	if( isNaN(codigopostal) ){
	cadena+="El C.P. deben ser numeros";
	}
	else{if(!(codigopostal.length ==5))
		cadena+="El C.P. debe de estar compuesto por 5 numeros\n";
	}  
}

  /*codigo postal solo numeros (utilizando la funci�n interna isNaN() vemos si el contenido de la 
   variable codigopostal no es un n�mero v�lido, no se cumple la condici�n)y ademas el codigo postal
    tene que estar formado por 5 numero*/