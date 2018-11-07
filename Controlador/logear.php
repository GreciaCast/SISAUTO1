<?php

include("../confi/Conexion.php");
$conexion = conectarMysql();
session_start();
    $usuario = $_POST["user"];
    $contrasena = MD5($_POST["password"]);

    $sql="SELECT * FROM usuario WHERE usuario_Usu='$usuario' AND estado_Usu=1";
    $var= mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD".mysqli_connect_error());
    if ($row= mysqli_fetch_assoc($var)){
    	if ($row['contrasena_Usu']== $contrasena) {
<<<<<<< HEAD
        //////////CAPTURA DATOS PARA BITACORA
        $usuario=$row['usuario_Usu'];
        $conexion = conectarMysql();
        $sql = "INSERT INTO bitacora (usuario_Usu,sesionInicio,actividad) VALUES ('$usuario',now(),'Inicio de Sesion')";
        mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD".mysqli_connect_error());
        //$_SESSION['mensaje'] = "Registro guardado exitosamente";
        header("location: /SISAUTO1/view/login.php?");
        ///////////////////////////////////////////////
=======
>>>>>>> 4253d3054cf052a19b7e652681f136c5fd89d627
    		$_SESSION['usuarioActivo']=$row;
            $_SESSION['mensaje']="Usted a iniciado sesión - BIENVENIDO";
    		header("location: /SISAUTO1/view/index.php");
    	}else{
        $_SESSION['error']="Usuario y Contraseña Incorrectos";
      	header("location: /SISAUTO1/view/login.php");
    	}
    }else{
    	$_SESSION['error']="Usuario y Contraseña Incorrectos";
    	header("location: /SISAUTO1/view/login.php");
    }


?>
