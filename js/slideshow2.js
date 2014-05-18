// JavaScript Document
//1. set ul width 
//2. image when click prev/next button
var ul;
var li_items;
var imageNumber;
var imageWidth;
var prev, next;
var currentPostion = 0;
var currentImage = 0;


function init(){
	ul = document.getElementById('image_slider');
	li_items = ul.children;
	imageNumber = li_items.length;
	imageWidth = li_items[0].children[0].clientWidth;
	ul.style.width = parseInt(imageWidth * imageNumber) + 'px';
	prev = document.getElementById("prev");
	next = document.getElementById("next");
	prev.onclick = function(){ onClickPrev();};
	next.onclick = function(){ onClickNext();};
	/*Hover del social media*/
	fbHandler();
	instaHandler();
	pinteHandler();
	changeTop();
}

function animate(opts){
	var start = new Date;
	var id = setInterval(function(){
		var timePassed = new Date - start;
		var progress = timePassed / opts.duration;
		if (progress > 1){
			progress = 1;
		}
		var delta = opts.delta(progress);
		opts.step(delta);
		if (progress == 1){
			clearInterval(id);
			opts.callback();
		}
	}, opts.delay || 17);
	//return id;
}

function slideTo(imageToGo){
	var direction;
	var numOfImageToGo = Math.abs(imageToGo - currentImage);
	// slide toward left

	direction = currentImage > imageToGo ? 1 : -1;
	currentPostion = -1 * currentImage * imageWidth;
	var opts = {
		duration:1000,
		delta:function(p){return p;},
		step:function(delta){
			ul.style.left = parseInt(currentPostion + direction * delta * imageWidth * numOfImageToGo) + 'px';
		},
		callback:function(){currentImage = imageToGo;}	
	};
	animate(opts);
}

function onClickPrev(){
	if (currentImage == 0){
		slideTo(imageNumber - 1);
	} 		
	else{
		slideTo(currentImage - 1);
	}		
}

function onClickNext(){
	if (currentImage == imageNumber - 1){
		slideTo(0);
	}		
	else{
		slideTo(currentImage + 1);
	}		
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
 

window.onload = init;