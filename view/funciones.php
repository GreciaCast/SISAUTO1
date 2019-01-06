<?php

function contarProducto($id){
	$conexion = conectarMysql();
	$sql = "SELECT * from compra where id_Proveedor = '$id' ";
	$var = mysqli_query($conexion,$sql);
	$total = mysqli_num_rows($var);
	return $total; 
}

function contarProductoInventario($id){
	$conexion = conectarMysql();
	$sql = "SELECT * from inventario where id_Producto = '$id' ";
	$var = mysqli_query($conexion,$sql);
	$total = mysqli_num_rows($var);

	if(!($total == 0)){
		$sql2 = "SELECT nuevaExistencia_Inv FROM inventario WHERE id_Producto = '$id' order by idInventario desc";
		$resultadooS = mysqli_query($conexion,$sql2) or die ("Error a Conectar en la BD".mysqli_connect_error());
		$resultadoo = mysqli_fetch_array($resultadooS);//CAPTURA EL ULTIMO REGISTRO
		$cant = $resultadoo['nuevaExistencia_Inv'];
		if($cant == 0){
			$total = 0;
		}else{
			$total = 1;
		}
	}
	return $total; 
}

function correlativoFactura(){


	
	$conexion = conectarMysql();
	$sql = "SELECT * from factura order by idFactura desc";
	$var = mysqli_query($conexion,$sql);
	$total = mysqli_num_rows($var);
	if($total == 0){

		$sql2 = "SELECT numeroInicial_numF FROM numerofactura";
		$resultadooS = mysqli_query($conexion,$sql2) or die ("Error a Conectar en la BD".mysqli_connect_error());
		$total2 = mysqli_num_rows($resultadooS);
		if($total2 == 0){
			return 0;
		}else{
			$resultadoo = mysqli_fetch_array($resultadooS);//CAPTURA EL ULTIMO REGISTRO
			return $resultadoo['numeroInicial_numF'];
		}
		
	}else{
		$result = mysqli_fetch_array($var);//CAPTURA EL ULTIMO REGISTRO
		return $result['numero_Fac'] + 1;

	}
	
}

function verificar($idcompra){
	$conexion = conectarMysql();
	$aux= 1;
	$sql = "SELECT  * FROM detallecompra where id_Compra='$idcompra'";
	$detallescompra = mysqli_query($conexion, $sql) or die("No se pudo ejecutar la consulta");

	While($compra = mysqli_fetch_assoc($detallescompra)){

		$idProducto= $compra['id_Producto'];
		$sql1 = "SELECT * FROM inventario WHERE id_Producto = '$idProducto' order by idInventario desc";
		$inventario = mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());
        $inventario = mysqli_fetch_array($inventario);//CAPTURA EL ULTIMO REGISTRO
        $resta = $inventario['nuevaExistencia_Inv'];

        $sql2 = " SELECT * from detallecompra where id_Producto = '$idProducto' order by idDetalleCompra desc";
        $resultados = mysqli_query($conexion,$sql2) or die ("Error a Conectar en la BD".mysqli_connect_error());

        foreach ($resultados as $resultado) {
        	$idResultado = $resultado["idDetalleCompra"];
        	$sql1 = "SELECT SUM(cantidad_DDev) as totalD from detallesdevoluciones  where id_DetalleCompra = '$idResultado'";
        	$totald=mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());
        	$totald = mysqli_fetch_array($totald);
        	$menos=$resultado["cantidad_DCom"]-$totald['totalD'];
        	if($resta > $menos){
        		$resta = $resta - $menos;
        	}else{

        		$stop = $resultado["idDetalleCompra"];
        		$devolver = $compra["idDetalleCompra"];                        

        		if($devolver < $stop){
        			$disponible = 0;
        		}else if($devolver == $stop){
        			$disponible = $resta;
        		}else{

        			$idDetalle = $compra["idDetalleCompra"];
        			$sql1 = "SELECT SUM(cantidad_DDev) as totalD from detallesdevoluciones  where id_DetalleCompra = '$idDetalle'";
        			$totald=mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());
        			$totald = mysqli_fetch_array($totald);
        			$disponible = $compra["cantidad_DCom"] - $totald["totalD"];
        		}
        	}
        }
        if ($compra["cantidad_DCom"]!= $disponible) {
        	return 0;
        }
    }
    return $aux;
}

?>