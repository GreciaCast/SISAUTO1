function editarCom(numeroFac,fecha,totalCompra,idcompra,idproveedor){
	$("#numFacCom").val(numeroFac);
	$("#fecha").val(fecha.split('-').reverse().join('/'));
	$("#total").val(totalCompra);
	$("#idcompra").val(idcompra);
	var contador;
	$.get('/SISANT/Controlador/comprasC.php?provee=1&id='+idproveedor,function(data){
            $("#proveedorComEditar").val(data);
     });
	$('#tablaProductos').empty();
	$.get('/SISANT/Controlador/detalleCompraC.php?bandera=1&id='+idcompra,function(data){
		var r=JSON.parse(data);
			$('#tablaProductos').append(r[0]);
			$('#total').val(parseFloat(r[1]).toFixed(2));
			contador = r[2];
			for(i=0 ; i < contador; i++){
				var producto_temp = $("#id_prod"+i).val();
				productosagregados.push(producto_temp);
			}
	});

}
function VerCom(numeroFac,fecha,totalCompra,idcompra,idproveedor){
	$("#nummeroFacComVer").val(numeroFac);
	// $("#proveedorComVer").val(nombreproveedor);
	$("#fechaVer").val(fecha.split('-').reverse().join('/'));
	$("#totalComVer").val(parseFloat(totalCompra).toFixed(2));
	$("#proveedorComVer>option[value="+idproveedor+"]").attr("selected",true);

	$('#productosVer').empty();
	$.get('/SISANT/Controlador/detalleCompraC.php?bandera1=1&id='+idcompra,function(data){
		//console.log(data);
			$('#productosVer').append(data);
	});
// var r=JSON.parse(data);
// 			$('#productosVer').append(r[0]);
// 			$('#total').val(r[1]);

// 	});


}