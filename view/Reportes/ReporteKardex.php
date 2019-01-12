<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">

  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">

  <link href="../assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
  <link href="../assets/package/dist/sweetalert2.css" rel="stylesheet">

  <!-- Toastr style -->
  <link href="../assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

  <!-- Gritter -->
  <link href="../assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

  <link href="../assets/css/animate.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/pNotify/pnotify.custom.min.css" rel="stylesheet">
  <script src="../assets/package/dist/sweetalert2.js"></script>

  <link href="../assets/css/plugins/iCheck/custom.css" rel="stylesheet">
  <link href="../assets/css/plugins/chosen/chosen.css" rel="stylesheet">
  <link href="../assets/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
  <link href="../assets/css/plugins/cropper/cropper.min.css" rel="stylesheet">
  <link href="../assets/css/plugins/switchery/switchery.css" rel="stylesheet">
  <link href="../assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
  <link href="../assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
  <link href="../assets/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
  <link href="../assets/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
  <link href="../assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
  <link href="../assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
  <link href="../assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
  <link href="../assets/css/plugins/select2/select2.min.css" rel="stylesheet">
  <link href="../assets/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
  <link href="../assets/css/animate.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">


  <script language="javascript">
   function imprimir(){
    if(!window.print){
     alert("El navegador no permite la impresión..");
     return;
   }
   else{
    document.frmTesis.IM.style.visibility="hidden";
    window.print();
    document.frmTesis.IM.style.visibility="visible";
  }
}
</script>
</head>

<body>
  <table width="685" border="0" align="center">
    <tr>
      <td width="5"><img src="../../assets/img/aut3.png" width="150" height="75"> </td>

      <td  align="center">
        <span class="titulos"><p style="font-size: 25px; font-family: sans-serif">Auto-Repuestos Vaquerano</p>
          <p>4a Avenida Norte y 3a Calle Oriente Barrio El Santuario, San Vicente.</p>
          <p>Teléfono: 2393-0214.</p></span></td>
        </tr>
        <tr align="center">
          <p><td colspan="6" align="center"><strong class="titulos">KARDEX COSTO PROMEDIO</strong></td>

          </tr>

          <tr align="right">
            <td>&nbsp;</td>
            <td>FECHA IMPRESIÓN:  
              <?php
              date_default_timezone_set('america/el_salvador');
              $hora1 = date("A");
              $hoy = getdate();
              $hora = date("g");
              $dia = date("d");
              $fech = $dia.'/'.$hoy['mon'].'/'.$hoy['year'];

              echo $fech;
              ?>
              <br>
              HORA  IMPRESIÓN:   <?php
              date_default_timezone_set('America/El_Salvador');
              $date = new DateTime();
              echo $date->format('h:i A');
              ?>
            </td>
          </tr>
          <tr align="left">
            <td width="5">
              <br >
              CÓDIGO:
            <?php  ?>

              <br>
              PRODUCTO:
              <?php  ?>
              <br>
              STOCK MÍNIMO:
              <?php  ?>
            </td>
          </tr>
        </table>

        <br>

        <table width="900" border="1" align="center" rules="all">
          <thead align="center" style="width:100%">
            <tr align="center">
              <th rowspan="2" style="width:95px" align="center">Fecha</th>
              <th rowspan="2" align="center">Detalle</th>
              <th colspan="3" align="center">Entradas</th>                               
              <th colspan="3" align="center">Salidas</th>
              <th colspan="3" align="center">Existencias</th>
            </tr>
            <tr>
              <th style="width:28px" align="center">Cantidad</th>
              <th style="width:28px" align="center">V/Unitario</th>
              <th style="width:28px" align="center">V/Total</th>                             
              <th style="width:28px" align="center">Cantidad</th>
              <th style="width:28px" align="center">V/Unitario</th>
              <th style="width:28px" align="center">V/Total</th>
              <th style="width:28px" align="center">Cantidad</th>
              <th style="width:28px" align="center">V/Unitario</th>
              <th style="width:28px" align="center">V/Total</th>
            </tr>
            <?php 

            include("../../confi/Conexion.php");
            $conexion = conectarMysql();
            ?>


          </thead>

        </table>

        <form name="frmTesis" method="get" action="" id="frmTesis">
          <p align="center"><input class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo" style="font-size:17px;" type="button" name="IM" id="IM" value="IMPRIMIR" onClick="imprimir()"></p>
        </form>
        <p>&nbsp;</p>
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