<?php

session_start();
include("../confi/Conexion.php");
$conexion = conectarMysql();

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
		$format_number = number_format($costo, 2, '.', '');
		echo $format_number;
	}

	if(isset($_GET["precio"])){
		$id = $_GET["id"];
		$pre = '';
		$sql1 = "SELECT * from producto where idProducto = '$id' ";
		$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
		$producto = mysqli_fetch_array($productos);//CAPTURA EL ULTIMO REGISTRO
		$pre = $pre.''.$producto['precio_Prod'];
		echo $pre;
	}
//----------------------------------------------------------------------------------------------------------
//
//

?>