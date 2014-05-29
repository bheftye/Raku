window.onload = function(){

	var htmlProductos = crearHTMLProductosDelCarrito();
	document.getElementById("tabla_carrito").innerHTML = htmlProductos;
	calcularTotalAPagar();	

};

function Producto(clave, nombre, disenador, piezasDisp,precio,categoria,imagenPrincipal,imagenesSecunadarias){
	this.clave = clave;
	this.nombre = nombre;
	this.imagenPrincipal = imagenPrincipal;
	this.precio = precio;
	this.disenador = disenador;
	this.piezasDisp = piezasDisp;
	this.precio = precio;
	this.categoria = categoria;
	this.imagenesSecunadarias = imagenesSecunadarias;

}

function obtenerProductoPorClave(clave){
	for (var i = 0; i < productos.length; i++) {
		producto = productos[i];
		if(clave == producto.clave){
			return producto;
		}
	}
	return null;
}

function crearHTMLProductosDelCarrito(){
	var htmlProductos = "<tr>"+
          "<th class=\"encabezadoº\"> "+
            "</td>"+
          "<th class=\"encabezado\">PRICE"+
            "</td>"+
          "<th class=\"encabezado\">QUANTITY"+
            "</td>"+
          "<th class=\"encabezado\">SUBTOTAL"+
            "</td>"+
          "<th class=\"encabezado\"> </td>"+
        "</tr>";

	var productosCookie = GetCookie("productos",document.cookie);
	if (productosCookie == ""){
		return htmlProductos;
	}
	else{
		productosCookie = Number(productosCookie);
		if(productosCookie != 0){
			for(i = 1; i <= productosCookie; i ++){
				clave = GetCookie("id" + i, document.cookie);
				var producto = new Producto("","","","","","","","");
				producto = obtenerProductoPorClave(clave);
				if(producto != null){
					htmlProductos+="<tr>"+
							          "<td class=\"producto\"><img class=\"producto\" src=\"imagenesProductos/principales/"+producto.imagenPrincipal+"\"/>"+producto.nombre+" </td>"+
							          "<td class=\"price\">$<span id=\"precio_"+i+"\">"+producto.precio+"</span> MXN</td>"+
							          "<td class=\"quantity\">"+
							           "<div class=\"styled-select\"><select name=\"cantidad"+i+"\" onchange=\"calcularTotalAPagar()\" id=\"s_"+i+"\">";
					for (var j = 0; j <  producto.piezasDisp; j++) {
					htmlProductos+= "<option value=\""+(j + 1)+"\">"+(j + 1)+"</option>";
					};
							         
							            
					htmlProductos+=   "</select></div><input type=\"hidden\" name=\"clave"+i+"\" value=\""+producto.clave+"\"></td>"+
							          "<td class=\"subtotal\">$<span id=\"subtotal"+i+"\">"+producto.precio+"</span> MXN</td>"+
							          "<td class=\"subtotal\"><img src=\"images/removeCart.png\" onclick=\"removerProducto('"+producto.clave+"')\" width=\"25px\" height=\"25px\"/></td>"+
							        "</tr>";

				}

				
			}
			if(productosCookie > 0){
				htmlProductos+=" <tr>"+
						          "<td></td>"+
						          "<td></td>"+
						          "<td class=\"total\">TOTAL:</td>"+
						          "<td class=\"numTotal\"><span id=\"total\"></span></td>"+
						        "</tr>";

				
				htmlProductos+=" <tr>"+
						          "<td></td>"+
						          "<td><input type=\"hidden\" name=\"num_productos\" value=\""+productosCookie+"\"></td>"+
						          "<td class=\"agregar\" colspan=\"2\"><button type=\"submit\" name=\"operacion\" id=\"payBtn\" value=\"guardar_compra\" class=\"btn\">PAY</button"+
						        "</tr>";
			}
		}
		else{
			alert("Cart is empty.");
		}		
	}

	return htmlProductos;
}

function GetCookie (name, InCookie) {
	var prop = name + "=";
	var plen = prop.length;
	var clen = InCookie.length;
	var i=0;
	if (clen>0) { 
		i = InCookie.indexOf(prop,0);
		if (i!=-1) { 
			j = InCookie.indexOf(";",i+plen);
			if(j!=-1)
				return unescape(InCookie.substring(i+plen,j));
			else
				return unescape(InCookie.substring(i+plen,clen));
		}
		else
			return "";
	}
	else
		return "";
}

function SetCookie (name, value) {
	var argv = SetCookie.arguments;
	var argc = SetCookie.arguments.length;
	var expires = (argc > 2) ? argv[2] : null;
	var path = (argc > 3) ? argv[3] : null;
	var domain = (argc > 4) ? argv[4] : null;
	var secure = (argc > 5) ? argv[5] : false;
	document.cookie = name + "=" + escape(value) +
		((expires==null) ? "" : ("; expires=" + expires.toGMTString())) +
		((path==null) ? "" : (";path=" + path)) +
		((domain==null) ? "" : ("; domain=" + domain)) +
		((secure==true) ? "; secure" : "");
}

function calcularTotalAPagar(){
	var productosCookie = GetCookie("productos",document.cookie);
	if (productosCookie != ""){
		var total = 0;
		productosCookie = Number(productosCookie);
		for(i = 1; i <= productosCookie; i ++){
			clave = GetCookie("id" + i, document.cookie);
			if(clave != 0){
				var producto = new Producto("","","","","","","","");
				producto = obtenerProductoPorClave(clave);
				var subtotalProducto = 0;
				var cantidad = document.getElementById("s_"+i).value;
				subtotalProducto = cantidad * producto.precio;
				document.getElementById("subtotal"+i).innerHTML = subtotalProducto;	
				total += subtotalProducto;
			}
		}
		document.getElementById("total").innerHTML = "$"+total+" MXN";
	}
}

function Vaciar() {
	SetCookie("productos", 0);
}

function removerProducto(clave){
	if(confirm("Are you sure you want to remove producto from cart?")){
		var productosCookie = GetCookie("productos",document.cookie);
		if (productosCookie != ""){
			productosCookie = Number(productosCookie);
			for(i = 1; i <= productosCookie; i ++){
				claveCookie = GetCookie("id" + i, document.cookie);
				if(claveCookie == clave){
					SetCookie("id" + i, 0);
				}
				
			}

			var clavesCookie = new Array();

			for(i = 1; i <= productosCookie; i ++){
				claveCookie = GetCookie("id" + i, document.cookie);
				if(claveCookie != 0){
					clavesCookie.push(claveCookie);
				}
			}

			for(i = 0; i < clavesCookie.length; i ++){
				claveCookie = SetCookie("id" + (i+1), clavesCookie[i]);
			}

			SetCookie("productos", clavesCookie.length);

		}
		location.reload();
	}
	
}

function validarProductosEnCarrito(){
	var productosCookie = GetCookie("productos",document.cookie);
	if (productosCookie != ""){
		productosCookie = Number(productosCookie);
		if(productosCookie > 0){
			return true;
		}
	}
	alert("Cart is empty.");
	return false;
}