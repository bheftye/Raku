var productos = new Array(new Producto("P1","CAZUELA","580","image1.jpg"), new Producto("P2","CANASTILLAS","190","image2.jpg"), new Producto("P3","MOLCAJETE","190","image3.jpg"), new Producto("P4","GATOS","310","image4.jpg"), new Producto("P5","MUÑECAS DE TRAPO","250","image5.jpg"), new Producto("P6","JUGUETE","120","image6.jpg"), new Producto("P7","VASIJAS","250","image7.jpg"), new Producto("P8","BUHOS","135","image8.jpg"));

function Producto(id, nombre, precio,imagenPrincipal){
	this.id = id;
	this.nombre = nombre;
	this.imagenPrincipal = imagenPrincipal;
	this.precio = precio;
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

function eliminarProducto(idProducto){
	if(confirm("¿Desea eliminar el producto "+ idProducto+"?")){
		
	}

	return;
}