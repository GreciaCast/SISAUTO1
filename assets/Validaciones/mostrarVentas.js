function VerVen(fecha,totalVenta,idventa,idcliente){
	//$("#numeroFacVenVer").val(numeroFac);
	// $("#proveedorComVer").val(nombreproveedor);
	$("#fechaVen").val(fecha.split('-').reverse().join('/'));
	$("#totalVenVer").val(parseFloat(totalVenta).toFixed(2));
	$("#cliVenVer>option[value="+idcliente+"]").attr("selected",true);

	$('#productosVer').empty();
	$.get('/SISAUTO1/Controlador/ventasC.php?bandera1=1&id='+idventa,function(data){
		//console.log(data);
			$('#productosVer').append(data);
	});
// var r=JSON.parse(data);
// 			$('#productosVer').append(r[0]);
// 			$('#total').val(r[1]);

// 	});


}