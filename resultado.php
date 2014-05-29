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
  $productos = array();
  if(isset($_GET["bq"])){
    $queryBuscar = $_GET["bq"];
    $controladorProducto = new ControladorProducto();
    $productos = $controladorProducto -> obtenerProductosPorQueryBusqueda($queryBuscar);
  }
  else{
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

      <p id="user" class="login"><!-- InstanceBeginEditable name="login" --><?php if(isset($_SESSION["nomUsuario"])) echo '<a style="display:inline;" href="perfil.php">'.strtoupper($nomUsuario)."/ <a style='display:inline;' class='logger' href='funcionesphp/controlador_operaciones.php?operacion=cerrar_sesion'>LOGOUT</a>"; else echo "<a href='login.php' style=\"margin-top:-25px;\">LOGIN / REGISTER</a>"?><!-- InstanceEndEditable --><input id="txt_buscar" type="text" class="buscar"><input class="btnBuscar" value="SEARCH" id="btn_buscar" ></p>

    <div class="line"></div>
    <ul>
       
      
	   
	  <!-- InstanceBeginEditable name="tab2" -->
      <li><a href="raku.php">RAKU</a></li>
      <li><a href="categoria.php?c=mind">MIND</a></li>
      <li><a href="categoria.php?c=body">BODY</a></li>
      <li><a href="categoria.php?c=home">HOME</a></li>
      <li><a href="categoria.php?c=little%20one">LITTLE ONE</a></li>
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

  <div class="cartContainer">
    <form action="funcionesphp/controlador_operaciones.php" method="post" onsubmit="return validarProductosEnCarrito()" id="infoPedido" >
      <table id="tabla_carrito" style="width:100%" class="cartTable">
        <tr>
          <th class="encabezado" id="producto"> PRODUCT
            </td>
          <th class="encabezado">PRICE
            </td>
          <th class="encabezado">AVAILABLE
            </td>
          </tr>
        <?php

            foreach ($productos as $producto) {
                  $stringHTML = "<tr>
                        <td class=\"producto\"><img class=\"producto\" src=\"imagenesProductos/principales/".$producto -> getImagenPrincipal()."\"/><a href=\"producto.php?idp=".$producto -> getIdProducto()."\">".$producto -> getNombre()."</a> </td>
                        <td class=\"price\">$<span>".$producto ->getPrecio()."</span> MXN</td>
                        <td class=\"quantity\">
                        <div class=\"styled-select\"><span >".$producto -> getNumDisponible()."</span>
                        </div>
                      </tr>";
                    echo $stringHTML;
            }
        ?>
      </table>
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
