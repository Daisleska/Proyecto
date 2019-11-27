 <footer id="footer-main" style="background: #272c33; color: #fff;">
            <div class="container">
                <div class="row">
                    <div class=" col-sm-4">
                        <h4 class="all-tittles">Acerca de</h4>

                        <p class="foo" style="">
                           La misión de la empresa SERVIFORM C.A es asegurar la producción y distribución socialista suficiente y oportuna de productos y servicios de calidad que satisfagan las necesidades y expectativas de productores y productoras agrícolas y demás usuarios. </p>

                    </div>
                    <div class="col-sm-4">
                        <h4 class="all-tittles">Desarrolladores</h4>
                        <br>
                        <ul class="list-unstyled">
                            <li><a href="https://www.facebook.com/hectorher149"><i  class="fa fa-facebook-square"></i>&nbsp;</a> Hector Hernández</li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="#"><i  class="fa fa-facebook-square"></i> &nbsp;</a> Daisleska Vilera</li>
                        </ul>
                         <ul class="list-unstyled">
                            <li><a href="#"><i  class="fa fa-facebook-square"></i> &nbsp;</a> Genessi Escobar</li>
                        </ul>
                    </div>

                     <div class=" col-sm-4">
                        <h4 class="all-tittles">Extras</h4>
                        <br>
                        <ul class="list-unstyled">
                            <li><a class="extras" href="../home/home.php">Inicio</a></li>
                            <li><a class="extras" href="serviform@gmail.com=">Correo</a></li>
                            <li><a class="extras" href="0244-3362419">Telefono</a></li>
                            <li><a class="extras" href="www.facebook.com/serviform">Redes Sociales</a></li>
                        </ul>

                    </div>


                    <div class=" col-sm-12">
                        <h6 style="text-align: center; color: #fff;">SERVIFORM, SERVICIOS DE FORMULACIÓN C.A La Victoria &copy RIF J-30478166-0</h6>
                        
                    </div>

                </div>
            </div>

        </footer>

          <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../../vendors/js/iziToast.min.js"></script>

    <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="../../assets/js/init-scripts/data-table/datatables-init.js"></script>

<script src="../../assets/js/jquery.min.js" ></script>
  <script src="../../vendors/plugins/datepicker/bootstrap-datepicker.js"></script>
 <script src="../../vendors/plugins/daterangepicker/daterangepicker.js"></script>
 <script src="../../vendors/chosen/chosen.jquery.min.js"></script>

 <!-- InputMask -->
<script src="../../vendors/js/jquery.inputmask.js"></script>
<script src="../../vendors/js/jquery.inputmask.date.extensions.js"></script>
<script src="../../vendors/js/jquery.inputmask.extensions.js"></script>
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>

 

 
      <!--  plugins sweet alert 2 -->
   <script src="../../vendors/plugins/sweetalert2.all.min.js"></script>
   <script src="../../vendors/popper.js/codigo.js"></script>
   <script type="text/javascript">
      function eliminar(id){

        swal({
        title: "¡Advertencia!",
        text: "¿Ésta seguro que deseas salir?",
        icon: "warning",
        buttons: ['Cancelar','Salir'],
        dangerMode: 'Salir',
      })
      .then((willDelete) => {
        if (willDelete) {
                    
          window.location="../../../index.php";

        } else {
                    

         }
        });      
      }
</script>





</body>

</html>
