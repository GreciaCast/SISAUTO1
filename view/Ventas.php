<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
  ?>
  <!DOCTYPE html>
  <html>
  <?php include("generalidades/apertura.php"); ?>
  <body>
   <div id="wrapper">
    <?php include("generalidades/menu.php"); ?>
    <!-- _____________________________________________________________ -->
    <div class="row wrapper border-bottom white-bg page-heading">
     <div class="col-lg-10">
      <h2></h2>
      <ol class="breadcrumb">
       <li>
        <a href="index.php" style="font-size:15px;color:blue;">Inicio</a>
      </li>
      <li>
        <a style="font-size:15px;">Ventas</a>
      </li>
    </ol>
  </div>
  <div class="col-lg-2">

  </div>
</div>
<?php if (!isset($_GET['tipo'])) {
 $tipo=1;
}else{
 $tipo = $_GET['tipo'];
}?>
<?php
$sql="SELECT * from venta order by fecha_Ven ASC";
$ventas= mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");
?>
<div class="row">
 <div class="col-12">
   <div class="row" style="padding:20px">
    <br>
    <a class="pull-right" href="Reportes/ReporteProveedor.php">
     <button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo" style="font-size:16px;">
      Reporte
      <span class="fa fa-file-pdf-o"></span>
    </button>
    &nbsp;
  </a>
  <?php if( $_SESSION['usuarioActivo']['tipo_Usu'] == 0 ){?>
  <?php  if ($tipo == 1) { ?>
  <a class="pull-right" href="/SISAUTO1/view/Proveedor.php?tipo=0">
   <button class="btn btn-success" style="font-size:16px;">
    Ver ventas anuladas  <i class="fa fa-bars"></i>
  </button>
  &nbsp;
</a>
<?php  }else{ ?>
<a class="pull-right" href="/SISAUTO1/view/Proveedor.php?tipo=1">
 <button class="btn btn-success" style="font-size:16px;">
  Ver proveedores activos <i class="fa fa-bars"></i>
</button>
&nbsp;
</a>
<?php } ?>
</div>
<?php } ?>
<div class="row">
 <div class="col-lg-12">
  <div class="wrapper wrapper-content">
   <div class="row">
    <div class="col-lg-12">
     <div class="ibox float-e-margins">
      <div class="ibox-content">
       <form class="form-horizontal" action="../Controlador/proveedorC.php" method="POST" id="guardarPro" autocomplete="off">
        <div class="table-responsive">
         <table class="table table-striped table-bordered display" id="example">
          <thead>
           <tr>
            <th style="width:150px">Fecha</th>
            <th style="width:80px">N° de factura</th>
            <th style="width:175px">Cliente</th>
            <?php if( $_SESSION['usuarioActivo']['tipo_Usu'] == 0 ){?>
            <th align="center" style="width:2px">Acciones</th>
            <?php  }else{ ?>
            <th align="center" style="width:2px">Acción</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
         <?php While($venta=mysqli_fetch_assoc($ventas)){?>
         <tr>
            <td>
            <?php $fechaVen = explode("-",$venta['fecha_Ven']);
            $fechaVen = $fechaVen[2].'/'.$fechaVen[1].'/'.$fechaVen[0];
            echo $fechaVen ?>
            </td>
            <td>
             <?php
             $aux = $venta['idVenta'];
             $sql1 = "SELECT numero_Fac FROM factura where id_Venta = '$aux'";
             $numFac = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
             $numFac= mysqli_fetch_array($numFac);
             echo $numFac['numero_Fac'];
             ?>
           </td>
           <td>
             <?php
             $aux = $venta['id_Cliente'];
             $sql1 = "SELECT nombre_Cli FROM cliente where idCliente = '$aux'";
             $cliente = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
             $cliente = mysqli_fetch_array($cliente);
             echo $cliente['nombre_Cli'];
             ?>
           </td>

           <th align="center">
            <button title="Ver" type="button" class="btn btn-info fa fa-eye" data-toggle="modal" data-target="#modalVerVenta" onclick="VerVen('<?php echo $venta['fecha_Ven']?>','<?php echo $venta['total_Ven']?>','<?php echo $venta['idVenta']?>','<?php echo $venta['id_Cliente']?>')" ></button>
            <?php  if ($tipo == 1) {

             ?>
             <button title="Anular" type="button" class="btn btn-warning fa fa-times" onclick="baja(<?php echo $proveedore['idProveedor'] ?>)"></button>
             <?php

           }else{ ?>
           <button title="Dar de alta" type="button" class="btn fa fa-arrow-circle-up" style="color:#fff; background-color:#28a745" onclick="alta(<?php echo $proveedore['idProveedor'] ?>)"></button>
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
<!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
</div>
<?php include("generalidades/cierre.php"); ?>
</div>

</div>




<!-- MODAL VER VENTAS-->
                    <div class="modal fade" id="modalVerVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <?php
                        $sql="SELECT * from cliente where tipo_Cli = 1 order by nombre_Cli ASC";
                        $clientes= mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");
                        ?>
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#007bff;color:black;">

                                    <h3 class="modal-title" id="myModalLabel"> <i class="fa fa-user"></i> Ver Venta</h3>
                                </div>
                                <div class="modal-body">
                                   <h3 align="center"><b>Datos Generales</b></h3>
                                   <hr width="75%" style="background-color:#007bff;"/>
                                   <input type="hidden" name="bandera1"/>
                                   <div class="form-group ">
                                    <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Fecha:</label>
                                    <div class="col-sm-3 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input class="form-control" type="text" id="fechaVen"  disabled="true" aria-required="true" >
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Número de factura:</label>
                                    <div class="col-sm-3">

                                        <input class="form-control" type="text" id="numeroFacVenVer" name="" disabled="true" aria-required="true" value="">
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group ">
                                    <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Cliente:</label>
                                    <div class="col-sm-3">
                                        <!-- <input class="form-control" type="text" name="proveedorComE" id="proveedorComVer" readonly="readonly" aria-required="true" value=""> -->

                                        <select style="width:350px;height:40px" class="form-control" name="id_Cliente" id="cliVenVer" disabled="true" > 
                                            <?php

                                            While($cliente=mysqli_fetch_array($clientes)){
                                               echo '<option value="'.$cliente['idCliente'].'">'.$cliente['nombre_Cli'].'</option>';
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
                                    <h3><b>Detalle de venta</b></h3>
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
                                <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Total Venta:</label>
                                <div class="col-sm-5">
                                    <div class="input-group m-b"><span class="input-group-addon">$</span> <input type="number" class="form-control" id="totalVenVer" disabled="true"></div>
                                </div>
                            </div>
                            <br><br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#007bff;color:black;font-size:15px;">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

<!-- _______________________________________________________________________________________ -->
<script src="../assets/Validaciones/mostrarVentas.js"></script>
<script src="../assets/Validaciones/mostrarProveedor.js"></script>
<script src="../assets/Validaciones/validarProveedor.js"></script>
<script src="../assets/Validaciones/validarCorreo.js"></script>
<script src="../assets/Validaciones/validarNombreCompletoUsuario.js"></script>

<script type="text/javascript">
  function baja(id){
    swal({
      title: '¿Está seguro en dar de baja?',
                  // text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si',
                  cancelButtonText: 'No',

                }).then((result) => {
                  if(result.value){
                    $('#idProv').val(id);
                    $('#banderaProv').val('cambio');
                    $('#valorProv').val('0');
                    var dominio = window.location.host;
                    $('#cambioProv').attr('action','http://'+dominio+'/SISAUTO1/Controlador/proveedorC.php');
                    $('#cambioProv').submit();
                  }else{

                  }
                })
              }

              function alta(id){
                swal({
                  title: '¿Está seguro en dar de alta?',
                  // text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si',
                  cancelButtonText: 'No',

                }).then((result) => {
                  if(result.value){
                    $('#idProv').val(id);
                    $('#banderaProv').val('cambio');
                    $('#valorProv').val('1');
                    var dominio = window.location.host;
                    $('#cambioProv').attr('action','http://'+dominio+'/SISAUTO1/Controlador/proveedorC.php');
                    $('#cambioProv').submit();
                  }else{

                  }
                })
              }
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
