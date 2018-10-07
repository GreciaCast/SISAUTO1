async function validarProducto() {
    var nombre = await validarNombreP();
    var categoria = await validarCategoriaP();
    if($().val()=='0'){
      var marca = await validarMarcaP();
      var modelo = await validarModeloP();
      var anio = await validarAnioP();
    }else{
      var marca = 1;
      var modelo = 1;
      var anio = 1;
    }
    var descripcion = await validarDescripcionP();

    if (nombre && categoria && marca && modelo && anio && descripcion) {
        $('#guardarProd').submit();
    }
}

function validarNombreP() {
    if ($('#nombrePr').val().trim() == "") {
        notaError("El nombre es obligatorio!");
        return false;
    }
    return true;
}

function validarCategoriaP() {

    if ($('#categoriaPr').val().trim() == "") {
        notaError("La categoria es obligatorio!");
        return false;
    }
    return true;
}

function validarMarcaP() {

    if ($('#marcaPr').val().trim() == "") {
        notaError("La marca es obligatorio!");
        return false;
    }
    return true;
}

function validarModeloP() {

    if ($('#modeloPr').val().trim() == "") {
        notaError("El modelo es obligatorio!");
        return false;
    }
    return true;
}

function validarAnioP() {

     if ($('#anioPr').val().trim()=="") {
        notaError("El año es obligatorio!");
        return false;
    }
    return true;
}

function validarDescripcionP() {

    if ($('#descripcionPr').val().trim() == "") {
        notaError("La descripcion es obligatorio!");
        return false;
    }
    return true;
}
