<?php

session_start();
include("../confi/Conexion.php");
$conexion = conectarMysql();
$bandera = $_POST["bandera"];



//-------------------------------------------------------   VER COSTO Y EXISTENCIAS DEL PRODUCTO EN LA VENTA
	if(isset($_GET["existencias"])){
		$id = $_GET["id"];
		$exis = '';
		$sql1 = "SELECT nuevaExistencia_Inv from inventario where id_Producto = '$id' order by idInventario desc";
		$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
		$producto = mysqli_fetch_array($productos);//CAPTURA EL ULTIMO REGISTRO
		$exis = $exis.''.$producto['nuevaExistencia_Inv'];
		echo $exis;
	}
	
	if(isset($_GET["costo"])){
		$id = $_GET["id"];
		$costo = '';
		$sql1 = "SELECT nuevoPrecio_Inv from inventario where id_Producto = '$id' order by idInventario desc";
		$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
		$producto = mysqli_fetch_array($productos);//CAPTURA EL ULTIMO REGISTRO
		$costo = $costo.''.$producto['nuevoPrecio_Inv'];
		echo $costo;
	}
//-------------------------------------------------------------

	if ($bandera=="cambio") {

	$sql = "UPDATE venta set estado_Ven='".$_POST["valor"]."' where idVenta = '".$_POST["id"]."'";
	$venta = mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");
	if ($_POST["valor"]==1) {
	$aux = 0;
		$_SESSION['mensaje'] ="Venta anulada exitosamente";
    //////////CAPTURA DATOS PARA BITACORA
    $usuari=$_SESSION['usuarioActivo']['usuario_Usu'];
    $sql = "INSERT INTO bitacora (usuario_Usu,sesionInicio,actividad) VALUES ('$usuari',now(),'Anuló una factura de venta')";
    mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD guardo bita".mysqli_connect_error());
    ///////////////////////////////////////////////
	}else{
		$aux = 1;
		$_SESSION['mensaje'] ="Venta anulada exitosamente";
    //////////CAPTURA DATOS PARA BITACORA
    $usuari=$_SESSION['usuarioActivo']['usuario_Usu'];
    $sql = "INSERT INTO bitacora (usuario_Usu,sesionInicio,actividad) VALUES ('$usuari',now(),'Anuló una factura de venta')";
    mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD guardo bita".mysqli_connect_error());
	}
    header("location: /SISAUTO1/view/Ventas.php?tipo=".$aux."");
 }
?>