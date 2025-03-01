<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SISANT | Login</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

    <link href="../assets/pNotify/pnotify.custom.min.css" rel="stylesheet">

    </head>

    <body style="background-color: white;">
        <div class="passwordBox animated fadeInDown">
            <div class="row">
                <div class="col-md-12">
                 <div class="content"> 
                  <h1 align="center" class="font-bold" >Complejo Educativo Católico "Santa Teresita"</h1>
                    <p style="text-align: center; "> <img src="../assets/img/logo.jpg" alt="aut" width="225"></p>
                     &nbsp;&nbsp;
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="../Controlador/logear.php" method="POST" autocomplete="off">
                                    <div class="form-group">
                                        <input type="text" name="user" class="form-control" placeholder="Usuario">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                    </div>
                                    <button type="submit" class="btn block full-width m-b" style="background-color:  #0D3851"><a style="color: white;">Entrar</a></button>
                                    <div class="text-center">
                                        <a href="forgot_password.php" ><small style="color: #0D3851">¿Olvidaste tu contraseña?</small></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <script src="../assets/js/jquery-2.1.1.js"></script>
                    <script src="../assets/pNotify/pnotify.custom.min.js"></script>
                    <script src="../assets/Validaciones/Mensajes.js"></script>
                    </div>
                </div>
            </div>
            <!-- <hr/> -->
        </div>
    </body>

    </html>
<?php
if (isset($_SESSION['error'])) {
     echo ("<script type='text/javascript'>
notaError('".$_SESSION['error']."');
</script>");
 unset($_SESSION['error']);
 }
 if (isset($_SESSION['mensaje'])) {
     echo ("<script type='text/javascript'>
notaInfo('".$_SESSION['mensaje']."');
</script>");
 unset($_SESSION['mensaje']);
 }
?>