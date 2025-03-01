<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <img alt="logo" src="../assets/img/logo3.jpg" width="100%" height="100%" />
            <li>
                <a href="/SISAUTO1/view/NuevaVenta.php" style="font-size:15px;"><i class="fa fa-dollar"></i> <span class="nav-label">Vender</span>  </a>
            </li>
            <li>
                <a href="" style="font-size:15px;"><i class="fa fa-cart-plus"></i> <span class="nav-label">Compras/Ventas</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">  
                    <li><a href="Compras.php" style="font-size:15px;"><span class="fa fa-shopping-cart"> Compras</span></a></li>
                    <li><a href="Ventas.php" style="font-size:15px;"><span class="fa fa-money"> Ventas</span></a></li> 
                </ul>
            </li>
            <li>
                <a href="" style="font-size:15px;"><i class="fa fa-folder"></i> <span class="nav-label">Catálogo</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="Cliente.php" style="font-size:15px;"><span class="fa fa-user"> Clientes</span></a></li>
                    <li><a href="Proveedor.php" style="font-size:15px;"><span class="fa fa-group"> Proveedores</span></a></li>
                    <li><a href="Producto.php"><span class="fa fa-tags" style="font-size:15px;"> Productos</span></a></li>
                </ul>
            </li>
            <li>
                <a href="" style="font-size:15px;"><i class="fa fa-area-chart"></i> <span class="nav-label">Inventario</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="inventario.php" style="font-size:15px;"><span class="fa fa-book"> Inventario principal</span></a></li>    
                </ul>
            </li>
            <?php include("../confi/Conexion.php");
            $conexion = conectarMysql(); ?>
            <?php if( $_SESSION['usuarioActivo']['tipo_Usu'] == 0 ){?>
            <li>
                <a href="" style="font-size:15px;"><i class="fa fa-unlock-alt"></i> <span class="nav-label">Seguridad</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="Usuarios.php" style="font-size:15px;"><span class="fa fa-group">  Control de usuarios</span></a></li>
                    <li><a href="Bitacora.php" style="font-size:15px;"><span class="fa fa-history"> Bitácora</span></a></li>
                    <li><a href="Respaldo.php" style="font-size:15px;"><span class="fa fa-database"> Administración de backup</span></a></li>

                    <?php 

                    $sql = "SELECT  * FROM numerofactura";
                    $numerosFac = mysqli_query($conexion, $sql) or die("No se pudo ejecutar la consulta"); 
                    $rows = mysqli_num_rows($numerosFac);
                    if ($rows == 0) {?>

                    <li><a data-toggle="modal" data-target="#modalConfigFactura" style="font-size:15px;"><span class="fa fa-wrench"> Configuración</span></a></li>
                    <?php 
                }
                ?>
            </ul>
        </li>
        <?php } ?>
    </ul>

</div>
</nav>
<!-- Logout Modal-->
<div class="modal inmodal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¿Listo para salir?</h5>
            </div>
            <div class="modal-body">
                <p>Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-success" href="../Controlador/cerrar.php">Cerrar sesión</a>
            </div>
        </div>
    </div>
</div>

