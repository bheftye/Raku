
window.onload = function(){
	document.getElementById("billBtn").onclick = redirigeANota;
};

function redirigeANota(){
	if(confirm("Bill has been sent succesfully.")){
	}
	else{
		alert("Your receipt has been sent succesfully.");
	}
}