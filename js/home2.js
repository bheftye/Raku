// JavaScript Document

 window.onload= init;

function init(){	
  	fbHandler();
	instaHandler();
	pinteHandler();
	imageHandler();
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
 
 function imageHandler(){
	 var imagenGrande = document.getElementById("imagenGrande");
	 var thumb1 = document.getElementById("thumb1");
	 var thumb2 = document.getElementById("thumb2");
	 var thumb3 = document.getElementById("thumb3");
	 var thumb4 = document.getElementById("thumb4");
	 thumb1.onclick = function(){
		imagenGrande.src = "../images/productos/muneca_trapo_principal.jpg";};
	 thumb2.onclick = function(){
		imagenGrande.src = "../images/productos/muneca_trapo_segundo.jpg";};
	 thumb3.onclick = function(){
		imagenGrande.src = "../images/productos/muneca_trapo_tercero.jpg";};
	 thumb4.onclick = function(){
		imagenGrande.src = "../images/productos/muneca_trapo_cuarto.jpg";};
	 }



