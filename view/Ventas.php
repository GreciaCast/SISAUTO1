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
$sql="SELECT * from venta where estado_Ven='$tipo' order by fecha_Ven ASC";
$ventas= mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");
?>
<div class="row">
 <div class="col-12">
   <div class="row" style="padding:20px">
    <br>
    <a class="pull-right">
     <button class="btn btn-success" data-toggle="modal" data-target="#modalReporteVentas" style="font-size:16px;">
       Reporte
       <span class="fa fa-file-pdf-o"></span>
     </button>
     &nbsp;
   </a>
   <?php if( $_SESSION['usuarioActivo']['tipo_Usu'] == 0 ){?>
   <?php  if ($tipo == 0) { ?>
   <a class="pull-right" href="/SISAUTO1/view/Ventas.php?tipo=1">
     <button class="btn btn-success" style="font-size:16px;">
      Ver ventas anuladas<i class="fa fa-bars"></i>
    </button>
    &nbsp;
  </a>
  <?php  }else{ ?>
  <a class="pull-right" href="/SISAUTO1/view/Ventas.php?tipo=0">
   <button class="btn btn-success" style="font-size:16px;">
    Lista de ventas  <i class="fa fa-bars"></i>
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
            <?php if( $_SESSION['usuarioActivo']['tipo_Usu'] == 0 && $tipo == 0){?>
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
           $sql1 = "SELECT numero_Fac FROM facturaconsumidor where id_Venta = '$aux'";
           $numFac = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
           $numFac= mysqli_fetch_array($numFac);
           if($numFac['numero_Fac']!=""){
            echo $numFac['numero_Fac'];
            $nf=$numFac['numero_Fac'];
          }else{
            $sql1 = "SELECT numero_Fac FROM facturacredito where id_Venta = '$aux'";
           $numFac = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
           $numFac= mysqli_fetch_array($numFac);
           echo $numFac['numero_Fac'];
            $nf=$numFac['numero_Fac'];
          }
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
          <button title="Ver" type="button" class="btn btn-info fa fa-eye" data-toggle="modal" data-target="#modalVerVenta" onclick="VerVen('<?php echo $venta['fecha_Ven']?>','<?php echo $venta['total_Ven']?>','<?php echo $venta['idVenta']?>','<?php echo $venta['id_Cliente']?>','<?php echo $nf?>')" ></button>
          <?php  if ($tipo == 0) {

           ?>
           <button title="Anular" type="button" class="btn btn-warning fa fa-times" onclick="anular('<?php echo $venta['idVenta']?>');"></button>
           <?php

         } ?>
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

        <h3 class="modal-title" id="myModalLabel"> <i class="fa fa-user"></i> Ver venta</h3>
      </div>
      <div class="modal-body">
       <h3 align="center"><b>Datos Generales</b></h3>
       <hr width="75%" style="background-color:#007bff;"/>
       <input type="hidden" name="bandera1"/>
       <div class="form-group ">
        <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Fecha:</label>
        <div class="col-sm-3 input-group date">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          <input class="form-control" type="text" id="fechaVen"  disabled="true" aria-required="true">
        </div>
      </div>
      <br>
      <div class="form-group">
        <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Número de factura:</label>
        <div class="col-sm-3">
          <input class="form-control" type="text" id="numFacVer" name="" disabled="true" aria-required="true" >
       
         </div>
      </div>
      <br><br>
      <div class="form-group ">
        <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Cliente:</label>
        <div class="col-sm-3">
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

<!-- MODAL -->
<div class="modal inmodal" id="modalReporteVentas" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">

              <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button> -->

        <i class="fa fa-check-square-o modal-icon"></i>
        <h4 class="modal-title">Reporte de Ventas</h4>
        <small>...</small>
      </div>
      <div class="modal-body">
        <label for="empresa" class="col-sm-3 control-label">Reporte: </label>
        <div class="col-sm-6 i-checks">
          <label><input type="button" id="r1" value="  " name="a" style="background:green" onclick="radioSeleccionado(1);"> Por cliente</label>
          <label><input type="button" id="r2" value="  " name="a" onclick="radioSeleccionado(2);"> Por fecha</label>
        </div>
        <div class=" form-group row" align="center">
          <br><br>
          <?php
          $sql="SELECT * from cliente where tipo_Cli = 1 order by nombre_Cli ASC";
          $clientes= mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");
          ?>
          <!-- <label > <input type="radio" value="option1" name=""> Cliente:</label> -->

          <div class="col-sm-3 input-group" >
           &nbsp;&nbsp;&nbsp;&nbsp;
            <select id="clientesID" aling="center" name="clientesID" style="width:500px;height:40px" class="form-control" tabindex="2"> 
              <option value="">[Selecionar cliente]</option>
              <?php

              While($cliente=mysqli_fetch_array($clientes)){
               echo '<option value="'.$cliente['idCliente'].'">'.$cliente['nombre_Cli'].'</option>';
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
        <input type="hidden" id="tiporeporte" value="1" />
        <div class="form-group row" id="data_2">

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

<!-- _______________________________________________________________________________________ -->
<script src="../assets/Validaciones/mostrarVentas.js"></script>
<script src="../assets/Validaciones/mostrarProveedor.js"></script>
<script src="../assets/Validaciones/validarProveedor.js"></script>
<script src="../assets/Validaciones/validarCorreo.js"></script>
<script src="../assets/Validaciones/validarNombreCompletoUsuario.js"></script>
<script src="../assets/Validaciones/validarNuevaVenta.js"></script>

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

          //REPORTE------------------------------------------------------
              function reporte(){
                desde = $('#fecha1').val();
                hasta = $('#fecha2').val();

                idcliente = $('#clientesID').val();
                tipor = $('#tiporeporte').val();
                console.log(idcliente);

                desde=desde.split('/').reverse().join('-');
                hasta=hasta.split('/').reverse().join('-');

                if(tipor == '1' && idcliente == ""){
                  notaError("Debe seleccionar un cliente");

                }else if (desde > hasta && hasta !="") {
                  notaError("Verifique las fecha");
                }else{
                  var dominio = window.location.host;
                  window.open('http://'+dominio+'/SISAUTO1/view/Reportes/ReporteVenta.php?desde='+desde+'&hasta='+hasta+'&idcliente='+idcliente+'&tipor='+tipor,'_blank');
                }
              }

              function anular(id){
                aux='¿Está seguro? ¡El registro no podrá ser recuperado!'+
                '<label style="color: red;">Debe comentar la razón para anular la factura</label>'+
                '<input class="swal2-input" id="comentario" placeholder="Razón">';
                return swal({
                  title: 'Anular Venta',
                  html:aux,
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#DD6B55',
                  confirmButtonText: 'Si, ¡Anular!',
                  cancelButtonText: 'No, ¡Cancelar!',
                  confirmButtonClass: 'btn btn-danger',
                  cancelButtonClass: 'btn btn-light',
                  buttonsStyling: false
                }).then((result) => {
                  if (result.value) {
                    if($('#comentario').val().trim()==""){
                      anularVenta(id);
                    }else{
                      var dominio = window.location.host;
                      location.href ='http://'+dominio+'/SISAUTO1/Controlador/ventasC.php?'+ 'idventa='+id+'&comentario='+$('#comentario').val()+'&anular=1';
                    }
                  }
                });
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
