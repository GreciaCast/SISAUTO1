<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="1" />
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
      } else{
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
      <?php
      include("../../confi/Conexion.php");
      $conexion = conectarMysql();

      $sql1 = "SELECT * FROM facturacredito order by idFactura desc";
      $resultadof = mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());
      $resultadof = mysqli_fetch_array($resultadof);

      ?>
      <td  align="center">
        <span class="titulos">
          <p style="font-size: 20px; font-family: sans-serif">AUTO REPUESTOS <br>VAQUERANO
          </p>
          <p>4a Av. Norte, Bo. El Santuario #20, <br>San Vicente.<br>Tel.: 2393-0214.<br>ANGEL DE JESUS VAQUERANO NOVOA</p>
        </span>
      </td>
      <td>
        <p align="center">COMPROBANTE DE CREDITO FISCAL<br>FACTURA 17SV000C</p>
        <p style="font-size: 25px;" align="center">No. <?php echo $resultadof['numero_Fac'];?></p>
        <p align="center">REGISTRO No.: 79906-8 <br>NIT.: 1010-160856-001-0</p>
      </td>
    </tr>
    <tr>
      <!-- <td align="center">h</td> -->
      <td align="center" colspan="2"><strong class="titulos">COMPRA Y VENTA<br>DE REPUESTOS AUTOMOTORES</strong></td>
      <td align="right">
        <p>DIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AÑO</p>
        <?php
        date_default_timezone_set('america/el_salvador');
        $hora1 = date("A");
        $hoy = getdate();
        $hora = date("g");
        $dia = date("d");
        $fech = $dia.'/'.$hoy['mon'].'/'.$hoy['year'];
        echo $dia;
        ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php
        if ($hoy['mon'] == 1) {
          echo "Enero";
        }else if ($hoy['mon'] == 2) {
          echo "Febrero";
        }else if ($hoy['mon'] == 3) {
          echo "Marzo";
        }else if ($hoy['mon'] == 4) {
          echo "Abril";
        }else if ($hoy['mon'] == 5) {
          echo "Mayo";
        }else if ($hoy['mon'] == 6) {
          echo "Junio";
        }else if ($hoy['mon'] == 7) {
          echo "Julio";
        }else if ($hoy['mon'] == 8) {
          echo "Agosto";
        }else if ($hoy['mon'] == 9) {
          echo "Septiembre";
        }else if ($hoy['mon'] == 10) {
          echo "Octubre";
        }else if ($hoy['mon'] == 11) {
          echo "Noviembre";
        }else if ($hoy['mon'] == 12) {
          echo "Diciembre";
        }else {
          echo $hoy['mon'];
        }
        ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $hoy['year'];?>
      </td>
    </tr>
  </table>
<?php


  $sql1 = "SELECT * FROM venta order by idVenta desc";
  $resultado = mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());
  $resultado = mysqli_fetch_array($resultado);
  $id = $resultado['idVenta'];
  $clienteId = $resultado['id_Cliente'];


  $sql2 = "SELECT * FROM cliente where idCliente = '$clienteId'";
  $resultadooo = mysqli_query($conexion,$sql2) or die ("Error a Conectar en la BD".mysqli_connect_error());
  $res = mysqli_fetch_assoc($resultadooo);


