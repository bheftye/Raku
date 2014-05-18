// JavaScript Document

 window.onload= init;

function init(){	
  	fbHandler();
	instaHandler();
	pinteHandler();
	sendHandler();
	saveInfoHandler();
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
 
 function sendHandler(){
	 var sendBtn = document.getElementById("send");
	 var name = document.getElementById("name");
	 var email = document.getElementById("email");
	 var message = document.getElementById("message");
	 
	 sendBtn.onclick = function(){
		 	alert("Your message has been sent successfully, thanks! :)");
		 }
	}

 function saveInfoHandler(){
	 var saveBtn = document.getElementById("save");
	 
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

function changeTop(){
		 var top = document.getElementById("user");
		 var username = GetCookie("username",document.cookie);
		 if(username == 0){
			 }else{
				top.innerHTML = "<a href='login.html'>" + username + " || CERRAR SESION</a>";

				 }
	}