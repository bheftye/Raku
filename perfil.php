<?php
  include_once("funcionesphp/controlador_usuario.php");
  include_once("funcionesphp/ruta_general.php");
  $nomUsuario = "";
  $idUsuario = 0;
  session_start();
  if(isset($_SESSION["idUsuario"])){
    $nomUsuario = $_SESSION["nomUsuario"];
    $idUsuario = $_SESSION["idUsuario"];
    $email = $_SESSION["email"];
    if($_SESSION["status"] == 0)
    header("Location:".MI_RUTA."cp/index.php");
  }
  else{
    header("Location:".MI_RUTA."login.php");
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
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="styleshee" type="text/css" href="css/perfil.css">
<script src="js/perfil.js"></script>
<script language="JavaScript" src="js/buscar.js" type="text/javascript"></script>
<script language="JavaScript" src="js/redes_sociales.js" type="text/javascript"></script>


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
<p id="user" class="login"><!-- InstanceBeginEditable name="login" --><?php if(isset($_SESSION["nomUsuario"])) echo '<a style="display:inline;" href="perfil.php">'.strtoupper($nomUsuario)."/ <a style='display:inline;' class='logger' href='funcionesphp/controlador_operaciones.php?operacion=cerrar_sesion'>LOGOUT</a>"; else echo "<a href='login.php' style=\"margin-top:-25px;\">LOGIN / REGISTER</a>"?><!-- InstanceEndEditable --><input id="txt_buscar" type="text" class="buscar"><input class="btnBuscar" value="SEARCH" id="btn_buscar" ></p>    <div class="line"></div>
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
<div class="contentContainer">
  <div class="wrapper">
    <h3 >USER PROFILE</h3>
    <form name="login-form" class="login-form" action="funcionesphp/controlador_operaciones.php" onsubmit="return validarCamposModificar()" method="post">
      <div class="content">
        <p id="errM" class="err"></p>
        <input id="userM"  name="user" type="text" class="input username text" title="Usuario" value="<?php if($idUsuario != 0) echo $nomUsuario?>" placeholder="Usuario" readonly />
        <input id="emailM"  name="email" type="text" class="input email text" title="E-mail" value="<?php if($idUsuario != 0) echo $email?>" placeholder="E-mail" />
      </div>
      <button id="registerBtn" type="submit" name="operacion" value="modificar_usuario" class="btn">SAVE</button>
    </form>

    <h3 >CHANGE PASSWORD</h3>
     <form name="login-form" class="login-form" action="funcionesphp/controlador_operaciones.php" onsubmit="return validarCamposModificarContrasena()" method="post">
      <div class="content">
        <p id="errMC" class="err"></p>
        <input id="passV"  name="passV" type="password" class="input password text" title="Contrase&ntilde;a" placeholder="Contrase&ntilde;a" />
        <input id="passN"  name="passN" type="password" class="input password text" title="Contrase&ntilde;a" placeholder="Contrase&ntilde;a nueva" />
        <input id="passNC"  name="passNC" type="password" class="input password text" title="Contrase&ntilde;a" placeholder="Confirmar Contrase&ntilde;a nueva" />
      </div>
      <button id="registerBtn" type="submit" name="operacion" value="modificar_contrasena" class="btn" >SAVE</button>

    </form>

    <!--<form name="login-form" class="login-form" style="margin:0" action="#" method="post">
    <table>
    <tr>
      <td class="">
          <div class="content">
            <table>
              <tr>
                <td colspan="2"><h2 class="titleUser">MAILING INFORMATION</h2></td>
              </tr>
              <tr>
                <td>NAME:</td>
                <td><input id ="name" name="name" type="text" class="input" value="Brent Heftye" title="Names"/></td>
              </tr>
              <tr>
                <td>ADDRESS:</td>
                <td><input id= "address" name="address" type="text" class="input" value = "C 24 #109 x 13 y 15" title="Address"/></td>
              </tr>
              <tr>
                <td>COUNTRY:</td>
                <td><input id= "country" name="country" type="text" class="input" value="Mexico" title="Country"/></td>
              </tr>
              <tr>
                <td>CITY:</td>
                <td><input id= "city" name="city" type="text" class="input" value="Merida" title="City"/></td>
              </tr>
              <tr>
                <td> ZIP-CODE:</td>
                <td><input id= "zipcode" name="zipcode" type="text" class="input" value="97139" title="zipcode"/></td>
              </tr>
            </table>
          </div>
        </div>
        <td class="">
          <div class="content">
            <table>
              <tr>
                <td colspan="2"><h2 class="titleUser">BILLING INFORMATION OPTIONAL</h2></td>
              </tr>
              <tr>
                <td>NAME:</td>
                <td><input id ="name_bill" name="name_bill" type="text" class="input" value="Brent Heftye" title="Names"/></td>
              </tr>
              <tr>
                <td>RFC:</td>
                <td><input id ="rfc_bill" name="rfc_bill" type="text" class="input" value="HESB101092RST01" title="RFC"/></td>
              </tr>
              <tr>
                <td>ADDRESS:</td>
                <td><input id= "address_bill" name="address_bill" type="text" class="input" value = "C 24 #109 x 13 y 15" title="Address"/></td>
              </tr>
              <tr>
                <td>PHONE NUMBER:</td>
                <td><input id= "phone_bill" name="phone_bill" type="text" class="input" value = "+52 1 (999)2920177" title="PHONE"/></td>
              </tr>
              <tr>
                <td>COUNTRY:</td>
                <td><input id= "country" name="country" type="text" class="input" value="Mexico" title="Country"/></td>
              </tr>
              <tr>
                <td>CITY:</td>
                <td><input id= "city" name="city" type="text" class="input" value="Merida" title="City"/></td>
              </tr>
              <tr>
                <td> ZIP-CODE:</td>
                <td><input id= "zipcode" name="zipcode" type="text" class="input" value="97139" title="zipcode"/></td>
              </tr>
              <tr>
                <td colspan="2"><br/>
                  <input id="billBtn" type="button" name="bill" value="SAVE" class="btn" onclick="alert('Information Saved.')" />
                </td>
              </tr>
            </table>
          </div>
        </td>
        </div>
      </tr>
    </table>
  </form>-->
  <!--
       <h5>Receipt History</h5>
    <table class="zebra" cellspacing="20" cellpadding="10">
      <tr>
        <th>ID Receipt</th>
        <th>DATE</th>
        <th>Total</th>
        <th>Request Bill</th>
        <th>Request Receipt</th>
      </tr>
      <tr>
        <td>C1234RSTR4</td>
        <td>Mates 12 Junio 2014</td>
        <td>$7500.50 MXN</td>
        <td class="ver-nota"><input type="button" class="btn" value="Request" onclick="alert('Request Sent')" style="margin-left:0px;"/></td>
        <td class="ver-nota"><input type="button" class="btn" value="Request" onclick="alert('Request Sent')" style="margin-left:0px;"/></td>
      </tr>
      <tr>
        <td>C1234RSTR4</td>
        <td>Mates 12 Junio 2014</td>
        <td>$7500.50 MXN</td>
        <td class="ver-nota"><input type="button" class="btn" value="Request" onclick="alert('Request Sent')" style="margin-left:0px;"/></td>
        <td class="ver-nota"><input type="button" class="btn" value="Request" onclick="alert('Request Sent')" style="margin-left:0px;"/></td>
      </tr>
      <tr>
        <td>C1234RSTR4</td>
        <td>Mates 12 Junio 2014</td>
        <td>$7500.50 MXN</td>
        <td class="ver-nota"><input type="button" class="btn" value="Request" onclick="alert('Request Sent')" style="margin-left:0px;"/></td>
        <td class="ver-nota"><input type="button" class="btn" value="Request" onclick="alert('Request Sent')" style="margin-left:0px;"/></td>
      </tr>
      <tr>
        <td>C1234RSTR4</td>
        <td>Mates 12 Junio 2014</td>
        <td>$7500.50 MXN</td>
        <td class="ver-nota"><input type="button" class="btn" value="Request" onclick="alert('Request Sent')" style="margin-left:0px;"/></td>
        <td class="ver-nota"><input type="button" class="btn" value="Request" onclick="alert('Request Sent')" style="margin-left:0px;"/></td>
      </tr>
    </table>
  -->
    <form action="funcionesphp/controlador_operaciones.php" method="post" onsubmit="return validarEliminarUsuario()" >
     <button id="btn_eliminarperfil" type="submit" name="operacion" style="float:right;margin-top:-15px;" value="eliminar_usuario" class="btn">DELETE PROFILE</button>
  </div>
</div>
<br/><br/>
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
