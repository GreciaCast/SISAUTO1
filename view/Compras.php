<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
    ?>
    <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
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
                        <a style="font-size:15px;"> Compras</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
        <?php
        $sql = "SELECT * from compra order by fecha_Com ASC";
        $compras = mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");
        ?>
        <div class="row">
            <div class="col-12">
                <div class="row" style="padding:20px">
                    <br>
                    <a class="pull-right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#modalEditarCompra" style="font-size:16px;">
                            Reporte
                            <span class="fa fa-file-pdf-o"></span>
                        </button>
                        &nbsp;
                    </a>
                    <a class="pull-right" href="AgregarCom.php">
                        <button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo" style="font-size:16px;">
                            Agregar nueva compra
                            <span class="fa fa-plus"></span>
                        </button>
                        &nbsp;
                    </a>
                    <br><br>
                    <!-- TABLA COMPRAS-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="wrapper wrapper-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ibox float-e-margins">
                                            <div class="ibox-content">
                                                <form class="form-horizontal" action="../Controlador/comprasC.php" method="POST" id="guardarCom" autocomplete="off">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered display" id="example">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:50px">Fecha/Hora</th>
                                                                    <th style="width:50px">Num Factura</th>
                                                                    <th style="width:150px">Proveedor</th>
                                                                    <th align="center" style="width:2px">Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php While($compra = mysqli_fetch_assoc($compras)){?>
                                                                <tr>
                                                                    <td><?php echo $compra['fecha_Com'] ?></td>
                                                                    <td><?php echo $compra['numFac_Com'] ?></td>
                                                                    <td><?php echo $compra['id_Proveedor'] ?></td>
                                                                    <th align="center">
                                                                        <button title="Ver" type="button" class="btn btn-info fa fa-eye">
                                                                        </button>
                                                                        <button title="Editar" type="button" class="btn btn-success fa fa-pencil-square-o" data-toggle="modal" data-target="#modalEditarCompra" onclick="editarPro('<?php echo $compra['numFac_Com']?>','<?php echo $compra['fecha_Com']?>','<?php echo $compra['total_Com']?>','<?php echo $compra['idCompra']?>')">
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL EDITAR COMPRA -->
                    <div class="modal fade" id="modalEditarCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#007bff;color:black;">

                                    <h3 class="modal-title" id="myModalLabel"> <i class="fa fa-user"></i> Compra</h3>
                                </div>
                                <div class="modal-body">
                                 <form action="../Controlador/proveedorC.php" method="POST" id="editarPro" align="center" autocomplete="off">
                                    <h3><b>Datos generales</b></h3>
                                    <hr width="75%" style="background-color:#007bff;"/><br>
                                    <input type="hidden" value="EditarCom" name="bandera"/>
                                    <input type="hidden" value="" name="idcompra" id="idcompra"/>
                                    <div class="form-group row">
                                        <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Fecha: </label>
                                        <div class="col-sm-12 col-md-3">
                                            <input class="form-control" type="number" id="fechaComEditar" placeholder="" style="width:150px;height:40px">
                                        </div>
                                        <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Numero de factura: </label>
                                        <div class="col-sm-12 col-md-3">
                                            <input class="form-control" type="number" id="nummeroFacComEditar" placeholder="" style="width:150px;height:40px">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Proveedor:</label>
                                        <div class="col-sm-12 col-md-10">
                                            <select style="width:600px;height:40px" class="form-control" id="proveedorComEditar"> 
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
                                            <input class="form-control" type="number" id="cantidadComEditar" placeholder="Cantidad" style="width:150px;height:40px">
                                        </div>
                                        <label for="direccion" class="col-sm-12 col-md-2 col-form-label">Precio Unitario:</label>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="input-group m-b"><span class="input-group-addon">$</span> <input type="number" class="form-control" id="preciouniComEditar"></div>
                                            <!-- <input class="form-control" type="number" placeholder="$" style="width:150px;height:40px"> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Categoria:</label>
                                        <div class="col-sm-12 col-md-10">
                                            <select style="width:400px;height:40px" class="form-control" id="categoriaComEditar"> 
                                                <option value="">[Selecionar Categoria]</option>
                                                <option value="">Suspensión</option>
                                                <option value="">Dirección</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Producto:</label>
                                        <div class="col-sm-12 col-md-8">
                                            <select  class="form-control" id="productoComEditar"> 
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
                                                            <td><button title="Editar" type="button" class="btn btn-success fa fa-pencil-square-o"></button>
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
                                            <div class="col-sm-12 col-md-3">
                                                <div class="input-group m-b"><span class="input-group-addon">$</span> <input type="number" class="form-control" id="totalComEditar"></div>
                                                <!-- <input class="form-control" type="text" placeholder="$" style="width:150px;height:40px"> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <br><br>
                                <div class="modal-footer">
                                  <input type="hidden" id="anterior" value=""  />
                                  <button type="button" class="btn btn-default" style="background-color:#007bff;color:black;font-size:15px;">Aceptar</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#007bff;color:black;font-size:15px;">Cerrar</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php include("generalidades/cierre.php"); ?>
      </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

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