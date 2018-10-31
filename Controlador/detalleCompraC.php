<?php

session_start();
include("../confi/Conexion.php");
$conexion = conectarMysql();

if(isset($_GET["bandera"])){
	$id = $_GET["id"];
	$cadena='';
	$sql1 = "SELECT * from detallecompra where id_Compra = '$id'";
	$detalles = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
	$cadena="";
	While ($detalle = mysqli_fetch_assoc($detalles)){
		$idP=$detalle['id_Producto'];
		$sql1 = "SELECT * from producto where idProducto = '$idP'";
		$producto = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
		$producto = mysqli_fetch_array($producto);
		$cadena.="<tr>";
		$cadena=$cadena.'<td>'.$detalle['cantidad_DCom'].'</td>';
		$cadena=$cadena.'<td>'.$producto['nombre_Prod'].'</td>';
		$cadena=$cadena.'<td>'.$detalle['precio_DCom'].'</td>';
		$cadena=$cadena.'<td>'.$detalle['cantidad_DCom']*$detalle['precio_DCom'].'</td>';
		$cadena.="</tr>";
	}
	
	// .= ---> $cadena=$cadena.variable
	echo $cadena;
}

?>