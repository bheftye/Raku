<?php 
require_once("./../funcionesphp/controlador_producto.php");
include_once("../funcionesphp/controlador_usuario.php");
include_once("../funcionesphp/ruta_general.php");
  $operacion = "insertar_producto";
  $tituloOperacion = "Agregar";
  $idProducto = 0;
  $nomUsuario = "";
  session_start();
  if(isset($_SESSION["idUsuario"])){
    $nomUsuario = $_SESSION["nomUsuario"];
    if($_SESSION["status"] == 1)
    header("Location:".MI_RUTA."index.php");
  }
if(isset($_REQUEST["idp"])){
$idProducto = $_REQUEST["idp"];
$operacion = "modificar_producto";
$controladorProducto = new ControladorProducto();
$tituloOperacion = "Editar";
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
<script language="javascript" src="../js/agregar_producto.js" type="text/javascript"></script>
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
    <p id="user" class="login"><!-- InstanceBeginEditable name="login" --><?php if(isset($_SESSION["nomUsuario"])) echo '<a style="display:inline" href="../perfil.php">'.strtoupper($nomUsuario)." / <a style='display:inline;' class='logger' href='../funcionesphp/controlador_operaciones.php?operacion=cerrar_sesion'>LOGOUT</a>"; else echo "<a href='../login.php'>LOGIN / REGISTER</a>"?><!-- InstanceEndEditable --></p>
    <div class="line"></div>
    <ul>
      <!-- InstanceBeginEditable name="tab1" -->
      <li><a href="categoria.php?c=mind">MIND</a></li>
      <li><a href="categoria.php?c=body">BODY</a></li>
      <li><a href="categoria.php?c=home">HOME</a></li>
      <li><a href="categoria.php?c=little%20one">LITTLE ONE</a></li>
      <li class="current_page_item"><a href="productos.php">PRODUCTOS</a></li>
      <li><a href="usuarios.php">USUARIOS</a></li>
      <li><a href="ventas.php">VENTAS</a></li>
      <!-- InstanceEndEditable -->
    </ul>
  </div>
</div>
<!--  --> 
<!-- Content --> 
<!-- InstanceBeginEditable name="contenido" -->
<div class="contentContainer">
  <div class="content">
    <h2><?php echo $tituloOperacion;?> Producto</h2>
    <form id="form_producto" name="upload" action="../funcionesphp/controlador_operaciones.php" onsubmit="return validarCamposProductos()" enctype= "multipart/form-data"  method="post">
      <table class="alta">
        <tr>
          <td>
            <p>Los campos con * son obligatorios</p>
            <label>*ID Producto</label>
            <br>
            <input id="txt_id" name="txt_id" type="text" value="<?php echo ($idProducto!=0)? $producto -> getClave():'';?>">
            </input>
            <br>
            <br>
            <label>*Nombre</label>
            <br>
            <input id="txt_nombre" name="txt_nombre" type="text" value="<?php echo ($idProducto!=0)? $producto -> getNombre():'';?>">
            </input>
            <br>
            <br>
            <label>*Descripción</label>
            <br>
            <textarea id="txt_descripcion" name="txt_descripcion" rows="7" cols="40"><?php echo ($idProducto!=0)? $producto -> getDescripcion():'';?></textarea>
            <br>
            <br></td>
          <td class="right"><label>*Diseñador</label>
            <br>
            <input id="txt_disenador" name="txt_disenador" type="text" value="<?php echo ($idProducto!=0)? $producto -> getDisenador():'';?>">
            </input>
            <br>
            <br>
            <label>*Precio (MXN)</label>
            <br>
            <input id="txt_precio" name="txt_precio" type="text" value="<?php echo ($idProducto!=0)? $producto -> getPrecio():'';?>">
            </input>
            <br>
            <br>
            <label>*No. de piezas disponibles</label>
            <br>
            <input id="txt_nopiezas" name="txt_nopiezas" type="text" value="<?php echo ($idProducto!=0)? $producto -> getNumDisponible():'';?>">
            </input>
            <br>
            <br>
            <label> *Selecciona una categor&iacute;a</label>
            <br>
            <select name="s_categoria" id="s_categoria">
              <option value ="seleccionar" <?php echo ($idProducto!=0 && $producto -> getCategoria() == "seleccionar")? "selected":"";?>>Selecciona una opci&oacute;n</option>
              <option value="MIND" <?php echo ($idProducto!=0 && $producto -> getCategoria() == "MIND")? "selected":"";?>>MIND</option>
              <option value="BODY" <?php echo ($idProducto!=0 && $producto -> getCategoria() == "BODY")? "selected":"";?>>BODY</option>
              <option value="HOME" <?php echo ($idProducto!=0 && $producto -> getCategoria() == "HOME")? "selected":"";?>>HOME</option>
              <option value="LITTLE ONE" <?php echo ($idProducto!=0 && $producto -> getCategoria() == "LITTLE ONE")? "selected":"";?>>LITTLE ONE</option>
            </select>
            <br>
        </tr>
        <tr>
          <td colspan="2"><label>*Imagen Principal</label>
            <br>
            <div id='file_browse_wrapper'>
              <input name="f_imgp" type="file" class="file_browser" id="file_browse_principal">
              </input>
            </div>
            <output id="principal_output">
                <?php 
                  if($idProducto != 0){
                    echo '  <div><img style="margin: 20px 0 20px 0; max-height:170px" class="img-responsive" src="../imagenesProductos/principales/'.$producto -> getImagenPrincipal().'" title=""/> </div>';
                  }
                ?>
            </output>
                        <br>
            <label>Imágenes Secundarias</label>
            <br>
            <div id='file_browse_wrapper'>
              <input name="f_imgs[]" type="file" multiple="multiple" class="file_browser" id="file_browse_secundarias">
              </input>
            </div>
            <output id="secundarias_output"></output>
             <output id="secundarias_output2">
              <?php
                if($idProducto != 0){
                    foreach ($producto -> getImagenes() as $imagen) {
                      echo '  <div style="display:inline;"><img style="margin: 20px 0 20px 0; max-height:170px" class="img-responsive" src="../imagenesProductos/secundarias/'.$imagen.'" title=""/> </div>';
                    }
                  }
              ?>
            </output>  
          </td></td>
        </tr>
      </table>
      <br />
      <br />
      <input type="hidden" name="id_p" value="<?php echo ($idProducto!=0)? $producto -> getIdProducto():'';?>">
      <button type="button" id="canBtn">Cancelar</button>
      <button type="submit" id="agrBtn" name="operacion" value="<?=$operacion?>">Guardar</button>
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
