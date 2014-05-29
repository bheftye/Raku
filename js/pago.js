// JavaScript Document

 window.onload= init;

function init(){	
  	fbHandler();
	instaHandler();
	pinteHandler();
	saveHandler();
	changeTop();

	 }
	 
 function fbHandler(){
	fbIcon = document.getElementById("facebook");
	fbIcon.onmouseover = function(){
	fbIcon.src = "../images/facebook_hover.png";}
	fbIcon.onmouseout = function(){
	fbIcon.src = "../images/facebook_normal.png";}
 }
	 
 function instaHandler(){
	instaIcon = document.getElementById("instagram");
	instaIcon.onmouseover = function(){
	instaIcon.src = "../images/insta_hover.png";}
	instaIcon.onmouseout = function(){
	instaIcon.src = "../images/insta_normal.png";}
 }

 function pinteHandler(){
	pinteIcon = document.getElementById("pinterest");
	pinteIcon.onmouseover = function(){
	pinteIcon.src = "../images/pinte_hover.png";}
	pinteIcon.onmouseout = function(){
	pinteIcon.src = "../images/pinte_normal.png";}
 }
 
 function saveHandler(){
	 var saveBtn = document.getElementById("save");
	 var name = document.getElementById("name");
	 var email = document.getElementById("email");
	 var message = document.getElementById("message");
	 
	 saveBtn.onclick = function(){
		 	alert("Your info has been saved successfully");
		 }
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

function validarCamposPago(){
	var nombre = document.getElementById("nombre_envio").value;
	var direccion = document.getElementById("direccion_envio").value;
	var pais = document.getElementById("pais_envio").value;
	var ciudad = document.getElementById("ciudad_envio").value;
	var zip = document.getElementById("zip_envio").value;

	var fname = document.getElementById("fname_card").value;
	var lname = document.getElementById("lname_card").value;
	var numCard = document.getElementById("num_card").value;
	var mesCard = document.getElementById("mes_card").value;
	var yearCard = document.getElementById("year_card").value;
	var codeCard = document.getElementById("code_card").value;

	var camposLlenos = nombre != "" && direccion != "" && pais != "" && ciudad != "" && zip != "" && fname != "" && lname != "" && numCard != "" && mesCard != "" && yearCard != "" && codeCard != "";

	if(camposLlenos){
		return true;
	}
	document.getElementById("error").innerHTML = "Fill all fields to continue";
	return false;
}