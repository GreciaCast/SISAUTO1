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
    <?php include("funciones.php"); ?>
		<!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
		<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2></h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.php" style="font-size:15px;color:blue;">Inicio</a>
					</li>
					<li>
						<a style="font-size:15px;">Proveedores</a>
					</li>
				</ol>
			</div>
			<div class="col-lg-2">

			</div>
		</div>
		<?php if (!isset($_GET['tipo'])) {
			$tipo=1;
		}else{
			$tipo = $_GET['tipo'];
		}?>
		<?php
		$sql="SELECT * from proveedor where tipo_Prov='$tipo' order by nombre_Prov ASC";
		$proveedores= mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");
		?>
		<div class="row">
			<div class="col-12">
			<div class="row" style="padding:20px">
				<br>
				<a class="pull-right" target="_blank" href="Reportes/ReporteProveedor.php">
					<button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo" style="font-size:16px;">
						Reporte
						<span class="fa fa-file-pdf-o"></span>
					</button>
          &nbsp;
				</a>
        <?php if( $_SESSION['usuarioActivo']['tipo_Usu'] == 0 ){?>
				<a class="pull-right" href="AgregarPro.php">
					<button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo" style="font-size:16px;">
						Agregar nuevo
						<span class="fa fa-plus"></span>
					</button>
          &nbsp;
				</a>
				<?php  if ($tipo == 1) { ?>
				<a class="pull-right" href="/SISANT/view/Proveedor.php?tipo=0">
					<button class="btn btn-success" style="font-size:16px;">
						Ver proveedores inactivos  <i class="fa fa-bars"></i>
					</button>
          &nbsp;
				</a>
				<?php  }else{ ?>
				<a class="pull-right" href="/SISANT/view/Proveedor.php?tipo=1">
					<button class="btn btn-success" style="font-size:16px;">
						Ver proveedores activos <i class="fa fa-bars"></i>
					</button>
          &nbsp;
				</a>
        <?php } ?>
			</div>
				<?php } ?>
				<div class="row">
					<div class="col-lg-12">
						<div class="wrapper wrapper-content">
							<div class="row">
								<div class="col-lg-12">
									<div class="ibox float-e-margins">
										<div class="ibox-content">
											<form class="form-horizontal" action="../Controlador/proveedorC.php" method="POST" id="guardarPro" autocomplete="off">
												<div class="table-responsive">
													<table class="table table-striped table-bordered display" id="example">
														<thead>
															<tr>
																<th style="width:150px">Empresa</th>
																<th style="width:80px">Teléfono</th>
																<th style="width:175px">Responsable</th>
                                <?php if( $_SESSION['usuarioActivo']['tipo_Usu'] == 0 ){?>
																  <th align="center" style="width:2px">Acciones</th>
                                <?php  }else{ ?>
                                  <th align="center" style="width:2px">Acción</th>
                                <?php } ?>
															</tr>
														</thead>
														<tbody>
															<?php While($proveedore=mysqli_fetch_assoc($proveedores)){?>
															<tr>
																<td><?php echo $proveedore['nombre_Prov'] ?></td>

																<td><?php echo $proveedore['telefono_Prov'] ?></td>
																<td><?php echo $proveedore['nombreResp_Prov'] ?></td>

																<th align="center">
                                <!-- ____________________________________________________ -->
                                  <?php
                                    $cuenta = contarProducto($proveedore['idProveedor'] );
                                  ?>
                                <!-- ____________________________________________________ -->
																	<button title="Ver"type="button" class="btn btn-info fa fa-eye" data-toggle="modal" data-target="#modalVerProveedor" href="" onclick="mostrarPro('<?php echo $proveedore['nombre_Prov']?>','<?php echo $proveedore['correo_Prov']?>','<?php echo $proveedore['telefono_Prov']?>','<?php echo $proveedore['direccion_Prov']?>','<?php echo $proveedore['nombreResp_Prov']?>','<?php echo $proveedore['telefonoResp_Prov']?>','<?php echo $proveedore['descripcion_Prov']?>');"></button>
                                  <?php if( $_SESSION['usuarioActivo']['tipo_Usu'] == 0 ){?>
																	<?php  if ($tipo == 1) {?>
																		<button title="Editar" type="button" class="btn btn-success fa fa-pencil-square-o" data-toggle="modal" data-target="#modalEditarProveedor" onclick="editarPro('<?php echo $proveedore['nombre_Prov']?>','<?php echo $proveedore['correo_Prov']?>','<?php echo $proveedore['telefono_Prov']?>','<?php echo $proveedore['direccion_Prov']?>','<?php echo $proveedore['nombreResp_Prov']?>','<?php echo $proveedore['telefonoResp_Prov']?>','<?php echo $proveedore['idProveedor']?>','<?php echo $proveedore['descripcion_Prov']?>');"></button>
																		<?php  }else{ }?>
																		<?php  if ($tipo == 1) {
                                        if($cuenta == 0){
																			?>
																			<button title="Dar de baja" type="button" class="btn btn-danger fa fa-arrow-circle-down" onclick="baja(<?php echo $proveedore['idProveedor'] ?>)"></button>
																			<?php
                                        }else{}
                                        }else{ ?>
																			<button title="Dar de alta" type="button" class="btn fa fa-arrow-circle-up" style="color:#fff; background-color:#28a745" onclick="alta(<?php echo $proveedore['idProveedor'] ?>)"></button>
																			<?php } ?>
                                      <?php } ?>
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
						<!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
					</div>
          <?php include("generalidades/cierre.php"); ?>
				</div>

			</div>

		<!-- MODAL VER PROVEEDOR -->

         <div class="modal fade" id="modalVerProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#007bff;color:black;">

                    <h3 class="modal-title" id="myModalLabel"> <i class="fa fa-user"></i> Proveedor</h3>
                </div>
                <div class="modal-body">
                        <h3 align="center"><b>Datos Generales</b></h3>
                        <hr width="75%" style="background-color:#007bff;"/>
                        <div class="form-group ">
                            <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Nombre Empresa:</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" id="nombrePro" name="Nombre_Prov" readonly="readonly" aria-required="true" value="">
                            </div>
                        </div>
                        <br><br><br><br>
                        <div class="form-group">
                            <label align="right" for="tel3" class="col-sm-4 control-label" style="font-size:15px;">Correo:</label>
                            <div  class="col-sm-7">
                                <input class="form-control" type="email" id="correoPro" data-inputmask="'mask' : '9999-9999'" name="Correo_Pro" disabled="true">
                            </div>
                        </div>
                        <br><br><br>
                        <div class="form-group">
                            <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Teléfono:</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" id="telefonoPro" name="Correo_Usu" value="" disabled="true">
                            </div>
                        </div>
                        <br><br><br>
                        <div class="form-group">
                            <label align="right" for="direccion" class="col-sm-4 control-label" style="font-size:15px;">Dirección:</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="Direccion_Pro" id="direccionPro" disabled="true">
                            </div>
                        </div>
                        <br><br>
                        <h3 align="center"><b>Datos del Responsable</b></h3>
                        <hr width="75%" style="background-color:#007bff;"/>
                        <div class="form-group">
                            <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Nombre Responsable:</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" id="nombreRes" name="NombreUsu_Usu" disabled="true">
                            </div>
                        </div>
                        <br><br><br><br>
                        <div class="form-group">
                            <label align="right" for="usuario" class="col-sm-4 control-label" style="font-size:15px;">Teléfono:</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" id="telefonoRes" name="DUI_Usu" disabled="true">
                            </div>
                        </div>
                        <div id="ocultar">
                        <br><br><br>
                        <div class="form-group">
                            <label align="right" for="usuario" class="col-sm-4 control-label" style="font-size:15px;">Descripción:</label>
                            <div class="col-sm-7">
                               <textarea class="form-control" type="text" name="descripcion"  placeholder="Escriba aqui..." id="descripcionProv" disabled="true">
                               </textarea>
                            </div>
                        </div>
                       </div>
                </div>
                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#007bff;color:black;font-size:15px;">Cerrar</button>
                </div>
            </div>
        </div>

            </div>

            <!-- MODAL EDITAR PROVEEDOR -->

            <div class="modal fade" id="modalEditarProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header" style="background-color:#007bff;color:black;">

                    <h3 class="modal-title" id="myModalLabel"> <i class="fa fa-user"></i> Proveedor</h3>
                  </div>
                  <div class="modal-body">
                   <form action="../Controlador/proveedorC.php" method="POST" id="editarPro" align="center" autocomplete="off">
                    <h3 align="center"><b>Datos Generales</b></h3>
                    <hr width="75%" style="background-color:#007bff;"/>
                      <input type="hidden" value="EditarPro" name="bandera"/>
                      <input type="hidden" value="" name="idproveedor" id="idproveedor"/>
                    <div class="form-group ">
                      <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Nombre Empresa:</label>
                      <div class="col-sm-7">
                        <input class="form-control" type="text" id="nombreProEditar" name="Nombre_Emp"  aria-required="true" value="">
                      </div>
                    </div>
                    <br><br><br><br>
                    <div class="form-group">
                      <label align="right" for="tel3" class="col-sm-4 control-label" style="font-size:15px;">Correo:</label>
                      <div  class="col-sm-7">
                        <input class="form-control" type="email" id="correoProEditar" name="Correo_Emp" onkeyup="validarCorreoProvEditar(this)"><a id='correoProvEditar'></a>
                      </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                      <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Teléfono:</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" id="telefonoProEditar" name="Telefono_Emp" data-mask="9999-9999" value="" >
                      </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                      <label align="right" for="direccion" class="col-sm-4 control-label" style="font-size:15px;">Dirección:</label>
                      <div class="col-sm-7">
                        <input class="form-control" type="text" name="Direccion_Emp" id="direccionProEditar" >
                      </div>
                    </div>
                    <br><br>
                    <h3 align="center"><b>Datos del Responsable</b></h3>
                    <hr width="75%" style="background-color:#007bff;"/>
                    <div class="form-group">
                      <label align="right" for="nombre" class="col-sm-4 control-label" style="font-size:15px;">Nombre Responsable:</label>
                      <div class="col-sm-7">
                        <input class="form-control" type="text" id="nombreResEditar" name="Nombre_Res" >
                      </div>
                    </div>
                    <br><br><br><br>
                    <div class="form-group">
                      <label align="right" for="usuario" class="col-sm-4 control-label" style="font-size:15px;">Teléfono:</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" id="telefonoResEditar" name="Telefono_Res" data-mask="9999-9999">
                      </div>
                    </div>
                      <br><br><br>
                      <div class="form-group">
                        <label align="right" for="usuario" class="col-sm-4 control-label" style="font-size:15px;">Descripción:</label>
                        <div class="col-sm-7">
                         <textarea class="form-control" type="text" name="descripcion"  placeholder="Escriba aqui porque va a modificar el nombre de la empresa " id="descripcionProvEditar" >
                         </textarea>
                       </div>
                     </div>
                  </form>
                 </div>
                 <br><br>
                 <div class="modal-footer">
                  <input type="hidden" id="anterior" value=""  />
                  <button type="button" class="btn btn-default" style="background-color:#007bff;color:black;font-size:15px;" onclick="validareditarProveedor()">Aceptar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#007bff;color:black;font-size:15px;">Cerrar</button>
                </div>
              </div>
            </div>
            <form method="POST" id="cambioProv">
              <input type="hidden" name="id" id="idProv"  />
              <input type="hidden" name="bandera" id="banderaProv" />
              <input type="hidden" name="valor" id="valorProv" />
            </form>
          </div>

            <!-- _______________________________________________________________________________________ -->
					         <script src="../assets/Validaciones/mostrarProveedor.js"></script>
                    <script src="../assets/Validaciones/validarProveedor.js"></script>
                    <script src="../assets/Validaciones/validarCorreo.js"></script>
                    <script src="../assets/Validaciones/validarNombreCompletoUsuario.js"></script>

         <script type="text/javascript">
            function baja(id){
                swal({
                    title: '¿Está seguro en dar de baja?',
                  // text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si',
                  cancelButtonText: 'No',

              }).then((result) => {
                if(result.value){
                $('#idProv').val(id);
                $('#banderaProv').val('cambio');
                $('#valorProv').val('0');
                var dominio = window.location.host;
                 $('#cambioProv').attr('action','http://'+dominio+'/SISANT/Controlador/proveedorC.php');
                 $('#cambioProv').submit();
                 }else{

                }
            })
            }

            function alta(id){
                swal({
                    title: '¿Está seguro en dar de alta?',
                  // text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si',
                  cancelButtonText: 'No',

              }).then((result) => {
                if(result.value){
                $('#idProv').val(id);
                $('#banderaProv').val('cambio');
                $('#valorProv').val('1');
                var dominio = window.location.host;
                 $('#cambioProv').attr('action','http://'+dominio+'/SISANT/Controlador/proveedorC.php');
                 $('#cambioProv').submit();
                 }else{

                 }
            })
            }
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
<meta http-equiv="refresh" content="0;URL=/SISANT/view/login.php">
</head>
<body>
</body>
</html>
    <?php
}
?>
