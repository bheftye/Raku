<?php 
  include_once("../funcionesphp/controlador_producto.php");
  include_once("../funcionesphp/controlador_usuario.php");
  include_once("../funcionesphp/ruta_general.php");
  $nomUsuario = "";
  session_start();
  if(isset($_SESSION["idUsuario"])){
    $nomUsuario = $_SESSION["nomUsuario"];
    if($_SESSION["status"] == 1)
    header("Location:".MI_RUTA."index.php");
  }
  $controladorProducto = new ControladorProducto();
  $productos = array();
  $categorias = array("MIND","BODY", "HOME","LITTLE ONE");
  foreach ($categorias as $categoria) {
    $producosDeUnaCategoria = $controladorProducto -> obtenerProductosPorCategoria($categoria);
    array_push($productos, $producosDeUnaCategoria);
  }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantillaRaku.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="../css/styleAdmin.css" rel="stylesheet" type="text/css">
<link href="../css/productos.css" rel="stylesheet" type="text/css">

<link rel="icon" type="image/png" href="../images/favicon_raku.png">

<!-- InstanceBeginEditable name="doctitle" -->
<title>Raku</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript" src="../js/javascript.js" type="text/javascript"></script>
<script language="javascript" src="../js/funciones_productos.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
var productos = new Array();

  <?php 
  foreach ($productos as $producosDeUnaCategoria) {
    foreach ($producosDeUnaCategoria as $producto) {
      //Producto(clave, nombre, disenador, piezasDisp,precio,categoria,imagenPrincipal,imagenesSecunadarias)
      $productoString = "productos.push(new Producto(".json_encode($producto -> getClave()).",".json_encode($producto -> getNombre()).",".json_encode($producto -> getDisenador()).",".json_encode($producto -> getNumDisponible()).",".json_encode($producto -> getPrecio()).",".json_encode($producto -> getCategoria()).",".json_encode($producto -> getImagenPrincipal()).",";
      $imagenesSecunadariasString = "new Array(";
        for($i = 0; $i < count($producto -> getImagenes()); $i++){
          $imagen = $producto -> getImagenes()[$i];
          $imagenesSecunadariasString.=json_encode($imagen);
          if($i + 1 < count($producto -> getImagenes())){
            $imagenesSecunadariasString.=",";
          }
        }
      $imagenesSecunadariasString.=")));";
      $productoString .= $imagenesSecunadariasString;
      echo $productoString;
    }
  }
  ?>
</script>

<!-- InstanceEndEditable -->
<!-- InstanceParam name="MenuAdministrador" type="boolean" value="true" -->
<!-- InstanceParam name="MenuUsuario" type="boolean" value="false" -->
</head>

<body>
<!-- Header -->
<div id="header" class="container">
  <div id="logo">
       
    <h1><a href="index.php"><img src="../images/RAKU-WEB2_02.png" alt="Raku" title="Raku"/></a></h1>
	   
       

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
      <li><a href="usuarios.php">CLIENTES</a></li>
       <!-- InstanceEndEditable --> 
	   
      
	  
    </ul>
  </div>
</div>
<!--  --> 
<!-- Content --> 
<!-- InstanceBeginEditable name="contenido" -->
<div class="contentContainer">
<div class="content">
    <table class="zebra centered" cellpadding="10" >
      <thead>
    	<tr>
        <th>ID Producto</th>
    	  <th>Nombre del Producto</th>
        <th>Diseñador</th>
        <th>No. Disponibles</th>
        <th>Precio(MXN)</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
      <?php
        $j = 0;
        $index = 1;
        for($i = 0; $i < count($categorias); $i++){
          $productosPorCategoria = $productos[$i];
          $categoria = $categorias[$i];
          echo "<tr><td colspan='7'><p>".$categoria."</p></td></tr>";
         
          foreach ($productosPorCategoria as $producto) {
            echo ' <tr>
            <td>'.$producto -> getClave().'</td>
            <td><a href="#" onclick="verDetalleProducto('.$j.')">'.$producto -> getNombre().'</a></td>
            <td>'.$producto -> getDisenador().'</td>
            <td>'.$producto -> getNumDisponible().'</td>
            <td>$'.$producto -> getPrecio().' MXN</td>
            <td class="edit"><a href="alta_producto.php?idp='.$producto -> getIdProducto().'"><img class="icon-edit" src="../images/edit.png"/></a></td>
            <td class="delete"><form id="form_eliminar_producto'.$index.'" method="post" action="../funcionesphp/controlador_operaciones.php" ><input type="hidden" name="id_p" value="'.$producto -> getIdProducto().'"><input type="hidden" name="operacion" value="eliminar_producto"><span onclick=" eliminarProducto(\''.$producto -> getClave().'\','.$index.')">&times;</span></form></td>
          </tr>';
            $j++;
            $index ++;
          }
        }



      ?>
       
       
    </table>
    <button class="add-new" type="button" onclick="location.href='alta_producto.php'">Agregar Producto</button>  
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

      <!-- InstanceEndEditable -->
    </ul>
  </div>
  <div class="socialMedia"> <img name="facebook" id="facebook" src="../images/facebook_normal.png" alt="Facebook" title="Facebook"/> <img name="instagram" id="instagram" src="../images/insta_normal.png" alt="Instagram" title="Instagram"/> <img name="pinterest" id="pinterest" src="../images/pinte_normal.png" alt="Pinterest" title="Pinterest"/> </div>
</div>
<!--  -->
</body>
<!-- InstanceEnd --></html>
