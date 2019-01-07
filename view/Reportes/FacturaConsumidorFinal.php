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

      <td  align="center">
        <span class="titulos">
          <p style="font-size: 20px; font-family: sans-serif">AUTO REPUESTOS <br>VAQUERANO
          </p>
          <p>4a Av. Norte, Bo. El Santuario #20, <br>San Vicente.<br>Tel.: 2393-0214.<br>ANGEL DE JESUS VAQUERANO NOVOA</p>
        </span>
      </td>
      <td>
        <p align="center">FACTURA 18VS000F</p>
        <p>No. </p>
        <p align="center">REGISTRO No.: 79905-8 <br>NIT.: 1010-160856-001-0</p>
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

  <table width="700" border="1" rules="all" align="center">
    <tr>
      <td width="450">Cliente: </td>
      <td width="250">N.I.T. No.: </td>
    </tr>
    <tr>
      <td>Direccion: </td>
      <td>Depto: </td>
    </tr>
    <tr>
      <td>Municipio: </td>
      <td>Venta a Cuenta de: </td>
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
      include("../../confi/Conexion.php");
      $conexion = conectarMysql();


      $contador = 1;
      $sql = "select * from usuario where estado_Usu = 1 order by nombre_Usu ASC";
      $consulta = mysqli_query($conexion,$sql);

      $fila = 13;
      //while($fila = mysqli_fetch_array($consulta)){
      while($contador <= $fila){ 
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
        $contador++;
       }
       ?> 
  </table>
  <table width="700" border="1" align="center" rules="all">
    <tr>
      <td width="400" bgcolor=""><?php echo ".";?> 
      </td>
      <td width="158" bgcolor=""><?php  ?>
      </td>
      <td width="31" bgcolor=""><?php  ?>
      </td>
      <td width="18" bgcolor=""><?php  ?>
      </td>
      <td width="93" bgcolor=""><?php  ?>
      </td>
    </tr>
  </table>
  <table width="700" border="1" align="center" rules="all">
    <tr>
      <td width="397" bgcolor=""><?php echo ".";?> 
      </td>
      <td rowspan="4" width="158" bgcolor=""><?php  ?>
      </td>
      <td width="53" bgcolor="#c4eeff"><?php  ?>
      </td>
      <td width="92" bgcolor=""><?php  ?>
      </td>
    </tr> 
  </table>
  <table width="700" border="1" align="center" rules="all">
    <tr>
      <td width="198" bgcolor=""><?php echo ".";?> 
      </td>
      <td width="198" bgcolor=""><?php echo ".";?> 
      </td>
      <td width="158" bgcolor=""><?php  ?>
      </td>
      <td width="53" bgcolor="#c4eeff"><?php  ?>
      </td>
      <td width="92" bgcolor=""><?php  ?>
      </td>
    </tr> 
  </table>
  <table width="700" border="1" align="center" rules="all">
    <tr>
      <td width="198" bgcolor=""><?php echo ".";?> 
      </td>
      <td width="198" bgcolor=""><?php echo ".";?> 
      </td>
      <td width="158" bgcolor=""><?php  ?>
      </td>
      <td width="53" bgcolor="#c4eeff"><?php  ?>
      </td>
      <td width="92" bgcolor=""><?php  ?>
      </td>
    </tr> 
  </table>
  <table width="700" border="1" align="center" rules="all">
    <tr>
      <td width="198" bgcolor=""><?php echo ".";?> 
      </td>
      <td width="198" bgcolor=""><?php echo ".";?> 
      </td>
      <td width="158" bgcolor=""><?php  ?>
      </td>
      <td width="53" bgcolor="#c4eeff"><?php  ?>
      </td>
      <td width="92" bgcolor=""><?php  ?>
      </td>
    </tr> 
  </table>







  <form name="frmTesis" method="get" action="" id="frmTesis">
    <p align="center"><input class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo" style="font-size:17px;" type="button" name="IM" id="IM" value="IMPRIMIR" onClick="imprimir()"></p>
  </form>
  <p>&nbsp;</p>
</body>
</html>
