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


<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/login.css" rel="stylesheet" type="text/css">

<link rel="icon" type="image/png" href="images/favicon_raku.png">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Raku</title>
<link rel="stylesheet" type="text/css" href="css/contact.css">
<script language="javascript" src="js/pago.js" type="text/javascript"></script>
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
<div class="wrapper">
  <form name="login-form" style="margin-left:0;" class="login-form" action="nota.php" onsubmit="return validarCamposPago()" method="post">
  <table>
    <tr>
      <td class="linea">
          <div class="content">

            <table>
              <tr>
                  <p id="error" class="error"></p><br>
                <td colspan="2"><h2 class="titleUser">SHIPPING INFORMATION</h2></td>
              </tr>
              <tr>
                <td>NAME:</td>
                <td><input id ="nombre_envio" name="nombre_envio" type="text" class="input" value="" title="Names"/></td>
              </tr>
              <tr>
                <td>ADDRESS:</td>
                <td><input id= "direccion_envio" name="direccion_envio" type="text" class="input" value = "" title="Address"/></td>
              </tr>
              <tr>
                <td>COUNTRY:</td>
                <td><input id= "pais_envio" name="pais_envio" type="text" class="input" value="" title="Country"/></td>
              </tr>
              <tr>
                <td>CITY:</td>
                <td><input id= "ciudad_envio" name="ciudad_envio" type="text" class="input" value="" title="City"/></td>
              </tr>
              <tr>
                <td> ZIP-CODE:</td>
                <td><input id= "zip_envio" name="zip_envio" type="text" class="input" value="" title="zipcode"/><br>
                    <a href="cart.php"><button type="button" name="operacion" value="realizar_compra" class="btn">CANCEL</button></a></td>
              </tr>
              <tr>                
                <td>
              </td>
              </tr>
            </table>
            <br><br>
           
          </div>
        </td>
      <td > 
        <div class="content">
        <table>
              <tr>
                <td colspan="2"><h2 class="titleUser">CREDIT / DEBIT INFORMATION*</h2></td>
              </tr>
              <tr>
                <td>FIRST NAME*</td>
                <td><input id ="fname_card" name="fname_card" type="text" class="input" value="" title="First Name"/></td>
              </tr>
              <tr>
                <td>LAST NAME*</td>
                <td><input id= "lname_card" name="lname_card" type="text" class="input" value = "" title="Last Name"/></td>
              </tr>
              <tr>
                <td>CARD NUMBER</td>
                <td><input id= "num_card" name="num_card" type="text" class="input" value = "" title="PHONE"/></td>
              </tr>
              <tr>
                <td colspan="2">EXPIRATION DATE : MONTH
                  <select id= "mes_card" name="mes_card">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                  </select>

                  YEAR
                  <select id= "year_card" name="year_card">
                    <option>14</option>
                    <option>15</option>
                    <option>16</option>
                    <option>17</option>
                    <option>18</option>
                    <option>19</option>
                    <option>20</option>
                    <option>21</option>
                    <option>22</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>SECURITY CODE:</td>
                <td><input id= "code_card" name="code_card" type="text" class="input" value="" title="Security Code"/></td>
              </tr>
              <tr>
                <td colspan="2"><br/>
                  <button id="" type="submit" name="operacion" value="realizar_compra" class="btn">PAY</button>
              </tr>
            </table></div</td>
    </tr>
  </table>
  </form>
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
  <div class="socialMedia"> <img name="facebook" id="facebook" src="images/facebook_normal.png" alt="Facebook" title="Facebook"/> <img name="instagram" id="instagram" src="images/insta_normal.png" alt="Instagram" title="Instagram"/> <img name="pinterest" id="pinterest" src="images/pinte_normal.png" alt="Pinterest" title="Pinterest"/> </div>
</div>
<!--  -->
</body>
<!-- InstanceEnd --></html>
