<?php

	
	/**
	* 
	*/
	class DBConnector
	{
		private $server = "localhost";//"mysql12.000webhost.com";
		private $user = "root";//"a6911160_raku";
		private $pass = "root";//"a6911160_admin"; 
		private $dataBase = "raku";//"ProgramacionWeb1";
		private $connector;


		function DBConnector(){}

		function prepararConector(){
			$this -> connector = mysqli_connect($this -> server, $this -> user, $this -> pass) or die(mysqli_connect_error());
			mysqli_select_db($this -> connector, $this -> dataBase) or die(mysqli_connect_error($this -> connector));
		}

		function cerrarConector(){
		 	mysqli_close($this -> connector);
		}

		function obtenerUltimoIdInsertado(){
			return mysqli_insert_id($this -> connector);
		}

		function ejecutarInsertUpdateDeleteQuery($query){
			$succesfulOperation = false;
			$dbResult = mysqli_query($this -> connector, $query);
			if (!$dbResult){
				$error = "Ocurrió un error al acceder a la base de datos.<br>"; $error .= "SQL: $query <br>";
				$error .= "Descripción: ".mysqli_connect_error($this -> connector); die($error);
			} 
			else{
				if (mysqli_affected_rows($this -> connector) >= 1) $succesfulOperation = true;
			}

			return $succesfulOperation;
		}

		function ejecutarSelectQuery($query){
			return mysqli_query($this -> connector, $query);
		}
	}

?>