<?php
session_start();
if (isset($_SESSION['usuarioActivo'])) {
  if ($_SESSION['usuarioActivo']['tipo_Usu']=='0') {
    ?>
    <?php 
    $idcategoria = $_GET["idcategoria"];
    $tipor = $_GET["tipor"];
    ?>
    <!doctype html>
    <html>
    <head>
      <meta charset="utf-8">

      <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">

      <link href="../assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
      <link href="../assets/package/dist/sweetalert2.css" rel="stylesheet">

      <!-- Toastr style -->
      <link href="../assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

      <!-- Gritter -->
      <link href="../assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

      <link href="../assets/css/animate.css" rel="stylesheet">
      <link href="../assets/css/style.css" rel="stylesheet">
      <link href="../assets/pNotify/pnotify.custom.min.css" rel="stylesheet">
      <script src="../assets/package/dist/sweetalert2.js"></script>

      <link href="../assets/css/plugins/iCheck/custom.css" rel="stylesheet">
      <link href="../assets/css/plugins/chosen/chosen.css" rel="stylesheet">
      <link href="../assets/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
      <link href="../assets/css/plugins/cropper/cropper.min.css" rel="stylesheet">
      <link href="../assets/css/plugins/switchery/switchery.css" rel="stylesheet">
      <link href="../assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
      <link href="../assets/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
      <link href="../assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
      <link href="../assets/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
      <link href="../assets/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
      <link href="../assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
      <link href="../assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
      <link href="../assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
      <link href="../assets/css/plugins/select2/select2.min.css" rel="stylesheet">
      <link href="../assets/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
      <link href="../assets/css/animate.css" rel="stylesheet">
      <link href="../assets/css/style.css" rel="stylesheet">


      <script language="javascript">
       function imprimir(){
        if(!window.print){
         alert("El navegador no permite la impresion..");
         return;
       }
       else{
        document.frmTesis.IM.style.visibility="hidden";
        window.print();
        document.frmTesis.IM.style.visibility="visible";
      }
    }
  </script>
</head>
<?php $cate = array(1 => "AMORTIGUADORES", 2 => "BUJÍAS",
4 => "ELÉCTRICO", 5 => "ENFRIAMIENTO", 6 => "FILTROS", 7 => "FRENOS", 8 => "MOTOR", 9 => "SENSORES", 10 => "SUSPENSIÓN Y DIRECCIÓN", 11 => "TRANSMISIÓN Y EMBRAGUE", 12 => "UNIVERSALES"); ?>
<body>
  <table width="685" border="0" align="center">
    <tr>
      <td width="5"><img src="../../assets/img/aut3.png" width="150" height="75"> </td>

      <td  align="center">
        <span class="titulos"><p style="font-size: 25px; font-family: sans-serif">Auto-Repuestos Vaquerano</p>
          <p>4a Avenida Norte y 3a Calle Oriente Barrio El Santuario, San Vicente.</p>
          <p>Teléfono: 2393-0214.</p></span></td>
        </tr>
        <tr align="center">
          <td colspan="2"><strong class="titulos">REPORTE DE PRODUCTOS</strong></td>
        </tr>
        <tr align="right">
          <td>&nbsp;</td>
          <td>FECHA IMPRESIÓN:  <?php echo date("d-m-Y"); ?>
            <br>
            HORA  IMPRESIÓN:   <?php
            date_default_timezone_set('America/El_Salvador');
            $date = new DateTime();
            echo $date->format('h:i:s A');
            ?></td>
          </tr>
        </table>

        <?php

        include("../../confi/Conexion.php");
        $conexion = conectarMysql(); 

        if($tipor == 1){?>

          <table width="685" border="0" align="center">
            <tr align="center">
              <br>
              <td ><strong class="titulos" align="center">CATEGORÍA: </strong>
              <?php 
              if($idcategoria == '1'){
                echo "AMORTIGUADORES";
              }else if($idcategoria == '2'){
                echo "BUJÍAS";
              }else if($idcategoria == '4'){
                echo "ELÉCTRICO";
              }else if($idcategoria == '5'){
                echo "ENFRIAMIENTO";
              }else if($idcategoria == '6'){
                echo "FILTROS";
              }else if($idcategoria == '7'){
                echo "FRENOS";
              }else if($idcategoria == '8'){
                echo "MOTOR";
              }else if($idcategoria == '9'){
                echo "SENSORES";
              }else if($idcategoria == '10'){
                echo "SUSPENSIÓN Y DIRECCIÓN";
              }else if($idcategoria == '11'){
                echo "TRANSMISIÓN Y EMBRAGUE";
              }else if($idcategoria == '12'){
                echo "UNIVERSALES";
              }
               
              ?>
              </td>
            </tr>
          </table>
          <?php }?>
          <br><br>
          <table width="800" border="1" align="center" rules="all">
            <tr bgcolor="#CCCCCC">
              <td width="29" align="center" bgcolor="#fcf3b3" class=""><strong>N°</strong></td>
              <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Código</td>
              <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Nombre</td>
              <?php if ($tipor == 2) {?>
              <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Categoria</td>
              <?php }  ?>
              <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Marca</td>
              <?php if ($idcategoria != 12 && $tipor == 1) {?>
              <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Vehículo</td>
              <!-- <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Año Vehículo</td> -->
              <?php }  ?>
              <?php if ($tipor == 2) {?>
              <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Vehículo</td>
              <!-- <td width="87" align="center" bgcolor="#fcf3b3" class="formatoTabla">Año Vehículo</td> -->
              <?php }  ?>
            </tr>
            <?php
	//try {
	//$fechainicio=$_REQUEST["fechainicio"];
	//$fechafinal=$_REQUEST["fechafinal"];

            $contador=1;
	//if($fechainicio!= NULL && $fechafinal!= NULL){ 
            if($tipor == 1){
              $sql = "select * from producto where tipo_Prod='1' and categoria_Prod = '$idcategoria' order by nombre_Prod ASC";  
            }else{
              $sql = "select * from producto where tipo_Prod='1' order by nombre_Prod ASC";
            }

	//$consulta=mysqli_query($conexion,$sql);
	//$consulta = mysql_query("SELECT * FROM bitacora", $conexion);
            $consulta=mysqli_query($conexion,$sql);
//  var_dump($consulta);

            while($fila=mysqli_fetch_array($consulta))

            {
             ?>
             <tr align="left" class="">
              <td align="center" bgcolor=""><?php echo $contador;?></td>
              <td align="center" bgcolor=""><?php echo $fila[7];?></td>
              <td align="center" bgcolor=""><?php echo $fila[1];?></td>
              <?php if ($tipor == 2) {?>
              <td align="center" bgcolor=""><?php echo $cate[$fila['categoria_Prod']];?></td>
              <?php }  ?>
              <td align="center" bgcolor=""><?php echo $fila[3];?></td>

              <?php if ($idcategoria != 12 && $tipor == 1) {?>
              <!-- <td align="center" bgcolor=""><?php echo $fila[5];?></td> -->
              <td align="center" bgcolor=""><?php 
                if($idcategoria != 12){
                  echo $fila[5].', '.$fila[6];
                }else{
                 echo ""; 
               }?></td>
               <?php }  ?>

               <?php if ($tipor == 2) {?>
               <!-- <td align="center" bgcolor=""><?php echo $fila[5];?></td> -->
               <td align="center" bgcolor=""><?php 
                if($fila[6] != 0){
                  echo $fila[5].', '.$fila[6];
                }else{
                 echo ""; 
               }?></td>
               <?php }  ?>
             </tr>
            <?php $contador++;
          }
  // }
  //}catch(NullException $e){}catch(Exception $e){}
          ?>
        </table>
        <form name="frmTesis" method="get" action="" id="frmTesis">
          <p align="center"><input class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo" style="font-size:17px;" type="button" name="IM" id="IM" value="IMPRIMIR" onClick="imprimir()"></p>
        </form>
        <p>&nbsp;</p>
      </body>
      </html>

      <?php
    }else{
      ?>
      <!DOCTYPE HTML>
      <html>
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="refresh" content="0;URL=/SISAUTO1/view/index.php">
      </head>
      <body>
      </body>
      </html>
      <?php
    }
    ?>
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
