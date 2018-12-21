async function validarProducto() {
    var nombre = await validarNombreP();
    var categoria = await validarCategoriaP();
    var marca = await validarMarcaP();
    if($("#universal").val()=='0'){
      var modelo = await validarModeloP();
      var anio = await validarAnioP();
    }else{
      var modelo = 1;
      var anio = 1;
    }
    var descripcion = await validarDescripcionP();
    var stock = await validarStockP();

    if (nombre && categoria && marca && modelo && anio && descripcion && stock) {
        var comp = await existe();
      //  var compi=await existes();
        if(comp == 0){
           $('#guardarProd').submit();
        }
    }
}

function validarNombreP() {
    if ($('#nombrePr').val().trim() == "") {
        notaError("¡El nombre es obligatorio!");
        return false;
    }
    return true;
}

function validarCategoriaP() {

    if ($('#categoriaPr').val().trim() == "") {
        notaError("¡La categoria es obligatoria!");
        return false;
    }
    return true;
}

function validarMarcaP() {

    if ($('#marcaPr').val().trim() == "") {
        notaError("¡La marca es obligatoria!");
        return false;
    }
    return true;
}

function validarModeloP() {

    if ($('#modeloPr').val().trim() == "") {
        notaError("¡El modelo es obligatorio!");
        return false;
    }
    return true;
}

function validarAnioP() {

     if ($('#anioPr').val().trim()=="") {
        notaError("¡El año es obligatorio!");
        return false;
    }else if ($('#anioPr').val().trim().length!=4) {
        notaError("¡El año debe contener 4 dígitos!");
        return false;
    }
    return true;
}

function validarDescripcionP() {

    if ($('#descripcionPr').val().trim() == "") {
        notaError("¡La descripcion es obligatoria!");
        return false;
    }
    return true;
}

function validarStockP() {

    if ($('#stockPr').val().trim()=="") {
        notaError("¡El stock mínimo, es obligatorio!");
        return false;
    }
    return true;
}

async function existe(){
    var param = {
            nombre: $('#nombrePr').val(),
            categoria: $('#categoriaPr').val(),
            marca: $('#marcaPr').val(),
            modelo: $('#modeloPr').val(),
            anio: $('#anioPr').val(),
            bandera: "existe"
        };

        return $.ajax({
            data: param,
            url:"/SISAUTO1/Controlador/productoC.php",
            method: "post",
            success: function(data){
                if (data == 0) {
                    return true;
                }else{
                   notaError("¡El producto ya existe!");
                   return false;
                }
            }
        });
}


//////////////////////////////////////////////////////////////////////////////////////////////

async function validarProductoEditar() {
    var nombre = await validarNombrePE();
    var categoria = await validarCategoriaPE();
    var marca = await validarMarcaPE();
    if($("#universal").val()=='0'){
      var modelo = await validarModeloPE();
      var anio = await validarAnioPE();
    }else{
      var modelo = 1;
      var anio = 1;
    }
    var descripcion = await validarDescripcionPE();
    var stock = await validarStockPE();

    if (nombre && categoria && marca && modelo && anio && descripcion && stock) {
        $('#editarProd').submit();
    }
}

function validarNombrePE() {
    if ($('#nombrePE').val().trim() == "") {
        notaError("¡El nombre es obligatorio!");
        return false;
    }
    return true;
}

function validarCategoriaPE() {

    if ($('#catePE').val().trim() == "") {
        notaError("¡La categoria es obligatoria!");
        return false;
    }
    return true;
}

function validarMarcaPE() {

    if ($('#marcaPE').val().trim() == "") {
        notaError("¡La marca es obligatoria!");
        return false;
    }
    return true;
}

function validarModeloPE() {

    if ($('#modeloPE').val().trim() == "") {
        notaError("¡El modelo es obligatorio!");
        return false;
    }
    return true;
}

function validarAnioPE() {

     if ($('#anioPE').val().trim()=="") {
        notaError("¡El año es obligatorio!");
        return false;
    }else if ($('#anioPE').val().trim().length!=4) {
        notaError("¡El año debe contener 4 dígitos!");
        return false;
    }
    return true;
}

function validarDescripcionPE() {

    if ($('#descripcionPE').val().trim() == "") {
        notaError("¡La descripcion es obligatoria!");
        return false;
    }
    return true;
}

function validarStockPE() {

    if ($('#stockPE').val().trim()=="") {
        notaError("¡El stock mínimo, es obligatorio!");
        return false;
    }
    return true;
}
