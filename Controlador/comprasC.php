<?php

session_start();
include("../confi/Conexion.php");
$conexion = conectarMysql();


if(isset($_POST["bandera"])){

	$bandera = $_POST["bandera"];
	if($bandera == "GuardarCom"){
		$fechaCom = $_POST["fecha_Com"];
		$fechaCom = explode("/",$fechaCom);
		$fechaCom = $fechaCom[2].'-'.$fechaCom[1].'-'.$fechaCom[0];
		$numFacCom = $_POST["numFac_Com"];
		$totalCom = $_POST["total"];
		$idProvCom = $_POST["id_Proveedor"];
		$cantidadProdCom = $_POST["cantidad_DCom"];
		$precioProdCom = $_POST["precio_DCom"];
		$idProdCom = $_POST["id_Producto"];
		$sql = "INSERT INTO compra (numFac_Com,fecha_Com,total_Com,id_Proveedor) VALUES ('$numFacCom','$fechaCom','$totalCom',2)";
		mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD".mysqli_connect_error());
		$sql1 = "SELECT * FROM compra order by idCompra desc";
		$resultado = mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());
		$resultado =  mysqli_fetch_array($resultado);
		$id = $resultado['idCompra'];
		foreach ($cantidadProdCom as $key => $producto) {
			$sql1 = "INSERT INTO detallecompra (cantidad_DCom,precio_DCom,id_Compra,id_Producto) VALUES ('$cantidadProdCom[$key]','$precioProdCom[$key]','$id','$idProdCom[$key]')";
			mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());

		}
		$_SESSION['mensaje'] = "Registro guardado exitosamente";
		header("location: /SISAUTO1/view/Compras.php?");
	}

	if($bandera == "EditarCom"){
		$fechaCom = $_POST["fecha_Com"];
		$fechaCom = explode("/",$fechaCom);
		$fechaCom = $fechaCom[2].'-'.$fechaCom[1].'-'.$fechaCom[0];
		$numFacCom = $_POST["numFac_Com"];
		$totalCom = $_POST["total"];
		$idProvCom = $_POST["id_Proveedor"];
		$cantidadProdCom = $_POST["cantidad_DCom"];
		$precioProdCom = $_POST["precio_DCom"];
		$idProdCom = $_POST["id_Producto"];
		$idcompra = $_POST["idcompra"];

		$sql = "UPDATE compra set fecha_Com='$fechaCom',numFac_Com='$numFacCom',total_Com='$totalCom',id_Proveedor='$idProvCom' where idCompra = '$idcompra'";
		mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD".mysqli_connect_error());

		$sql1 = "DELETE from detallecompra where id_Compra = '$idcompra'";
		mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());

		foreach ($cantidadProdCom as $key => $producto) {
			$sql1 = "INSERT INTO detallecompra (cantidad_DCom,precio_DCom,id_Compra,id_Producto) VALUES ('$cantidadProdCom[$key]','$precioProdCom[$key]','$idcompra','$idProdCom[$key]')";
			mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());

		}
		$_SESSION['mensaje'] = "Registro editado exitosamente";
		header("location: /SISAUTO1/view/Compras.php?");

		
	}
	if ($bandera == "eliminar") {
		$idCom=$_POST["id"];
		$sql1 = "DELETE from detallecompra where id_Compra = '$idCom'";
		mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());

		$sql1 = "DELETE from compra where idCompra = '$idCom'";
		mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());


		$_SESSION['mensaje'] = "Compra eliminada exitosamente";
		header("location: /SISAUTO1/view/Compras.php?");


	}

}

if(isset($_GET["bandera"])){
	$id = $_GET["id"];
	$cadena='';
	$sql1 = "SELECT * from producto where categoria_Prod = '$id' and tipo_Prod = 1 order by nombre_Prod ASC";
	$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
	While ($producto = mysqli_fetch_assoc($productos)){
		$cadena = $cadena.'<option value="'.$producto['idProducto'].'">'.$producto['nombre_Prod'].'  '.$producto['marca_Prod'].'  "'.$producto['descripcion_Prod'].'" - '.$producto['modeloVehiculo_Prod'].' '.$producto['anioVehiculo_Prod'].'</option>';
	}
	echo $cadena;
}

?>