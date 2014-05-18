<?php 
require_once("./../funcionesphp/classes/controller/controlador_producto.php");
$operacion = "insertar_producto";
$idProducto = 0;
if(isset($_REQUEST["id_producto"])){
$idProducto = $_REQUEST["id_producto"];
$operacion = "modificar_producto";
$controladorProducto = new ControladorProducto();
$producto = $controladorProducto -> obtenerProductoPorId($idProducto);
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- InstanceBegin template="/Templates/plantillaRaku.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/styleAdmin.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png" href="../images/favicon_raku.png">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Raku</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript" src="../js/javascript.js" type="text/javascript"></script>
<link href="../css/productos.css" rel="stylesheet" type="text/css">
<!-- InstanceEndEditable -->
<!-- InstanceParam name="MenuAdministrador" type="boolean" value="true" -->
<!-- InstanceParam name="MenuUsuario" type="boolean" value="false" -->
</head>

<body>
<!-- Header -->
<div id="header" class="container">
  <div id="logo">
    <h1><a href="index.html"><img src="../images/RAKU-WEB2_02.png" alt="Raku" title="Raku"/></a></h1>
  </div>
  <div id="menu">
    <p id="user" class="login"><!-- InstanceBeginEditable name="login" --><a href="../login.html">ADMIN / LOG OUT</a><!-- InstanceEndEditable --></p>
    <div class="line"></div>
    <ul>
      <!-- InstanceBeginEditable name="tab1" -->
      <li><a href="mind.html">MIND</a></li>
      <li><a href="body.html">BODY</a></li>
      <li><a href="home.html">HOME</a></li>
      <li><a href="littleone.html">LITTLE ONE</a></li>
      <li><a href="productos.html">PRODUCTOS</a></li>
      <li><a href="clientes.html">CLIENTES</a></li>
      <li><a href="#">NEWSLETTER</a></li>
      <li class="current_page_item"><a href="ventas.html">VENTAS</a></li>
      <!-- InstanceEndEditable -->
    </ul>
  </div>
</div>
<!--  --> 
<!-- Content --> 
<!-- InstanceBeginEditable name="contenido" -->
<div class="contentContainer">
  <div class="content">
    <h2>Alta Producto</h2>
    <form action="../funcionesphp/clases/controller/controlador_operaciones.php"  method="post">
      <table class="alta">
        <tr>
          <td ><label>ID Producto</label>
            <br>
            <input name="txt_nombre" type="text" value="">
            </input>
            <br>
            <br>
            <label>Nombre</label>
            <br>
            <input name="txt_nombre" type="text" value="">
            </input>
            <br>
            <br>
            <label>Descripcion</label>
            <br>
            <textarea name="txt_descripcion" rows="7" cols="40"> </textarea>
            <br>
            <br></td>
          <td class="right"><label>Diseñador</label>
            <br>
            <input name="txt_disenador" type="text" value="">
            </input>
            <br>
            <br>
            <label>Precio (MXN)</label>
            <br>
            <input name="txt_precio" type="text" value="">
            </input>
            <br>
            <br>
            <label>No. de piezas disponibles</label>
            <br>
            <input name="txt_nopiezas" type="text" value="">
            </input>
            <br>
            <br>
            <label>Imagen Principal</label>
            <br>
            <div id='file_browse_wrapper'>
              <input name="f_imgp" type="file" id="file_browse">
              </input>
            </div>
                        <br>
            <label>Imágenes Secundarias</label>
            <br>
            <div id='file_browse_wrapper'>
              <input name="f_imgs" type="file" multiple id="file_browse">
              </input>
            </div></td>
        </tr>
      </table>
      <br />
      <br />
      <button type="submit" value="<?=$operacion?>">Guardar</button>
    </form>
  </div>
</div>
<!-- InstanceEndEditable --> 
<!--  --> 

<!--Footer -->
<div class="footer">
  <div class="lineFooter"></div>
  <div id="menuFooter">
    <ul>
      <!-- InstanceBeginEditable name="tab13" --> <!-- InstanceEndEditable -->
    </ul>
  </div>
  <div class="socialMedia"> <img name="facebook" id="facebook" src="../images/facebook_normal.png" alt="Facebook" title="Facebook"/> <img name="instagram" id="instagram" src="../images/insta_normal.png" alt="Instagram" title="Instagram"/> <img name="pinterest" id="pinterest" src="../images/pinte_normal.png" alt="Pinterest" title="Pinterest"/> </div>
</div>
<!--  -->
</body>
<!-- InstanceEnd -->
</html>
