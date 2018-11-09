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
		//print_r($cantidadProdCom);
		$precioProdCom = $_POST["precio_DCom"];
		$idProdCom = $_POST["id_Producto"];
		$sql = "INSERT INTO compra (numFac_Com,fecha_Com,total_Com,id_Proveedor) VALUES ('$numFacCom','$fechaCom','$totalCom','$idProvCom')";
		mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD".mysqli_connect_error());
		$sql1 = "SELECT * FROM compra order by idCompra desc";
		$resultado = mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());
		$resultado =  mysqli_fetch_array($resultado);
		$id = $resultado['idCompra'];
		foreach ($cantidadProdCom as $key => $producto) {

			echo($key);
			echo("->");
			echo ($idProdCom[$key]);
			echo("----");
			
			$sql1 = "INSERT INTO detallecompra (cantidad_DCom,precio_DCom,id_Compra,id_Producto) VALUES ('$cantidadProdCom[$key]','$precioProdCom[$key]','$id','$idProdCom[$key]')";
			mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());

			echo($key);
			echo("->");
			echo ($idProdCom[$key]);
			echo("----");
			$sql2 = "SELECT * FROM inventario WHERE id_Producto = '$idProdCom[$key]' order by idInventario desc";

			$resultadooS = mysqli_query($conexion,$sql2) or die ("Error a Conectar en la BD".mysqli_connect_error());
			$resultadoo = mysqli_fetch_array($resultadooS);//CAPTURA EL ULTIMO REGISTRO
			$idD = $resultadoo['idInventario'];


			if($idD == ""){
				$sql3 = "INSERT INTO inventario (tipoMovimiento_Inv,existencias_Inv,precioActual_Inv,cantidad_Inv,precio_Inv,fechaMovimiento_Inv,nuevaExistencia_Inv,nuevoPrecio_Inv,id_Producto) VALUES (0,0,0.0,'$cantidadProdCom[$key]','$precioProdCom[$key]','$fechaCom','$cantidadProdCom[$key]','$precioProdCom[$key]','$idProdCom[$key]')";
				mysqli_query($conexion,$sql3) or die ("Error a Conectar en la BD".mysqli_connect_error());
		
			}else{

			if($id != ""){
				$existencias = $resultadoo['nuevaExistencia_Inv'];
				$precioActual = $resultadoo['nuevoPrecio_Inv'];
				$nuevaExistencia = $resultadoo['nuevaExistencia_Inv'] + $cantidadProdCom[$key];
				$nuevoPrecio = ($resultadoo['nuevoPrecio_Inv'] + $precioProdCom[$key])/2;

				$sql3 = "INSERT INTO inventario (tipoMovimiento_Inv,existencias_Inv,precioActual_Inv,cantidad_Inv,precio_Inv,fechaMovimiento_Inv,nuevaExistencia_Inv,nuevoPrecio_Inv,id_Producto) VALUES (0,'$existencias','$precioActual','$cantidadProdCom[$key]','$precioProdCom[$key]','$fechaCom','$nuevaExistencia','$nuevoPrecio','$idProdCom[$key]')";
				mysqli_query($conexion,$sql3) or die ("Error a Conectar en la BD".mysqli_connect_error());

			}else{

				$sql3 = "INSERT INTO inventario (tipoMovimiento_Inv,existencias_Inv,precioActual_Inv,cantidad_Inv,precio_Inv,fechaMovimiento_Inv,nuevaExistencia_Inv,nuevoPrecio_Inv,id_Producto) VALUES (0,0,0.0,'$cantidadProdCom[$key]','$precioProdCom[$key]','$fechaCom','$cantidadProdCom[$key]','$precioProdCom[$key]','$idProdCom[$key]')";
				mysqli_query($conexion,$sql3) or die ("Error a Conectar en la BD".mysqli_connect_error());

				
			}


		
		}

		//$_SESSION['mensaje'] = "Registro guardado exitosamente";
		//header("location: /SISAUTO1/view/Compras.php?");
	}

}
}

	if($bandera == "EditarCom"){

		//////////CAPTURA DATOS PARA BITACORA
		$usuari=$_SESSION['usuarioActivo']['usuario_Usu'];
		$sql = "INSERT INTO bitacora (usuario_Usu,sesionInicio,actividad) VALUES ('$usuari',now(),'Edito una compra')";
		mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD guardo bita".mysqli_connect_error());
		header("location: /SISAUTO1/view/Compras.php?");
		///////////////////////////////////////////////
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

			// ___________________________________________________________________________
			$sql2 = "DELETE from inventario WHERE  id_Producto = '$idProdCom'";
			mysqli_query($conexion,$sql2) or die ("Error a Conectar en la BD".mysqli_connect_error());

			$sql3 = "SELECT * FROM inventario WHERE idInventario = (SELECT MAX(idInventario) from inventario) and id_Producto = '$idProdCom[$key]'";
			$resultadoo = mysqli_query($conexion,$sql3) or die ("Error a Conectar en la BD".mysqli_connect_error());
			$resultadoo =  mysqli_fetch_array($resultadoo);//CAPTURA EL ULTIMO REGISTRO
			$id = $resultadoo['idInventario'];
			echo $id;

			if($id == ""){

				$existencias = $resultadoo['nuevaExistencia_Inv'];
				$precioActual = $resultadoo['nuevoPrecio_Inv'];
				$nuevaExistencia = $resultadoo['nuevaExistencia_Inv'] + $cantidadProdCom[$key];
				$nuevoPrecio = ($resultadoo['nuevoPrecio_Inv'] + $precioProdCom[$key])/2;
				$sql3 = "INSERT INTO inventario (tipoMovimiento_Inv,existencias_Inv,precioActual_Inv,cantidad_Inv,precio_Inv,fechaMovimiento_Inv,nuevaExistencia_Inv,nuevoPrecio_Inv,id_Producto) VALUES (0,0,0.0,'$cantidadProdCom[$key]','$precioProdCom[$key]','$fechaCom','$cantidadProdCom[$key]','$precioProdCom[$key]','$idProdCom[$key]')";
				mysqli_query($conexion,$sql3) or die ("Error a Conectar en la BD".mysqli_connect_error());

			}else{

				$sql3 = "INSERT INTO inventario (tipoMovimiento_Inv,existencias_Inv,precioActual_Inv,cantidad_Inv,precio_Inv,fechaMovimiento_Inv,nuevaExistencia_Inv,nuevoPrecio_Inv,id_Producto) VALUES (0,'$existencias','$precioActual','$cantidadProdCom[$key]','$precioProdCom[$key]','$fechaCom','$nuevaExistencia','$nuevoPrecio','$idProdCom[$key]')";
				mysqli_query($conexion,$sql3) or die ("Error a Conectar en la BD".mysqli_connect_error());

			}
			// ___________________________________________________________________________

		}
		$_SESSION['mensaje'] = "Registro editado exitosamente";
		header("location: /SISAUTO1/view/Compras.php?");

		
	}
	if ($bandera == "eliminar") {
		//////////CAPTURA DATOS PARA BITACORA
		$usuari=$_SESSION['usuarioActivo']['usuario_Usu'];
		$sql = "INSERT INTO bitacora (usuario_Usu,sesionInicio,actividad) VALUES ('$usuari',now(),'Elimino una compra')";
		mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD guardo bita".mysqli_connect_error());
		header("location: /SISAUTO1/view/Compras.php?");
		///////////////////////////////////////////////
		// $idProdCom = $_POST["id_Producto"];
		$idCom=$_POST["id"];
		// $sql1 = "DELETE from inventario WHERE  id_Producto = '$idCom'";
		// mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());
		
		$sql1 = "DELETE from detallecompra where id_Compra = '$idCom'";
		mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());

		$sql1 = "DELETE from compra where idCompra = '$idCom'";
		mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());

		
		$_SESSION['mensaje'] = "Compra eliminada exitosamente";
		header("location: /SISAUTO1/view/Compras.php?");


	}


