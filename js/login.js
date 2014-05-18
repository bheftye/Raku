// JavaScript Document

 window.onload= init;

function init(){	
  	fbHandler();
	instaHandler();
	pinteHandler();
	loginHandler();
	registerHandler();
	 }
	 
 function fbHandler(){
	fbIcon = document.getElementById("facebook");
	fbIcon.onmouseover = function(){
	fbIcon.src = "images/facebook_hover.png";}
	fbIcon.onmouseout = function(){
	fbIcon.src = "images/facebook_normal.png";}
 }
	 
 function instaHandler(){
	instaIcon = document.getElementById("instagram");
	instaIcon.onmouseover = function(){
	instaIcon.src = "images/insta_hover.png";}
	instaIcon.onmouseout = function(){
	instaIcon.src = "images/insta_normal.png";}
 }

 function pinteHandler(){
	pinteIcon = document.getElementById("pinterest");
	pinteIcon.onmouseover = function(){
	pinteIcon.src = "images/pinte_hover.png";}
	pinteIcon.onmouseout = function(){
	pinteIcon.src = "images/pinte_normal.png";}
 }
 

 function loginHandler(){
	 var loginBtn = document.getElementById("loginBtn");
	 var user = document.getElementById("userL");
	 var pass = document.getElementById("pass");
	 var top = document.getElementById("user");
	 var content = document.getElementById("content");

	 
	 loginBtn.onclick = function(){
			if(user.value == "admin"){
				alert("Welcome " + user.value + "!");
				window.open("adminPages/index.html","_self");
			}else{
				alert("Welcome " + user.value + "!");
				username = user.value;
				SetCookie("username",username.toUpperCase());
				top.innerHTML = "<a href='login.html' onclick='changeTop'>" + username.toUpperCase() + " || CERRAR SESION</a>";
				window.open("index.html","_self");

					}		  
			}
	
	}
	
function changeTop(){
	Vaciar();
	top.innerHTML = "<a href='login.html'>LOG IN / REGISTER</a>";
	}
	
	
function Vaciar() {
	SetCookie("username", 0);
}

function registerHandler(){
	 var registerBtn = document.getElementById("registerBtn");
	 var user = document.getElementById("userR");
	 var pass = document.getElementById("passR");
	 var register = document.getElementById("registerContent");
	 
	 registerBtn.onclick = function(){
		 	alert("Thanks for your registration!");
			register.innerHTML = "";

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
