<?php
	
	/**
	* 
	*/
	include_once("modelo/producto.php");
	include_once("dao_product.php");
	class ControladorProducto
	{
		var $daoProducto;
		
		function ControladorProducto(){
			$this -> daoProducto = new DAOProducto();
		}

		function agregarProducto(&$producto){
			return $this -> daoProducto -> insertarProducto($producto);
		}

		function agregarImagenSecundariaAProducto($nombreImagen, $nombreImagenTmpImagen, $idProducto){
			if(move_uploaded_file($nombreImagenTmpImagen, "../imagenesProductos/secundarias/".$nombreImagen)){
				return $this -> daoProducto -> insertarImagenSecundaria($nombreImagen, $idProducto);
			}
			else{
				return false;
			}
		}

		function eliminarProducto($idProducto){
			$producto = $this -> obtenerProductoPorId($idProducto);
			if($producto != null){
				//eliminar imagen primaria
				unlink("../imagenesProductos/principales/".$producto -> getImagenPrincipal());
				//eliminar imagen secundaria
				foreach ($producto -> getImagenes() as $imagen) {
					unlink("../imagenesProductos/secundarias/".$imagen);
				}
				//eliminar producto
				$this -> daoProducto -> eliminarProducto($idProducto);
			}
		}

		function modificarProducto($producto){
			return $this -> daoProducto -> actualizarProducto($producto);
		}

		function agregarImagenPrincipalAProducto($nombreImagenTmpImagen, $nombreImagen,$idProducto){
			if(move_uploaded_file($nombreImagenTmpImagen, "../imagenesProductos/principales/".$nombreImagen)){
				return $this -> daoProducto -> insertarImagenPrincipal($nombreImagen, $idProducto);
			}
			else{
				return false;
			}
		}

		function obtenerProductos(){
			return $this -> daoProducto -> obtenerProductos();
		}

		function obtenerProductoPorId($idProducto){
			return $this -> daoProducto -> obtenerProductoPorId($idProducto);
		}

		function obtenerProductosPorCategoria($categoria){
			return $this -> daoProducto -> obtenerProductosPorCategoria($categoria);	
		}

		function obtenerProductoPorClave($claveProducto){
			return $this -> daoProducto -> obtenerProductoPorClave($claveProducto);
		}

		function actualizarNumDisponibleProducto($idProducto, $nuevaCantidad){
			return $this -> daoProducto -> actualizarNumDisponibleProducto($idProducto, $nuevaCantidad);
		}

		function obtenerProductosPorQueryBusqueda($queryBuscar){
			return $this -> daoProducto -> obtenerProductosPorQueryBusqueda($queryBuscar);
		}

	}

?>