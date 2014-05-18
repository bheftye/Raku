<?php

	
	/**
	* 
	*/
	class DBConnector
	{
		private $server = "mysql12.000webhost.com";
		private $user = "a6911160_raku";
		private $pass = "a6911160_admin"; 
		private $dataBase = "ProgramacionWeb1";
		private $connector;


		function DBConnector(){}

		function prepararConector(){
			$this -> connector = mysqli_connect($this -> server, $this -> user, $this -> pass) or die(mysqli_connect_error());
			mysqli_select_db($this -> connector, $this -> dataBase) or die(mysqli_connect_error($this -> connector));
		}

		function cerrarConector(){
		 	mysqli_close($connector);
		}

		function ejecutarInsertUpdateDeleteQuery($query){
			$succesfulOperation = false;
			$dbResult = mysqli_query($this -> connector, $query); 
			if (!$dbResult){
				$error = "Ocurrió un error al acceder a la base de datos.<br>"; $error .= "SQL: $cquery <br>";
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