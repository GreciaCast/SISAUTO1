<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
?>
<!DOCTYPE html>
<html lang="es">
<?php include("generalidades/apertura.php"); ?>
<body>
    <div id="wrapper">
        <?php include("generalidades/menu.php"); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2></h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php" style="font-size:15px;color:blue;">Inicio</a>
                    </li>
                    <li>
                        <a href="Producto.php" style="font-size:15px;color:blue;">Productos</a>
                    </li>
                    <li>
                        <a style="font-size:15px;">Registrar Producto</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <form class="form-horizontal" action="../Controlador/productoC.php" method="POST" id="guardarProd" align="center" autocomplete="off">
                                        <input type="hidden" value="guardar" name="bandera">
                                        <div class="form-group">
                                        </div>
                                        <div class="form-group ">
                                            <label  for="tele1" class="col-sm-3 control-label">Categoría:</label>
                                            <div  class="col-sm-2">
                                              <select name="categorias" style="width:600px;height:40px" class="form-control" id="categoriaPr" onchange="veruniversal(this.value);">
                                                <option value="">[Selecionar Categoría]</option>
                                                <option value="1">AMORTIGUADORES</option>
                                                <option value="2">BUJÍAS</option>
                                                <option value="4">ELÉCTRICO</option>
                                                <option value="5">ENFRIAMIENTO</option>
                                                <option value="6">FILTROS</option>
                                                <option value="7">FRENOS</option>
                                                <option value="8">MOTOR</option>
                                                <option value="9">SENSORES</option>
                                                <option value="10">SUSPENSIÓN Y DIRECCIÓN</option>
                                                <option value="11">TRANSMISIÓN Y EMBRAGUE</option>
                                                <option value="12">UNIVERSALES</option>
                                            </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="empresa" class="col-sm-3 control-label">Código:</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="text" name="codigoPro" value="" id="codigoP" readonly="readonly">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group ">
                                            <label for="empresa" class="col-sm-3 control-label">Nombre:</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" placeholder="Nombre del Producto" type="text" id="nombrePr" name="nombrePro">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group ">
                                            <label for="direccion" class="col-sm-3 control-label">Marca de producto:</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="text" name="marca" id="marcaPr" placeholder="Marca del Producto">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group ">
                                            <label for="responsable" class="col-sm-3 control-label">Modelo vehículo:</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="text" name="modelo" id="modeloPr" placeholder="Modelo de Auto">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group ">
                                            <label for="tel2" class="col-sm-3 control-label">Año vehículo: </label>
                                            <div class="col-sm-2">
                                                <input type="tel" class="form-control" type="number" id="anioPr" name="anio" placeholder="Año" onkeypress="return validarAnio(this,event,this.value)">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group ">
                                            <label for="tel2" class="col-sm-3 control-label">Descripción: </label>
                                            <div class="col-sm-15 col-md-7">
                                                <textarea type="text" class="form-control" name="descripcion"  placeholder="Escriba aqui..." id="descripcionPr"></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group ">
                                            <label for="tel2" class="col-sm-3 control-label">Stock mínimo: </label>
                                            <div class="col-sm-2">
                                                <input type="tel" class="form-control" type="number" id="stockPr" name="stock" placeholder="Stock" onkeypress="return validarEntero(this,event,this.value)">
                                            </div>
                                        </div>
                                        <br>
                                        <hr width="75%">
                                        <div class="form-group" align="center">
                                            <button title="Aceptar" type="button" class="btn" style="color:#fff; background-color:#28a745" onclick="validarProducto();">Aceptar</button>
                                            <button title="Cancelar" type="reset" value="Cancelar" class="btn " style="color:#fff; background-color:#ffc107">Cancelar</button>
                                            <input type="hidden" id="universal"value="0">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php include("generalidades/cierre.php"); ?>

            <script src="../assets/Validaciones/validarEntero.js"></script>
            <script src="../assets/Validaciones/validarNumeros.js"></script>
            <script src="../assets/Validaciones/validarProducto.js"></script>
            <script src="../assets/Validaciones/mostrarProducto.js"></script>
            <script type="text/javascript">
                function veruniversal(id) {
                    if ($('#categoriaPr').find('option:selected').text() == "UNIVERSALES") {
                        $('#universal').val(1);
    //                                        $("#marcaPr").attr("disabled", "disabled");
                        $("#modeloPr").attr("disabled", "disabled");
                        $("#anioPr").attr("disabled", "disabled");
                    } else {
                        $('#universal').val(0);
    //                                        $("#marcaPr").removeAttr("disabled");
                        $("#modeloPr").removeAttr("disabled");
                        $("#anioPr").removeAttr("disabled");
                    }

                    $.get('/SISANT/Controlador/datosProductoC.php?codigo=1&id='+id,function(data){
                        $('#codigoP').val(data);
                    });

                }
             </script>
             
        </div>
    </div>
</body>
</html>

<?php
}else{
    ?>
    <!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="refresh" content="0;URL=/SISANT/view/login.php">
</head>
<body>
</body>
</html>
    <?php
}
?>
