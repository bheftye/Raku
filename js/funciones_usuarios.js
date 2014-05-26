window.onload = function(){
	if(document.getElementById("canBtn") != null)
	document.getElementById("canBtn").onclick = function(){ window.location.href="usuarios.php" };
};

function validarCamposRegistro(){
	var nomUsuario = document.getElementById("userR").value;
	var contrasena = document.getElementById("passR").value;
	var contrasena2 = document.getElementById("passR2").value;
	var email = document.getElementById("emailR").value;

	var camposLlenos = nomUsuario != "" && contrasena != "" && contrasena2 != "" && email != "";

	if(camposLlenos){
		if(contrasena == contrasena2){
			return true;
		}
		else{
			document.getElementById("error").innerHTML = "Contrase&ntilde;as no coinciden.";
			return false;
		}
	}
	document.getElementById("error").innerHTML = "Llena todos los campos para continuar.";
	return false;
}

function eliminarUsuario(clave, index){
	if(confirm("¿Desea eliminar el usuario "+ clave+"?")){
		document.getElementById("form_eliminar_usuario"+index).submit();
	}

	return;
}