<?php 
session_start();
unset($_SESSION['usuarioActivo']);
header("location: /phpSISAUTO1/view/login.php");
 ?>