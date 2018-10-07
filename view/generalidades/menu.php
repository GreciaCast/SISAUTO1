        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <img alt="logo" src="../assets/img/aut3.png" width="100%" height="100%" />
                    <li>
                        <a href="/SISAUTO1/view/NuevaVenta.php"><i class="fa fa-dollar"></i> <span class="nav-label">Vender</span>  </a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-cart-plus"></i> <span class="nav-label">Compras/Ventas</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="">Compras</a></li>
                            <li><a href="">Ventas</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-folder"></i> <span class="nav-label">Catalogo</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="Cliente.php"><span class="fa fa-user"> Cliente</span></a></li>
                            <li><a href="Proveedor.php"><span class="fa fa-group"> Proveedor</span></a></li>
                            <li><a href=""><span class="fa fa-tags"> Producto</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-area-chart"></i> <span class="nav-label">Inventario</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href=""><span class="fa fa-book"> Inventario Principal</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-unlock-alt"></i> <span class="nav-label">Seguridad</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href=""><span class="fa fa-group">  Control Usuarios</span></a></li>
                            <li><a href=""><span class="fa fa-history"> Bitacora</span></a></li>
                            <li><a href=""><span class="fa fa-database"> Administrar Backup</span></a></li>
                        </ul>
                    </li>
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
                            <a class="navbar-brand" href="index.php" style="color: white">SISAUTO</a>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                    <i class="fa fa-bell"></i>  <span class="label label-success">8</span>
                                </a>
                                <ul class="dropdown-menu dropdown-alerts">
                                    <li>
                                        <a href="mailbox.html">
                                            <div>
                                                <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="profile.html">
                                            <div>
                                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                                <span class="pull-right text-muted small">12 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="grid_options.html">
                                            <div>
                                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="text-center link-block">
                                            <a href="notifications.html">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>


                            <li>
                                <a  data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-sign-out"></i> Cerrar sesión
                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>

                <?php include("../confi/Conexion.php");
                $conexion = conectarMysql();
                $sql1 = "SELECT * FROM usuario where idUsuario = 62";//Cambiar 62 por usuario que esta logueado
                $usuariosLogueado= mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
                $usuarioL = mysqli_fetch_assoc($usuariosLogueado) ;
            ?>