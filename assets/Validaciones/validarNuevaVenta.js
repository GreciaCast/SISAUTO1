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
	$('#precioPV').empty();
	$('#descuento').css('display','block');
    $.get('/SISAUTO1/Controlador/datosProductoC.php?existencias=1&id='+id,function(data){
        $('#cantidadDisponiblePV').val(data);
    });
    $.get('/SISAUTO1/Controlador/datosProductoC.php?costo=1&id='+id,function(data){
    	$('#costoPV').val(data); 
    });
    $.get('/SISAUTO1/Controlador/datosProductoC.php?precio=1&id='+id,function(data){
    	$('#precioPV').val(data); 
    });
}

function aplicarDescuento15(){
	$('#descuento').css('display','none');
	var precio = $('#precioPV').val();
	$('#precioPV').val("");
	if(precio != ""){
		var p = parseFloat(precio)-(parseFloat(precio) * 0.15);
    	$('#precioPV').val(parseFloat(p).toFixed(2));
	}else{
		$('#precioPV').val("");
	}    
}

function agregarProductosATabla(){
	var disponible = $('#cantidadDisponiblePV').val();
    var cantidad = $('#cantidadPV').val();

    var costo = $('#costoPV').val();
    var precio = $('#precioPV').val();
    var obtenerP = $("#produs").find('option:selected');
    var productoId = obtenerP.val();
    var productoText = obtenerP.text();
    var subtotal = parseFloat(cantidad) * parseFloat(precio);
    var html = '<tr id="f'+productoId+'"><td>'+cantidad+'</td>';
    html = html+'<td>'+productoText+'</td>';
    html = html+'<td>'+precio+'</td>';
    html = html+'<td>'+parseFloat(subtotal).toFixed(2)+'</td>';
    html = html+'<td>';
    html = html+'<input type="hidden" name="cantidad_DVen[]" value="'+cantidad+'"/>';
    html = html+'<input type="hidden" name="precio_DVen[]" value="'+precio+'"/>';
    html = html+'<input type="hidden" name="id_Producto[]" value="'+productoId+'"/>';
   // html = html+'<input type="hidden" name="indicador_Descuento[]" value="'+productoId+'"/>';
    html = html+'<button title="Eliminar" type="button" class="btn btn-danger fa fa-trash" onclick="eliminarProductosDeTabla('+productoId+','+subtotal+');"></button></td></tr>';
    
    var id = productoId;
    

     if(cantidad == "" || precio == "" || $('#produs').val() == ""){
        $('#mensajeee1').text("");
        $('#mensajeee1').text("* Debe completar todos los datos del producto");

     }else if(cantidad == 0 || precio == 0 ){
        $('#mensajeee1').text("");
        $('#mensajeee1').text("* Debe escribir datos correctos");

     }else if((parseFloat(costo) == parseFloat(precio))|| (parseFloat(costo) > parseFloat(precio))){
        $('#mensajeee1').text("");
        $('#mensajeee1').text("* Verifique que el precio a vender no sea menor que el costo");

     }else if(parseInt(cantidad) > parseInt(disponible)){
        $('#mensajeee1').text("");
        $('#mensajeee1').text("* Cantidad solicitada NO disponible");

     }else{
        $('#mensajeee1').text("");

        $('#tablaProductosVenta').append(html);

        var acumulado = parseFloat($('#totalVenta').val());
        acumulado = acumulado + subtotal;
        $('#totalVenta').val(parseFloat(acumulado).toFixed(2));
        $('#cantidadPV').val("");
        $('#precioPV').val("");
        $('#cantidadDisponiblePV').val("");
        $('#costoPV').val("");
        $('#produs').val("");
        $('#descuento').css('display','none');
    }
}

function eliminarProductosDeTabla(id,subtotal){
    var acumulado = parseFloat($('#totalVenta').val());
    acumulado = acumulado - subtotal;
    $('#totalVenta').val(parseFloat(acumulado).toFixed(2));
    $('#f'+id).remove();
}

async function validarVenta(sino){
    if (sino == 2) {
        $('#indicador').val(2);
    } if (sino == 3){
        $('#indicador').val(3);
    } else {
        $('#indicador').val(1);
    }
    var detallesV = await validarDetallesV();
    var clienteV = await validarClienteV();
    if (detallesV && clienteV){
        $('#guardarVen').submit();
    };   
}

function validarDetallesV(){
    if (($('#totalVenta').val().trim() == "0")) {
        notaError("¡Los detalles de la compra son obligatorios!");
        return false;
    }else if (($('#totalVenta').val().trim() == "")) {
        notaError("¡Los detalles de la compra deben ser válidos!");
        return false;
    }
    return true;
}

function validarClienteV(){
    if ($('#clientess').val().trim() == "") {
        notaError("¡Debe seleccionar un cliente!");
        return false;
    }
    return true;
}