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
  $tituloOperacion ="AGREGAR";
  $idUsuario = 0;
  if(isset($_REQUEST["idu"])){
    $idUsuario = $_REQUEST["idu"];
    $operacion = "modificar_usuario_por_admin";
    $controladorUsuario = new ControladorUsuario();
    $tituloOperacion = "Editar";
    $usuario = $controladorUsuario -> obtenerUsuarioPorId($idUsuario);
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
    <h1><a href="index.html"><img src="../images/RAKU-WEB2_02.png" alt="Raku" title="Raku"/></a></h1>
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
  	<h2><?php echo $tituloOperacion;?> Cliente</h2>
    <form action="../funcionesphp/controlador_operaciones.php" onsubmit="return validarCamposRegistro()"  method="post">
      <p id="error" class="error"></p>
    	 <label>Nombre de usuario</label><br>
        <input id="userR" name="txt_usuario" type="text" value="<?php echo ($idUsuario != 0)? $usuario -> getNomUsuario():""?>" <?php echo ($idUsuario != 0)? "readonly":""?>></input><br><br>
      <label>E-mail</label><br>
        <input id="emailR" name="txt_email" type="text" value="<?php echo ($idUsuario != 0)? $usuario -> getEmail():""?>"></input><br><br>
        <label>Contraseña</label><br>
        <input id="passR" name="txt_pass" type="password" value="<?php echo ($idUsuario != 0)? $usuario -> getContrasena():""?>"></input><br><br>
        <label>Confirmar Contraseña</label><br>
        <input id="passR2" name="txt_pass2" type="password" value=""></input><br><br>
          <input type="hidden" name="id_u" value="<?php echo ($idUsuario != 0)? $usuario -> getIdUsuario():""?>" >
          <button type="button" id="canBtn">CANCELAR</button>
          <button type="submit" name="operacion" value="<?php echo $operacion;?>" >GUARDAR</button>


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
