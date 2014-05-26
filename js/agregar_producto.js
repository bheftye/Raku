window.onload = function(){
	//document.getElementById("agrBtn").onclick = validarCamposProducto;
	//document.getElementById("form_producto").onsubmit = validarCamposProductos;
	document.getElementById("file_browse_principal").addEventListener("change", renderizarImagenPrincipal, false);
	document.getElementById("file_browse_secundarias").addEventListener("change", renderizarImagenesSecundarias, false);
	document.getElementById("canBtn").onclick = function(){ window.location.href="productos.php" };
};

function validarCamposProductos(){
	var id = document.getElementById("txt_id").value;
	var nombre = document.getElementById("txt_nombre").value;
	var descripcion = document.getElementById("txt_descripcion").value;
	var disenador = document.getElementById("txt_disenador").value;
	var precio = document.getElementById("txt_precio").value;
	var noPiezas = document.getElementById("txt_nopiezas").value;
	var categoria = document.getElementById("s_categoria").value;
	var imgPrincipal = document.getElementById("file_browse_principal").value;
	var outPutPrincipal = document.getElementById("principal_output").innerHTML;

	var camposLlenos = id != "" && nombre != "" && descripcion != "" && disenador != "" && precio != "" && noPiezas != "" && categoria != "seleccionar" && (imgPrincipal != "" || outPutPrincipal != "");

	if(camposLlenos){
		return true;
	}
	else{
		alert("Ocurrio un error, verifica que todos los campos esten llenos");
	}

	return false;
}


function renderizarImagenPrincipal(evt){
	var files = evt.target.files; 
		document.getElementById("principal_output").innerHTML = "";
		for (var i = 0, f; f = files[i]; i++) {
		  if (!f.type.match('image.*')) {
			continue;
		  }
		  var reader = new FileReader();
	
		  reader.onload = (function(theFile) {
			return function(e) {
			  var span = document.createElement('div');
			  span.className = "col-lg-3 col-md-4 col-sm-12 col-xs-12";
			  span.innerHTML = ['<img style="margin: 20px 0 20px 0; max-height:170px" class="img-responsive" src="', e.target.result,
								'" title="', escape(theFile.name), '"/>'].join('');
			  document.getElementById('principal_output').insertBefore(span, null);
			};
		  })(f);
	
		  reader.readAsDataURL(f);
		}
}

function renderizarImagenesSecundarias(evt){

		var files = evt.target.files; 
		document.getElementById("secundarias_output").innerHTML = "";
		for (var i = 0, f; f = files[i]; i++) {
		  if (!f.type.match('image.*')) {
			continue;
		  }
		  var reader = new FileReader();
	
		  reader.onload = (function(theFile) {
			return function(e) {
			  var span = document.createElement('div');
			  span.className = "col-lg-3 col-md-4 col-sm-12 col-xs-12";
			  span.innerHTML = ['<img style="margin: 20px 0 20px 0; max-height:170px;" class="img-responsive" src="', e.target.result,
								'" title="', escape(theFile.name), '"/>'].join('');
			  document.getElementById('secundarias_output').insertBefore(span, null);
			};
		  })(f);
	
		  reader.readAsDataURL(f);
		}
}