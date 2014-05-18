<?php 

/**
* 
*/
include_once("../model/product.php");
include_once("../database/db_connector.php");
class DAOProducto 
{
	private $dbConnector;
	
	function DAOProducto(){
		$this -> dbConnector = new DBConnector();
	}

	function insertarProducto($productoo){
		$insercionExitosa = false;
		$sqlQuery = "INSERT INTO productoos `nombre`, `descripcion`, `disenador`, `precio` , `num_disponible`, status 
		VALUES('".htmlspecialchars($producto -> name, ENT_QUOTES)."','".htmlspecialchars($producto -> description, ENT_QUOTES)."',
		'".htmlspecialchars($producto -> designer, ENT_QUOTES)."', '".$producto -> price."', '".$producto -> numAvailable."','".$producto -> status."')";
		$pconexion = $this -> dbConnector -> getConnector();
		if(mysqli_query($pconexion, $sqlQuery)){
			$producto -> setIdProducto(mysqli_insert_id($pconexion));
			$insercionExitosa = true;
		}
		return $insercionExitosa;
	}

	function actualizarProducto($product){}

	function eliminarProducto($idProduct){}

	function obtenerProductoPorId($idProducto){
		$sqlQuery = "SELECT * FROM productos WHERE id_producto = ". $idProducto;
		$this -> dbConnector -> prepararConector();
		$resultados = $this -> dbConnector -> ejecutarSelectQuery();
		$producto = new Producto();
		while($fila = mysqli_fetch_array($resultados)){
			$db_id = $fila["id_producto"];
			$clave = $fila["clave"];
			$nombre = $fila["nombre"];
			$descripcion = $fila["descripcion"];
			$disenador = $fila["disenador"];
			$precio = $fila["precio"];
			$numDisponible = $fila["num_disponible"];
			$imagenPrincipal = $fila["img_principal"];
			$categoria = $fila["categoria"];
			$activo = $fila["activo"];
			$imagenes = $this -> obtenerImagenesSecundarias($db_id);
			array_unshift($imagenes, $imagenPrincipal);
			$colores = array();
			$producto = new Producto($clave, $nombre, $descripcion, $precio, $numDisponible, $categoria, $imagenes, $colores, $activo);
		}
		$this -> dbConnector -> cerrarConector();
		return $producto;
	}

	private function obtenerImagenesSecundarias($idProducto){
		$sqlQuery = "SELECT * FROM imagenes_productos WHERE id_producto = ". $idProducto;
		$this -> dbConnector -> prepararConector();
		$resultados = $this -> dbConnector -> ejecutarSelectQuery();
		$imageneSecundarias = array();
		while($fila = mysqli_fetch_array($resultados)){
			$imagenSecundaria = $fila["img"];
			array_push($imageneSecundarias, $imagenSecundaria);
		}
		$this -> dbConnector -> cerrarConector();
		return $imageneSecundarias;
	}

	function getAllProducts(){}

	function getProductsByCategorie($idCategorie){}

	function getAllProductsThatMatchSearchQuery($searchQuery){}

}
?>