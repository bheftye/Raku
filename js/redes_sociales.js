
function init(){	
  	fbHandler();
  	document.getElementById("facebook").onclick = fbOnClick;
	instaHandler();
	document.getElementById("instagram").onclick = instaOnClick;
	pinteHandler();
	document.getElementById("pinterest").onclick = pinteOnClick;
	 }
	 
 function fbHandler(){
	var fbIcon = document.getElementById("facebook");
	fbIcon.onmouseover = function(){
	fbIcon.src = "images/facebook_hover.png";}
	fbIcon.onmouseout = function(){
	fbIcon.src = "images/facebook_normal.png";}
 }

 function fbOnClick(){
 	window.open("http://facebook.com");
 }
	 
 function instaHandler(){
	instaIcon = document.getElementById("instagram");
	instaIcon.onmouseover = function(){
	instaIcon.src = "images/insta_hover.png";}
	instaIcon.onmouseout = function(){
	instaIcon.src = "images/insta_normal.png";}
 }

 function instaOnClick(){
 	window.open("http://instagram.com");
 }

 function pinteHandler(){
	pinteIcon = document.getElementById("pinterest");
	pinteIcon.onmouseover = function(){
	pinteIcon.src = "images/pinte_hover.png";}
	pinteIcon.onmouseout = function(){
	pinteIcon.src = "images/pinte_normal.png";}
 }

 function pinteOnClick(){
 	window.open("http://pinterest.com");
 }