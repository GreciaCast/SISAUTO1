<?php

session_start();
include("../confi/Conexion.php");
$conexion = conectarMysql();
/*$bandera = $_POST["bandera"];



if($bandera == "GuardarCom"){
$nombreusuU = $_POST["NombreUsu_Usu"];
$contrasenaU = $_POST["Contrasena_Usu"];
$nombreU = $_POST["Nombre_Usu"];
$correoU = $_POST["Correo_Usu"];
$direccionU = $_POST["Direccion_Usu"];
$telefonoU = $_POST["Telefono_Usu"];
$duiU = $_POST["DUI_Usu"];
$sql = "INSERT INTO usuario (usuario_Usu,contrasena_Usu,nombre_Usu,correo_Usu,direccion_Usu,telefono_Usu,dui_Usu,tipo_Usu,estado_Usu) VALUES ('$nombreusuU',MD5('$contrasenaU'),'$nombreU','$correoU','$direccionU','$telefonoU','$duiU',1,1)";
mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD".mysqli_connect_error());
$_SESSION['mensaje'] = "Registro guardado exitosamente";
header("location: /SISAUTO1/view/Usuarios.php?");
}*/

if(isset($_GET["bandera"])){
	$id = $_GET["id"];
	$cadena='';
	$sql1 = "SELECT * from producto where categoria_Prod = '$id' and tipo_Prod = 1 order by nombre_Prod ASC";
	$productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
	While ($producto = mysqli_fetch_assoc($productos)){
		$cadena=$cadena.'<option value="'.$producto['idProducto'].'">'.$producto['nombre_Prod'].'</option>';
	}
	echo $cadena;
}

?>