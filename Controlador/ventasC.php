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

		$numFacConVen = $_POST["numFacCon_Ven"];
		$numFacCreVen = $_POST["numFacCre_Ven"];
		$totalVen = $_POST["totalVenta"];
		$idCliVen = $_POST["id_Clientes"];
		$cantidadProdVen = $_POST["cantidad_DVen"];
		$precioProdVen = $_POST["precio_DVen"];
		$idProdVen = $_POST["id_Producto"];

		$indicador = $_POST["indicador"];

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

				//echo "SIGNIFICA QUE EL PRODUCTO NO HA TENIDO NUNCA UNA ENTRADA";
				
		 	}else{
		 		//echo "SIGNIFICA QUE HAY REGISTRO EN INVENTARIO DE ESTE PRODUCTO";

				$existencias = $resultadoo['nuevaExistencia_Inv'];
				$precioActual = $resultadoo['nuevoPrecio_Inv'];
				$nuevaExistencia = $resultadoo['nuevaExistencia_Inv'] - $cantidadProdVen[$key];
				$nuevoPrecio = $precioActual;
				// $nuevoPrecio = $nuevoPrecio;
				//.toFixed(2)
				$sql3 = "INSERT INTO inventario (tipoMovimiento_Inv,existencias_Inv,precioActual_Inv,cantidad_Inv,precio_Inv,fechaMovimiento_Inv,nuevaExistencia_Inv,nuevoPrecio_Inv,id_Producto) VALUES (1,'$existencias','$precioActual','$cantidadProdVen[$key]','$precioProdVen[$key]','$fechaVen','$nuevaExistencia','$nuevoPrecio','$idProdVen[$key]')";
				mysqli_query($conexion,$sql3) or die ("Error a Conectar en la BD".mysqli_connect_error());
				
				if ($indicador != 2) {
					$sql4 = "INSERT INTO facturaconsumidor (numero_Fac,id_Venta) VALUES ('$numFacConVen','$id')";
					mysqli_query($conexion,$sql4) or die ("Error a Conectar en la BD".mysqli_connect_error());
				}else{
					$sql4 = "INSERT INTO facturacredito (numero_Fac,id_Venta) VALUES ('$numFacCreVen','$id')";
					mysqli_query($conexion,$sql4) or die ("Error a Conectar en la BD".mysqli_connect_error());
				}
				

				$sql5 = "SELECT * FROM producto where idProducto = '$idProdVen[$key]'"; 
				$ress = mysqli_query($conexion,$sql5) or die ("Error a Conectar en la BD".mysqli_connect_error());
				$res = mysqli_fetch_assoc($ress);
				$pre = $res['precio_Prod'];//precio actual
				// $calculo = $res['precio_Prod'] - ($res['precio_Prod'] * 0.15);

				// echo $pre;4
				// echo " -- ";
				// echo $calculo;3.4
				// echo " -- ";
				// echo $precioProdVen[$key];5
				// if ($calculo == $precioProdVen[$key]) {
					$sql6 = "UPDATE producto set precio_Prod = '$pre' where idProducto = '$idProdVen[$key]'";
					mysqli_query($conexion,$sql6) or die ("Error a Conectar en la BD".mysqli_connect_error());
				// } else {
				// 	$sql6 = "UPDATE producto set precio_Prod = '$precioProdVen[$key]' where idProducto = '$idProdVen[$key]'";
				// 	mysqli_query($conexion,$sql6) or die ("Error a Conectar en la BD".mysqli_connect_error());

				// }
				



				


		 	}

		}
		
	}

		//////////CAPTURA DATOS PARA BITACORA
		$usuari = $_SESSION['usuarioActivo']['usuario_Usu'];
		$sql = "INSERT INTO bitacora (usuario_Usu,sesionInicio,actividad) VALUES ('$usuari',now(),'Guardó una venta')";
		mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD guardo bita".mysqli_connect_error());
		///////////////////////////////////////////////
	

	$_SESSION['mensaje'] = "Registro guardado exitosamente";
	//header("location: /SISAUTO1/view/Reportes/ReporteUsuario.php?");

	header("location: /SISAUTO1/view/NuevaVenta.php?");
	//target="_blank" href="Reportes/ReporteUsuario.php"
}

if(isset($_GET["bandera1"])){
	$id = $_GET["id"];
	$cadena='';
	$sql1 = "SELECT * from detalleventa where id_Venta = '$id'";
	$detalles = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
	$cadena="";
	While ($detalle = mysqli_fetch_assoc($detalles)){
		$idP=$detalle['id_Producto'];
		$sql1 = "SELECT * from producto where idProducto = '$idP'";
		$producto = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
		$producto = mysqli_fetch_array($producto);
		$cadena.='<tr id="f'.$producto['idProducto'].'">';
		$cadena=$cadena.'<td>'.$detalle['cantidad_DVen'].'</td>';
		$cadena=$cadena.'<td>'.$producto['nombre_Prod'].' -'.$producto['marca_Prod'].' -'.$producto['modeloVehiculo_Prod'].' -'.$producto['anioVehiculo_Prod'].' -'.$producto['descripcion_Prod'].'</td>';
		$precioven = $detalle['precio_DVen'];
		$cadena=$cadena.'<td>'.number_format($precioven,2,'.','').'</td>';
		$subtotal = $detalle['cantidad_DVen']*$detalle['precio_DVen'];
		$cadena=$cadena.'<td>'.number_format($subtotal,2,'.','').'</td>';
		// $cadena=$cadena.'<td>'.$detalle['cantidad_DCom']*$detalle['precio_DCom'].'</td>';
		$cadena.='</tr>';
	}
	
	// .= ---> $cadena=$cadena.variable
	echo $cadena;


}
//----------------------------  AGREGAR A TABLA DETALLES DE VENTA
if(isset($_GET["repetidos"])){
	$id = $_GET["id"];
	$idProdVen = $_GET["id_Producto"];
	//$variable = 10;
	$aux = 0;
	for ($i=0; $i < 10; $i++) { 
		for ($j=1; $j <= 10; $j++) { 
			if($idProdVen[$i] == $idProdVen[$j]){
				echo "Valor en i: ";
				echo $idProdVen[$i];
				echo "Valor en j: ";
				echo $idProdVen[$j];
				$aux = $aux + 1;
			}
		}
	}
	// foreach ($variable as $key => $value) {
	// 	if($idProdVen[$key] == $idProdVen[$key+1]){
	// 		$aux = $aux + 1;
	// 	}
	// }
	echo $aux;
}


?>