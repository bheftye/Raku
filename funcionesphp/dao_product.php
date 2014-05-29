<?php 

/**
* 
*/
include_once("modelo/producto.php");
include_once("db_connector.php");
class DAOProducto 
{
	private $dbConnector;
	
	function DAOProducto(){
		$this -> dbConnector = new DBConnector();
	}

	function insertarProducto(&$producto){
		$insercionExitosa = false;
		$sqlQuery = "INSERT INTO productos (`clave`,`nombre`, `img_principal` , `descripcion`, `disenador`, `precio` , `num_disponible`, status, categoria) 
		VALUES('".$producto -> getClave()."','".htmlspecialchars($producto -> getNombre(), ENT_QUOTES)."','".$producto -> getImagenPrincipal()."','".htmlspecialchars($producto -> getDescripcion(), ENT_QUOTES)."',
		'".htmlspecialchars($producto -> getDisenador(), ENT_QUOTES)."', '".$producto -> getPrecio()."', '".$producto -> getNumDisponible()."','".$producto -> getStatus()."', '".$producto -> getCategoria()."')";
		$this -> dbConnector -> prepararConector();
		if($this -> dbConnector -> ejecutarInsertUpdateDeleteQuery($sqlQuery)){
			$producto -> setIdProducto($this -> dbConnector -> obtenerUltimoIdInsertado());
			$insercionExitosa = true;
		}
		return $insercionExitosa;
		
	}

	function insertarImagenPrincipal($nombreImg, $idProducto){
		$insercionExitosa = false;
		$sqlQuery = "UPDATE productos SET `img_principal` = '".$nombreImg."' WHERE id_producto = ".$idProducto;
		$this -> dbConnector -> prepararConector();
		if($this -> dbConnector -> ejecutarInsertUpdateDeleteQuery($sqlQuery)){
			$insercionExitosa = true;
		}
		return $insercionExitosa;
	}

	function insertarImagenSecundaria($nombreImg,$idProducto){
		$insercionExitosa = false;
		$sqlQuery = "INSERT INTO imagenes_productos (`id_producto`, `img`)
		VALUES(".$idProducto.", '".$nombreImg."')";
		$this -> dbConnector -> prepararConector();
		if($this -> dbConnector -> ejecutarInsertUpdateDeleteQuery($sqlQuery)){
			$insercionExitosa = true;
		}
		return $insercionExitosa;
	}

	function actualizarProducto($producto){
		$insercionExitosa = false;
		$sqlQuery = "UPDATE `productos` SET `clave`= '".$producto -> getClave()."',`nombre`='".$producto -> getNombre()."',`descripcion`='".$producto -> getDescripcion()."',`disenador`='".$producto -> getDisenador()."',`precio`='".$producto -> getPrecio()."',`num_disponible`=".$producto -> getNumDisponible().", categoria = '".$producto -> getCategoria()."' WHERE id_producto =".$producto -> getIdProducto();
		$this -> dbConnector -> prepararConector();
		if($this -> dbConnector -> ejecutarInsertUpdateDeleteQuery($sqlQuery)){
			$insercionExitosa = true;
		}
		return $insercionExitosa;
	}

	function eliminarProducto($idProducto){
		$eliminacionExitosa = false;
		$sqlQuery = "DELETE FROM `imagenes_productos` WHERE id_producto =".$idProducto;
		$sqlQuery2 = "DELETE FROM `productos` WHERE id_producto =".$idProducto;
		$this -> dbConnector -> prepararConector();
		if($this -> dbConnector -> ejecutarInsertUpdateDeleteQuery($sqlQuery) && $this -> dbConnector -> ejecutarInsertUpdateDeleteQuery($sqlQuery2)){
			$eliminacionExitosa = true;
		}
		return $eliminacionExitosa;
	}

	private function llenarProductoConDatos($filaSQL){
			$db_id = $filaSQL["id_producto"];
			$clave = $filaSQL["clave"];
			$nombre = $filaSQL["nombre"];
			$descripcion = $filaSQL["descripcion"];
			$disenador = $filaSQL["disenador"];
			$precio = $filaSQL["precio"];
			$numDisponible = $filaSQL["num_disponible"];
			$imagenPrincipal = $filaSQL["img_principal"];
			$categoria = $filaSQL["categoria"];
			$activo = $filaSQL["status"];
			$imagenesSecundarias = $this -> obtenerImagenesSecundarias($db_id);
			$colores = array();
			return $producto = new Producto($db_id, $clave, $nombre, $descripcion, $disenador, $precio, $numDisponible, $categoria, $imagenPrincipal ,$imagenesSecundarias, $colores, $activo);
	}		//($idProducto = 0, $clave = "", $nombre = "", $descripcion = "", $disenador = "", $precio = "", $numDisponible = 0, $categoria = "", $imagenPrincipal = "", $imagenes = array(), $colores = array(), $activo = 0

