// JavaScript Document
 function validarCamposEmail(){
 	var nombre = document.getElementById("txt_nombre").value;
 	var email = document.getElementById("txt_email").value;
 	var mensaje = document.getElementById("txt_descripcion").value;

 	var camposLlenos = nombre != "" && email != "" && mensaje != "";

 	if(camposLlenos){
 		return true;
 	}
 	document.getElementById("error").innerHTML = "Fill all fields to continue";
 	return false;
 }