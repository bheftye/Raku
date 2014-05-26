<?php 
	include_once("modelo/producto.php");
	include_once("modelo/usuario.php");
	include_once("controlador_producto.php");
	include_once("controlador_usuario.php");
	include_once("ruta_general.php");
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
			case "insertar_usuario":
				insertarUsuario();
				break;
			case "modificar_usuario":
				modificarUsuario();
				break;
			case "eliminar_usuario":
				eliminarUsuario();
				break;
			case "iniciar_sesion":
				iniciarSesion();
				break;
			case "cerrar_sesion":
				cerrarSesion();
				break;
			case "modificar_contrasena":
				modificarContrasena();
				break;
			case "eliminar_usuario":
				eliminarUsuario();
				break;
			case "modificar_usuario_por_admin":
				modificarUsuarioPorAdmin();
				break;
			case "eliminar_usuario_por_admin":
				eliminarUsuarioPorAdmin();
				break;
		}
	}

	else{
		echo "Ninguna Operacion";
	}


	function insertarProducto(){
		$clave = isset($_REQUEST["txt_id"])? $_REQUEST["txt_id"]: "";
		$nombre = isset($_REQUEST["txt_nombre"])? $_REQUEST["txt_nombre"]: "";
		$descripcion = isset($_REQUEST["txt_descripcion"])? $_REQUEST["txt_descripcion"]:"";
		$disenador = isset($_REQUEST["txt_disenador"])? $_REQUEST["txt_disenador"]:"";
		$precio = isset($_REQUEST["txt_precio"])? $_REQUEST["txt_precio"]:"";
		$numDisponible = isset($_REQUEST["txt_nopiezas"])? $_REQUEST["txt_nopiezas"]:"";
		$categoria = isset($_REQUEST["s_categoria"])? $_REQUEST["s_categoria"]:"";
		$producto = new Producto(0, $clave ,$nombre, $descripcion, $disenador, $precio, $numDisponible, $categoria);
		$controladorProducto = new ControladorProducto();
		$insercionExitosa = $controladorProducto -> agregarProducto($producto);
		if(!$insercionExitosa || $producto -> getIdPRoducto() == 0){
			header("Location: ".MI_RUTA."alta_producto.php?clv=".$clave."&np=".$nombre."&dp=".$descripcion."&dip=".$disenador."&pp=".$precio."&np=".$numDisponible."&cp=".$categoria."&er=failurep");
			exit();
		}

		
		if(isset($_FILES['f_imgp']['name']) && isset($_FILES['f_imgp']['name'])){
			$nombre_imagen_principal = $_FILES['f_imgp']['name'];
			$nombre_imagen_principal = uniqid($idProducto).".".pathinfo($nombre_imagen_principal, PATHINFO_EXTENSION);
			$nombre_imagen_principal_temporal=  $_FILES['f_imgp']['tmp_name'];
			$insercionImagenPExitosa = $controladorProducto -> agregarImagenPrincipalAProducto($nombre_imagen_principal_temporal, $nombre_imagen_principal ,$producto -> getIdProducto());
			if(!$insercionImagenPExitosa){
				header("Location: ".MI_RUTA."cp/alta_producto.php?idproducto=".$idProducto."&er=imgp");

			}
		}
		else{
			header("Location: ".MI_RUTA."cp/alta_producto.php?idproducto=".$idProducto."&er=imgp");

		}

		$imagenesSecundariasAgregadas = false;

		if (isset($_FILES['f_imgs'])) {
		 		$numImagenesSecundarias = count($_FILES["f_imgs"]["size"]);
         		for ($i = 0; $i < $numImagenesSecundarias; $i++){
         			$nombre_imagen_secundaria = $_FILES['f_imgs']['name'][$i];
         			$nombre_imagen_secundaria = uniqid($producto -> getIdPRoducto()).".".pathinfo($nombre_imagen_secundaria, PATHINFO_EXTENSION);
            		$nombre_imagen_secundaria_temporal = $_FILES["f_imgs"]["tmp_name"][$i]; 
            		$insercionExitosaImgS = $controladorProducto-> agregarImagenSecundariaAProducto($nombre_imagen_secundaria, $nombre_imagen_secundaria_temporal ,$producto -> getIdProducto());       
					if($insercionExitosaImgS){
						$imagenesSecundariasAgregadas = true;
					}
					else{
						$imagenesSecundariasAgregadas = false;
					}
			}
		}

		if(!$imagenesSecundariasAgregadas){
			header("Location: ".MI_RUTA."cp/alta_producto.php?idproducto=".$idProducto."&er=imgs");
		}

		header("Location: ".MI_RUTA."cp/productos.php");

	}

	function modificarProducto(){
		if(isset($_REQUEST["id_p"])){
			$idProducto = isset($_REQUEST["id_p"])? $_REQUEST["id_p"]: "";
			$clave = isset($_REQUEST["txt_id"])? $_REQUEST["txt_id"]: "";
			$nombre = isset($_REQUEST["txt_nombre"])? $_REQUEST["txt_nombre"]: "";
			$descripcion = isset($_REQUEST["txt_descripcion"])? $_REQUEST["txt_descripcion"]:"";
			$disenador = isset($_REQUEST["txt_disenador"])? $_REQUEST["txt_disenador"]:"";
			$precio = isset($_REQUEST["txt_precio"])? $_REQUEST["txt_precio"]:"";
			$numDisponible = isset($_REQUEST["txt_nopiezas"])? $_REQUEST["txt_nopiezas"]:"";
			$categoria = isset($_REQUEST["s_categoria"])? $_REQUEST["s_categoria"]:"";
			$producto = new Producto($idProducto, $clave ,$nombre, $descripcion, $disenador, $precio, $numDisponible, $categoria);
			$controladorProducto = new ControladorProducto();
			$insercionExitosa = $controladorProducto -> modificarProducto($producto);
			if(!$insercionExitosa || $producto -> getIdPRoducto() == 0){
				header("Location: ".MI_RUTA."cp/alta_producto.php?idp=".$idProducto."&er=modfail");
				exit();
			}

			
			if(isset($_FILES['f_imgp']['name']) && isset($_FILES['f_imgp']['name'])){
				$nombre_imagen_principal = $_FILES['f_imgp']['name'];
				$nombre_imagen_principal = uniqid($idProducto).".".pathinfo($nombre_imagen_principal, PATHINFO_EXTENSION);
				$nombre_imagen_principal_temporal=  $_FILES['f_imgp']['tmp_name'];
				$insercionImagenPExitosa = $controladorProducto -> agregarImagenPrincipalAProducto($nombre_imagen_principal_temporal, $nombre_imagen_principal ,$producto -> getIdProducto());
				if(!$insercionImagenPExitosa){
					header("Location: ".MI_RUTA."cp/alta_producto.php?idproducto=".$idProducto."&er=imgp");

				}
			}
			else{
				header("Location: ".MI_RUTA."cp/alta_producto.php?idproducto=".$idProducto."&er=imgp");

			}

			$imagenesSecundariasAgregadas = false;

			if (isset($_FILES['f_imgs'])) {
			 		$numImagenesSecundarias = count($_FILES["f_imgs"]["size"]);
	         		for ($i = 0; $i < $numImagenesSecundarias; $i++){
	         			$nombre_imagen_secundaria = $_FILES['f_imgs']['name'][$i];
	         			$nombre_imagen_secundaria = uniqid($producto -> getIdPRoducto()).".".pathinfo($nombre_imagen_secundaria, PATHINFO_EXTENSION);
	            		$nombre_imagen_secundaria_temporal = $_FILES["f_imgs"]["tmp_name"][$i]; 
	            		$insercionExitosaImgS = $controladorProducto-> agregarImagenSecundariaAProducto($nombre_imagen_secundaria, $nombre_imagen_secundaria_temporal ,$producto -> getIdProducto());       
						if($insercionExitosaImgS){
							$imagenesSecundariasAgregadas = true;
						}
						else{
							$imagenesSecundariasAgregadas = false;
						}
				}
			}

			if(!$imagenesSecundariasAgregadas){
				header("Location: ".MI_RUTA."cp/alta_producto.php?idproducto=".$idProducto."&er=imgs");
			}

			header("Location: ".MI_RUTA."cp/productos.php");
		}
		else{
			header("Location: ".MI_RUTA."cp/productos.php?er=no_modifico_producto");
		}

	}

	function eliminarProducto(){
		if(isset($_REQUEST["id_p"])){
			$idProducto = $_REQUEST["id_p"];
			$controladorProducto = new ControladorProducto();
			$controladorProducto -> eliminarProducto($idProducto);
		}
		header("Location:".MI_RUTA."cp/productos.php?err=fail&message=faileliminarproducto");
	}

	function insertarUsuario(){
		$nomUsuario = isset($_REQUEST["txt_usuario"])? $_REQUEST["txt_usuario"]: "";
		$contrasena = isset($_REQUEST["txt_pass"])? $_REQUEST["txt_pass"]: "";
		$email = isset($_REQUEST["txt_email"])? $_REQUEST["txt_email"]:"";
		$usuario = new Usuario(0, $nomUsuario ,$contrasena, $email);
		$controladorUsuario = new ControladorUsuario();
		$insercionExitosa = $controladorUsuario -> agregarUsuario($usuario);
		if(!$insercionExitosa || $usuario -> getIdUsuario() == 0){
			header("Location: ".MI_RUTA."login.php?er=fail&mensaje=failagregado");
			exit();
		}

		header("Location: ".MI_RUTA."/login.php?er=success&mensaje=successagregado");

	}

	function modificarContrasena(){
		session_start();
		if(isset($_SESSION["contrasena"]) && isset($_SESSION["idUsuario"]) && isset($_REQUEST["passV"]) && isset($_REQUEST["passN"]) && isset($_REQUEST["passNC"])){
			$passViejaS = $_SESSION["contrasena"];
			$passVieja = $_REQUEST["passV"];
			$passNueva = $_REQUEST["passN"];
			$passNuevaC = $_REQUEST["passNC"];
			$idUsuario = $_SESSION["idUsuario"];

			if($passViejaS == $passVieja && $passNueva == $passNuevaC){
				$controladorUsuario = new ControladorUsuario();
				$insercionExitosa = $controladorUsuario -> modificarContrasena($idUsuario, $passNueva);
				if($insercionExitosa){
				$_SESSION["contrasena"] = $passNueva;
				header("Location:".MI_RUTA."perfil.php?err=success&mensaje=passcambiado");
				
				}
				else{
					header("Location:".MI_RUTA."perfil.php?err=fail&mensaje=passnocambiado");
				}
			}
		}
		else{
			$link = $_SERVER['HTTP_REFERER'];
			header("Location:".$link);
		}
	}

	function modificarUsuario(){
		session_start();
		if(isset($_REQUEST["email"]) && isset($_SESSION["idUsuario"])){
			$email = $_REQUEST["email"];
			$idUsuario = $_SESSION["idUsuario"];
			$controladorUsuario = new ControladorUsuario();
			$insercionExitosa = $controladorUsuario -> modificarUsuario($idUsuario, $email);
			if($insercionExitosa){
				if($_SESSION["status"] == 1){
					$_SESSION["email"] = $email;
					header("Location:".MI_RUTA."perfil.php?err=success&mensaje=modfail");
				}
				else{
					header("Location:".MI_RUTA."cp/usuarios.php?err=success&mensaje=modsuccess");
				}
				
			}
			else{
				if($_SESSION["status"] == 1){
					header("Location:".MI_RUTA."perfil.php?err=fail&mensaje=modificacionfail");
				}
				else{
					header("Location:".MI_RUTA."cp/usuarios.php?err=fail&mensaje=modificacionfail");
				}
			}
		}
		else{
			$link = $_SERVER['HTTP_REFERER'];
			header("Location:".$link);
		}
	}

	function modificarUsuarioPorAdmin(){
		if(isset($_REQUEST["txt_email"]) && isset($_REQUEST["txt_pass"]) && isset($_REQUEST["id_u"])){
			$idUsuario = $_REQUEST["id_u"];
			$email = $_REQUEST["txt_email"];
			$contrasena = $_REQUEST["txt_pass"];
			$controladorUsuario = new ControladorUsuario();
			$insercionExitosa = $controladorUsuario -> modificarUsuarioPorAdmin($idUsuario, $email, $contrasena);
			if($insercionExitosa){
				header("Location:".MI_RUTA."cp/usuarios.php?err=success&mensaje=modsuccess");
				
			}
			else{
				header("Location:".MI_RUTA."cp/usuarios.php?err=fail&mensaje=modificacionfail");
			}
		}
		else{
			$link = $_SERVER['HTTP_REFERER'];
			header("Location:".$link);
		}
	}

	function eliminarUsuario(){
		session_start();
		if(isset($_SESSION["idUsuario"]) && $_SESSION["idUsuario"] != 0){
			$idUsuario = $_SESSION["idUsuario"];
			$controladorUsuario = new ControladorUsuario();
			$eliminacionExistosa = $controladorUsuario -> eliminarUsuario($idUsuario);
			if($eliminacionExistosa){
				cerrarSesion();
			}
			else{
				header("Location:".MI_RUTA."perfil.php");
			}
		}
		else{
			$link = $_SERVER['HTTP_REFERER'];
			header("Location:".$link);
		}
	}

	function eliminarUsuarioPorAdmin(){
		if(isset($_REQUEST["id_u"])){
			$idUser = $_REQUEST["id_u"];
			$controladorUsuario = new ControladorUsuario();
			$eliminacionExistosa = $controladorUsuario -> eliminarUsuario($idUser);
			if($eliminacionExistosa){
				header("Location:".MI_RUTA."cp/usuarios.php");
			}
			else{
				header("Location:".MI_RUTA."cp/usuarios.php?err=fail");
			}
		}
		else{
			$link = $_SERVER['HTTP_REFERER'];
			header("Location:".$link);
		}
	}

	function iniciarSesion(){
		$nomUsuario = (isset($_REQUEST['user']))?$_REQUEST['user']:"";
		$contrasena = (isset($_REQUEST['pass']))?$_REQUEST['pass']:"";
		if($nomUsuario != "" && $contrasena != ""){
			$controladorUsuario = new ControladorUsuario();
			$usuario = $controladorUsuario -> validarUsuario($nomUsuario, $contrasena);
			if($usuario != null){
				session_start();
				$_SESSION['idUsuario']=$usuario->getIdUsuario();
				$_SESSION["nomUsuario"] = $usuario -> getNomUsuario();
				$_SESSION["email"] = $usuario -> getEmail();
				$_SESSION["contrasena"] = $usuario -> getContrasena();
				$_SESSION["status"] = $usuario -> getActivo();
				header("Location:".MI_RUTA."index.php");
			}
			else{
				session_destroy();
				header("Location:".MI_RUTA."login.php?err=fail&mensaje=loginfail");
			}
		}
		else{
			$link = $_SERVER['HTTP_REFERER'];
			header("Location:".$link);
		}
	}

	function cerrarSesion(){
		session_start();
		$_SESSION['idUsuario']= 0;
		$_SESSION["nomUsuario"] = "";
		$_SESSION["email"] = "";
		$_SESSION["contrasena"] = "";
		$_SESSION["status"] = 1;
		session_destroy();
		header("Location:".MI_RUTA."login.php?err=success");
	}



?>