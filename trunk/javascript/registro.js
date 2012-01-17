/**
 * @author Juanky
 */
function validarFormulario() {
        var nick= document.getElementById("nick").value;
        var password= document.getElementById("pass").value;
        var mail= document.getElementById("mail").value;
        var patronEmail=/^(.+)@(.+)\.(.+)$/;
        if (nick==""){
                alert("Debe introducir un nick");
                return false;
        }
        if (password=="" || password.length<4 || password.length>8 ){
                alert("La contraseña debe tener entre 4 y 8 caracteres:"+password.lenght);
                return false;
        }
        if (mail=="" || patronEmail.test(mail)==false){
                alert("Debe de introducir una cuenta de mail valida");
                return false;
        }
        if (verificarContraseña()==false){
                return false;
        }
}

function verificarContraseña(){
        var password= document.getElementById("pass").value;
        var passwordBis= document.getElementById("passwordBis").value;
        if (password!=passwordBis){
                alert ("Las contraseñas deben de ser identicas: "+password+"!="+passwordBis);
                return false;
        }
}

function validarImagen(){
        var ext = document.getElementById("foto").value;
        ext = ext.substring(ext.length-3,ext.length);
        ext = ext.toLowerCase();
        if(ext != "jpg" && ext!="jpeg" && ext!="png") {
                alert("Solo son valida imagenes en formato jpeg o png");
                document.getElementById("foto").value="";
        }
}