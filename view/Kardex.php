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
      $aux1 = $_GET['idproducto']; 
      $sql1 = "SELECT * FROM producto where idProducto = '$aux1'";
      $producto = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
      $producto = mysqli_fetch_array($producto);
      ?>

      <?php                                  
      if($producto['descripcion_Prod'] == "Ninguna"){
       if($producto['categoria_Prod'] == 12){
         $nombreProKar = $producto['nombre_Prod'].' ('.$producto['marca_Prod'].')';
       }else{
        $nombreProKar = $producto['nombre_Prod'].' ('.$producto['marca_Prod'].', para '.$producto['modeloVehiculo_Prod'].' '.$producto['anioVehiculo_Prod'].') ';
      }
    }else{
     if($producto['categoria_Prod'] == 12){
      $nombreProKar = $producto['nombre_Prod'].' ('.$producto['marca_Prod'].', '.$producto['descripcion_Prod'].')';
    }else{
      $nombreProKar = $producto['nombre_Prod'].' ('.$producto['marca_Prod'].', '.$producto['descripcion_Prod'].' para '.$producto['modeloVehiculo_Prod'].' '.$producto['anioVehiculo_Prod'].') ';
    }
  }
  $sql1 = "SELECT * FROM inventario where id_Producto = '$aux1'";
  $inventarios = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");

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
                    <label for="" class="col-sm-3 control-label">Código:</label>
                    <div class="col-sm-3">
                      <input class="form-control" placeholder="" type="text" name="" id="kardexCodigo" value="<?php echo $producto['codigo_Prod']; ?>">

                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Producto:</label>
                    <div class="col-sm-6">
                      <input class="form-control" placeholder="" type="text" name="" id="kardexProduc" value="<?php echo  $nombreProKar; ?>">

                    </div>
                  </div>  
                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Stock mínimo:</label>
                    <div class="col-sm-3">
                      <input class="form-control" placeholder="" type="text" name="" id="kardexStock" value="<?php echo $producto['stock_Prod']; ?>">
                    </div>
                  </div> 
                  <hr width="100%" style="background-color:#007bff;"/><br>
                  <div class="table-responsive" align="center" >
                    <table class="table table-striped table-bordered display" align="center" border="5"> 
                    <thead align="center" style="width:100%">
                        <tr align="center">
                          <th rowspan="2" align="center">Fecha</th>
                          <th rowspan="2" align="center">Detalle</th>
                          <th colspan="3" align="center">Entradas</th>                               
                          <th colspan="3" align="center">Salidas</th>
                          <th colspan="3" align="center">Existencias</th>
                        </tr>
                        <tr>
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

                        <?php While ($inventario = mysqli_fetch_assoc($inventarios)) { ?>

                        <tr align="center">
                         <td  align="center"><?php echo $inventario["fechaMovimiento_Inv"]; ?></td>
                         <td  align="center">
                         <?php if ($inventario["tipoMovimiento_Inv"]==0) {
                           echo "Compra";
                         } else if($inventario["tipoMovimiento_Inv"]==1){
                           echo "Venta";
                         } else if($inventario["tipoMovimiento_Inv"]==2){
                          echo "Modificación de la compra";
                         } else if($inventario["tipoMovimiento_Inv"]==3){
                           echo "Eliminación de la compra";
                         } else if($inventario["tipoMovimiento_Inv"]==4){
                           echo "Devolución de la compra";
                         } else if($inventario["tipoMovimiento_Inv"]==5){
                           echo "Anulación de la venta";
                         }

                          ?>
                          <?php if ($inventario["existencias_Inv"]<$inventario["nuevaExistencia_Inv"]) {
                            ?>
                            <td  align="center"><?php  echo $inventario["cantidad_Inv"];?></td>
                            <td  align="center"><?php  echo $inventario["precio_Inv"];?></td>
                            <td  align="center"><?php  echo $inventario["cantidad_Inv"]* $inventario["precio_Inv"]; ?></td><td></td><td></td> <td></td>
                            <?php
                           
                         }else{
                          ?>
                            <td></td><td></td> <td></td>
                            <td  align="center"><?php  echo $inventario["cantidad_Inv"];?></td>
                            <td  align="center"><?php  echo $inventario["precio_Inv"];?></td>
                            <td  align="center"><?php  echo $inventario["cantidad_Inv"]* $inventario["precio_Inv"]; ?></td>
                            <?php
                          } ?>
                          <td  align="center"><?php  echo $inventario["nuevaExistencia_Inv"];?></td>
                            <td  align="center"><?php  echo $inventario["nuevoPrecio_Inv"];?></td>
                            <td  align="center"><?php  echo $inventario["nuevaExistencia_Inv"]* $inventario["nuevoPrecio_Inv"]; ?></td>
                            
                                     
                       </tr>
                       <?php  }?>

                     </thead>

                   </table>

                 </div>
                 
                    <a target="_blank" href="Reportes/ReporteKardex.php" >
                      <button title="Imprimir" type="button" class="btn" style="color:#fff; background-color:#28a745; width:90px; height:40px" onclick="">Imprimir</button>
                    </a>
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

