<?php
  include_once("funcionesphp/controlador_usuario.php");
  include_once("funcionesphp/ruta_general.php");
  require_once("funcionesphp/controlador_producto.php");
  $nomUsuario = "";
  session_start();
  if(isset($_SESSION["idUsuario"])){
    $nomUsuario = $_SESSION["nomUsuario"];
    if($_SESSION["status"] == 0)
    header("Location:".MI_RUTA."index.php");
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantillaRaku.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/login.css" rel="stylesheet" type="text/css">

<link rel="icon" type="image/png" href="images/favicon_raku.png">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Raku</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<link href="css/cart.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="js/buscar.js" type="text/javascript"></script>
<script language="JavaScript" src="js/redes_sociales.js" type="text/javascript"></script>



<!-- InstanceEndEditable -->
<!-- InstanceParam name="MenuAdministrador" type="boolean" value="false" -->
<!-- InstanceParam name="MenuUsuario" type="boolean" value="true" -->
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
       
      
	   
	  <!-- InstanceBeginEditable name="tab2" -->
      <li><a href="raku.php">RAKU</a></li>
      <li><a href="categoria.php?c=mind">MIND</a></li>
      <li><a href="categoria.php?c=body">BODY</a></li>
      <li><a href="categoria.php?c=home">HOME</a></li>
      <li><a href="categoria.php?c=little%20one">LITTLE ONE</a></li>
      <li class="current_page_item"><a href="cart.php">CART</a></li>
      <li><a href="contacto.php">CONTACT</a></li>
      <!-- InstanceEndEditable --> 
	  
    </ul>
  </div>
</div>
<!--  --> 
<!-- Content --> 
<!-- InstanceBeginEditable name="contenido" -->
<div class="contentContainer">
  <div class="cartContainer">
    <form action="funcionesphp/controlador_operaciones.php" method="post" onsubmit="return validarProductosEnCarrito()" id="infoPedido" >
      <table id="tabla_carrito" style="width:100%" class="cartTable">
        <tr>
          <th class="encabezado" id="producto"> PRODUCT
            </td>
          <th class="encabezado">PRICE
            </td>
          <th class="encabezado">QUANTITY
            </td>
          <th class="encabezado">SUBTOTAL
            </td>
          <th class="encabezado"> </td>
        </tr>
        <?php

        $productos = array();
        if(isset($_SESSION["productos_carrito"])){
          $numProductos = $_SESSION["productos_carrito"];
          if($numProductos > 0){
            $total = 0;
            for($i = 1; $i <= $numProductos; $i++) {
              if(isset($_SESSION["clave".$i]) && isset($_SESSION["cantidad".$i])){
                $claveProducto = $_SESSION["clave".$i];
                $cantidad = $_SESSION["cantidad".$i];
                $controladorProducto = new ControladorProducto();
                $producto = $controladorProducto -> obtenerProductoPorClave($claveProducto);
                if($producto != null){
                  $subtotal = $cantidad * $producto -> getPrecio();
                  $total += $subtotal;
                  $stringHTML = "<tr>
                        <td class=\"producto\"><img class=\"producto\" src=\"imagenesProductos/principales/".$producto -> getImagenPrincipal()."\"/>".$producto -> getNombre()." </td>
                        <td class=\"price\">$<span id=\"precio_".$i."\">".$producto ->getPrecio()."</span> MXN</td>
                        <td class=\"quantity\">
                        <div class=\"styled-select\"><span name=\"cantidad".$i."\" id=\"s_".$i."\">".$cantidad."</span>
                        </div><input type=\"hidden\" name=\"clave".$i."\" value=\"".$producto ->getClave()."\"></td>
                        <td class=\"subtotal\">$<span id=\"subtotal".$i."\">".$subtotal."</span> MXN</td>
                        <td class=\"subtotal\"></td>
                      </tr>";
                    echo $stringHTML;
                }
              }
            }
            echo "  <tr>
                      <td></td>
                      <td></td>
                      <td class=\"total\">TOTAL:</td>
                      <td class=\"numTotal\"><span id=\"total\">$".$total." MXN</span></td>
                    </tr>";

        
            echo " <tr>
                  <td></td>
                  <td></td>
                  <td class=\"agregar\" colspan=\"2\"><button type=\"submit\" name=\"operacion\" id=\"payBtn\" value=\"realizar_compra\" class=\"btn\">FINISH PAYMENT</button>
                </tr>";
          }
        }
        ?>
      </table>
          <a href="cart.php"><button type="button" type="btn" class="btn">CANCEL</button></a>
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
