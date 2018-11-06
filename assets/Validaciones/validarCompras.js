function filtrarCategoria(id){
	$('#productoFiltrado').empty();
	$('#productoFiltrado').append('<option value="">[Selecionar producto]</option>');
	$.get('/SISAUTO1/Controlador/comprasC.php?bandera=1&id='+id,function(data){
		console.log(data);
			$('#productoFiltrado').append(data);
	});


}

function mostrarAddProduc(){
    var cate = ["AMORTIGUADORES","BUJÍAS","COMBUSTIBLE","ELÉCTRICO","ENFRIAMIENTO","FILTROS","FRENOS","MOTOR","SENSORES","SUSPENSIÓN Y DIRECCIÓN","TRANSMISIÓN Y EMBRAGUE","UNIVERSALES"];
	var obtenerC = $("#categoriaPro").find('option:selected');
	var categoriaId = obtenerC.val();
	var categoriaText = obtenerC.text();
    var obtenerP = $("#productoFiltrado").find('option:selected');
    var id = obtenerP.val();
	var productoText = obtenerP.text();
    $("#nombreAddP").val(productoText);
    $("#cateAddP").val(cate[parseInt(categoriaId)-1]);

    $.get('/SISAUTO1/Controlador/comprasC.php?codigo=1&id='+id,function(data){
	 	    $("#codigoAddP").val(data);    
	 });
    $.get('/SISAUTO1/Controlador/comprasC.php?marca=1&id='+id,function(data){
	 	    $("#marcaAddP").val(data);    
	 });

    $.get('/SISAUTO1/Controlador/comprasC.php?descripcion=1&id='+id,function(data){
	 	    $("#descripcionAddP").val(data);  
	 });

    $.get('/SISAUTO1/Controlador/comprasC.php?modelo=1&id='+id,function(data){
	 	    $("#modeloAddP").val(data);   
	 });

    $.get('/SISAUTO1/Controlador/comprasC.php?anio=1&id='+id,function(data){
			if(data!='0'){
				$("#anioAddP").val(data);
			}else{
				$("#anioAddP").val("");
			}		    
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