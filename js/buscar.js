window.onload = function(){
	document.getElementById("btn_buscar").onclick = buscar;
	init();
}

function buscar(){
	if(document.getElementById("txt_buscar").value != "" && document.getElementById("txt_buscar").value != " " ){
		var queryBusqueda = document.getElementById("txt_buscar").value;
		location.href="resultado.php?bq="+queryBusqueda;
	}
	else{
		alert("Fill the field to continue searching.");
	}
}