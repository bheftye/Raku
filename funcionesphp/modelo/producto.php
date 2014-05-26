<?php

/**
* 
*/
class Producto
{
	private $idProducto;
	private $nombre;
	private $descripcion;
	private $disenador;
	private $precio;
	private $numDisponible;
	private $imagenPrincipal;
	private $imagenes;
	private $colores;
	private $activo;
	private $categoria;

	function Producto($idProducto = 0, $clave = "", $nombre = "", $descripcion = "", $disenador = "", $precio = "", $numDisponible = 0, $categoria = "", $imagenPrincipal = "", $imagenes = array(), $colores = array(), $activo = 1)
	{
		$this -> idProducto = $idProducto;
		$this -> clave = $clave;
		$this -> nombre = $nombre;
		$this -> descripcion = $descripcion;
		$this -> disenador = $disenador;
		$this -> precio = $precio;
		$this -> numDisponible = $numDisponible;
		$this -> imagenes = $imagenes;
		$this -> colores = $colores;
		$this -> activo = $activo;
		$this -> categoria = $categoria; 
		$this -> imagenPrincipal = $imagenPrincipal;
	}

	function setIdProducto($idProducto){
		$this -> idProducto = $idProducto;
	}

	function setClave($clave){
		$this -> clave = $clave;
	}

	function setNombre($nombre){
		$this -> nombre = $nombre;
	}

	function setDescripcion($descripcion){
		$this -> descripcion = $descripcion;
	}

	function setDisenador($disenador){
		$this -> disenador = $disenador;
	}

	function setPrecio($precio){
		$this -> precio = $precio;
	}

	function setNumDisponible($numDisponible){
		$this -> numDisponible = $numDisponible;
	}

	function setImagenes($imagenes){
		$this -> imagenes = $imagenes;
	}

	function setColores($colores){
		$this  -> colores = $colores;
	}

	function setStatus($activo){
		$this -> activo = $activo;
	}

	function setCategoria($categoria){
		$this -> categoria = $categoria;
	}

	function setImagenPrincipal($imagenPrincipal){
		$this -> imagenPrincipal = $imagenPrincipal;
	}

	function getImagenPrincipal(){
		return $this -> imagenPrincipal;
	}

	function getClave(){
		return $this -> clave;
	}

	function getIdProducto(){
		return $this -> idProducto;
	}

	function getNombre(){
		return $this -> nombre;
	}

	function getDescripcion(){
		return $this -> descripcion;
	}

	function getDisenador(){
		return $this -> disenador;
	}

	function getPrecio(){
		return $this -> precio;
	}

	function getNumDisponible(){
		return $this -> numDisponible;
	}

	function getImagenes(){
		return $this -> imagenes;
	}

	function getColores(){
		return $this  -> colores;
	}

	function getStatus(){
		return $this  -> activo;
	}

	function getCategoria(){
		return $this  -> categoria;
	}


}

?>