<!-- el </div> esta en cierre -->
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #343A40;">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-success" href="#"><i class="fa fa-bars"></i> </a>
                <a class="navbar-brand" href="index.php" style="color: white">SISANT</a>
            </div>

            <?php 
            $sql = "SELECT  * FROM producto where tipo_Prod='1' order by nombre_Prod ASC";
            $productos = mysqli_query($conexion, $sql) or die("No se pudo ejecutar la consulta");
            $contador = 0;
            $label = "label-success";
            While($producto = mysqli_fetch_assoc($productos)){
                $idProducto= $producto["idProducto"];
                $sql1 = "SELECT * FROM inventario WHERE id_Producto = '$idProducto' order by idInventario desc";
                $inventario = mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());
                if (mysqli_num_rows($inventario) == 0) {
                    $inventario = 0;
                }else{
                            $inventario = mysqli_fetch_array($inventario);//CAPTURA EL ULTIMO REGISTRO
                            $inventario = $inventario['nuevaExistencia_Inv'];
                        }
                        if ($producto["stock_Prod"] > $inventario) {
                            $contador++;
                            $label = "label-danger";   
                        }
                    }
                    $sql = "SELECT  * FROM producto where tipo_Prod='1' order by nombre_Prod ASC";
                    $productos = mysqli_query($conexion, $sql) or die("No se pudo ejecutar la consulta");
                    
                    ?>

                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i>  <span class="label <?php echo $label ?>" id="infocolor"><?php echo $contador ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <?php 
                                While($producto = mysqli_fetch_assoc($productos)){
                                    $idProducto= $producto["idProducto"];
                                    $sql1 = "SELECT * FROM inventario WHERE id_Producto = '$idProducto' order by idInventario desc";
                                    $inventario = mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD".mysqli_connect_error());
                                    if (mysqli_num_rows($inventario) == 0) {
                                        $inventario = 0;
                                    }else{
                            $inventario = mysqli_fetch_array($inventario);//CAPTURA EL ULTIMO REGISTRO
                            $inventario = $inventario['nuevaExistencia_Inv'];
                        }
                        if ($producto["stock_Prod"] > $inventario) {
                            ?>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i><?php 
                                        // echo $producto['codigo_Prod'].' - '.$producto["nombre_Prod"]; 
                                        if($producto['descripcion_Prod'] == "Ninguna"){
                                           if($producto['categoria_Prod'] == 12){
                                               echo $producto['codigo_Prod'].' - '.$producto['nombre_Prod'].' ('.$producto['marca_Prod'].')';
                                           }else{
                                               echo $producto['codigo_Prod'].' - '.$producto['nombre_Prod'].' ('.$producto['marca_Prod'].', para '.$producto['modeloVehiculo_Prod'].' '.$producto['anioVehiculo_Prod'].') ';
                                           }
                                       }else{
                                           if($producto['categoria_Prod'] == 12){
                                               echo $producto['codigo_Prod'].' - '.$producto['nombre_Prod'].' ('.$producto['marca_Prod'].', '.$producto['descripcion_Prod'].')';
                                           }else{
                                               echo $producto['codigo_Prod'].' - '.$producto['nombre_Prod'].' ('.$producto['marca_Prod'].', '.$producto['descripcion_Prod'].' para '.$producto['modeloVehiculo_Prod'].' '.$producto['anioVehiculo_Prod'].') ';
                                           }
                                       }
                                       ?>  
                                       <span class="pull-right text-muted medium"> Existencias: <?php echo $inventario."/".$producto["stock_Prod"]; ?></span>
                                   </div>
                               </a>
                           </li>
                           <li class="divider"></li>
                           <?php
                       }
                   }
                   ?>

               </ul>
           </li>

           <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                <i class="fa fa-user"></i>&nbsp;<?php echo $_SESSION['usuarioActivo']['nombre_Usu']?>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalVerUsuario" onclick="mostrarUsu('<?php echo $_SESSION['usuarioActivo']['nombre_Usu']?>','<?php echo $_SESSION['usuarioActivo']['telefono_Usu']?>','<?php echo $_SESSION['usuarioActivo']['correo_Usu']?>','<?php echo $_SESSION['usuarioActivo']['direccion_Usu']?>','<?php echo $_SESSION['usuarioActivo']['dui_Usu']?>','<?php echo $_SESSION['usuarioActivo']['usuario_Usu']?>','<?php echo $_SESSION['usuarioActivo']['tipo_Usu']?>');">
                        <span class="text-success">
                            <strong><h4>Perfil</h4></strong>
                        </span>
                        <div class="dropdown-message small"><h4><i class="fa fa-at"></i> <?php echo $_SESSION['usuarioActivo']['usuario_Usu'] ?></h4></div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalEditarUsuarioContrasena" onclick="editarUsuContrasena('<?php echo $_SESSION['usuarioActivo']['usuario_Usu']?>','<?php echo $_SESSION['usuarioActivo']['tipo_Usu']?>','<?php echo $_SESSION['usuarioActivo']['idUsuario']?>');" >
                        <span class="text-success">
                            <strong><h4>Cambiar contraseña</h4></strong>
                        </span>
                        <div class="dropdown-message small"></div>
                    </a>
                </li>
            </ul>
        </li>

        &nbsp;&nbsp;
        <li>
            <a  data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-sign-out"></i> Cerrar sesión
            </a>
        </li>
    </ul>
