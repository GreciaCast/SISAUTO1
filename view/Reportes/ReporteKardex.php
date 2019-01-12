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
        <?php 

        include("../../confi/Conexion.php");
        $conexion = conectarMysql();
        $sql1 = "SELECT * FROM producto where idProducto ";
        $producto = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
        $producto = mysqli_fetch_array($producto); ?>

        <?php if($producto['descripcion_Prod'] == "Ninguna"){
         if($producto['categoria_Prod'] == 12){
           $nombreProKar = $producto['nombre_Prod'].' ('.$producto['marca_Prod'].')';
         }else{
          $nombreProKar = $producto['nombre_Prod'].' ('.$producto['marca_Prod'].', para '.$producto['modeloVehiculo_Prod'].' '.$producto['anioVehiculo_Prod'].') ';
        }
      }else{
       if($producto['categoria_Prod'] == 12){
        $nombreProKar = $producto['nombre_Prod'].' ('.$producto['marca_Prod'].', '.$producto['descripcion_Prod'].')';
      }else{
        $nombreProKar = $producto['nombre_Prod'].' ('.$producto['marca_Prod'].', '.$producto['descripcion_Prod'].' para '.$producto['modeloVehiculo_Prod'].' '.$producto['anioVehiculo_Prod'].') ';
      }
    }
    $sql1 = "SELECT * FROM inventario where id_Producto ";
    $inventarios = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta"); ?>
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
          <?php 
          echo $producto['codigo_Prod'];?>
          <br>
          PRODUCTO:
          &nbsp;
          <?php 
          echo  $nombreProKar;
          ?>
          <br>
          STOCK MÍNIMO:
          <?php echo $producto['stock_Prod'];
          ?>
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
         <?php While ($inventario = mysqli_fetch_assoc($inventarios)) { ?>

                      <tr align="center">
                       <td  align="center">
                         <?php $fechaK = explode("-",$inventario['fechaMovimiento_Inv']);
                         $fechaK = $fechaK[2].'/'.$fechaK[1].'/'.$fechaK[0];
                         echo $fechaK ?>
                         <td  align="center">
                           <?php if ($inventario["tipoMovimiento_Inv"]==0) {
                             echo "Compra";
                           } else if($inventario["tipoMovimiento_Inv"]==1){
                             echo "Venta";
                           } else if($inventario["tipoMovimiento_Inv"]==2){
                            echo "Modificación de la compra";
                          } else if($inventario["tipoMovimiento_Inv"]==3){
                           echo "Eliminación de la compra";
                         } else if($inventario["tipoMovimiento_Inv"]==4){
                           echo "Devolución de la compra";
                         } else if($inventario["tipoMovimiento_Inv"]==5){
                           echo "Anulación de la venta";
                         }

                         ?>
                         <?php if ($inventario["existencias_Inv"]<$inventario["nuevaExistencia_Inv"]) {
                          ?>
                          <td  align="center"><?php  echo $inventario["cantidad_Inv"];?></td>
                          <?php $v_unitarioen = $inventario["precio_Inv"];
                          $v_unitarioen = number_format($v_unitarioen, 2, '.', '');?>
                          <td  align="center">$<?php  echo $v_unitarioen ?></td>
                          <?php $v_totalen = $inventario["cantidad_Inv"]* $inventario["precio_Inv"]; 
                          $v_totalen = number_format($v_totalen, 2, '.', '');?>
                          <td  align="center">$<?php  echo $v_totalen ?></td><td></td><td></td> <td></td>
                          <?php

                        }else{
                          ?>

                            <td></td><td></td> <td></td>
                            <td  align="center"><?php  echo $inventario["cantidad_Inv"];?></td>
                            <td  align="center">$<?php  echo $inventario["precio_Inv"];?></td>
                            <td  align="center">$<?php  echo $inventario["cantidad_Inv"]* $inventario["precio_Inv"]; ?></td>
                            <?php
                          } ?>
                          <td  align="center"><?php  echo $inventario["nuevaExistencia_Inv"];?></td>
                            <td  align="center">$<?php  echo $inventario["nuevoPrecio_Inv"];?></td>
                            <td  align="center">$<?php  echo $inventario["nuevaExistencia_Inv"]* $inventario["nuevoPrecio_Inv"]; ?></td>
                            
                                     
                       </tr>
                       <?php  }?>
      </thead>

    </table>

    <form name="frmTesis" method="get" action="" id="frmTesis">
      <p align="center"><input class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo" style="font-size:17px;" type="button" name="IM" id="IM" value="IMPRIMIR" onClick="imprimir()"></p>
    </form>
    <p>&nbsp;</p>
  </body>
  </html>
