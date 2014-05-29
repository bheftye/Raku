// JavaScript Document

 window.onload= init;

function init(){	
	document.getElementById("form_register").onsubmit = validarCamposRegistro;
	document.getElementById("form_login").onsubmit = validarCamposLogin;
	if(mensaje != ""){
		if(mensaje == "loginfail"){
			alert("Username or password incorrect.");
		}
	}
	 }
 

function validarCamposRegistro(){
	var nomUsuario = document.getElementById("userR").value;
	var contrasena = document.getElementById("passR").value;
	var contrasena2 = document.getElementById("passR2").value;
	var email = document.getElementById("emailR").value;

	var camposLlenos = nomUsuario != "" && contrasena != "" && contrasena2 != "" && email != "";

	if(camposLlenos){
		if(contrasena == contrasena2){
			return true;
		}
		else{
			document.getElementById("error").innerHTML = "Passwords does not match.";
			return false;
		}
	}
	document.getElementById("error").innerHTML = "Fill all fields to register.";
	return false;
}

function validarCamposLogin(){
	var nomUsuario = document.getElementById("userL").value;
	var contrasena = document.getElementById("passL").value;

	var camposLlenos = nomUsuario != "" && contrasena != "";

	if(camposLlenos){
		return true;
	}
	document.getElementById("errorL").innerHTML = "Fill all fields to login.";
	return false;
}
	
function changeTop(){
	Vaciar();
	top.innerHTML = "<a href='login.html'>LOGIN / REGISTER</a>";
	}
	
	
function Vaciar() {
	SetCookie("username", 0);
}
	
	
 function GetCookie (name, InCookie) {
	var prop = name + "=";
	var plen = prop.length;
	var clen = InCookie.length;
	var i=0;
	if (clen>0) { 
		i = InCookie.indexOf(prop,0);
		if (i!=-1) { 
			j = InCookie.indexOf(";",i+plen);
			if(j!=-1)
				return unescape(InCookie.substring(i+plen,j));
			else
				return unescape(InCookie.substring(i+plen,clen));
		}
		else
			return "";
	}
	else
		return "";
}

function SetCookie (name, value) {
	var argv = SetCookie.arguments;
	var argc = SetCookie.arguments.length;
	var expires = (argc > 2) ? argv[2] : null;
	var path = (argc > 3) ? argv[3] : null;
	var domain = (argc > 4) ? argv[4] : null;
	var secure = (argc > 5) ? argv[5] : false;
	document.cookie = name + "=" + escape(value) +
		((expires==null) ? "" : ("; expires=" + expires.toGMTString())) +
		((path==null) ? "" : (";path=" + path)) +
		((domain==null) ? "" : ("; domain=" + domain)) +
		((secure==true) ? "; secure" : "");
}