?>
  <table width="700" border="1px" rules="all" align="center">
    <tr>
      <td width="450">Cliente: <?php echo $res['nombre_Cli']; ?></td>
      <td width="250">N.I.T. No.: </td>
    </tr>
    <tr>
      <td>Direccion: </td>
      <td>Registro: <?php echo $res['nrc_Cli']; ?></td>
    </tr>
  </table>
  <table width="700" border="1px" rules="all" align="center">
    <tr>
      <td>No. de Nota de Remision: </td>
      <td width="200">Municipio: </td>
      <td width="248">Depto: </td>
    </tr>
  </table>
  <table width="700" border="1px" rules="all" align="center">
    <tr>
      <td>Fecha de N. de Remision Ant: </td>
      <td>Venta a Cuenta de: </td>
    </tr>
    <tr>
      <td>Giro: </td>
      <td>Cond de la Operacion: </td>
    </tr>
  </table>

  <br>

  <table width="700" border="1" align="center" rules="all">
      <tr bgcolor="#c4eeff">
        <td width="10" align="center" bgcolor="#c4eeff" class=""><strong>CANT.</strong></td>
        <td width="300" align="center" bgcolor="#c4eeff" class="formatoTabla">DESCRIPCION</td>
        <td width="10" align="center" bgcolor="#c4eeff" class="formatoTabla">PRECIO UNITARIO</td>
        <td width="10" align="center" bgcolor="#c4eeff" class="formatoTabla">V. NO S.</td>
        <td width="10" align="center" bgcolor="#c4eeff" class="formatoTabla">V. E.</td>
        <td width="10" align="center" bgcolor="#c4eeff" class="formatoTabla">VENTAS AFECTAS</td>
      </tr>
      <?php
      







      $sql2 = "SELECT * FROM detalleventa WHERE id_Venta = '$id' order by idDetalleVenta desc";
      $resultadooS = mysqli_query($conexion,$sql2) or die ("Error a Conectar en la BD".mysqli_connect_error());
      

      $contador = 0;
      // $sql = "select * from usuario where estado_Usu = 1 order by nombre_Usu ASC";
      // $consulta = mysqli_query($conexion,$sql);

      $fila = 13;
      //while($fila = mysqli_fetch_array($consulta)){
      while($resultadoo = mysqli_fetch_array($resultadooS)){ 
      ?>

      <?php

      $productoId = $resultadoo['id_Producto'];
      $sql2 = "SELECT * FROM producto WHERE idProducto = '$productoId'";
      $resultadoP = mysqli_query($conexion,$sql2) or die ("Error a Conectar en la BD".mysqli_connect_error());
      $resP = mysqli_fetch_assoc($resultadoP);
      ?>

        <tr align="left" class="">
          <td align="center" bgcolor=""><?php echo $resultadoo['cantidad_DVen'];?></td>
          <td bgcolor=""><?php echo $resP['nombre_Prod'].' '.$resP['marca_Prod'];?></td>
          <td align="right" bgcolor="">
            <?php
            $preciosiniva = $resultadoo['precio_DVen'] - ($resultadoo['precio_DVen'] * 0.13);
            echo round($preciosiniva,2);
            ?>
          </td>
          <td bgcolor=""><?php  ?></td>
          <td bgcolor=""><?php  ?></td>
          <td align="right" bgcolor="">
            <?php
            $subtotalsiniva = $resultadoo['cantidad_DVen'] * $preciosiniva;
            echo round($subtotalsiniva,2);
            ?>
          </td>
        </tr>
        <?php 
        $contador++;
       }
       $a = 0;
       $fila = $fila - $contador;
       while($a < $fila){ 
      ?>
        <tr align="left" class="">
          <td align="center" bgcolor=""><?php echo ".";?></td>
          <td bgcolor=""><?php  ?></td>
          <td bgcolor=""><?php  ?></td>
          <td bgcolor=""><?php  ?></td>
          <td bgcolor=""><?php  ?></td>
          <td bgcolor=""><?php  ?></td>
        </tr>
        <?php 
        $a++;
       }



       ?> 
  </table>
  <table width="700" border="1" align="center" rules="all">
    <tr>
      <td width="400" bgcolor=""><?php echo "SON: ";?> 
      </td>
      <td width="158" bgcolor=""><?php echo "SUMAS"?>
      </td>
      <td width="31" bgcolor=""><?php  ?>
      </td>
      <td width="18" bgcolor=""><?php  ?>
      </td>
      <td align="right" width="93" bgcolor=""><?php echo round($subtotalsiniva,2);?>
      </td>
    </tr>
  </table>
  <table width="700" border="1" align="center" rules="all">
    <tr>
      <td width="400" bgcolor=""><?php echo ".";?> 
      </td>
      <td width="158" bgcolor=""><?php echo "IVA"?>
      </td>
      <td width="53" bgcolor="#c4eeff"><?php  ?>
      </td>
      <td align="right" width="92" bgcolor="">
        <?php 
        $var = (($resultado['total_Ven']) * 0.13);
        echo round($var,2);
        ?>
      </td>
    </tr>
  </table>
  <table width="700" border="1" align="center" rules="all">
    <tr>
      <td width="397" bgcolor=""><?php echo "Llenar si la operacion es igual o Superior a $11,428.58";?> 
      </td>
      <td rowspan="4" width="158" bgcolor=""><?php echo "SUB-TOTAL"?>
      </td>
      <td width="53" bgcolor="#c4eeff"><?php  ?>
      </td>
      <td align="right" width="92" bgcolor=""><?php echo $resultado['total_Ven'];?>
      </td>
    </tr> 
  </table>
  <table width="700" border="1" align="center" rules="all">
    <tr>
      <td width="400" bgcolor=""><?php echo ".";?> 
      </td>
      <td rowspan="4" width="158" bgcolor=""><?php echo " (-) IVA RETENIDO"?>
      </td>
      <td width="53" bgcolor="#c4eeff"><?php  ?>
      </td>
      <td width="92" bgcolor=""><?php  ?>
      </td>
    </tr> 
  </table>
  <table width="700" border="1" align="center" rules="all">
    <tr>
      <td width="198" bgcolor=""><?php echo "Nombre: ";?> 
      </td>
      <td width="198" bgcolor=""><?php echo "Nombre: ";?> 
      </td>
      <td width="158" bgcolor=""><?php echo "VENTAS NO SUJETAS"?>
      </td>
      <td width="53" bgcolor="#c4eeff"><?php  ?>
      </td>
      <td width="92" bgcolor=""><?php  ?>
      </td>
    </tr> 
  </table>
  <table width="700" border="1" align="center" rules="all">
    <tr>
      <td width="198" bgcolor=""><?php echo "NIT./DUI.:";?> 
      </td>
      <td width="198" bgcolor=""><?php echo "NIT./DUI.:";?> 
      </td>
      <td width="158" bgcolor=""><?php echo "VENTAS EXENTAS"?>
      </td>
      <td width="53" bgcolor="#c4eeff"><?php  ?>
      </td>
      <td width="92" bgcolor=""><?php  ?>
      </td>
    </tr> 
  </table>
  <table width="700" border="1" align="center" rules="all">
    <tr>
      <td width="198" bgcolor=""><?php echo "Firma Entregado:";?> 
      </td>
      <td width="198" bgcolor=""><?php echo "Firma recibido: ";?> 
      </td>
      <td width="160" bgcolor=""><?php echo "VENTAS TOTAL"?>
      </td>
      <td width="53" bgcolor="#c4eeff"><?php  ?>
      </td>
      <td align="right" width="92" bgcolor=""><?php echo $resultado['total_Ven'];?>
      </td>
    </tr> 
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