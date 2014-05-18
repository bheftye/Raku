<?php

	
	/**
	* 
	*/
	class DBConnector
	{
		private $server = "localhost";
		private $user = "root";
		private $pass = "root"; 
		private $dataBase = "raku";


		function DBConnector(){}

		function getConnector(){
			$connector = mysqli_connect($this -> server, $this -> user, $this -> pass) or die(mysqli_connect_error());
			mysqli_select_db($connector, $this -> dataBase) or die(mysqli_connect_error($connector));
			return $connector;
		}

		function cerrarConnector($connector){
		 	mysqli_close($connector);
		}
	}

?>