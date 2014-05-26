<?php
	
	include_once("ruta_general.php");
	validarSesion();

	function validarSesion()
	{
		
		if(!(isset($_SESSION['idUsuario'])))
		{
			header('Location:'.MI_RUTA.'login.php');
		}

	}
?>