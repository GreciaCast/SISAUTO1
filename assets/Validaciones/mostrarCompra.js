function editarCom(numeroFac,fecha,totalCompra,idcompra,idproveedor){
	$("#nummeroFacComEditar").val(numeroFac);
	$("#fecha").val(fecha.split('-').reverse().join('/'));
	$("#totalComEditar").val(totalCompra);
	$("#idcompra").val(idcompra);
	$("#proveedorComEditar>option[value="+idproveedor+"]").attr("selected",true);

	$('#productos').empty();
	$.get('/SISAUTO1/Controlador/detalleCompraC.php?bandera=1&id='+idcompra,function(data){
		console.log(data);
			$('#productos').append(data);
	});

}