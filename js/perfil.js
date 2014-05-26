


function eliminarPerfil(){

	if(confirm("Are you sure you want to delete your profile?")){
		alert("Your profile has been deleted succesfull =(");
		window.location.href="../index.html";
	}
}
// JavaScript Document

function validarCamposModificar(){
	var email = document.getElementById("emailM").value;

	if(email != ""){
		return true;
	}
	document.getElementById("errM").innerHTML = "Fill all the fields to continue.";
	return false;
}

function validarCamposModificarContrasena(){
	var passVieja = document.getElementById("passV").value;
	var passNueva = document.getElementById("passN").value;
	var passNuevaC = document.getElementById("passNC").value;

	var camposLlenos = passVieja != "" && passNueva != "" && passNuevaC != "";

	if(camposLlenos){
		if(passNueva == passNuevaC){
			return true;
		}
		document.getElementById("errMC").innerHTML = "Passwords does not match.";
	}
	document.getElementById("errMC").innerHTML = "Fill all the fields to continue.";
	return false;
}

function validarEliminarUsuario(){
	if(confirm("Are you sure you want to delete your profile?")){
		return true;
	}

	return false;
}
	 

 function instaOnClick(){
 	window.open("http://instagram.com");
 }

 function pinteHandler(){
	pinteIcon = document.getElementById("pinterest");
	pinteIcon.onmouseover = function(){
	pinteIcon.src = "../images/pinte_hover.png";}
	pinteIcon.onmouseout = function(){
	pinteIcon.src = "../images/pinte_normal.png";}
 }

 function pinteOnClick(){
 	window.open("http://pinterest.com");
 }
 
 /*function imageHandler(){
	 var imagenGrande = document.getElementById("imagenGrande");
	 var thumb1 = document.getElementById("thumb1");
	 var thumb2 = document.getElementById("thumb2");
	 var thumb3 = document.getElementById("thumb3");
	 var thumb4 = document.getElementById("thumb4");
	 thumb1.onclick = function(){
		imagenGrande.src = "../images/productos/muneca_trapo_principal.jpg";
		verImagen("../images/productos/muneca_trapo_principal.jpg");
	};	
	 thumb2.onclick = function(){
		imagenGrande.src = "../images/productos/muneca_trapo_segundo.jpg";
		verImagen("../images/productos/muneca_trapo_segundo.jpg");
	};
	 thumb3.onclick = function(){
		imagenGrande.src = "../images/productos/muneca_trapo_tercero.jpg";
		verImagen("../images/productos/muneca_trapo_tercero.jpg");
	};
	 thumb4.onclick = function(){
		imagenGrande.src = "../images/productos/muneca_trapo_cuarto.jpg";
		verImagen("../images/productos/muneca_trapo_cuarto.jpg");
	};
	 }*/

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
function changeTop(){
		 var top = document.getElementById("user");
		 var username = GetCookie("username",document.cookie);
		 if(username == 0){
			 }else{
				top.innerHTML = "<a href='perfil.html' style=\"display:inline\">" + username + "</a><a href=\"../login.html\" style=\"display:inline\"> || CERRAR SESION</a>";

				 }
	}

