<?php
	
	/**
	* 
	*/
	include_once("modelo/usuario.php");
	include_once("dao_usuario.php");
	class ControladorUsuario
	{
		var $daoUsuario;
		
		function ControladorUsuario(){
			$this -> daoUsuario = new DAOUsuario();
		}

		function agregarUsuario(&$usuario){
			return $this -> daoUsuario -> insertarUsuario($usuario);
		}

		function eliminarUsuario($idUsuario){
			return $this -> daoUsuario -> eliminarUsuario($idUsuario);
		}

		function modificarUsuario($idUsuario, $email){
			return $this -> daoUsuario -> actualizarUsuario($idUsuario, $email);
		}

		function modificarUsuarioPorAdmin($idUsuario, $email, $contrasena){
			$insercionEmail = $this -> daoUsuario -> actualizarUsuario($idUsuario, $email);
			$insercionPass = $this -> daoUsuario -> actualizarContrasena($idUsuario, $contrasena);
			return ($insercionPass || $insercionEmail);
		}

		function modificarContrasena($idUsuario, $contrasena){
			return $this -> daoUsuario -> actualizarContrasena($idUsuario, $contrasena);
		}

		function obtenerUsuarios(){
			return $this -> daoUsuario -> obtenerUsuarios();
		}

		function obtenerUsuarioPorId($idUsuario){
			return $this -> daoUsuario -> obtenerUsuarioPorId($idUsuario);
		}

		function validarUsuario($nomUsuario, $contrasena){
			$usuario = $this -> daoUsuario -> obtenerUsuarioPorNomUsuario($nomUsuario);
			if($usuario != null){
				if($usuario -> getContrasena() == $contrasena){
					return $usuario;
				}
			}
			return null;
		}


	}

?>