<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
?>
<!DOCTYPE html>
<html>
<?php include("generalidades/apertura.php"); ?>
<body>
<div id="wrapper">
    <?php include("generalidades/menu.php"); ?>
<!--  -->
        <div id="page-wrapper" class="gray-bg dashbard-1">
        </div>
<!--  -->
</div>
     <?php include("generalidades/cierre.php"); ?>
    </body>
</html>
<?php
}else{
    ?>
    <!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="refresh" content="0;URL=/SISAUTO1/view/login.php">
</head>
<body>
</body>
</html>
    <?php
}
?>