//----------------------------  AGREGAR AL COMBOBOX DE LOS PRODUCTOS
if(isset($_GET["bandera"])){
	$id = $_GET["id"];
	$cadena='';
	$sql1 = "SELECT * from producto where categoria_Prod = '$id' and tipo_Prod = 1 order by nombre_Prod ASC";
	$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
	While ($producto = mysqli_fetch_assoc($productos)){
		$cadena = $cadena.'<option value="'.$producto['idProducto'].'">'.$producto['nombre_Prod'].'  '.$producto['marca_Prod'].' - '.$producto['modeloVehiculo_Prod'].' '.$producto['anioVehiculo_Prod'].'</option>';
	}
	echo $cadena;
}

//-----------------------------------------------------------   VER PRODUCTO EN LA COMPRA
	if(isset($_GET["nombre"])){
		$id = $_GET["id"];
		$nom = '';
		$sql1 = "SELECT * from producto where idProducto = '$id' ";
		$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
		$producto = mysqli_fetch_array($productos);
			$nom = $nom.''.$producto['nombre_Prod'];
		echo $nom;
	}

	if(isset($_GET["codigo"])){
		$id = $_GET["id"];
		$cod = '';
		$sql1 = "SELECT * from producto where idProducto = '$id' ";
		$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
		$producto = mysqli_fetch_array($productos);
			$cod = $cod.''.$producto['codigo_Prod'];
		echo $cod;
	}

	if(isset($_GET["marca"])){
		$id = $_GET["id"];
		$mar = '';
		$sql1 = "SELECT * from producto where idProducto = '$id' ";
		$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
		$producto = mysqli_fetch_array($productos);
			$mar = $mar.''.$producto['marca_Prod'];
		echo $mar;
	}

	if(isset($_GET["descripcion"])){
		$id = $_GET["id"];
		$des = '';
		$sql1 = "SELECT * from producto where idProducto = '$id' ";
		$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
		$producto = mysqli_fetch_array($productos);
			$des = $des.''.$producto['descripcion_Prod'];
		echo $des;
	}

	if(isset($_GET["modelo"])){
		$id = $_GET["id"];
		$mod = '';
		$sql1 = "SELECT * from producto where idProducto = '$id' ";
		$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
		$producto = mysqli_fetch_array($productos);
			$mod = $mod.''.$producto['modeloVehiculo_Prod'];
		echo $mod;
	}

	if(isset($_GET["anio"])){
		$id = $_GET["id"];
		$ani = '';
		$sql1 = "SELECT * from producto where idProducto = '$id' ";
		$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
		$producto = mysqli_fetch_array($productos);
			$ani = $ani.''.$producto['anioVehiculo_Prod'];
		echo $ani;
	}
//-----------------------------------------------------------------------------------------------------
?>
