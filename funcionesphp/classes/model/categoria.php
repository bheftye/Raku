<?php 
	
	class Categoria{

		var $idCategoria;
		var $nombre;
		var $productos;

		function Categoria($idCategoria = 0, $nombre = "", $productos = array()){
			$this -> idCategoria = $idCategoria;
			$this -> nombre = $nombre;
			$this -> productos = $productos;
		}

		function getIdCategoria(){
			return $this -> categoria;
		}

		function getNombre(){
			return $this -> nombre;
		}

		function getProductos(){
			return $this -> productos;
		}

		function setIdCategoria($idCategoria){
			$this -> idCategoria = $idCategoria;
		}

		function setNombre($nombre){
			$this -> nombre = $nombre;
		}

		function setProductos($productos){
			$this -> productos = $productos;
		}
	}
?>