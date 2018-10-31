function filtrarCategoria(id){
	$('#productoFiltrado').empty();
	$('#productoFiltrado').append('<option value="">[Selecionar producto]</option>');
	$.get('/SISAUTO1/Controlador/comprasC.php?bandera=1&id='+id,function(data){
		console.log(data);
			$('#productoFiltrado').append(data);
	});


}

function agregar(){
	var cantidad = $('#cantidad').val();
	var precio = $('#precio').val();
	var obtenerC = $("#categoriaPro").find('option:selected');
	var obtenerP = $("#productoFiltrado").find('option:selected');
	var categoriaId = obtenerC.val();
	var categoriaText = obtenerC.text();
	var productoId = obtenerP.val();
	var productoText = obtenerP.text();
	var subtotal = parseFloat(cantidad) * parseFloat(precio);
	var html = '<tr id="f'+productoId+'"><td>'+cantidad+'</td>';
	html=html+'<td>'+productoText+'</td>';
	html=html+'<td>'+precio+'</td>';
	html=html+'<td>'+parseFloat(subtotal).toFixed(2)+'</td>';
	html=html+'<td>';
	html=html+'<input type="hidden" name="cantidad_DCom[]" value="'+cantidad+'"/>';
	html=html+'<input type="hidden" name="precio_DCom[]" value="'+precio+'"/>';
	html=html+'<input type="hidden" name="id_Producto[]" value="'+productoId+'"/>';
	html=html+'<button title="Eliminar" type="button" class="btn btn-danger fa fa-trash" onclick="eliminar('+productoId+','+subtotal+');"></button></td></tr>';
	$('#tablaProductos').append(html);
	var acumulado = parseFloat($('#total').val());
	acumulado = acumulado + subtotal;
	$('#total').val(acumulado);
}

function eliminar(id,subtotal){
	var acumulado = parseFloat($('#total').val());
	acumulado = acumulado - subtotal;
	$('#total').val(acumulado);
	$('#f'+id).remove();
}

function validarCompra(){

	$('#guardarCom').submit();
}