</nav>
</div>


<!-- MODAL VER USUARIOS -->
<div class="modal fade" id="modalVerUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#007bff;color:black;">
                <h3 class="modal-title" id="myModalLabel"> <i class="fa fa-user"></i> Usuario</h3>
            </div>
            <div class="modal-body">
                <form action="../Controlador/usuarioC.php" method="POST" id="guardarUsu" align="center" autocomplete="off">
                    <h3 align="center"><b>Datos Generales</b></h3>
                    <hr width="100%" style="background-color:#007bff;"/>
                    <input type="hidden" value="GuardarUsu" name="bandera"></input>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-1">
                        </div>
                        <label align="right" for="nombre" class="col-sm-12 col-md-3 col-form-label" style="font-size:15px;">Nombre:</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" placeholder="Nombre Completo" type="text" id="nombreUsu" name="Nombre_Usu" style="width:400px;height:40px" readonly="readonly" aria-required="true" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-1">
                        </div>
                        <label align="right" for="tel3" class="col-sm-12 col-md-3 col-form-label" style="font-size:15px;">Teléfono:</label>
                        <div  class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" id="telefonoUsu" placeholder="9999-9999" data-inputmask="'mask' : '9999-9999'" name="Telefono_Usu" style="width:150px;height:40px" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-1">
                        </div>
                        <label align="right" for="nombre" class="col-sm-12 col-md-3 col-form-label" style="font-size:15px;">Correo:</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" placeholder="Correo" type="email" id="correoUsu" name="Correo_Usu" style="width:400px;height:40px" value="" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-1">
                        </div>
                        <label align="right" for="direccion" class="col-sm-12 col-md-3 col-form-label" style="font-size:15px;">Dirección:</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" placeholder="Dirección" name="Direccion_Usu" style="width:400px;height:40px" id="direccionUsu" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-1">
                        </div>
                        <label align="right" class="col-sm-12 col-md-3 col-form-label" style="font-size:15px;">DUI:</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" placeholder="99999999-9" id="duiUsu" name="DUI_Usu" style="width:150px;height:40px" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-1">
                        </div>
                        <label align="right" for="usuario" class="col-sm-12 col-md-3 col-form-label" style="font-size:15px;">Usuario:</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" placeholder="Nombre de Usuario" id="nombreusuUsu" name="NombreUsu_Usu" style="width:400px;height:40px" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-1">
                        </div>
                        <label align="right" for="usuario" class="col-sm-12 col-md-3 col-form-label" style="font-size:15px;">Tipo de Usuario:</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" placeholder="Tipo de Usuario" id="tipoUsu" name="Tipo_Usu" style="width:400px;height:40px" aria-required="true" value="" readonly="readonly">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#007bff;color:black;font-size:15px;">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDITAR USUARIO -->

