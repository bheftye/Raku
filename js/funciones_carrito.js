window.onload = function(){

	//var htmlProductos = crearHTMLProductosDelCarrito();
	//document.getElementById("tabla_carrito").innerHTML = htmlProductos;
	document.getElementById("payBtn").onclick = redirigeAPagar;

};

function redirigeAPagar(){
	window.location.href = "pago.html";
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

    var total = 0;
	productos = GetCookie("productos",document.cookie);
	if (productos == "")
		alert("La canasta de compras está vacía");
	else{
		productos = Number(productos);
		for(i = 1; i <= productos; i ++){
			id = Number(GetCookie("prod" + i, document.cookie));
			cantidad = Number(GetCookie("cant" + i, document.cookie));
			htmlProductos+="<tr>"+
					          "<td class=\"producto\"><img class=\"producto\" src=\"../images/productos/muneca_trapo_cuarto_tmb.jpg\"/> MUÑECAS DE TRAPO </td>"+
					          "<td class=\"price\">$250.00</td>"+
					          "<td class=\"quantity\">"+
					          "<div class=\"styled-select\"><select>"+
					              "<option>1</option>"+
					              "<option>2</option>"+
					              "<option>3</option>"+
					            "</select></div></td>"+
					          "<td class=\"subtotal\">$500.00</td>"+
					          "<td class=\"subtotal\"><img src=\"../images/removeCart.png\" width=\"25px\" height=\"25px\"/></td>"+
					        "</tr>";

		}
	}

	return htmlProductos;
}