<?php

session_start();
include("../confi/Conexion.php");
$conexion = conectarMysql();

if(isset($_POST["bandera"])){
	$bandera = $_POST["bandera"];
	if($bandera == "GuardarVen"){
		$fechaVen = $_POST["fecha_Ven"];
		$fechaVen = explode("/",$fechaVen);
		$fechaVen = $fechaVen[2].'-'.$fechaVen[1].'-'.$fechaVen[0];

		$numFacVen = $_POST["numFac_Ven"];
		$totalVen = $_POST["totalVenta"];
		$idCliVen = $_POST["id_Clientes"];
		$cantidadProdVen = $_POST["cantidad_DVen"];
		$precioProdVen = $_POST["precio_DVen"];
		$idProdVen = $_POST["id_Producto"];

		$sql = "INSERT INTO venta (fecha_Ven,total_Ven,id_Cliente) VALUES ('$fechaVen','$totalVen','$idCliVen')";
		mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD".mysqli_connect_error());
		$sql1 = "SELECT * FROM venta order by idVenta desc";
		$resultado = mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());
		$resultado =  mysqli_fetch_array($resultado);
		$id = $resultado['idVenta'];
		foreach ($cantidadProdVen as $key => $producto) {
			
		$sql1 = "INSERT INTO detalleventa (cantidad_DVen,precio_DVen,id_Venta,id_Producto) VALUES ('$cantidadProdVen[$key]','$precioProdVen[$key]','$id','$idProdVen[$key]')";
		mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());

		$sql2 = "SELECT * FROM inventario WHERE id_Producto = '$idProdVen[$key]' order by idInventario desc";
		$resultadooS = mysqli_query($conexion,$sql2) or die ("Error a Conectar en la BD".mysqli_connect_error());
		$resultadoo = mysqli_fetch_array($resultadooS);//CAPTURA EL ULTIMO REGISTRO
		$idD = $resultadoo['idInventario'];

			if($idD == ""){

				echo "SIGNIFICA QUE EL PRODUCTO NO HA TENIDO NUNCA UNA ENTRADA";
				
		 	}else{
		 		echo "SIGNIFICA QUE HAY REGISTRO EN INVENTARIO DE ESTE PRODUCTO";

				$existencias = $resultadoo['nuevaExistencia_Inv'];
				$precioActual = $resultadoo['nuevoPrecio_Inv'];
				$nuevaExistencia = $resultadoo['nuevaExistencia_Inv'] - $cantidadProdVen[$key];
				$nuevoPrecio = $precioActual;
				// $nuevoPrecio = $nuevoPrecio;
				//.toFixed(2)
				$sql3 = "INSERT INTO inventario (tipoMovimiento_Inv,existencias_Inv,precioActual_Inv,cantidad_Inv,precio_Inv,fechaMovimiento_Inv,nuevaExistencia_Inv,nuevoPrecio_Inv,id_Producto) VALUES (1,'$existencias','$precioActual','$cantidadProdVen[$key]','$precioProdVen[$key]','$fechaVen','$nuevaExistencia','$nuevoPrecio','$idProdVen[$key]')";
				mysqli_query($conexion,$sql3) or die ("Error a Conectar en la BD".mysqli_connect_error());

				$sql4 = "INSERT INTO factura (numero_Fac,id_Venta) VALUES ('$numFacVen','$id')";
				mysqli_query($conexion,$sql4) or die ("Error a Conectar en la BD".mysqli_connect_error());

				$sql5 = "UPDATE producto set precio_Prod = '$precioProdVen[$key]' where idProducto = '$idProdVen[$key]'";
				mysqli_query($conexion,$sql5) or die ("Error a Conectar en la BD".mysqli_connect_error());



		 	}

		}
		
	}
	

	$_SESSION['mensaje'] = "Registro guardado exitosamente";
	header("location: /SISAUTO1/view/NuevaVenta.php?");
}



?>