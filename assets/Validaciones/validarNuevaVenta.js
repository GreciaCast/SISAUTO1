function radioSeleccionado(numero){

	if(numero == 1){
		$("#r2").css('background','');
		$("#r1").css('background','green');

		$("#clientesID").css('display','block');//mostrar

	}else{
		$("#r2").css('background','green');
		$("#r1").css('background','');

		$("#clientesID").css('display','none');//ocultar
		
	}
}

function mostrarCostoyExistencias(id){
	$('#cantidadDisponiblePV').empty();
	$('#costoPV').empty();
    $.get('/SISAUTO1/Controlador/ventasC.php?existencias=1&id='+id,function(data){
        console.log(data);
        $('#cantidadDisponiblePV').val(data);
    });
    $.get('/SISAUTO1/Controlador/ventasC.php?costo=1&id='+id,function(data){
        console.log(data);
    	$('#costoPV').val(data);
    });
}

function agregarProductosATabla(){
    var cantidad = $('#cantidadPV').val();
    var precio = $('#precioPV').val();
    //var precioventa = $('#precioventa').val();
    var obtenerP = $("#produs").find('option:selected');
    var productoId = obtenerP.val();
    var productoText = obtenerP.text();
    var subtotal = parseFloat(cantidad) * parseFloat(precio);
    var html = '<tr id="f'+productoId+'"><td>'+cantidad+'</td>';
    html = html+'<td>'+productoText+'</td>';
    html = html+'<td>'+precio+'</td>';
   // html = html+'<td>'+precioventa+'</td>';
    html = html+'<td>'+parseFloat(subtotal).toFixed(2)+'</td>';
    html = html+'<td>';
    html = html+'<input type="hidden" name="cantidad_DCom[]" value="'+cantidad+'"/>';
    html = html+'<input type="hidden" name="precio_DCom[]" value="'+precio+'"/>';
   // html = html+'<input type="hidden" name="precio_DVen[]" value="'+precioventa+'"/>';
    html = html+'<input type="hidden" name="id_Producto[]" value="'+productoId+'"/>';
    html = html+'<button title="Eliminar" type="button" class="btn btn-danger fa fa-trash" onclick="eliminar('+productoId+','+subtotal+');"></button></td></tr>';
    
     if(cantidad == "" || precio == "" || $('#produs').val() == ""){
        $('#mensajeee1').text("");
        $('#mensajeee1').text("* Debe completar todos los datos del producto");

     }else if(cantidad == 0 || precio == 0 ){
        $('#mensajeee1').text("");
        $('#mensajeee1').text("* Debe escribir datos correctos");

     }else{
        $('#mensajeee1').text("");

        $('#tablaProductosVenta').append(html);
        var acumulado = parseFloat($('#total').val());
        acumulado = acumulado + subtotal;
        $('#total').val(parseFloat(acumulado).toFixed(2));
        $('#cantidadPV').val("");
        $('#precioPV').val("");
        $('#produs').val("");
    }
}

function eliminarProductosDeTabla(id,subtotal){
    var acumulado = parseFloat($('#total').val());
    acumulado = acumulado - subtotal;
    $('#total').val(parseFloat(acumulado).toFixed(2));
    $('#f'+id).remove();
}