<?php
include_once('conexion.php');
require_once('archivo.php');

class Imgslide extends Archivo{
	var $idimgslide;
	var $titulo;
	var $ruta;
	var $urlvideo;
	var $urlimg;
	var $status;
	var $directorio='../slide/';//aqui declaras la ruta donde quieres que se guarden tus imagenes

	function Imgslide ($idslide,$rut,$tit,$url,$urlimg,$stat,$temporal=''){
		$this->idimgslide=$idslide;
		$this->ruta=$rut;
		$this->titulo=$tit;
		$this->urlvideo=$url;
		$this -> urlimg = $urlimg;
		$this->status=$stat;
		
		$this->ruta_final=$this->directorio.$rut;
		$this->ruta_temporal=$temporal;
	}



	function insertaImgslide(){
		$sql="insert into imgslide (ruta, titulo,urlvideo,urlimg,status) values ('".$this->ruta."','".$this->titulo."','".$this->urlvideo."','".$this -> urlimg."',1);"; 
		$con= new conexion();
		$con->ejecutar_sentencia($sql);
		$this->subir_archivo();
	}


	function modificaImgslide(){
		if ($this->ruta!=''){
			$titulo_temporal=$this->titulo;
			$ruta_temporal=$this->ruta;
			
			$this->recuperaImgslide();
			$this->borrar_archivo();
			
			$this->titulo=$titulo_temporal;
			$this->ruta=$ruta_temporal;
			
			$this->ruta_final=$this->directorio.$ruta_temporal;
			$sql=' ruta=\''.$this->ruta.'\',';
		}else{
			$sql='';
		}
	
		// ruta='".$this->ruta."'
		$sql="update imgslide set ".$sql."titulo='".$this->titulo."', urlvideo='".$this->urlvideo."', urlimg = '".$this -> urlimg."', status=".$this->status." where idimgslide=".$this->idimgslide.";";
		$con= new conexion();
		
		$con->ejecutar_sentencia($sql);
		$this->subir_archivo();
	}

	function DesactivaImgslide(){
		$con=new conexion();
		$sql="update imgslide set status=0 where idimgslide=".$this->idimgslide;
		//echo $sql;
		$con->ejecutar_sentencia($sql);	
	}
	
	function activaImgslide(){
		$con=new conexion();
		$sql="update imgslide set status=1 where idimgslide=".$this->idimgslide;
		//echo $sql;
		$con->ejecutar_sentencia($sql);	
	}
	
	function listarImgslideActivas(){
		$resultados=array();
		$sql="select idimgslide, ruta, titulo, urlvideo, status from imgslide where status=1";
		$con=new conexion();
		$temporal= $con->ejecutar_sentencia($sql);
		while ($fila=mysql_fetch_array($temporal))	{
			$registro=array();
			$registro['idimgslide']=$fila['idimgslide'];
			$registro['ruta']=$fila['ruta'];
			$registro['titulo']=$fila['titulo'];
			$registro['urlvideo']=$fila['urlvideo'];
			$registro["urlimg"] = $fila["urlimg"];
			$registro['status']=$fila['status'];
			array_push($resultados, $registro);
		}
		mysql_free_result($temporal);
		return $resultados;
	}

	function listarImgslideDesactivadas(){
		$resultados=array();
		$sql="select idimgslide, ruta, titulo, urlvideo, status from imgslide where status=0";
		$con=new conexion();
		$temporal= $con->ejecutar_sentencia($sql);
		while ($fila=mysql_fetch_array($temporal)){
			$registro=array();
			$registro['idimgslide']=$fila['idimgslide'];
			$registro['ruta']=$fila['ruta'];
			$registro['titulo']=$fila['titulo'];
			$registro['urlvideo']=$fila['urlvideo'];
			$registro["urlimg"] = $fila["urlimg"];
			$registro['status']=$fila['status'];
			array_push($resultados, $registro);
		}
		mysql_free_result($temporal);
		return $resultados;
	}		

