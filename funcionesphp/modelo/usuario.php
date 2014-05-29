<?php
	/**
	* 
	*/
	class Usuario 
	{
		private $idUsuario;
		private $nomUsuario;
		private $contrasena;
		private $email;
		private $status;
		
		function Usuario($idUsuario = 0, $nomUsuario = "", $contrasena = "", $email = "", $status = 1)
		{	
			$this -> idUsuario = $idUsuario;
			$this -> nomUsuario = $nomUsuario;
			$this -> contrasena = $contrasena;
			$this -> email = $email;
			$this -> status = $status;
		}

		function getNomUsuario(){
			return $this -> nomUsuario;
		}

		function setNomUsuario($nomUsuario){
			$this -> nomUsuario = $nomUsuario;
		}

		function getContrasena(){
			return $this -> contrasena;
		}

		function setContrasena($contrasena){
			$this -> contrasena = $contrasena;
		}

		function getIdUsuario(){
			return $this -> idUsuario;
		}

		function setIdUsuario($idUsuario){
			$this -> idUsuario = $idUsuario;
		}

		function getEmail(){
			return $this -> email;
		}

		function setEmail($email){
			$this -> email = $email;
		}

		function setActivo($status){
			$this -> status = $status;
		}

		function getActivo(){
			return $this -> status;
		}
	}
?>