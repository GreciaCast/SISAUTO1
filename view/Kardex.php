<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
    ?>
    <!DOCTYPE html>
    <html lang="es">
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
                            <a href="inventario.php" style="font-size:15px;color:blue;">Inventario</a>
                        </li>
                        <li>
                            <a style="font-size:15px;">Kardex</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <form class="form-horizontal" action="../Controlador/comprasC.php" method="POST" id="guardarDev" align="center" autocomplete="off">
                                            <input type="hidden" name="bandera" value="devolucion" />
                                            <h2><b>Kardex <?php $var=$_GET['idinventario'] ?></b></h2>
                                            <div class="form-group">
                                            </div>
                                            <?php 
                                            // $sql = "SELECT  detallecompra.*,producto.nombre_Prod,producto.categoria_Prod,producto.marca_Prod,producto.descripcion_Prod,producto.modeloVehiculo_Prod,producto.anioVehiculo_Prod,producto.codigo_Prod FROM detallecompra left OUTER JOIN producto on detallecompra.id_Producto=producto.idProducto where detallecompra.id_Compra='$var'";
                                            $sql = "SELECT * from inventario where id_Producto = '$var'";
                                            $inventarios = mysqli_query($conexion, $sql) or die("No se pudo ejecutar la consulta");
                                            ?>
                                            <div class="form-group row" >
                                                 <label  class="col-sm-12 col-md-2 col-form-label">Producto:</label>
                                                 <div class="col-sm-12 col-md-3">
                                                <?php
                                                While($inventario = mysqli_fetch_array($inventarios)){
                                                $aux = $inventarios['id_Producto']; 
                                                $sql1 = "SELECT * FROM producto where idProducto = '$aux'";
                                                $productos = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");

                                                $fech = $productos['nombre_Prod'].'('.$productos['marca_Prod'].')';                                           
                                                ?>
                                                <input id="fecha" name="fecha_Ven" type="text" class="form-control" value="<?php echo $fech?>">
                                                <?php } ?>
                                                </div>
                                            </div>
                                            <div class="card mb-3">
                                                <br>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:300px">Nombre producto</th>
                                                                    <th style="width:10px">Cantidad disponible</th>
                                                                    <th style="width:10px">Cantidad a devolver</th> 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                   <?php While($inventario = mysqli_fetch_assoc($inventarios)){?>
                                                                   <tr>
                                                                       <td>
                                                                       </td>   
                                                                       <td>

                                                                       </td>

                                                                   </tr>
                                                                   <?php } ?>
                                                               </tr>
                                                           </tbody>
                                                       </table>
                                                   </div>
                                               </div>
                                               <div class="card-footer small text-muted"></div>
                                           </div>
                                           <hr width="75%">
                                           <div class="form-group" align="center">
                                   <!--  <button title="Aceptar" type="button" class="btn" style="color:#fff; background-color:#28a745" onclick="validarDevolucion();">Aceptar</button>
                                   <button title="Cancelar" type="reset" value="Cancelar" class="btn " style="color:#fff; background-color:#ffc107">Cancelar</button> -->
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <?php include("generalidades/cierre.php"); ?>
</div>
</div>
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
