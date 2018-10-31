<?php

function contarProducto($id){
	$conexion = conectarMysql();

	$sql="SELECT * from compra where id_Proveedor = '$id' ";
	$var= mysqli_query($conexion,$sql);

	// $total = count($var);
	$total = mysqli_num_rows($var);

	return $total; 

}

?>