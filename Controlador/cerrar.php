<?php 
session_start();
unset($_SESSION['usuarioActivo']);
header("location: /SISAUTO1/view/login.php");
 ?>