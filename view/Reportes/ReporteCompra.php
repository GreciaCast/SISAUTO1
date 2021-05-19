<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
?>
<?php 
$desde = $_GET["desde"];
$hasta = $_GET["hasta"];
$idproveedor = $_GET["idproveedor"];
$tipor = $_GET["tipor"];
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
          <td colspan="2"><strong class="titulos">REPORTE DE COMPRAS</strong></td>
        </tr>
        <tr align="right">
          <td>&nbsp;</td>
          <td>FECHA IMPRESIÓN:  <?php echo date("d/m/Y"); ?>
            <br>
            HORA  IMPRESIÓN:   <?php
            date_default_timezone_set('America/El_Salvador');
            $date = new DateTime();
            echo $date->format('h:i:s A');
            ?></td>
          </tr>
        </table>

        <?php

        include("../../confi/Conexion.php");
        $conexion = conectarMysql(); 

        if($tipor == 1){
          $aux = $idproveedor;
          $sql1 = "SELECT nombre_Prov FROM proveedor where idProveedor = '$aux'";
          $proveedor = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
          $proveedor = mysqli_fetch_array($proveedor);
          ?>
          <table width="685" border="0" align="center">
            <tr align="center">
              <br><br>
              <td ><strong class="titulos" align="center">PROVEEDOR: </strong>
                <?php echo $proveedor['nombre_Prov']; ?>
              </td>
            </tr>
          </table>
          <br><br>
          <?php }?>

        <table width="700" border="1" align="center" rules="all">
          <tr bgcolor="#CCCCCC">
            <td width="29" bgcolor="#fcf3b3" align="center" class=""><strong>N°</strong></td>
            <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">N° de factura</td>
            <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Fecha</td>
            <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Total de la compra</td>
            <?php if ($tipor == 2) {?>
            <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Proveedor</td>
            <?php }  ?>
          </tr>
          <?php
	//try {
	//$fechainicio=$_REQUEST["fechainicio"];
	//$fechafinal=$_REQUEST["fechafinal"];
          date_default_timezone_set('america/el_salvador');
          $hoy = getdate();
          $dia = date("d");
          $today = $hoy['year'].'/'.$hoy['mon'].'/'.$dia; 

          $contador=1;
          if($tipor == 1){
              if($desde == ""&& $hasta== ""){
                $proveedor = "where id_Proveedor = '$idproveedor'";
              }else{
                $proveedor = "and id_Proveedor = '$idproveedor'";
              }
            }else{
              $proveedor = "";
            }
          if($desde == ""&& $hasta== ""){
           $sql = "select * from compra ".$proveedor." order by fecha_Com ASC";
         }else if($hasta == ""){
          $sql = "select * from compra  where fecha_Com BETWEEN '$desde' and '$today' ".$proveedor." order by fecha_Com ASC";
        }else if($desde == ""){
          $sql = "select * from compra  where fecha_Com <= '$hasta' ".$proveedor." order by fecha_Com ASC";
        }else{
          $sql = "select * from compra  where fecha_Com BETWEEN '$desde' and '$hasta' ".$proveedor." order by fecha_Com ASC";
        }
	//$consulta=mysqli_query($conexion,$sql);
	//$consulta = mysql_query("SELECT * FROM bitacora", $conexion);
        $consulta=mysqli_query($conexion,$sql);
//  var_dump($consulta);

        while($fila=mysqli_fetch_array($consulta))

        {
         ?>
         <tr align="left" class="">
          <td bgcolor="" align="center"><?php echo $contador;?></td>
          <td bgcolor="" align="center"><?php echo $fila[1];?></td>
          <td bgcolor="" align="center"><?php echo date('d/m/Y',strtotime($fila[2]));?></td>
          <td bgcolor="" align="center"><a>$</a><?php 
          $preciocom = $fila[3];
          echo number_format($preciocom,2,'.','');?></td>
          <?php if($tipor == 2){ ?>
          <td bgcolor="">
          <?php
          $aux = $fila['id_Proveedor'];
          $sql1 = "SELECT nombre_Prov FROM proveedor where idProveedor = '$aux'";
          $proveedor = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
          $proveedor = mysqli_fetch_array($proveedor);
          echo $proveedor['nombre_Prov'];
          ?>
          </td>
          <?php } ?>
        </tr>
        <?php $contador++;
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
<meta http-equiv="refresh" content="0;URL=/SISANT/view/login.php">
</head>
<body>
</body>
</html>
    <?php
}
?>