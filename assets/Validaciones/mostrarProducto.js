function mostrarProduc(codigoP,nombreP,cateP,marcaP,modeloP,anioP,descripcionP,stockP){
    var cate =["AMORTIGUADORES","BUJÍAS","COMBUSTIBLE","ELÉCTRICO","ENFRIAMIENTO","FILTROS","FRENOS","MOTOR","SENSORES","SUSPENSIÓN Y DIRECCIÓN","TRANSMISIÓN Y EMBRAGUE","UNIVERSALES"];

    $("#codigoP").val(codigoP);
    $("#nombreP").val(nombreP);
    $("#cateP").val(cate[parseInt(cateP)-1]);
    $("#marcaP").val(marcaP);
    $("#modeloP").val(modeloP);
    if(anioP!='0'){
       $("#anioP").val(anioP);
    }else{
       $("#anioP").val("");
    }
    $("#descripcionP").val(descripcionP);
    $("#stockP").val(stockP);
}

function mostrarProducP(codigoP,nombreP,cateP,marcaP,modeloP,anioP,descripcionP,stockP,precioP){
    var cate =["AMORTIGUADORES","BUJÍAS","COMBUSTIBLE","ELÉCTRICO","ENFRIAMIENTO","FILTROS","FRENOS","MOTOR","SENSORES","SUSPENSIÓN Y DIRECCIÓN","TRANSMISIÓN Y EMBRAGUE","UNIVERSALES"];

    $("#codigoPP").val(codigoP);
    $("#nombrePP").val(nombreP);
    $("#catePP").val(cate[parseInt(cateP)-1]);
    $("#marcaPP").val(marcaP);
    $("#modeloPP").val(modeloP);
    if(anioP!='0'){
       $("#anioPP").val(anioP);
    }else{
       $("#anioPP").val("");
    }
    $("#descripcionPP").val(descripcionP);
    $("#stockPP").val(stockP);
    var pre = parseFloat(precioP);
    $("#precioPP").val(pre.toFixed(2));
}

function editarProduc(codigoP,nombreP,cateP,marcaP,modeloP,anioP,descripcionP,idProducto,stockP){
    var cate =["AMORTIGUADORES","BUJÍAS","COMBUSTIBLE","ELÉCTRICO","ENFRIAMIENTO","FILTROS","FRENOS","MOTOR","SENSORES","SUSPENSIÓN Y DIRECCIÓN","TRANSMISIÓN Y EMBRAGUE","UNIVERSALES"];
    $("#codigoPE").val(codigoP);
    $("#nombrePE").val(nombreP);
    $("#catePE").val(cate[parseInt(cateP)-1]);
    $("#marcaPE").val(marcaP);
    $("#modeloPE").val(modeloP);
        if(anioP!='0'){
       $("#anioPE").val(anioP);
    }else{
       $("#anioPE").val("");
    }
    $("#descripcionPE").val(descripcionP);
    $("#idProducto").val(idProducto);
    if(cateP=="12"){
        $("#modeloPE").attr("disabled", "disabled");
        $("#anioPE").attr("disabled", "disabled");
        $('#universal').val(1);
    }else{
        $('#universal').val(0);
        $("#modeloPE").removeAttr("disabled");
        $("#anioPE").removeAttr("disabled");
    }
    $("#stockPE").val(stockP);
}

function editarProducP(codigoP,nombreP,cateP,marcaP,modeloP,anioP,descripcionP,idProducto,stockP,precioP){
    var cate =["AMORTIGUADORES","BUJÍAS","COMBUSTIBLE","ELÉCTRICO","ENFRIAMIENTO","FILTROS","FRENOS","MOTOR","SENSORES","SUSPENSIÓN Y DIRECCIÓN","TRANSMISIÓN Y EMBRAGUE","UNIVERSALES"];

    $("#codigoPEP").val(codigoP);
    $("#nombrePEP").val(nombreP);
    $("#catePEP").val(cate[parseInt(cateP)-1]);
    $("#marcaPEP").val(marcaP);
    $("#modeloPEP").val(modeloP);
        if(anioP!='0'){
       $("#anioPEP").val(anioP);
    }else{
       $("#anioPEP").val("");
    }
    $("#descripcionPEP").val(descripcionP);
    $("#idProducto").val(idProducto);
    if(cateP=="12"){
        $("#modeloPEP").attr("disabled", "disabled");
        $("#anioPEP").attr("disabled", "disabled");
        $('#universal').val(1);
    }else{
        $('#universal').val(0);
        $("#modeloPEP").removeAttr("disabled");
        $("#anioPEP").removeAttr("disabled");
    }
    $("#stockPEP").val(stockP);
    
    var pre = parseFloat(precioP);
    $("#precioPEP").val(pre.toFixed(2));
}
