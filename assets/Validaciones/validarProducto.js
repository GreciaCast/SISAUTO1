var aux;
var nuevoprecio;
var costopromedio;

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
    //var precio = await validarPrecioP();

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

    if ($('#stockPr').val().trim() == "") {
        notaError("¡El stock mínimo, es obligatorio!");
        return false;
    }
    return true;
}

// function validarPrecioP() {
//     if ($('#precioPr').val().trim() == "") {
//         notaError("¡El precio es obligatorio!");
//         return false;
//     }
//     return true;
// }

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

async function validarProductoEditarP() {
    var nombre = await validarNombrePEP();
    var categoria = await validarCategoriaPEP();
    var marca = await validarMarcaPEP();
    if($("#universal").val()=='0'){
      var modelo = await validarModeloPEP();
      var anio = await validarAnioPEP();
    }else{
      var modelo = 1;
      var anio = 1;
    }
    var descripcion = await validarDescripcionPEP();
    var vali = await validacionPrecio();
    console.log(aux);
    var stock = await validarStockPEP();
    var precio = await validarPrecioPEP();
   
    if (nombre && categoria && marca && modelo && anio && descripcion && stock && precio && (aux == 1)) {
        $('#editarProdP').submit();
    }
}

function validarNombrePE() {
    if (($('#nombrePE').val().trim() == "")) {
        notaError("¡El nombre es obligatorio!");
        return false;
    }
    return true;
}

function validarCategoriaPE() {
    if (($('#catePE').val().trim() == "")) {
        notaError("¡La categoria es obligatoria!");
        return false;
    }
    return true;
}

function validarMarcaPE() {
    if (($('#marcaPE').val().trim() == "")) {
        notaError("¡La marca es obligatoria!");
        return false;
    }
    return true;
}

function validarModeloPE() {

    if (($('#modeloPE').val().trim() == "")) {
        notaError("¡El modelo es obligatorio!");
        return false;
    }
    return true;
}

function validarAnioPE() {

     if (($('#anioPE').val().trim()=="")) {
        notaError("¡El año es obligatorio!");
        return false;
    }else if (($('#anioPE').val().trim().length!=4)) {
        notaError("¡El año debe contener 4 dígitos!");
        return false;
    }
    return true;
}

function validarDescripcionPE() {

    if (($('#descripcionPE').val().trim() == "")) {
        notaError("¡La descripcion es obligatoria!");
        return false;
    }
    return true;
}

function validarStockPE() {

    if (($('#stockPE').val().trim()=="")) {
        notaError("¡El stock mínimo, es obligatorio!");
        return false;
    }
    return true;
}

//-------------------------------------------------------------
function validarNombrePEP() {
    if (($('#nombrePEP').val().trim() == "")) {
        notaError("¡El nombre es obligatorio!");
        return false;
    }
    return true;
}

function validarCategoriaPEP() {
    if (($('#catePEP').val().trim() == "")) {
        notaError("¡La categoria es obligatoria!");
        return false;
    }
    return true;
}

function validarMarcaPEP() {
    if (($('#marcaPEP').val().trim() == "")) {
        notaError("¡La marca es obligatoria!");
        return false;
    }
    return true;
}

function validarModeloPEP() {
    if (($('#modeloPEP').val().trim() == "")) {
        notaError("¡El modelo es obligatorio!");
        return false;
    }
    return true;
}

function validarAnioPEP() {
     if (($('#anioPEP').val().trim()=="")) {
        notaError("¡El año es obligatorio!");
        return false;
    }else if (($('#anioPEP').val().trim().length!=4)) {
        notaError("¡El año debe contener 4 dígitos!");
        return false;
    }
    return true;
}

function validarDescripcionPEP() {
    if (($('#descripcionPEP').val().trim() == "")) {
        notaError("¡La descripcion es obligatoria!");
        return false;
    }
    return true;
}

function validarStockPEP() {
    if (($('#stockPEP').val().trim()=="")) {
        notaError("¡El stock mínimo, es obligatorio!");
        return false;
    }
    return true;
}

function validarPrecioPEP() {
    if (($('#precioPEP').val().trim() == "")) {
        notaError("¡El precio es obligatorio!");
        return false;
    }
    return true;
}

async function validacionPrecio(){
    var param = {
        codigo: $('#codigoPEP').val(),
        precio: $('#precioPEP').val(),
        bandera: "unprecio"
    };
    return $.ajax({
        data: param,
        url:"/SISAUTO1/Controlador/productoC.php",
        method: "post",
        success: function(data){
            nuevoprecio = $('#precioPEP').val().trim();
            nuevoprecio = parseFloat(nuevoprecio);
            costopromedio = parseFloat(data);
            if (nuevoprecio > costopromedio) {
                aux = 1;
            }else{
                notaError("¡El precio del producto no puede ser menor al costo promedio de inventario!"); 
                aux = 0;
            }
        }
    });
}

function filtrarModelos(id){
    $('#modeloFiltrado').empty();
    $('#modeloFiltrado').append('<option value="">[Selecionar modelo y año]</option>');
    $.get('/SISAUTO1/Controlador/productoC.php?bandera=1&id='+id,function(data){
        console.log(data);
            $('#modeloFiltrado').append(data);
    });
}
