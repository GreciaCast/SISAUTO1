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
        <?php include("funciones.php"); ?>
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
                    <a class="pull-right" >
                        <button class="btn btn-success" data-toggle="modal" data-target="#modalReporteCompras" style="font-size:16px;">
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
                                                                    <th style="width:30px">Fecha</th>
                                                                    <th style="width:50px">N° de factura</th>
                                                                    <th style="width:150px">Proveedor</th>
                                                                    <th align="center" style="width:2px">Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php While($compra = mysqli_fetch_assoc($compras)){?>
                                                                <tr>
                                                                    <td>
                                                                        <?php $fechaCom = explode("-",$compra['fecha_Com']);
                                                                        $fechaCom = $fechaCom[2].'/'.$fechaCom[1].'/'.$fechaCom[0];
                                                                        echo $fechaCom ?></td>
                                                                        <td><?php echo $compra['numFac_Com'] ?></td>
                                                                        <td>

                                                                            <?php
                                                                            $aux = $compra['id_Proveedor'];
                                                                            $sql1 = "SELECT nombre_Prov FROM proveedor where idProveedor = '$aux'";
                                                                            $proveedor = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
                                                                            $proveedor = mysqli_fetch_array($proveedor);
                                                                            echo $proveedor['nombre_Prov'];
                                                                            ?>
                                                                        </td>
                                                                        <th align="center">
                                                                            <button title="Ver" type="button" class="btn btn-info fa fa-eye" data-toggle="modal" data-target="#modalVerCompra" onclick="VerCom('<?php echo $compra['numFac_Com']?>','<?php echo $compra['fecha_Com']?>','<?php echo $compra['total_Com']?>','<?php echo $compra['idCompra']?>','<?php echo $compra['id_Proveedor']?>')">
                                                                            </button>
                                                                            <?php
                                                                            $resultado = verificar($compra['idCompra'] );
                                                                            if ($resultado) {

                                                                                ?>
                                                                                <button title="Editar" type="button" class="btn btn-success fa fa-pencil-square-o" data-toggle="modal" data-target="#modalEditarCompra" onclick="editarCom('<?php echo $compra['numFac_Com']?>','<?php echo $compra['fecha_Com']?>','<?php echo $compra['total_Com']?>','<?php echo $compra['idCompra']?>','<?php echo $compra['id_Proveedor']?>')">
                                                                                </button>
                                                                                <button title="Eliminar" type="button" class="btn btn-danger fa fa-trash-o" onclick="eliminarC(<?php echo $compra['idCompra'] ?>)">
                                                                                </button>
                                                                                <?php      
                                                                            }else{
                                                                               ?>
                                                                               <button title="No puede editar" type="button" class="btn btn-success fa fa-pencil-square-o disabled">
                                                                               </button>
                                                                               <button title="No puede eliminar" type="button" class="btn btn-danger fa fa-trash-o disabled">
                                                                               </button>
                                                                               <?php   
                                                                           }
                                                                           ?>
                                                                           <?php 
                                                                           $fechasumada= date("Y/m/d",strtotime($compra['fecha_Com']."+ 20 days"));
                                                                           if($fechasumada >= date("Y/m/d")){ 
                                                                            ?>
                                                                           <a  href="DevolucionesCompras.php?idcompra=<?php echo $compra['idCompra'] ?>">
                                                                            <button title="Devolución" type="button" class="btn btn-primary fa fa-times" >
                                                                            </button>
                                                                        </a>
                                                                        <?php  }else{?>

                                                                            <button title="No puede devolver" type="button" class="btn btn-primary fa fa-times disabled" >
                                                                            </button>
                                                                        <?php } ?>
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
                    <!-- MODAL VER COMPRA -->
                    <div class="modal fade" id="modalVerCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <?php
                        $sql="SELECT * from proveedor where tipo_Prov = 1 order by nombre_Prov ASC";
                        $proveedores= mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");
                        ?>
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#007bff;color:black;">

                                    <h3 class="modal-title" id="myModalLabel"> <i class="fa fa-user"></i> Ver Compra</h3>
                                </div>
                                <div class="modal-body">
                                 <h3 align="center"><b>Datos Generales</b></h3>
                                 <hr width="75%" style="background-color:#007bff;"/>
                                 <input type="hidden" name="bandera1"/>
                                 <div class="form-group ">
                                    <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Fecha:</label>
                                    <div class="col-sm-3 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input class="form-control" type="text" id="fechaVer" value="01/01/2018" disabled="true" aria-required="true" >
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Número de factura:</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="text" id="nummeroFacComVer" name="" disabled="true" aria-required="true" value="">
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group ">
                                    <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Proveedor:</label>
                                    <div class="col-sm-3">
                                        <!-- <input class="form-control" type="text" name="proveedorComE" id="proveedorComVer" readonly="readonly" aria-required="true" value=""> -->

                                        <select style="width:350px;height:40px" class="form-control" name="id_Proveedor" id="proveedorComVer" disabled="true" > 
                                            <?php

                                            While($proveedor=mysqli_fetch_array($proveedores)){
                                             echo '<option value="'.$proveedor['idProveedor'].'">'.$proveedor['nombre_Prov'].'</option>';
                                         }
                                         ?>
                                     </select>
                                 </div>
                             </div>
                             <br><br>

                             <div class="modal-footer">
                             </div>
                             <div class="card mb-3">
                                <div class="card-header" align="center">
                                    <h3><b>Detalle de compra</b></h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="width:10px">Cantidad</th>
                                                    <th style="width:200px">Producto</th>
                                                    <th style="width:30px">Precio unitario ($)</th>
                                                    <th style="width:30px">Subtotal ($)</th>
                                                </tr>
                                            </thead>
                                            <tbody id="productosVer">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer small text-muted"></div>
                            </div>
                            <br><br><br>
                            <div class="form-group ">
                                <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Total Compra:</label>
                                <div class="col-sm-5">
                                    <div class="input-group m-b"><span class="input-group-addon">$</span> <input type="number" class="form-control" id="totalComVer" disabled="true"></div>
                                </div>
                            </div>
                            <br><br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#007bff;color:black;font-size:15px;">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- MODAL EDITAR COMPRA -->
                <div class="modal fade" id="modalEditarCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                 <?php
                 $sql="SELECT * from proveedor where tipo_Prov = 1 order by nombre_Prov ASC";
                 $proveedores= mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");
                 ?>
                 <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#007bff;color:black;">

                            <h3 class="modal-title" id="myModalLabel"> <i class="fa fa-user"></i> Compra</h3>
                        </div>
                        <div class="modal-body">
                         <form action="../Controlador/comprasC.php" method="POST" id="editarCompra" align="center" autocomplete="off">
                            <h3><b>Datos generales</b></h3>
                            <hr width="75%" style="background-color:#007bff;"/><br>
                            <input type="hidden" value="EditarCom" name="bandera"/>
                            <input type="hidden" value="" name="idcompra" id="idcompra"/>
                            <div class="form-group row" id="data_2">
                                <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Numero de factura: </label>
                                <div class="col-sm-12 col-md-3">
                                    <input class="form-control" type="number" id="numFacCom" name="numFac_Com" placeholder="" style="width:150px;height:40px" readonly="readonly">
                                </div>

                                <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Fecha: </label>
                                <div class="col-sm-12 col-md-3 ">
                                    <input class="form-control" type="text" id="fecha" name="fecha_Com" value="01/01/2018" style="width:150px;height:40px" readonly="readonly">
                                </div>
                            </div>
                            <div>

                            </div>
                            <div class="form-group row">
                                <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Proveedor:</label>
                                <div class="col-sm-12 col-md-10">
                                    <input  id="proveedorComEditar" name="id_Proveedor" class="form-control" type="text" id="num" style="width:350px;height:40px" readonly="readonly">
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <h3><b>Datos del producto</b></h3>
                        <hr width="75%" style="background-color:#007bff;"/><br>
                        <div class="form-group row">
                            <label for="direccion" class="col-sm-12 col-md-2 col-form-label">Cantidad:</label>
                            <div class="col-sm-12 col-md-3">
                                <input class="form-control" type="text" id="cantidad" name="cantidadProd" placeholder="Cantidad" style="width:150px;height:40px" onkeypress="return validarCantidad(this,event,this.value)"><a id='mensajeCantidad'></a>
                            </div>
                            <label for="direccion" class="col-sm-12 col-md-2 col-form-label">Precio Unitario:</label>
                            <div class="col-sm-12 col-md-3">
                                <div class="input-group m-b">
                                    <span class="input-group-addon"><i class="fa fa-usd"></i></span> <input type="text" class="form-control" name="precioProd" id="precio" onkeypress="return validarPrecioUnitario(this,event,this.value)"><a id='mensajePrecio'></a>
                                </div>
                                <!-- <input class="form-control" type="number" placeholder="$" style="width:150px;height:40px"> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Categoría:</label>
                            <div class="col-sm-12 col-md-10">
                                <select style="width:400px;height:40px" class="form-control" id="categoriaPro" name="categorias" onchange="filtrarCategoria(this.value);">
                                    <option value="">[Selecionar categoría]</option>
                                    <option value="1">AMORTIGUADORES</option>
                                    <option value="2">BUJÍAS</option>
                                    <option value="3">COMBUSTIBLE</option>
                                    <option value="4">ELÉCTRICO</option>
                                    <option value="5">ENFRIAMIENTO</option>
                                    <option value="6">FILTROS</option>
                                    <option value="7">FRENOS</option>
                                    <option value="8">MOTOR</option>
                                    <option value="8">SENSORES</option>
                                    <option value="10">SUSPENSIÓN Y DIRECCIÓN</option>
                                    <option value="11">TRANSMISIÓN Y EMBRAGUE</option>
                                    <option value="12">UNIVERSALES</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="empresa" class="col-sm-12 col-md-2 col-form-label">Producto:</label>
                            <div class="col-sm-12 col-md-8">
                                <select  class="form-control" id="productoFiltrado" name="productos">
                                    <option value="">[Selecionar Producto]</option>
                                    <option value=""></option>
                                </select>
                            </div>
                                        <!-- <div class="col-sm-12 col-md-1">
                                            <button title="Ver caracteristicas" type="button" class="btn btn-info fa fa-eye" style="width:39px;height:39px" data-toggle="modal" data-target="#modalVerAddProducto"></button>
                                        </div> -->
                                    </div>
                                    <hr width="75%" /><br>
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-md-3">
                                        </div>
                                        <div class="col-sm-12 col-md-5">
                                            <a id='mensajeee1'></a>
                                        </div>
                                    </div>
                                    <div class="form-group" align="center">
                                        <button title="Agregar a tabla" type="button" class="btn btn-primary fa fa-plus" style="width:80px;height:40px" onclick="agregar();" ></button>
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
                                                            <th style="width:175px">Producto</th>
                                                            <th style="width:80px">Precio unitario ($)</th>
                                                            <th style="width:30px">Subtotal ($)</th>
                                                            <th style="width:50px">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablaProductos">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer small text-muted"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label align="right" for="nrc" class="col-sm-12 col-md-8 col-form-label">Total de compra:</label>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="input-group m-b"><span class="input-group-addon">$</span> <input type="number" class="form-control" id="total" name="total" readonly="readonly"></div>
                                            <!-- <input class="form-control" type="text" placeholder="$" style="width:150px;height:40px"> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <br><br>
                            <div class="modal-footer">
                              <input type="hidden" id="anterior" value=""  />
                              <button type="button" class="btn btn-default" style="background-color:#007bff;color:black;font-size:15px;" onclick="validarCompraE();">Aceptar</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#007bff;color:black;font-size:15px;">Cerrar</button>
                          </div>
                      </div>
                  </div>
              </div>

          </div>

          <script src="../assets/Validaciones/mostrarCompra.js"></script>
          <script src="../assets/Validaciones/validarCompras.js"></script>
          <script src="../assets/Validaciones/validarNumeros.js"></script>
          <script src="../assets/Validaciones/validarNuevaVenta.js"></script>
          <script src="../assets/js/plugins/chosen/chosen.jquery.js"></script>
          <script src="../assets/js/plugins/jsKnob/jquery.knob.js"></script>
          <script src="../assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>
          <script src="../assets/js/plugins/fullcalendar/moment.min.js"></script>
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

<!-- MODAL -->
<div class="modal inmodal" id="modalReporteCompras" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span class="sr-only">Cerrar</span></button> -->
                <i class="fa fa-check-square-o modal-icon"></i>
                <h4 class="modal-title">Reporte de Compras</h4>
                <small>...</small>
            </div>
            <div class="modal-body">
                <label for="empresa" class="col-sm-3 control-label">Reporte: </label>
                <div class="col-sm-6 i-checks">
                  <label><input type="button" id="r1" value="  " name="a" style="background:green" onclick="radioSeleccionado(1);"> Por proveedor</label>
                  <label><input type="button" id="r2" value="  " name="a" onclick="radioSeleccionado(2);"> Por fecha</label>
              </div>
              <div class=" form-group row" align="center">
               <br><br>
                <?php 
                $sql="SELECT * from proveedor where tipo_Prov = 1 order by nombre_Prov ASC";
                $proveedores = mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta"); 
                ?>
                <div class="col-sm-3 input-group" >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <select id="clientesID" name="id_Proveedor" aling="center" style="width:500px;height:40px" class="form-control"> 
                    <option value="">[Selecionar proveedor]</option>
                    <?php

                    While($proveedor=mysqli_fetch_array($proveedores)){
                       echo '<option value="'.$proveedor['idProveedor'].'">'.$proveedor['nombre_Prov'].'</option>';
                   }
                   ?>
               </select>
           </div>
       </div>
       <br>

       <div class="i-checks" align="center">
        <!-- <label> <input type="radio" value="option1" name="" align="left"> Fecha:</label> -->
        <br>

        <div class="form-group row" id="data_2">
            <?php

            date_default_timezone_set('america/el_salvador');
            $hora1 = date("A");
            $hoy = getdate();
            $hora = date("g");
            $dia = date("d");
            $fech = $dia.'/'.$hoy['mon'].'/'.$hoy['year'];                                           
            ?>
            <label for="empresa" class="col-sm-4 control-label">Desde: </label>
            <div class="col-sm-3 input-group date">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input id="fecha1" type="text" class="form-control" max="<?php echo $fech?>" style="width:150px;height:40px">
            </div>
        </div>

        <div class="form-group row" id="data_2" >

            <label for="empresa" class="col-sm-4 control-label">Hasta: </label>
            <div class="col-sm-3 input-group date">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input id="fecha2" type="text" class="form-control" max="<?php echo $fech?>" style="width:150px;height:40px">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
   <button type="button" class="btn btn-success" onclick="reporte();" style="font-size:14px;">
      Generar reporte
  </button>
  &nbsp;&nbsp;
  <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
  &nbsp;
</div>
</div>

</div>
</div>
</div>
</div>

<form method="POST" id="eliminarCom">
    <input type="hidden" name="id" id="idCom"  />
    <input type="hidden" name="bandera" id="banderaCom" />
</form>
</html>
<!-- ELIMINAR COMPRA -->
<script type="text/javascript">
    function eliminarC(id){
        swal({
            title: '¿Está seguro de eliminar?',
                  // text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si',
                  cancelButtonText: 'No',

              }).then((result) => {
                if(result.value){
                    $('#idCom').val(id);
                    $('#banderaCom').val('eliminar');
                    var dominio = window.location.host;
                    $('#eliminarCom').attr('action','http://'+dominio+'/SISAUTO1/Controlador/comprasC.php');
                    $('#eliminarCom').submit();
                }else{

                }
            })
          }

          function reporte(){
            desde = $('#fecha1').val();
            hasta = $('#fecha2').val();

            desde=desde.split('/').reverse().join('-');
            hasta=hasta.split('/').reverse().join('-');

            if (desde > hasta && hasta != "") {
                notaError("Verifique las fecha");
            }else{
                var dominio = window.location.host;
                window.open('http://'+dominio+'/SISAUTO1/view/Reportes/ReporteCompra.php?desde='+desde+'&hasta='+hasta,'_blank');
            }

        }
    </script>
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
