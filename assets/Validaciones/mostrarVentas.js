function VerVen(fecha,totalVenta,idventa,idcliente,numFact){
	$("#numFacVer").val(numFact);
	$("#fechaVen").val(fecha.split('-').reverse().join('/'));
	$("#totalVenVer").val(parseFloat(totalVenta).toFixed(2));
	$("#cliVenVer>option[value="+idcliente+"]").attr("selected",true);

	$('#productosVer').empty();
	$.get('/SISANT/Controlador/ventasC.php?bandera1=1&id='+idventa,function(data){
		
			$('#productosVer').append(data);
	});



}