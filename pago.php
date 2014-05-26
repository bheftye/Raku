<?php
  include_once("funcionesphp/controlador_usuario.php");
  include_once("funcionesphp/ruta_general.php");
  $nomUsuario = "";
  session_start();
  if(isset($_SESSION["idUsuario"])){
    $nomUsuario = $_SESSION["nomUsuario"];
    if($_SESSION["status"] == 0)
    header("Location:".MI_RUTA."cp/index.php");
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantillaRaku.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link href="../css/style.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png" href="../images/favicon_raku.png">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Raku</title>
<link rel="stylesheet" type="text/css" href="../css/contact.css">
<script language="javascript" src="../js/pago.js" type="text/javascript"></script>
<script language="javascript" src="../js/funciones_pago.js" type="text/javascript"></script>

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
       
       
    <h1><a href="../index.html"><img src="../images/RAKU-WEB2_02.png" alt="Raku" title="Raku"/></a></h1>
	   

  </div>
  <div id="menu">
      <p id="user" class="login"><!-- InstanceBeginEditable name="login" --><?php if(isset($_SESSION["nomUsuario"])) echo '<a style="display:inline" href="perfil.php">'.strtoupper($nomUsuario)."/ <a style='display:inline;' class='logger' href='funcionesphp/controlador_operaciones.php?operacion=cerrar_sesion'>LOGOUT</a>"; else echo "<a href='login.php'>LOGIN / REGISTER</a>"?><!-- InstanceEndEditable --></p>
    <div class="line"></div>
    <ul>
       
      
	   
	  <!-- InstanceBeginEditable name="tab2" -->
      <li><a href="raku.html">RAKU</a></li>
      <li><a href="mind.html">MIND</a></li>
      <li><a href="body.html">BODY</a></li>
      <li><a href="home.html">HOME</a></li>
      <li><a href="littleone.html">LITTLE ONE</a></li>
      <li><a href="cart.html">CART</a></li>
      <li class="current_page_item"><a href="contacto.html">CONTACT</a></li>
      <!-- InstanceEndEditable --> 
	  
    </ul>
  </div>
</div>
<!--  --> 
<!-- Content --> 
<!-- InstanceBeginEditable name="contenido" -->
<div class="wrapper">
  <table>
    <tr>
      <td class="linea"><form name="login-form" class="login-form" action="#" method="post">
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
              <tr>
                <td colspan="2"><br/>
                  <input id="checkoutBtn" type="submit" name="save" value="CHECKOUT" class="btn" />
              </tr>
            </table>
            <br><br>
            <table>
              <tr>
                <td colspan="2"><h2 class="titleUser">BILLING INFORMATION OPTIONAL*</h2></td>
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
                  <input id="billBtn" type="button" name="bill" value="GENERATE BILL" class="btn" />
              </tr>
            </table>
          </div>
        </form></td>
      <td ><h2 class="titulo">PAYMENT</h2>
        <a href="https://www.paypal.com/mx/webapps/mpp/home" target="_blank"> 
        <img src="../images/checkoutpaypal.png" class="paypal" alt="PayPal" title="PayPal"/></a></td>
    </tr>
  </table>
</div>
<!-- InstanceEndEditable --> 
<!--  --> 

<!--Footer -->
<div class="footer" style="margin-top:260px;">
  <div class="lineFooter"></div>
  <div id="menuFooter">
    <ul>
      <!-- InstanceBeginEditable name="tab13" -->
      <li> 
      <!-- InstanceEndEditable -->
    </ul>
  </div>
  <div class="socialMedia"> <img name="facebook" id="facebook" src="../images/facebook_normal.png" alt="Facebook" title="Facebook"/> <img name="instagram" id="instagram" src="../images/insta_normal.png" alt="Instagram" title="Instagram"/> <img name="pinterest" id="pinterest" src="../images/pinte_normal.png" alt="Pinterest" title="Pinterest"/> </div>
</div>
<!--  -->
</body>
<!-- InstanceEnd --></html>
