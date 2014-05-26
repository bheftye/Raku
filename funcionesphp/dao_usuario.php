<?php
	
	/**
		* 
		*/
		include_once("modelo/usuario.php");
		include_once("db_connector.php");
		class DAOUsuario
		{
			
			function DAOUsuario()
			{
				$this -> dbConnector = new DBConnector();
			}

			function insertarUsuario($usuario){
				$insercionExitosa = false;
				$sqlQuery = "INSERT INTO usuarios (`usuario`,`pass`, `email`, status) 
				VALUES('".$usuario -> getNomUsuario()."','".$usuario -> getContrasena()."','".$usuario -> getEmail()."',1)";
				$this -> dbConnector -> prepararConector();
				if($this -> dbConnector -> ejecutarInsertUpdateDeleteQuery($sqlQuery)){
					$usuario -> setIdUsuario($this -> dbConnector -> obtenerUltimoIdInsertado());
					$insercionExitosa = true;
				}
				return $insercionExitosa;
			}

			function actualizarUsuario($idUsuario, $email){
				$insercionExitosa = false;
				$sqlQuery = "UPDATE `usuarios` SET `email`='".$email."' WHERE id_usuario =".$idUsuario;
				$this -> dbConnector -> prepararConector();
				if($this -> dbConnector -> ejecutarInsertUpdateDeleteQuery($sqlQuery)){
					$insercionExitosa = true;
				}
				return $insercionExitosa;
			}

			function actualizarContrasena($idUsuario, $contrasena){
				$insercionExitosa = false;
				$sqlQuery = "UPDATE `usuarios` SET `pass`='".$contrasena."' WHERE id_usuario =".$idUsuario;
				$this -> dbConnector -> prepararConector();
				if($this -> dbConnector -> ejecutarInsertUpdateDeleteQuery($sqlQuery)){
					$insercionExitosa = true;
				}
				return $insercionExitosa;
			}

			function eliminarUsuario($idUsuario){
				$insercionExitosa = false;
				$sqlQuery = "DELETE FROM `usuarios`  WHERE id_usuario =".$idUsuario;
				$this -> dbConnector -> prepararConector();
				if($this -> dbConnector -> ejecutarInsertUpdateDeleteQuery($sqlQuery)){
					$insercionExitosa = true;
				}
				return $insercionExitosa;
			}

			private function llenarUsuarioConDatos($filaSQL){
				$db_id = $filaSQL["id_usuario"];
				$usuario = $filaSQL["usuario"];
				$contrasena = $filaSQL["pass"];
				$email = $filaSQL["email"];
				$status = $filaSQL["status"];
				return $usuario = new Usuario($db_id, $usuario, $contrasena, $email, $status);
		}		//($idProducto = 0, $clave = "", $nombre = "", $descripcion = "", $disenador = "", $precio = "", $numDisponible = 0, $categoria = "", $imagenPrincipal = "", $imagenes = array(), $colores = array(), $activo = 0

			function obtenerUsuarioPorId($idUsuario){
				$sqlQuery = "SELECT * FROM usuarios WHERE id_usuario = ". $idUsuario;
				$this -> dbConnector -> prepararConector();
				$usuario;
				$resultados = $this -> dbConnector -> ejecutarSelectQuery($sqlQuery);
				while($fila = mysqli_fetch_array($resultados)){
					$usuario = $this -> llenarUsuarioConDatos($fila);
				}
				$this -> dbConnector -> cerrarConector();
				return $usuario;
			}

			function obtenerUsuarios(){
				$sqlQuery = "SELECT * FROM usuarios ORDER BY id_usuario ASC";
				$this -> dbConnector -> prepararConector();
				$resultados = $this -> dbConnector -> ejecutarSelectQuery($sqlQuery);
				$usuarios = array();
				while($fila = mysqli_fetch_array($resultados)){
					$usuario = $this -> llenarUsuarioConDatos($fila);
					array_push($usuarios, $usuario);
				}
				$this -> dbConnector -> cerrarConector();
				return $usuarios;
			}

			function obtenerUsuarioPorNomUsuario($nomUsuario){
				$sqlQuery = "SELECT * FROM usuarios WHERE usuario = '". $nomUsuario."'";
				$this -> dbConnector -> prepararConector();
				$usuario = null;
				$resultados = $this -> dbConnector -> ejecutarSelectQuery($sqlQuery);
				while($fila = mysqli_fetch_array($resultados)){
					$usuario = $this -> llenarUsuarioConDatos($fila);
				}
				$this -> dbConnector -> cerrarConector();
				return $usuario;
			}
		}	
?>