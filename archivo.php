<?php

class Archivo
{
var $ruta_temporal;
var $ruta_final;

function Archivo($ruta_temp,$ruta_fin)
{
$this->ruta_temporal=$ruta_temp;
$this->ruta_final=$ruta_fin;
}

function subir_archivo()
{
//echo $this->ruta_final;
move_uploaded_file($this->ruta_temporal,$this->ruta_final);
}

function borrar_archivo()
{
if (is_file($this->ruta_final))
{
unlink($this->ruta_final);
}
}

function reemplaza_archivo()
{
$this->borrar_archivo();
$this->subir->archivo();
}
}
?>