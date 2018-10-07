</div> <!-- Abre en menu.php-->
<div class="row">
    <div class="text-center">
        <div class="footer">
            <div>
                <strong>UES-FMP</strong> . DERECHOS RESERVADOS 2018
            </div>
        </div>
    </div>
</div>

</div>
</div>

<!-- Mainly scripts -->
<script src="../assets/js/jquery-2.1.1.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="../assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/js/plugins/jeditable/jquery.jeditable.js"></script>
<script src="../assets/js/plugins/dataTables/datatables.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="../assets/js/inspinia.js"></script>
<script src="../assets/js/plugins/pace/pace.min.js"></script>

<!-- Flot -->
<script src="../assets/js/plugins/flot/jquery.flot.js"></script>
<script src="../assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="../assets/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="../assets/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="../assets/js/plugins/flot/jquery.flot.pie.js"></script>

<!-- Peity -->
<script src="../assets/js/plugins/peity/jquery.peity.min.js"></script>
<script src="../assets/js/demo/peity-demo.js"></script>

<!-- jQuery UI -->
<script src="../assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- GITTER -->
<script src="../assets/js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="../assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="../assets/js/demo/sparkline-demo.js"></script>

<!-- ChartJS-->
<script src="../assets/js/plugins/chartJs/Chart.min.js"></script>

<!-- Toastr -->
<script src="../assets/js/plugins/toastr/toastr.min.js"></script>
<!-- Nuevos -->

<!-- Chosen -->
<script src="../assets/js/plugins/chosen/chosen.jquery.js"></script>

<!-- JSKnob -->
<script src="../assets/js/plugins/jsKnob/jquery.knob.js"></script>

<!-- Input Mask-->
<script src="../assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- Data picker -->
<script src="../assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- NouSlider -->
<script src="../assets/js/plugins/nouslider/jquery.nouislider.min.js"></script>

<!-- Switchery -->
<script src="../assets/js/plugins/switchery/switchery.js"></script>

<!-- IonRangeSlider -->
<script src="../assets/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

<!-- iCheck -->
<script src="../assets/js/plugins/iCheck/icheck.min.js"></script>

<!-- Color picker -->
<script src="../assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

<!-- Clock picker -->
<script src="../assets/js/plugins/clockpicker/clockpicker.js"></script>

<!-- Image cropper -->
<script src="../assets/js/plugins/cropper/cropper.min.js"></script>

<!-- Date range use moment.js same as full calendar plugin -->
<script src="../assets/js/plugins/fullcalendar/moment.min.js"></script>

<!-- Date range picker -->
<script src="../assets/js/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Select2 -->
<script src="../assets/js/plugins/select2/select2.full.min.js"></script>

<!-- TouchSpin -->
<script src="../assets/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="../assets/Validaciones/mensajes.js"></script>
<script src="../assets/pNotify/pnotify.custom.min.js"></script>
<script>
    $(document).ready(function(){
        $('#example').DataTable({
            "order":[[2,"asc"]],
            "language":{
                "lengthMenu": "Mostrar _MENU_ registro por página",
                "info": "Mostrando pagina _PAGE_ de _PAGE_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrada de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search": "Buscar:",
                "zeroRecords":      "No se encontraron registro coincidentes",

                "paginate": {
                    "next":     "Siguiente",
                    "previous": "Anterior"
                },
            }
        });
        $('#example').css("font-size",15);
        $('#example').css("color","#323639");

    });

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData( [
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row" ] );

    }
</script>

<?php
if (isset($_SESSION['mensaje'])) {
   echo ("<script type='text/javascript'>
    notaInfo('".$_SESSION['mensaje']."');
</script>");
   unset($_SESSION['mensaje']);
}
?>