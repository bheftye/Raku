<?php
  include_once("funcionesphp/controlador_usuario.php");
  include_once("funcionesphp/ruta_general.php");
  $nomUsuario = "";
  session_start();
  if(isset($_SESSION["idUsuario"])){
    $nomUsuario = $_SESSION["nomUsuario"];
    if($_SESSION["status"] == 0)
    header("Location:".MI_RUTA."cp/index.php");
    else{
      header("Location:".MI_RUTA."index.php");
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantillaRaku.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png" href="images/favicon_raku.png">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Raku</title>
<script language="JavaScript" type="text/javascript" src="js/login.js"></script>
<link rel="stylesheet" type="text/css" href="css/login.css">
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
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
      <p id="user" class="login"><!-- InstanceBeginEditable name="login" --><?php if(isset($_SESSION["nomUsuario"])) echo '<a style="display:inline" href="perfil.php">'.strtoupper($nomUsuario)."/ <a style='display:inline;' class='logger' href='funcionesphp/controlador_operaciones.php?operacion=cerrar_sesion'>LOGOUT</a>"; else echo "<a href='login.php'>LOGIN / REGISTER</a>"?><!-- InstanceEndEditable --></p>
    <div class="line"></div>
    <ul>
       
      
	   
	  <!-- InstanceBeginEditable name="tab2" -->
      <li><a href="raku.php">RAKU</a></li>
      <li><a href="categoria.php?c=mind">MIND</a></li>
      <li><a href="categoria.php?c=body">BODY</a></li>
      <li><a href="categoria.php?c=home">HOME</a></li>
      <li><a href="categoria.php?c=littleone">LITTLE ONE</a></li>
      <li><a href="cart.php">CART</a></li>
      <li><a href="contacto.php">CONTACT</a></li>
      <!-- InstanceEndEditable --> 
	  
    </ul>
  </div>
</div>
<!--  --> 
<!-- Content --> 
<!-- InstanceBeginEditable name="contenido" -->
<div id="content">
<div class="wrapper">
  <table>
    <tr>
      <td class="linea">
      <form id="form_login" name="login-form" class="login-form" action="funcionesphp/controlador_operaciones.php" onsubmit="return validarCamposLogin()" method="post">
          <div class="header">
            <h1>LOGIN</h1>
            <span>TYPE YOUR USER NAME AND PASSWORD TO LOGIN.</span><!--END DESCRIPTION--> 
          </div>
          <div class="content">
             <p id="errorL" class="error"></p>
            <input id="userL" name="user" type="text" class="input username" title="Usuario" placeholder="Usuario" />
            <input id="passL" name="pass" type="password" class="input password" title="Contrase&ntilde;a" placeholder="Contrase&ntilde;a" />
          </div>
            <button id= "loginBtn" type="submit" name="operacion" value="iniciar_sesion" class="btn">Login</button>
        </form></td>
      <td ><form id="form_register" name="login-form" class="login-form" action="funcionesphp/controlador_operaciones.php" onsubmit="return validarCamposRegistro()" method="post">
      <div id="registerContent">
          <div class="header">
            <h1>REGISTER</h1>
            <span>TYPE YOUR USER NAME,PASSWORD AND E-MAIL TO REGISTER.</span><!--END DESCRIPTION--> 
          </div>
          <div  class="content">
            <p id="error" class="error"></p>
            <input id="userR"  name="txt_usuario" type="text" class="input username text" title="Usuario" placeholder="Usuario" />
            <input id="emailR"  name="txt_email" type="text" class="input email text" title="E-mail" placeholder="E-mail" />
            <input id="passR"  name="txt_pass" type="password" class="input password text" title="Contrase&ntilde;a" placeholder="Contrase&ntilde;a" />
            <input id="passR2"  name="txt_pass2" type="password" class="input password text" title="Contrase&ntilde;a" placeholder="Confirmar Contrase&ntilde;a" />
          </div>
            <button id="registerBtn" type="submit" name="operacion" value="insertar_usuario" class="btn">Register</button>
        </form>
        </div>
        </td>
    </tr>
  </table>
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
