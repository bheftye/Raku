<?php
	
	/**
	* 
	*/
	include_once("../model/producto.php");
	include_once("../model/categoria.php");
	include_once("../dao/dao_product.php");
	class ControladorProducto
	{
		var $daoProducto;
		
		function ControladorProducto(){
			$this -> daoProducto = new DAOProducto();
		}

		function agregarProducto(&$producto){
			return $this -> daoProducto -> insertarProducto($producto);
		}

		function deleteProduct($idProduct){
			$this -> daoProduct -> addProduct($product);
		}

		function modifyProduct($product){
			
		}

		function getAllProducts(){

		}

		function getAllProductsByCategorie($categorie){

		}

		function searchMatchingProducts($searchQuery){

		}

		function obtenerProductoPorId($idProducto){
			return $this -> daoProducto -> obtenerProductoPorId($idProducto);
		}


	}

?>