<?php
  include_once("../funcionesphp/controlador_usuario.php");
  include_once("../funcionesphp/ruta_general.php");
  $nomUsuario = "";
  session_start();
  if(isset($_SESSION["idUsuario"])){
    $nomUsuario = $_SESSION["nomUsuario"];
    if($_SESSION["status"] == 1)
    header("Location:".MI_RUTA."index.php");
  }
  $controladorUsuario = new controladorUsuario();
  $usuarios = $controladorUsuario -> obtenerUsuarios();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantillaRaku.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="../css/styleAdmin.css" rel="stylesheet" type="text/css">

<link rel="icon" type="image/png" href="../images/favicon_raku.png">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Raku</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript" src="../js/javascript.js" type="text/javascript"></script>
<script language="javascript" src="../js/funciones_usuarios.js" type="text/javascript"></script>
<link href="../css/productos.css" rel="stylesheet" type="text/css">

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
      <p id="user" class="login"><!-- InstanceBeginEditable name="login" --><?php if(isset($_SESSION["nomUsuario"])) echo '<a style="display:inline" href="../perfil.php">'.strtoupper($nomUsuario)."/ <a style='display:inline;' class='logger' href='../funcionesphp/controlador_operaciones.php?operacion=cerrar_sesion'>LOGOUT</a>"; else echo "<a href='../login.php'>LOGIN / REGISTER</a>"?><!-- InstanceEndEditable --></p>
    <div class="line"></div>
    <ul>
       
	  <!-- InstanceBeginEditable name="tab1" -->
      <li><a href="categoria.php?c=mind">MIND</a></li>
      <li><a href="categoria.php?c=body">BODY</a></li>
      <li><a href="categoria.php?c=home">HOME</a></li>
      <li><a href="categoria.php?c=little%20one">LITTLE ONE</a></li>
      <li><a href="productos.php">PRODUCTOS</a></li>
      <li class="current_page_item"><a href="usuarios.php">USUARIOS</a></li>
       <!-- InstanceEndEditable --> 
	   
      
	  
    </ul>
  </div>
</div>
<!--  --> 
<!-- Content --> 
<!-- InstanceBeginEditable name="contenido" -->
<div class="contentContainer">
<div class="content">
    <table class="zebra centered" cellspacing="20" cellpadding="10">
      <tr>
        <th>Nombre</th>
        <th>E-mail</th>
        <th>Editar</th>
        <th>Eliminar</th>
        </tr>
        <?php
          $index = 1;
           foreach ($usuarios as $usuario){
           echo "<tr>
                  <td><a href=\"alta_cliente.php?idu=".$usuario -> getIdUsuario()."\">".$usuario -> getNomUsuario()."</a></td>
                    <td>".$usuario -> getEmail()."</td>
                    <td class=\"edit\"><a href=\"alta_cliente.php?idu=".$usuario -> getIdUsuario()."\"><img class=\"icon-edit\" src=\"../images/edit.png\"/></a></td>
                    <td class=\"delete\"><form id=\"form_eliminar_usuario".$index."\" method=\"post\" action=\"../funcionesphp/controlador_operaciones.php\" ><input type=\"hidden\" name=\"id_u\" value=\"".$usuario -> getIdUsuario()."\"><input type=\"hidden\" name=\"operacion\" value=\"eliminar_usuario_por_admin\"><span onclick=\" eliminarUsuario('".$usuario -> getNomUsuario()."',".$index.")\">&times;</span></form></td>
                </tr>";
            $index++;
        }?>
       
    </table>
     <button class="add-new" type="button" onclick="location.href='alta_cliente.php'">Agregar Cliente</button>  
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
