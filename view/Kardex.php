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
                        <label for="" class="col-sm-3 control-label">Producto:</label>
                        <div class="col-sm-6">
                          <input class="form-control" placeholder="" type="text" name="" id="">
                        </div>
                      </div>  
                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Stock mínimo:</label>
                        <div class="col-sm-3">
                          <input class="form-control" placeholder="" type="text" name="" id="">
                        </div>
                      </div> 
                      <hr width="75%" style="background-color:#007bff;"/><br>
                          <div class="table-responsive">
                          <table class="table table-striped table-bordered display" id="example">
                            <thead>
                            
                               <tr>
                                   <th style="width:85px">Fecha</th>
                                   <th style="width:85px">Detalle</th>
                                   <th style="width:85px">Entradas</th>                               
                                   <th style="width:85px">Salidas</th>
                                   <th style="width:85px">Existencias</th>
                                </tr>
                              

                            </thead>
                            
                              </table>
                            </div>

                    </form>
                  </div>
                </div>
              </div>
              <?php include("generalidades/cierre.php"); ?>

              <!--_____________________________________________________________________________-->


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

