<?php 
require_once("funcionesphp/controlador_producto.php");
include_once("funcionesphp/controlador_usuario.php");
include_once("funcionesphp/ruta_general.php");
  $idProducto = 0;
  $nomUsuario = "";
  $categoria ="";
  session_start();
  if(isset($_SESSION["idUsuario"])){
    $nomUsuario = $_SESSION["nomUsuario"];
    if($_SESSION["status"] == 0)
    header("Location:".MI_RUTA."index.php");
  }
if(isset($_REQUEST["idp"])){
$idProducto = $_REQUEST["idp"];
$controladorProducto = new ControladorProducto();
$producto = $controladorProducto -> obtenerProductoPorId($idProducto);
$categoria = $producto -> getCategoria();
}
else{
  header("Location:".MI_RUTA."index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantillaRaku.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/styleAdmin.css" rel="stylesheet" type="text/css">
<link href="css/login.css" rel="stylesheet" type="text/css">

<link rel="icon" type="image/png" href="images/favicon_raku.png">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Raku</title>

<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<link href="css/home.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="js/home2.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
  var clave = <?php echo ($idProducto != 0)? json_encode($producto -> getClave()):json_encode(0);?>;
  var imagenesProducto = new Array();
  <?php
    if($idProducto != 0){
      echo "imagenesProducto.push('imagenesProductos/principales/".$producto -> getImagenPrincipal()."');";
      foreach ($producto -> getImagenes() as $imagen) {
        echo "imagenesProducto.push('imagenesProductos/secundarias/".$imagen."');";
      }
    }
  ?>
</script>
<script language="JavaScript" src="js/funciones_productos.js" type="text/javascript"></script>
<script language="JavaScript" src="js/buscar.js" type="text/javascript"></script>
<script language="JavaScript" src="js/redes_sociales.js" type="text/javascript"></script>



<!-- InstanceEndEditable -->
<!-- InstanceParam name="MenuAdministrador" type="boolean" value="true" -->
<!-- InstanceParam name="MenuUsuario" type="boolean" value="false" -->
</head>

<body>
<!-- Header -->
<div id="header" class="container">
  <div id="logo">
       
    <h1><a href="index.php"><img src="images/RAKU-WEB2_02.png" alt="Raku" title="Raku"/></a></h1>
     
       

  </div>
  <div id="menu">
<p id="user" class="login"><!-- InstanceBeginEditable name="login" --><?php if(isset($_SESSION["nomUsuario"])) echo '<a style="display:inline;" href="perfil.php">'.strtoupper($nomUsuario)."/ <a style='display:inline;' class='logger' href='funcionesphp/controlador_operaciones.php?operacion=cerrar_sesion'>LOGOUT</a>"; else echo "<a href='login.php' style=\"margin-top:-25px;\">LOGIN / REGISTER</a>"?><!-- InstanceEndEditable --><input id="txt_buscar" type="text" class="buscar"><input class="btnBuscar" value="SEARCH" id="btn_buscar" ></p>    <div class="line"></div>
    <ul>
       
    <!-- InstanceBeginEditable name="tab1" -->
      <li <?php echo ($categoria == "MIND")? "class='current_page_item'":"" ?>><a href="categoria.php?c=mind">MIND</a></li>
      <li <?php echo ($categoria == "BODY")? "class='current_page_item'":"" ?>><a href="categoria.php?c=body">BODY</a></li>
      <li <?php echo ($categoria == "HOME")? "class='current_page_item'":"" ?>><a href="categoria.php?c=home">HOME</a></li>
      <li <?php echo ($categoria == "LITTLE ONE")? "class='current_page_item'":"" ?>><a href="categoria.php?c=little%20one">LITTLE ONE</a></li>
      <li><a href="cart.php">CART</a></li>
      <li><a href="contacto.php">CONTACT</a></li>
      <!-- InstanceEndEditable --> 
     
      
    
    </ul>
  </div>
</div>
<!--  --> 
<!-- Content --> 
<!-- InstanceBeginEditable name="contenido" -->
<div class="contentContainer">
  <div class="productContainer">
    <table class="oneProductTable">
      <tr>
        <td><img id="imagenGrande" src="imagenesProductos/principales/<?php echo ($idProducto != 0)? $producto -> getImagenPrincipal():"" ?>" /></td>
        <td class="descripProduc"><?php echo ($idProducto != 0)? $producto -> getNombre():"" ?><br />
          <?php echo ($idProducto != 0)? $producto -> getDescripcion():"" ?><br />
          DESIGNER / <?php echo ($idProducto != 0)? $producto -> getDisenador():"" ?><br />
          <br />
          <?php echo ($idProducto != 0)? "$".$producto -> getPrecio()." MXN":"" ?><br />
          <br />
          IN STOCK/ <?php echo ($idProducto != 0)? "".$producto -> getNumDisponible()."":"" ?><br />
          SHIPPING/  DEPENDS OF ZIP CODE <br />
          <br />
          <br />
          
           <!-- AMOUNT
            <input id="txt_cantidad" type="text" class="campoCt"/>
            <br />
            <br />-->
            <input type="button" name="btn_agregar" id="btn_agregar" value="ADD" class="btnAgregar" >
        </td>
      </tr>
      <tr>
        <table class="thumbnails">
          <tr>
            <td>
            <?php 
              if($idProducto != 0){
                 echo "<img src=\"imagenesProductos/principales/".$producto -> getImagenPrincipal()."\" onclick=\"cambiarImagenAVisualizar(0)\" class=\"thumbnails\"/>";
                 $j = 1;
                foreach ($producto -> getImagenes() as $imagen) {
                  echo "<img src=\"imagenesProductos/secundarias/".$imagen."\" onclick=\"cambiarImagenAVisualizar(".$j.")\" class=\"thumbnails\"/>";
                  $j++;
                }
              }
            ?>
            </td>
          </tr>
        </table>
      </tr>
    </table>
  </div>
  </div>
<br/>
<br/>
<br/>
<br/>
<br/>
<!-- InstanceEndEditable --> 
<!--  --> 

<!--Footer -->
<div class="footer" style="margin-top:-200px;">
  <div class="lineFooter"></div>
  <div id="menuFooter">
    <ul>
      <!-- InstanceBeginEditable name="tab13" -->
      <li> 
      <!-- InstanceEndEditable -->
    </ul>
  </div>
  <div class="socialMedia"> <img name="facebook" id="facebook" src="images/facebook_normal.png" alt="Facebook" title="Facebook"/> <img name="instagram" id="instagram" src="images/insta_normal.png" alt="Instagram" title="Instagram"/> <img name="pinterest" id="pinterest" src="images/pinte_normal.png" alt="Pinterest" title="Pinterest"/> </div>
</div>
<!--  -->
</body>
<!-- InstanceEnd --></html>
