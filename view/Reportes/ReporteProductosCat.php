<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
  if ($_SESSION['usuarioActivo']['tipo_Usu']=='0') {
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
<?php $cate = array(1 => "AMORTIGUADORES", 2 => "BUJÍAS", 
4 => "ELÉCTRICO", 5 => "ENFRIAMIENTO", 6 => "FILTROS", 7 => "FRENOS", 8 => "MOTOR", 9 => "SENSORES", 10 => "SUSPENSIÓN Y DIRECCIÓN", 11 => "TRANSMISIÓN Y EMBRAGUE", 12 => "UNIVERSALES"); ?>
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
    <td colspan="2"><strong class="titulos">REPORTE DE PRODUCTOS</strong></td>
  </tr>
  <tr align="left">
    <td colspan="2"><strong class="titulos">CATEGORIA: </strong>
    <?php echo "categoria..."; ?>
    </td>
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

<table width="700" border="1" align="center" rules="all">
  <tr bgcolor="#CCCCCC">
    <td width="29" bgcolor="#fcf3b3" class=""><strong>N°</strong></td>
    <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Nombre</td>
    <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Categoria</td>
    <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Marca</td>
  </tr>
    <?php
	//try {
		include("../../confi/Conexion.php");
		$conexion = conectarMysql();
	//$fechainicio=$_REQUEST["fechainicio"];
	//$fechafinal=$_REQUEST["fechafinal"];

	$contador=1;
	//if($fechainicio!= NULL && $fechafinal!= NULL){
	$sql = "select * from producto ";
	//$consulta=mysqli_query($conexion,$sql);
	//$consulta = mysql_query("SELECT * FROM bitacora", $conexion);
	$consulta=mysqli_query($conexion,$sql);
//  var_dump($consulta);

            while($fila=mysqli_fetch_array($consulta))

	{
	?>
  <tr align="left" class="">
    <td bgcolor=""><?php echo $contador;?></td>
    <td bgcolor=""><?php echo $fila[1];?></td>
    <td bgcolor=""><?php echo $cate[$fila['categoria_Prod']];?></td>
    <td bgcolor=""><?php echo $fila[3];?></td>
  </tr>
  <?php $contador++;
}
  // }
  //}catch(NullException $e){}catch(Exception $e){}
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
<meta http-equiv="refresh" content="0;URL=/SISANT/view/index.php">
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
<meta http-equiv="refresh" content="0;URL=/SISANT/view/login.php">
</head>
<body>
</body>
</html>
    <?php
}
?>