<div class="modal fade" id="modalEditarUsuarioContrasena" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#007bff;color:black;">
                <h3 class="modal-title" id="myModalLabel"> <i class="fa fa-user"></i> Editar contraseña usuario</h3>
            </div>
            <div class="modal-body">
                <form action="../Controlador/usuarioC.php" method="POST" id="editarUsuContrasena" align="center" autocomplete="off">
                    <h3 align="center">Datos del usuario</h3>
                    <hr width="75%" style="background-color:#007bff;"/>
                    <input type="hidden" value="EditarUsuContrasena" name="bandera"/>
                    <input type="hidden" value="" name="idusuarioContrasena" id="idusuarioContrasena"/>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-1">
                        </div>
                        <label align="right" for="usuario" class="col-sm-12 col-md-3 col-form-label">Usuario:</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" id="nombreusuUsuContrasenaEditar" name="NombreUsu_Usu" style="width:200px;height:40px" readonly="readonly"aria-required="true" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-1">
                        </div>
                        <label align="right" for="usuario" class="col-sm-12 col-md-3 col-form-label">Tipo de Usuario:</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" id="tipoUsuContrasenaEditar" name="Tipo_Usu" style="width:200px;height:40px" readonly="readonly" aria-required="true" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-1">
                        </div>
                        <label align="right" for="contrasena" class="col-sm-12 col-md-3 col-form-label">Contraseña actual:</label>
                        <div class="col-sm-12 col-md-3">
                            <input class="form-control" type="password" placeholder="******" id="contrasenaActualUsuEditar" name="Contrasena_UsuA" style="width:150px;height:40px" onkeypress="return validarContrasenaActual(this,event,this.value)">
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <a id='mensajito2'></a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-1">
                        </div>
                        <label align="right" for="contrasena" class="col-sm-12 col-md-3 col-form-label">Nueva contraseña:</label>
                        <div class="col-sm-12 col-md-3">
                            <input class="form-control" type="password" placeholder="******" id="contrasenaUsuEditar" name="Contrasena_Usu" style="width:150px;height:40px" onkeypress="return validareditarContrasena(this,event,this.value)">
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <a id='mensajito1'></a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-1">
                        </div>
                        <label align="right" for="contrasena" class="col-sm-12 col-md-3 col-form-label">Vuelve a escribir la nueva contraseña:</label>
                        <div class="col-sm-12 col-md-3">
                            <input class="form-control" type="password" placeholder="******" id="contrasenaUsu2Editar" name="Contrasena_Usu2" style="width:150px;height:40px" onkeyup="return validareditarContrasena2(this,event,this.value)"</a>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <a id='mensajito'></a>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" style="background-color:#007bff;color:black;font-size:15px;" onclick="validareditarUsuarioContrasena();">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#007bff;color:black;font-size:15px;">Cerrar</button>
            </div>
        </div>
    </div>
    <form method="POST" id="cambio">
        <input type="hidden" name="id" id="id"  />
        <input type="hidden" name="bandera" id="bandera" />
        <input type="hidden" name="valor" id="valor" />
    </form>
</div>

<!-- MODAL -->
<div class="modal inmodal" id="modalConfigFactura" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
                <i class="fa fa-check-square-o modal-icon"></i>
                <h4 class="modal-title">Generar numero de facturas desde:</h4>
                <small>...</small>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="../Controlador/facturaC.php" method="POST" id="guardarFac" autocomplete="off">
                    <div class="form-group">
                        <label align="right" class="col-sm-4 control-label" style="font-size:15px;">Credito fiscal:</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" id="numFCredito" name="numFCredito" onkeypress="return validarEntero(this,event,this.value)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label align="right" class="col-sm-4 control-label" style="font-size:15px;">Consumidor final:</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" id="numFConsumidor" name="numFConsumidor" onkeypress="return validarEntero(this,event,this.value)">
                        </div>
                    </div>
                    <input type="hidden" value="factura" name="bandera"> 
                <br>
             </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
              &nbsp;&nbsp;
              <a class="pull-right">
                <button type="button" class="btn btn-success" style="font-size:14px;" onclick="validarNumFacturas();">
                  Aceptar
              </button>
              &nbsp;
          </a>
      </form>
  </div>
</div>
</div>
</div>
<!--___________________________________________________________________________________-->

<script src="../assets/Validaciones/mostrarUsuario.js"></script>
<script src="../assets/Validaciones/validarContrasena.js"></script>
<script src="../assets/Validaciones/validarUsuario.js"></script>
<script src="../assets/Validaciones/validarEntero.js"></script>
<script src="../assets/Validaciones/validarNumFacturas.js"></script>
