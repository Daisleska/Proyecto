<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
$data=unserialize($data);
?>

 <div class="content mt-3" style="padding-left: 20px;">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                 
                  <section  class="content-header">
                             <ol class="breadcrumb">
       
                            <h1 align="center">  <span style="margin-left: 8.5cm;" class="badge badge-info">Bitácora de Acciones <i class="menu-icon fa fa-list"></i> </span></h1>
        
                            </ol>
                  </section >
             </div>
                                        
             </div>
           </div>
         </div>
         
            <br>
                      
                          
                      
                  
 
              <div class="table-responsive" style="padding-left: 30px; padding-right: 20px;">
                                <table class="table table-striped table-sm " id="table">
                                    <thead>
                                       <tr>
                                        <th>ID</th>
                                        <th>Usuario</th>
                                        <th>Actividad</th>
                                        <th>Tabla</th>
                                        <th>Fecha y Hora</th>
                                     
                                    </thead>
                                    <tbody>
                                      <?php $num=1;
                                    for($i=0; $i < $filas; $i++){

                                    echo "<tr>";
                                    ?>

                                    <td><?=$num?></td>
                                    <?php 
                                    for ($j=1; $j < $campos; $j++) 
                                    { 
                                     ?>

                                    <td><?=$data[$i][$j]?></td>


                                    <?php 

                                    }  

                                   
                                $num++;
                                }   ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
               
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
<?php include_once "../includes/footer.php"; ?>
    <script src="../../vendors/js/sweetalert.min.js"></script>
    <script src="../../vendors/js/datatables.min.js"></script>
    <script type="text/javascript">
                            

<script src="../../vendors/js/sweetalert.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script src="../../vendors/js/datatables.min.js"></script>
    <script type="text/javascript">

          $('#table').DataTable({
            "searching": true,
            language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "Mostrando 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
              }
            }
            
          });

  </script>
    
                          






   
                


    



<?php include_once "../includes/footer.php"; ?>