	function obtenerProductoPorId($idProducto){
		$sqlQuery = "SELECT * FROM productos WHERE id_producto = ". $idProducto;
		$this -> dbConnector -> prepararConector();
		$producto = null;
		$resultados = $this -> dbConnector -> ejecutarSelectQuery($sqlQuery);
		while($fila = mysqli_fetch_array($resultados)){
			$producto = $this -> llenarProductoConDatos($fila);
		}
		$this -> dbConnector -> cerrarConector();
		return $producto;
	}

	function obtenerProductoPorClave($claveProducto){
		$sqlQuery = "SELECT * FROM productos WHERE clave = '". $claveProducto."'";
		$this -> dbConnector -> prepararConector();
		$producto = null;
		$resultados = $this -> dbConnector -> ejecutarSelectQuery($sqlQuery);
		while($fila = mysqli_fetch_array($resultados)){
			$producto = $this -> llenarProductoConDatos($fila);
		}
		$this -> dbConnector -> cerrarConector();
		return $producto;
	}

	function actualizarNumDisponibleProducto($idProducto, $nuevaCantidad){
		$insercionExitosa = false;
		$sqlQuery = "UPDATE `productos` SET `num_disponible`= '".$nuevaCantidad."' WHERE id_producto =".$idProducto;
		$this -> dbConnector -> prepararConector();
		if($this -> dbConnector -> ejecutarInsertUpdateDeleteQuery($sqlQuery)){
			$insercionExitosa = true;
		}
		return $insercionExitosa;
	}

	private function obtenerImagenesSecundarias($idProducto){
		$sqlQuery = "SELECT * FROM imagenes_productos WHERE id_producto = ". $idProducto;
		$resultados = $this -> dbConnector -> ejecutarSelectQuery($sqlQuery);
		$imageneSecundarias = array();
		while($fila = mysqli_fetch_array($resultados)){
			$imagenSecundaria = $fila["img"];
			array_push($imageneSecundarias, $imagenSecundaria);
		}
		return $imageneSecundarias;
	}

	

	function obtenerProductos(){
		$sqlQuery = "SELECT * FROM productos ORDER BY id_producto ASC";
		$this -> dbConnector -> prepararConector();
		$resultados = $this -> dbConnector -> ejecutarSelectQuery($sqlQuery);
		$productos = array();
		while($fila = mysqli_fetch_array($resultados)){
			$producto = $this -> llenarProductoConDatos($fila);
			array_push($productos, $producto);
		}
		$this -> dbConnector -> cerrarConector();
		return $productos;
	}

	function obtenerProductosPorCategoria($categoria){
		$sqlQuery = "SELECT * FROM productos WHERE categoria = '".$categoria."' ORDER BY id_producto ASC";
		$this -> dbConnector -> prepararConector();
		$resultados = $this -> dbConnector -> ejecutarSelectQuery($sqlQuery);
		$productos = array();
		while($fila = mysqli_fetch_array($resultados)){
			$producto = $this -> llenarProductoConDatos($fila);
			array_push($productos, $producto);
		}
		$this -> dbConnector -> cerrarConector();
		return $productos;
	}

	function obtenerProductosPorQueryBusqueda($queryBuscar){
		$sqlQuery = "SELECT * FROM productos WHERE nombre like '%".$queryBuscar."%' or descripcion like '%".$queryBuscar."%' or disenador like '%".$queryBuscar."%' ORDER BY id_producto ASC";
		$this -> dbConnector -> prepararConector();
		$resultados = $this -> dbConnector -> ejecutarSelectQuery($sqlQuery);
		$productos = array();
		while($fila = mysqli_fetch_array($resultados)){
			$producto = $this -> llenarProductoConDatos($fila);
			array_push($productos, $producto);
		}
		$this -> dbConnector -> cerrarConector();
		return $productos;
	}

}
?>