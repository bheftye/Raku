<?php
	include_once("producto.php");
	class Venta{

		$idCliente;
		$idVenta;
		$fecha;
		$total;
		$productos;

		function Venta($idCliente =  0, $idVenta = 0, $fecha = "", $total="", $productos = array()){
			$this -> idCliente = $idCliente;
			$this -> idVenta = $idVenta;
			$this -> fecha = $fecha;
			$this -> total = $total;
			$this -> productos = $productos;
		}

		function setIdCliente($idCliente){
			$this -> idCliente = $idCliente;
		}

		function setIdVenta($idVenta){
			$this -> idVenta = $idVenta;
		}

		function setFecha($fecha){
			$this -> idCliente = $idCliente;
		}

		function setTotal($total){
			$this -> idCliente = $idCliente;
		}

		function setProductos($productos){
			$this -> idCliente = $idCliente;
		}

		function getIdCliente(){
			return $this -> idCliente;
		}

		function getIdVenta(){
			return $this -> idVenta;
		}

		function getFecha(){
			return $this -> fecha;
		}

		function getTotal(){
			return $this -> total;
		}

		function getProductos(){
			return $this -> productos;
		}

	}
?>