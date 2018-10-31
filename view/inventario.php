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
    <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
        <h2></h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.php" style="font-size:15px;color:blue;">Inicio</a>
          </li>
          <li>
            <a style="font-size:15px;">Inventario</a>
          </li>
        </ol>
      </div>
      <div class="col-lg-2">
      </div>
    </div>
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
        <a class="pull-right" href="">
          
            <button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo" style="font-size:16px;">
            Ver compras 
            <span class="fa fa-eye"></span>
          </button>
            <button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo" style="font-size:16px;">
            Ver ventas 
            <span class="fa fa-eye"></span>
          </button>
          &nbsp;
        </a>
               
        
        
      </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="wrapper wrapper-content">
              <div class="row">
                <div class="col-lg-12">
                  <div class="ibox float-e-margins">
                    <div class="ibox-content">
                      <form class="form-horizontal" action=" " method="POST"  autocomplete="off">
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered display" id="example">
                            <thead>
                               <tr>
                                   <th style="width:90px" >Código Producto</th>
                                   <th style="width:125px" >Nombre</th>
                                   <th style="width:100px" >Existencias Iniciales</th>
                                   <th style="width:60px" >Entradas</th>
                                   <th style="width:60px" >Salidas</th>
                                   <th style="width:60px" >Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                </tbody>
                              </table>
                            </div>
                          </form>
                       
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