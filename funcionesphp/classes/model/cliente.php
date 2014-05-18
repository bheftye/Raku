<?php
	include_once("venta.php");
	class Cliente{

		var $idCliente;
		var $nombre;
		var $apellido;
		var $correo;
		var $direccion;
		var $pais;
		var $estadoProvincia;
		var $ciudad;
		var $codigoPostal;
		var $compras;

		function Cliente($idCliente = 0,$nombre = "", $apellido = "", $correo = "", $direccion = "", $pais = "", $estadoProvincia = "", $ciudad = "", $codigoPostal = "", $compras = array()){
			$this -> idCliente = $idCliente;
			$this -> nombre = $nombre;
			$this -> apellido = $apellido;
			$this -> correo = $correo;
			$this -> direccion = $direccion;
			$this -> pais = $pais;
			$this -> estadoProvincia = $estadoProvincia;
			$this -> ciudad = $ciudad;
			$this -> codigoPostal = $codigoPostal;
			$this -> compras = $compras
		}

		function getIdCliente(){
			return $this -> idCliente;
		}

		function setIdCliente($idCliente){
			$this -> idCliente = $idCliente;
		}

		function getNombre(){
			return $this -> nombre;
		}

		function setNombre($nombre){
			$this -> nombre = $nombre;
		}

		function getApellido(){
			return $this -> apellido;
		}

		function setApellido($apellido){
			$this -> apellido = $apellido;
		}

		function getCorreo(){
			return $this -> correo;
		}

		function setCorreo($correo){
			$this -> correo = $correo;
		}

		function getDireccion(){
			return $this -> direccion;
		}

		function setDireccion($direccion){
			$this -> direccion = $direccion;
		}

		function getPais(){
			return $this -> pais;
		}

		function setPais($pais){
			$this -> pais = $pais;
		}

		function getPais(){
			return $this -> pais;
		}

		function setPais($pais){
			$this -> pais = $pais;
		}

		function getEstadoProvincia(){
			return $this -> estadoProvincia;
		}

		function setEstadoProvincia($estadoProvincia){
			$this -> estadoProvincia = $estadoProvincia;
		}

		function getCiudad(){
			return $this -> ciudad;
		}

		function setCiudad($ciudad){
			$this -> ciudad = $ciudad;
		}

		function getCodigoPostal(){
			return $codigoPostal -> codigoPostal;
		}

		function setCodigoPostal($codigoPostal){
			$this -> codigoPostal = $codigoPostal;
		}

		function getCompras(){
			return $this -> compras;
		}

		function setCompras($compras){
			$this -> compras = $compras;
		}

	}
?>