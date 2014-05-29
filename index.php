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
    <script language="JavaScript" type="text/javascript" src="js/slideshow.js"></script>
    <script src="js/homeuser.js"></script>
    <script language="JavaScript" src="js/buscar.js" type="text/javascript"></script>
    <script language="JavaScript" src="js/redes_sociales.js" type="text/javascript"></script>


	<link rel="stylesheet" type="text/css" href="css/slideshow.css">

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
<div class="slideContainer">
			<div class="slider_wrapper">
				<ul id="image_slider">
					<li><img src="images/productos/artesania2012.jpg"></li>
					<li><img src="images/productos/artesaniaFina.jpg"></li>
					<li><img src="images/productos/artesanias-michoacan.jpg"></li>
				</ul>					
				<span class="nvgt" id="prev"></span>
				<span class="nvgt" id="next"></span>
			</div>
		</div>
</div>
<!-- InstanceEndEditable --> 
<!--  --> 

<!--Footer -->
<div class="footer">
  <div class="lineFooter"></div>
  <div id="menuFooter">
    <ul>
      <!-- InstanceBeginEditable name="tab13" --><li><!-- InstanceEndEditable -->
    </ul>
  </div>
  <div class="socialMedia"> <img name="facebook" id="facebook" src="images/facebook_normal.png" alt="Facebook" title="Facebook"/> <img name="instagram" id="instagram" src="images/insta_normal.png" alt="Instagram" title="Instagram"/> <img name="pinterest" id="pinterest" src="images/pinte_normal.png" alt="Pinterest" title="Pinterest"/> </div>
  <a href="http://www.000webhost.com/" target="_blank">http://www.000webhost.com/</a>
</div>
<!--  -->
</body>

<!-- InstanceEnd --></html>
