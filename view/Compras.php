<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<?php include("generalidades/apertura.php"); ?>
<body>
    <div id="wrapper">
        <?php include("generalidades/menu.php"); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2></h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php" style="font-size:15px;color:blue;">Inicio</a>
                    </li>
                    <li>
                        <a style="font-size:15px;"> Compras</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
        <?php
        $sql = "SELECT * from compra order by fecha_Com ASC";
        $compras = mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");
        ?>
        <div class="row">
            <div class="col-12">
                <div class="row" style="padding:20px">
                    <br>
                    <a class="pull-right" href="">
                        <button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo" style="font-size:16px;">
                            Reporte
                            <span class="fa fa-file-pdf-o"></span>
                        </button>
                        &nbsp;
                    </a>
                    <a class="pull-right" href="AgregarCom.php">
                        <button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo" style="font-size:16px;">
                            Agregar nueva compra
                            <span class="fa fa-plus"></span>
                        </button>
                        &nbsp;
                    </a>
                    <br><br>
                    <!-- TABLA COMPRAS-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="wrapper wrapper-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ibox float-e-margins">
                                            <div class="ibox-content">
                                                <form class="form-horizontal" action="../Controlador/comprasC.php" method="POST" id="guardarCom" autocomplete="off">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered display" id="example">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:50px">Fecha/Hora</th>
                                                                    <th style="width:50px">Num Factura</th>
                                                                    <th style="width:150px">Proveedor</th>
                                                                    <th align="center" style="width:2px">Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php While($compra = mysqli_fetch_assoc($compras)){?>
                                                                    <tr>
                                                                        <td><?php echo $compra['fecha_Com'] ?></td>
                                                                        <td><?php echo $compra['numFac_Com'] ?></td>
                                                                        <td><?php echo $compra['id_Proveedor'] ?></td>
                                                                        <th align="center">
                                                                            <button title="Ver" type="button" class="btn btn-info fa fa-eye">
                                                                            </button>
                                                                            <button title="Editar" type="button" class="btn btn-success fa fa-pencil-square-o">
                                                                            </button>
                                                                        </th>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("generalidades/cierre.php"); ?>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

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