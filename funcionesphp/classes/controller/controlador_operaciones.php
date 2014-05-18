<?php 
	
	require_once("../model/producto.php");
	require_once("./controlador_producto");
	if(isset($_REQUEST["operacion"])){
		$operacion = $_REQUEST["operacion"];
		switch($operacion){
			case "insertar_producto":
				insertarProducto();
				break;
			case "modificar_producto":
				modificarProducto();
				break;
			case "eliminar_producto":
				eliminarProducto();
				break;
		}
	}


	function insertarProducto(){
		
		$nombre = isset($_REQUEST["nombre"])? $_REQUEST["txt_nombre"]: "";
		$descripcion = isset($_REQUEST["descripcion"])? $_REQUEST["txt_descripcion"]:"";
		$disenador = isset($_REQUEST["disenador"])? $_REQUEST["txt_disenador"]:"";
		$precio = isset($_REQUEST["precio"])? $_REQUEST["txt_precio"]:"";
		$numDisponible = isset($_REQUEST["numDisponible"])? $_REQUEST["txt_numDisponible"]:"";
		$categoria = isset($_REQUEST["categoria"])? $_REQUEST["categoria"]:"";
		$producto = new Producto(0, $nombre, $descripcion, $precio, $numDisponible, $categoria);
		$controladorProducto = new ControladorProducto();
		$insercionExitosa = $controladorProducto - agregarProducto(&$producto);
		if(!$insercionExitosa){
			header("Location: ".MI_RUTA."alta_producto.php?np=".$nombre."&dp=".$descripcion."&dip=".$disenador."&pp=".$precio."&np=".$numDisponible."&cp=".$categoria."&er=failurep")
			exit();
		}
		$nombre_imagen_principal = isset($_FILES['f_imagen_principal']['name']? $_FILES['f_imagen_principal']['name']:"";
		$nombre_imagen_principal_temporal= isset($_FILES['f_imagen_principal']['name']? $_FILES['f_imgane_principal']['tmp_name']:"";

		if (isset($_FILES['f_imagenes_secundarias']['name'][0])) {
			if ($_FILES['f_imagenes_secundarias']['name'][0]!= ""){
		 		$numImagenesSecundarias = count($_FILES["f_imagenes_secundarias"]["size"]);
         		for ($i = 0; $i < $numImagenesSecundarias; $i++){
         			$nombre_imagen_secundaria = $_FILES['f_imagenes_secundarias']['name'][$i];
         			$nombre_imagen_secundaria = generaNombreAleatorioParaImagen($nombre_imagen_secundaria); 
            		$nombre_imagen_secundaria_temporal = $_FILES["f_imagenes_secundarias"]["tmp_name"][$i]; 
            		//$paquete->insertarImgPaquete($name,$tmp_name);       
            	}
			}
		}        



		$imagenes = ;
		$colores;
		$activo = 1;
	}

	function modificarProducto(){}

	function eliminarProducto(){}

	function generaNombreAleatorioParaImagen(){

	}

?>