	function eliminaImgslide(){	
		$this->obtenerImgslide();
		$this->borrar_archivo();
		
		$sql="delete from imgslide where idimgslide=".$this->idimgslide.";";
		$con= new conexion();
		$con->ejecutar_sentencia($sql);
	}

	function obtenerImgslide(){
		$sql="select * from imgslide where idimgslide=".$this->idimgslide.";";
		$con= new conexion();
		$resultados= $con->ejecutar_sentencia($sql);
		
		while ($fila=mysql_fetch_array($resultados)){
			$this->idimgslide=$fila['idimgslide'];
			$this->ruta=$fila['ruta'];
			$this->titulo=$fila['titulo'];
			$this->urlvideo=$fila['urlvideo'];
			$this -> urlimg=$fila["urlimg"];
			$this->status=$fila['status'];
			$this->ruta_final=$this->directorio.$fila['ruta'];
		}
	}

	function recuperaImgslide(){
		$sql="select idimgslide, ruta,titulo,urlvideo from imgslide where idimgslide=".$this->idimgslide.";";
		$con= new conexion();
		$resultados= $con->ejecutar_sentencia($sql);
	
		while ($fila=mysql_fetch_array($resultados)){
			$this->idimgslide=$fila['idimgslide'];
			$this->ruta=$fila['ruta'];
			$this->titulo=$fila['titulo'];
			$this -> urlimg = $fila["urlimg"];
			$this->urlvideo=$fila['urlvideo'];
			$this->ruta_final=$this->directorio.$fila['ruta'];
		}
	}

	function listarImgslide(){
		$resultados=array();
		$sql="select idimgslide, ruta, titulo, urlvideo, status from imgslide";
		$con=new conexion();
		$temporal= $con->ejecutar_sentencia($sql);
		while ($fila=mysql_fetch_array($temporal)){
			$registro=array();
			$registro['idimgslide']=$fila['idimgslide'];
			$registro['ruta']=$fila['ruta'];
			$registro['titulo']=$fila['titulo'];
			$registro['urlvideo']=$fila['urlvideo'];
			$registro["urlimg"] = $fila["urlimg"];
			$registro['status']=$fila['status'];
			array_push($resultados, $registro);
		}
		mysql_free_result($temporal);
		return $resultados;
	}

	function buscarImgslide($pedazo){
		$resultados=array();
		$sql="select idimgslide, ruta, titulo, urlvideo, status from imgslide where titulo like '%".$pedazo."%' group by idimgslide";
		$con=new conexion();
		$temporal= $con->ejecutar_sentencia($sql);
		while ($fila=mysql_fetch_array($temporal)){
			$registro=array();
			$registro['idimgslide']=$fila['idimgslide'];
			$registro['ruta']=$fila['ruta'];
			$registro['titulo']=$fila['titulo'];
			$registro['urlvideo']=$fila['urlvideo'];
			$registro["urlimg"] = $fila["urlimg"];
			$registro['status']=$fila['status'];
			array_push($resultados, $registro);
		}
		mysql_free_result($temporal);
		return $resultados;
	}
	
	function limitImgslide($limit){
		if($limit!=''){
			$resultados=array();
			$sql="select idimgslide, ruta, titulo, urlvideo, status from imgslide limit ".$limit."";
			$con=new conexion();
			$temporal= $con->ejecutar_sentencia($sql);
			while ($fila=mysql_fetch_array($temporal))
			{
			$registro=array();
			$registro['idimgslide']=$fila['idimgslide'];
			$registro['ruta']=$fila['ruta'];
			$registro['titulo']=$fila['titulo'];
			$registro['urlvideo']=$fila['urlvideo'];
			$registro["urlimg"] = $fila["urlimg"];
			$registro['status']=$fila['status'];
			array_push($resultados, $registro);
			}
			mysql_free_result($temporal);
			return $resultados;
		}
	}
}
?>