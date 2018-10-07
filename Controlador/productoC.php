<?php

include("../confi/Conexion.php");
$conexion = conectarMysql();

$bandera = $_POST["bandera"];

if ($bandera == "guardar") {
    $codigo = $_POST["codigoPro"];
    $nombrePro = $_POST["nombrePro"];
    $categoria = $_POST["categorias"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $anio = $_POST["anio"];
    $descripcion = $_POST["descripcion"];

   

    $sql = "INSERT INTO producto (nombre_Prod,categoria_Prod,marca_Prod,descripcion_Prod,modeloVehiculo_Prod,anioVehiculo_Prod,codigo_Prod) VALUES ('$nombrePro','$categoria','$marca','$descripcion','$modelo','$anio','$codigo')";

    mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD".mysqli_connect_error());
    $mensaje = "Registro guardado exitosamente";
    header("location: /phpSISAUTO/view/Producto.php?mensaje=".$mensaje);
}

?>

