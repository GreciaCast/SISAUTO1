<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
?>
<!DOCTYPE html>
<html lang="es">
<script src="../assets/Validaciones/validarCliente.js"></script>
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
                        <a href="Compras.php" style="font-size:15px;color:blue;">Compras</a>
                    </li>
                    <li>
                        <a style="font-size:15px;">Registrar compra</a>
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
                                    <form class="form-horizontal" action="../Controlador/clienteC.php" method="POST" id="guardarCli" align="center" autocomplete="off">
                                    <h3><b>Datos generales</b></h3>
                                    <hr width="75%" style="background-color:#007bff;"/><br>
                                    <input type="hidden" value="GuardarCom" name="bandera"></input>
                                    <div class="form-group row">
                                        <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Fecha: </label>
                                        <div class="col-sm-12 col-md-3">
                                            <input class="form-control" type="number" id="num" placeholder="" style="width:150px;height:40px">
                                        </div>
                                        <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Numero de factura: </label>
                                        <div class="col-sm-12 col-md-3">
                                            <input class="form-control" type="number" id="num" placeholder="" style="width:150px;height:40px">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Proveedor:</label>
                                        <div class="col-sm-12 col-md-10">
                                            <select style="width:600px;height:40px" class="form-control"> 
                                                <option value="">[Selecionar Categoria]</option>
                                                <option value="">Suspensión</option>
                                                <option value="">Dirección</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br><br>
                                    <h3><b>Datos del producto</b></h3>
                                    <hr width="75%" style="background-color:#007bff;"/><br>
                                    <div class="form-group row">
                                        <label for="direccion" class="col-sm-12 col-md-2 col-form-label">Cantidad:</label>
                                        <div class="col-sm-12 col-md-3">
                                            <input class="form-control" type="number" placeholder="Cantidad" style="width:150px;height:40px">
                                        </div>
                                        <label for="direccion" class="col-sm-12 col-md-2 col-form-label">Precio Unitario:</label>
                                        <div class="col-sm-12 col-md-3">
                                            <input class="form-control" type="number" placeholder="$" style="width:150px;height:40px">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Categoria:</label>
                                        <div class="col-sm-12 col-md-10">
                                            <select style="width:400px;height:40px" class="form-control"> 
                                                <option value="">[Selecionar Categoria]</option>
                                                <option value="">Suspensión</option>
                                                <option value="">Dirección</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Producto:</label>
                                        <div class="col-sm-12 col-md-8">
                                            <select style="width:700px;height:40px" class="form-control"> 
                                                <option value="">[Selecionar Proveedor]</option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-1">
                                            <button title="Ver caracteristicas" type="button" class="btn btn-info fa fa-eye" style="width:39px;height:39px"></button>
                                        </div>
                                    </div>
                                    <hr width="75%" /><br>
                                    <div class="form-group" align="center">
                                        <button title="Agregar a tabla" type="button" class="btn btn-primary fa fa-plus" style="width:80px;height:40px"></button>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h3><b>Detalles de la compra</b></h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:10px">Cantidad</th>
                                                            <th style="width:200px">Producto</th>
                                                            <th style="width:30px">Precio unitario</th>
                                                            <th style="width:30px">Subtotal</th>
                                                            <td style="width:50px">Acciones</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>...</td>
                                                            <td>...</td>
                                                            <td>...</td>
                                                            <td>...</td>
                                                            <td><button title="Editar" type="button" class="btn btn-primary fa fa-pencil-square-o"></button>
                                                            <button title="Eliminar" type="button" class="btn btn-danger fa fa-trash"></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer small text-muted"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label align="right" for="nrc" class="col-sm-12 col-md-8 col-form-label">Total de compra:</label>
                                        <div class="col-sm-12 col-md-2">
                                            <input class="form-control" type="text" placeholder="$" style="width:150px;height:40px">
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group" id="data_1">
                                        <label class="font-noraml">Simple data input format</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
                                        </div>
                                    </div>

























































<div class="form-group">
    <label class="font-noraml">Basic example</label>
    <div class="input-group">
        <select data-placeholder="Choose a Country..." class="chosen-select" style="width: 350px; display: none;" tabindex="-1">
            <option value="">Select</option>
            <option value="United States">United States</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Aland Islands">Aland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
        </select>
        <div class="chosen-container chosen-container-single" style="width: 350px;" title="">
            <a class="chosen-single" tabindex="-1">
                <span>Select</span>
                <div><b>
                    
                </b></div>
            </a>
            <div class="chosen-drop">
                <div class="chosen-search">
                    <input type="text" autocomplete="off" tabindex="2"></div><ul class="chosen-results">
                        <li class="active-result result-selected" data-option-array-index="0" style="">Select</li>
                        <li class="active-result" data-option-array-index="1" style="">United States</li>
                        <li class="active-result" data-option-array-index="2" style="">United Kingdom</li>
                        <li class="active-result" data-option-array-index="3" style="">Afghanistan</li>
                        <li class="active-result" data-option-array-index="4" style="">Aland Islands</li>
                        <li class="active-result" data-option-array-index="5" style="">Albania</li>
                        <li class="active-result" data-option-array-index="6" style="">Algeria</li>
                        <li class="active-result" data-option-array-index="7" style="">American Samoa</li>
                        <li class="active-result" data-option-array-index="8" style="">Andorra</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>






















                            


























                                    <hr width="75%">
                                        <div class="form-group" align="center">
                                            <button title="Aceptar" type="button" class="btn" style="color:#fff; background-color:#28a745; width:90px; height:40px" onclick="">Aceptar</button>
                                            <button title="Cancelar" type="reset" value="Cancelar" class="btn " style="color:#fff; background-color:#ffc107; width:90px; height:40px" >Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
                    <?php include("generalidades/cierre.php"); ?>
                    <script src="../assets/Validaciones/validarCliente.js"></script>
                    <script src="../assets/js/plugins/chosen/chosen.jquery.js"></script>
                    <script src="../assets/js/plugins/jsKnob/jquery.knob.js"></script>
                    <script src="../assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>
                    <script src="../assets/js/plugins/fullcalendar/moment.min.js"></script>
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
<meta http-equiv="refresh" content="0;URL=/SISAUTO1/view/login.php">
</head>
<body>
</body>
</html>
    <?php
}
?>