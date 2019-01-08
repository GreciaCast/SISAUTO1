async function validarNumFacturas(){
	var creditofiscal= await validarCreditoFiscal(); 
	var consumidorfinal= await validarConsumidorFinal();     
	if (creditofiscal && consumidorfinal) {
		$('#guardarFac').submit();
	};      
}

function validarCreditoFiscal(){

	if ($('#numFCredito').val().trim()=="") {
		notaError("¡El número de la factura crédito fiscal es obligatorio!");
		return false;
	}


	return true;
}


function validarConsumidorFinal(){

	if ($('#numFConsumidor').val().trim()=="") {
		notaError("¡El número de la factura consumidor final es obligatorio!");
		return false;
	}


	return true;
}