<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
  ?>
  <!DOCTYPE html>
  <html lang="es">
  <?php include("generalidades/apertura.php"); ?>
  <?php include("funciones.php"); ?>
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
      <?php
      $sql = "SELECT * from inventario GROUP BY id_Producto";
      $inventarios = mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta"); 
      ?>
      <?php
      $aux1 = $inventario['id_Producto']; 
      $sql1 = "SELECT codigo_Prod FROM producto where idProducto = '$aux1'";
      $producto = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
      $producto = mysqli_fetch_array($producto);
      echo $producto['codigo_Prod'];
      ?>
      
     <div class="row">
      <div class="col-lg-12">
        <div class="wrapper wrapper-content">
          <div class="row">
            <div class="col-lg-12">
              <div class="ibox float-e-margins">
                <div class="ibox-content">
                  <form class="form-horizontal" action="" method="POST" id="" align="center" autocomplete="off">
                    <h2><b>Kardex</b></h2>
                    <hr width="75%" style="background-color:#007bff;"/><br>
                    <div class="form-group">
                      <label class="col-sm-3 control-label"><b>Metodo: </b></label>
                      <div class="text-left">
                       <label class="control-label"> <b class="control-label">Costo Promedio</b></label>

                     </div>
                   </div> 
                   <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Código:</label>
                    <div class="col-sm-3">
                      <input class="form-control" placeholder="" type="text" name="" id="kardexCodigo">

                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Producto:</label>
                    <div class="col-sm-6">
                      <input class="form-control" placeholder="" type="text" name="" id="kardexProduc">

                    </div>
                  </div>  
                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Stock mínimo:</label>
                    <div class="col-sm-3">
                      <input class="form-control" placeholder="" type="text" name="" id="kardexStock">
                    </div>
                  </div> 
                  <hr width="100%" style="background-color:#007bff;"/><br>
                  <div class="table-responsive" align="center" >
                    <table class="table table-striped table-bordered display" align="center" border="5"> 
                      <thead style="width:300px" align="center" >
                        <tr align="center">
                          <th style="width:84px" rowspan="2" align="center">Fecha</th>
                          <th style="width:85px" rowspan="2" align="center">Detalle</th>
                          <th style="width:84px" colspan="3" align="center">Entradas</th>                               
                          <th style="width:84px" colspan="3" align="center">Salidas</th>
                          <th style="width:84px" colspan="3" align="center">Existencias</th>
                        </tr>


                        <tr align="center">
                         <th style="width:28px" align="center">Cantidad</th>
                         <th style="width:28px" align="center">V/Unitario</th>
                         <th style="width:28px" align="center">V/Total</th>                             
                         <th style="width:28px" align="center">Cantidad</th>
                         <th style="width:28px" align="center">V/Unitario</th>
                         <th style="width:28px" align="center">V/Total</th>
                         <th style="width:28px" align="center">Cantidad</th>
                         <th style="width:28px" align="center">V/Unitario</th>
                         <th style="width:28px" align="center">V/Total</th>
                       </tr>


                     </thead>

                   </table>

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
<!--_____________________________________________________________________________-->

<script src="../assets/Validaciones/mostrarKardex.js"></script>


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

