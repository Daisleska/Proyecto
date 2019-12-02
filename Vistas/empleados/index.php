<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
$data=unserialize($data);
?>

       
         <div class="content mt-3" style="padding-left: 20px">
 <section style="padding-left: 20px;" class="content-header">
      <ol class="breadcrumb">
       
         <h1 align="center">  <span style="margin-left: 5.5cm;" class="badge badge-info">Listado Empleados <i class="menu-icon fa fa-list"></i> </span></h1>
        
      </ol>
   </section >
        
                <div class="row" style="padding-left: 20px">
                    <center>
                   <a href="../../reportes/reporte_empleados.php" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Reporte PDF</a>
                </center><br>
                </div>
                <br>

                 <div class="table-responsive">
                    <table class="table table-striped table-sm " id="table">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Cédula</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Fecha de Ingreso</th>
                                            <th>Opciones</th>                                     
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <?php $num=1; 
                                    for ($i=0; $i < $filas; $i++) { 
                                    echo "<tr>";        
                                    ?>  
                                    <td><?=$num?></td>
                                    <?php for ($j=1; $j <=6; $j++) { ?>
                                    <td><?=$data[$i][$j]?></td>

                                    <?php } ?>

                                    <td><a  href="../../Controladores/ControladorEmpleado.php?operacion=modificar&id_empleado=<?=$data[$i][0]?>"><i title="Modificar" class="menu-icon fa fa-edit"></a></i>

                                    <a href='javascript:ver(<?=$data[$i][0]?>)' class='ver'  title='Ver'><span class='fa fa-eye'></span></a>


                                    <a href="../../Controladores/ControladorAsigDeducc.php?operacion=asigdeducc&id_empleado=<?=$data[$i][0]?>"><i title="Asignaciones y Deducciones" class="fa fa-retweet"></a></i>
                                    
                                    <a href="../../Controladores/ControladorAsigDeducc.php?operacion=agregarasigdeducc&id_empleado=<?=$data[$i][0]?>"><i title="Asignaciones y Deducciones" class="fa fa-search-plus"></a></i>

                                    <a href="../../Controladores/ControladorEmpleado.php?operacion=eliminar&id_empleado=<?=$data[$i][0]?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>
                                    </td>
                                    <?php   
                                    $num++;
                                    }   ?>             
                                        
                                    </tbody>
                                </table>
                            </div>
                        
            
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <style>
        .ver_articulo_modal .modal-header{
          background: rgba(0, 34, 79, 1);
          color: #fff;
        }
        .ver_articulo_modal .aria-hidden{
          color: #fff;
        }
        .ver_articulo_modal .close{
          color: #fff;
          text-shadow: 0 1px 0 #fff;
          opacity: 1;
        }
      </style>
      <div class="modal fade ver_articulo_modal" id="ver_articulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document"><!-- modal-dialog-centered-->
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><div id="titulo"></div></h5>

              <button class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="aria-hidden">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="body">
                  
              </div>
                            
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                 
              </div>
            
          </div>
        </div>
      </div>  

    <!-- Right Panel -->
<?php include_once "../includes/footer.php"; ?>

 <script>
      feather.replace();
    </script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
     <script src="../../vendors/js/feather.min.js"></script>
    <script>
      feather.replace();
    </script>
 <?php include_once "../includes/footer.php"; ?>
      <script src="../../vendors/js/datatables.min.js"></script>


      <script src="../../vendors/js/sweetalert.min.js"></script>
    <script src="../../vendors/js/empleados.js"></script>

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

  </script>

