//var productos = new Array(new Producto("P1","CAZUELA","580","image1.jpg"), new Producto("P2","CANASTILLAS","190","image2.jpg"), new Producto("P3","MOLCAJETE","190","image3.jpg"), new Producto("P4","GATOS","310","image4.jpg"), new Producto("P5","MUÑECAS DE TRAPO","250","image5.jpg"), new Producto("P6","JUGUETE","120","image6.jpg"), new Producto("P7","VASIJAS","250","image7.jpg"), new Producto("P8","BUHOS","135","image8.jpg"));


window.onload = function(){
	asignarAgregarABoton();
};


function cambiarImagenAVisualizar(index){
	 document.getElementById("imagenGrande").src=imagenesProducto[index];
}

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

function creaHTMLProductos(){
	var html = "";
	var producto;
	var producto2;
	for (var i = 0; i < productos.length; i+=2) {
		producto = productos[i];
		producto2 = productos[i + 1];
		html +="<div class=\"item\"> <img class=\"homeImage\" src=\"../images/productos/"+producto.imagenPrincipal+"\"><div>"+producto.nombre+" $"+producto.precio+"</div><br><img class=\"homeImage\" src=\"../images/productos/"+producto2.imagenPrincipal+"\"><div>"+producto2.nombre+" $"+producto2.precio+"</div></div>";
	}
	return html;
}

function eliminarProducto(clave, index){
	if(confirm("¿Desea eliminar el producto "+ clave+"?")){
		document.getElementById("form_eliminar_producto"+index).submit();
	}

	return;
}

function verDetalleProducto(indice){
	var producto = productos[indice];
	popup = window.open("","popup","toolbar=no,directories=no,menubar=0,width=500,height=600");
	popup.document.open();
	popup.document.writeln("<HTML><HEAD><TITLE>DETALLE PRODUCTO |"+producto.nombre+"</TITLE></HEAD>");
	popup.document.writeln("<BODY><TABLE ALIGN=\"CENTER\">");
	popup.document.writeln("<TR><TD>Clave: "+producto.clave+"</TD><TR>");
	popup.document.writeln("<TR><TD>Nombre: "+producto.nombre+"</TD><TR>");
	popup.document.writeln("<TR><TD>Dise&ntilde;ador: "+producto.disenador+"</TD><TR>");
	popup.document.writeln("<TR><TD>No. Disponible: "+producto.piezasDisp+"</TD><TR>");
	popup.document.writeln("<TR><TD>Precio: $"+producto.precio+" MXN</TD><TR>");
	popup.document.writeln("<TR><TD>Categor&iacute;a: "+producto.categoria+"</TD><TR>");
	popup.document.writeln("<TR><TD><p>Imagen Principal</p><IMG SRC=\"../imagenesProductos/principales/" + producto.imagenPrincipal + "\" width=\"150\" height=\"150\" ALT=\"Fotografía\" BORDER=\"1\"></TD><TR>");
	popup.document.writeln("<TR><TD><p>Imagenes Secundarias</p><br</TD><TR>");
	for (var i =  0; i < producto.imagenesSecunadarias.length; i++) {
		var imagen = producto.imagenesSecunadarias[i]; 
		popup.document.writeln("<TR><TD><IMG SRC=\"../imagenesProductos/secundarias/" + imagen + "\" width=\"150\" height=\"150\" ALT=\"Fotografía\" BORDER=\"1\"></TD><TR>");
	}
	popup.document.writeln("</TABLE></BODY></HTML>");
	popup.document.close();
	popup.focus();
}



function asignarAgregarABoton(){
	if(document.getElementById("btn_agregar") != null){
		document.getElementById("btn_agregar").onclick = agregarProductoAlCarrito;
	}
}

function agregarProductoAlCarrito(){
	//if(document.getElementById("txt_cantidad").value != ""){
	//	var cantidad = document.getElementById("txt_cantidad").value;
		productos = GetCookie("productos",document.cookie);
		if (productos == "") productos = 0;
		productos = Number(productos) + 1;
		SetCookie("productos",productos);
		SetCookie("id"+productos,idProducto);
		alert("Product, added to cart.");
		//SetCookie("cant" + productos,cantidad);
	//}
	/*else{
		alert("Set an amount");
		document.getElementById("txt_cantidad").focus();
	}*/
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

function Vaciar() {
	SetCookie("productos", 0);
}
