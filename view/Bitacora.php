
<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
  if ($_SESSION['usuarioActivo']['tipo_Usu']=='0') {
    ?>
    <!DOCTYPE html>
    <html>
    <?php include("generalidades/apertura.php"); ?>
    <body>
      <div id="wrapper">
        <?php include("generalidades/menu.php"); ?>
        <!--  -->
        <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
            <h2></h2>
            <ol class="breadcrumb">
              <li>
                <a href="index.php" style="font-size:15px;color:blue;">Inicio</a>
              </li>
              <li>
                <a style="font-size:15px;">Bitácora</a>
              </li>
            </ol>
          </div>
          <div class="col-lg-2">

          </div>
        </div>

  <?php
  $sql = "SELECT * from bitacora order by idBitacora DESC";
  $bitacoras = mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");
  ?>
  <div class="row">
    <div class="col-12">
      <div class="row" style="padding:20px">
        <br>
        <a class="pull-right">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalReporteBitacora" style="font-size:16px;">
            Reporte
            <span class="fa fa-file-pdf-o"></span>
          </button>
          &nbsp;
        </a>

      <!-- <a class="pull-right" href="Reportes/bitacora.php">
        <button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo" style="font-size:16px;">
          Reporte
          <span class="fa fa-file-pdf-o"></span>
        </button>
        &nbsp;
      </a> -->

      <!-- <?php  if ($tipo == 0) { ?>
       <?php  }else{ ?>
     -->
   </div>
   <!-- <?php } ?> -->
   <div class="row">
    <div class="col-lg-12">
      <div class="wrapper wrapper-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox float-e-margins">
              <div class="ibox-content">
                <form class="form-horizontal" action="../Controlador/logear.php" method="POST" id="var" autocomplete="off">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered display" id="example">
                      <thead>
                        <tr>
                          <th style="width:30px">Fecha</th>
                          <th style="width:30px">Hora</th>
                          <th style="width:40px">Usuario</th>
                          <th style="width:150px">Actividad</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php While ($bitacora = mysqli_fetch_assoc($bitacoras)) {
                         date_default_timezone_set('America/El_Salvador');
                         ?>

                         <tr>
                          <td><?php echo date('d/m/Y',strtotime($bitacora['sesionInicio'])) ?></td>
                          <td><?php echo date('H:i:s A',strtotime($bitacora['sesionInicio'])) ?></td>
                          <td><?php echo $bitacora['usuario_Usu'] ?></td>
                          <td><?php echo $bitacora['actividad'] ?></td>
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
<!--  -->
</div>
<?php include("generalidades/cierre.php"); ?>


<!-- MODAL -->
<div class="modal inmodal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Seleccione</h4>
      </div>
      <div class="modal-body">
        <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
          printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
          remaining essentially unchanged.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div><!--______________________________________________________________________________________-->

  <!-- MODAL REPORTE BITACORA-->
  <div class="modal inmodal" id="modalReporteBitacora" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content animated fadeIn">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
          <i class="fa fa-check-square-o modal-icon"></i>
          <h4 class="modal-title">Reporte de Bitácora</h4>
          <small>...</small>
        </div>
        <div class="modal-body">
          <label for="empresa" class="col-sm-3 control-label">Reporte: </label>
          <div class="col-sm-6 i-checks">
            <label><input type="button" id="r1" value="  " name="a" style="background:green" onclick="radioSeleccionado(1);"> Por usuario</label>
            <label><input type="button" id="r2" value="  " name="a" onclick="radioSeleccionado(2);"> Por fecha</label>
          </div>
          <div class=" form-group row" align="center">
            <br><br>

            <!-- <label > <input type="radio" value="option1" name=""> Cliente:</label> -->
            <?php 
            $sql="SELECT * from usuario where estado_Usu = 1 order by nombre_Usu ASC";
            $usuarios = mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta"); 
            ?>
            <div class="col-sm-3 input-group" >
              <div class="col-sm-2">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <select id="usuariosID" name="id_Usuario" aling="center" style="width:500px;height:40px" class="form-control"> 
                    <option value="">[Selecionar usuario]</option>
                    <?php

                    While($usuario=mysqli_fetch_array($usuarios)){
                       echo '<option value="'.$usuario['idUsuario'].'">'.$usuario['nombre_Usu'].'</option>';
                   }
                   ?>
               </select>
              </div>
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
              <label for="empresa" class="col-sm-3 control-label">Desde: </label>
              <div class="col-sm-3 input-group date">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input id="fecha1" type="text" class="form-control" max="<?php echo $fech?>" style="width:150px;height:40px">
              </div>
            </div>
            <input type="hidden" id="tiporeporte" value="1" />
            <div class="form-group row" id="data_2">

              <label for="empresa" class="col-sm-3 control-label">Hasta: </label>
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

<script src="../assets/Validaciones/validarNuevaVenta.js"></script>

<script type="text/javascript">
  //REPORTE------------------------------------------------------
  function reporte(){
    desde = $('#fecha1').val();
    hasta = $('#fecha2').val();

     idusuario = $('#usuariosID').val();
     tipor = $('#tiporeporte').val();

    desde=desde.split('/').reverse().join('-');
    hasta=hasta.split('/').reverse().join('-');

    if(tipor == '1' && idusuario == ""){
      notaError("Debe seleccionar un usuario");

    }else if(desde > hasta) {
      notaError("Verifique las fecha");
    }else{
      var dominio = window.location.host;
      window.open('http://'+dominio+'/SISAUTO1/view/Reportes/ReporteBitacora.php?desde='+desde+'&hasta='+hasta+'&idusuario='+idusuario+'&tipor='+tipor,'_blank');
    }

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
    <meta http-equiv="refresh" content="0;URL=/SISAUTO1/view/index.php">
  </head>
  <body>
  </body>
  </html>
  <?php
}
?>
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
