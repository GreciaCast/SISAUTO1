
async function validarDevolucion(){
    var justificacion = await validarjustificacion();    
    
    if (justificacion){
        $('#guardarDev').submit();
    };   
}

function validarjustificacion(){
    if ($('#justificar').val().trim() == "") {
        notaError("¡La justificación es obligatoria!");
        return false;
    }
    return true;
}