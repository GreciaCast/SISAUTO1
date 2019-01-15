<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
  ?>
  <?php 
  $cat = $_GET["idcategoria"];
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
       alert("El navegador no permite la impresion..");
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
          <td colspan="2"><strong class="titulos">REPORTE DE INVENTARIO</strong></td>
        </tr>
        <tr align="right">
          <td>&nbsp;</td>
          <td>FECHA IMPRESIÓN:  <?php echo date("d-m-Y"); ?>
            <br>
            HORA  IMPRESIÓN:   <?php
            date_default_timezone_set('America/El_Salvador');
            $date = new DateTime();
            echo $date->format('h:i:s A');
            ?></td>
          </tr>
        </table>

        <table width="685" border="0" align="center">
            <tr align="center">
              <br>
              <td ><strong class="titulos" align="center">CATEGORÍA: </strong>
              <?php 
              if($cat == '1'){
                echo "AMORTIGUADORES";
              }else if($cat == '2'){
                echo "BUJÍAS";
              }else if($cat == '4'){
                echo "ELÉCTRICO";
              }else if($cat == '5'){
                echo "ENFRIAMIENTO";
              }else if($cat == '6'){
                echo "FILTROS";
              }else if($cat == '7'){
                echo "FRENOS";
              }else if($cat == '8'){
                echo "MOTOR";
              }else if($cat == '9'){
                echo "SENSORES";
              }else if($cat == '10'){
                echo "SUSPENSIÓN Y DIRECCIÓN";
              }else if($cat == '11'){
                echo "TRANSMISIÓN Y EMBRAGUE";
              }else if($cat == '12'){
                echo "UNIVERSALES";
              }
               
              ?>
              </td>
            </tr>
          </table>
          <br><br>
        <table width="700" border="1" align="center" rules="all">
          <tr bgcolor="#CCCCCC">
            <td width="29" align="center" bgcolor="#fcf3b3" class=""><strong>N°</strong></td>
            <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Código Producto</td>
            <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Nombre</td>
            <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Existencias</td>
          </tr>
          <?php
          include("../../confi/Conexion.php");
          $conexion = conectarMysql();
          $contador = 1;
          $sql = "SELECT * FROM producto where categoria_Prod = '$cat'";
          $productos = mysqli_query($conexion,$sql);

          while($producto = mysqli_fetch_array($productos)){
            $idP = $producto[0];

            $sql1 = "SELECT nuevaExistencia_Inv from inventario where id_Producto = '$idP' order by idInventario desc";
            $inventarios = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
            $inventario = mysqli_fetch_array($inventarios);//CAPTURA EL ULTIMO REGISTRO
            if($inventario['nuevaExistencia_Inv'] != ""){
          ?>
              <tr align="left" class="">
                <td align="center" bgcolor=""><?php echo $contador;?></td>
                <td align="center" bgcolor=""><?php echo $producto[7];?></td>
                <td align="center" bgcolor=""><?php echo $producto[1].' ('.$producto[3].', '.$producto[4].' para '.$producto[5].' '.$producto[6].')';?></td>
                <td align="center" bgcolor=""><?php echo $inventario['nuevaExistencia_Inv'];?></td>
              </tr>
              <?php $contador++;
            }
          }
          ?>
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