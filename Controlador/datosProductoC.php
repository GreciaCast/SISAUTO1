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

	if(isset($_GET["costocompleto"])){
		$id = $_GET["id"];
		$sql1 = "SELECT nuevoPrecio_Inv from inventario where id_Producto = '$id' order by idInventario desc";
		$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
		$producto = mysqli_fetch_array($productos);//CAPTURA EL ULTIMO REGISTRO
		$costo = $producto['nuevoPrecio_Inv'];
		echo $costo;
	}

	if(isset($_GET["precio"])){
		$id = $_GET["id"];
		$pre = '';
		$sql1 = "SELECT * from producto where idProducto = '$id' ";
		$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
		$producto = mysqli_fetch_array($productos);//CAPTURA EL ULTIMO REGISTRO
		$pre = $pre.''.$producto['precio_Prod'];
		$format_number1 = number_format($pre, 2, '.', '');
		echo $format_number1;
	}
//----------------------------------------------------------------------------------------------------------
//
//
	if(isset($_GET["codigo"])){
		$id = $_GET["id"];
		$exis = '';


		$sql = "SELECT * from producto where categoria_Prod = '$id' order by idProducto ASC";
		      $producto = mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");
		$contador = mysqli_num_rows($producto);
		if ($contador > -1 && $contador < 9) {
		   $ceros = "0000";
		} else if ($contador >= 9 && $contador < 100) {
		   $ceros = "000";
		} else if ($contador >= 99 && $contador < 1000) {
		   $ceros = "00";
		} else if ($contador >= 999 && $contador < 10000) {
		   $ceros = "0";
		} else {
		   $ceros = "";
		}

		$correlativo = $ceros . ($contador + 1);
		if ($id == 1) {
			$codigo = "AM" . $correlativo;
		}else if ($id == 2) {
			$codigo = "BU" . $correlativo;
		}else if ($id == 3) {
			$codigo = "CO" . $correlativo;
		}else if ($id == 4) {
			$codigo = "EL" . $correlativo;
		}else if ($id == 5) {
			$codigo = "EN" . $correlativo;
		}else if ($id == 6) {
			$codigo = "FI" . $correlativo;
		}else if ($id == 7) {
			$codigo = "FR" . $correlativo;
		}else if ($id == 8) {
			$codigo = "MO" . $correlativo;
		}else if ($id == 9) {
			$codigo = "SE" . $correlativo;
		}else if ($id == 10) {
			$codigo = "SU" . $correlativo;
		}else if ($id == 11) {
			$codigo = "TR" . $correlativo;
		}else if ($id == 12) {
			$codigo = "UN" . $correlativo;
		}else {
			$codigo = $correlativo;
		}
		
		echo $codigo;
	}

?>