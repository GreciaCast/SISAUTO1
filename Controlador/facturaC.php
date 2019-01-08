<?php

	session_start();
	include("../confi/Conexion.php");
	$conexion = conectarMysql();
	$bandera = $_POST["bandera"];

	if($bandera == "factura"){

		$numeroFConsumidor = $_POST["numFCredito"];
		$numeroFCredito = $_POST["numFConsumidor"];
		$sql = "INSERT INTO numerofactura (numeroInicial_numF,tipo_numF) VALUES ('$numFCredito',1)";// 1 para credito fiscal
	    mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD".mysqli_connect_error());
	    $sql = "INSERT INTO numerofactura (numeroInicial_numF,tipo_numF) VALUES ('$numeroFConsumidor',2)";//2 para consumidor final
	    mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD".mysqli_connect_error());
	    $_SESSION['mensaje'] = "Los números de factura han sido inicializados";
	    header("location: /SISAUTO1/view/index.php?");
			
		//////////CAPTURA DATOS PARA BITACORA
		$usuari = $_SESSION['usuarioActivo']['usuario_Usu'];
		$sql = "INSERT INTO bitacora (usuario_Usu,sesionInicio,actividad) VALUES ('$usuari',now(),'Inició números de factura')";
		mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD guardo bita".mysqli_connect_error());
		///////////////////////////////////////////////
	}

?>