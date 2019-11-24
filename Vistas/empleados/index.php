<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
$data=unserialize($data);
?>

       
         <div class="content mt-3" style="padding-left: 20px">
 <section style="padding-left: 20px;" class="content-header">
      <ol class="breadcrumb">
       
         <h1 align="center">  <span style="margin-left: 8.0cm;" class="badge badge-info">Listado empleados <i class="menu-icon fa fa-users"></i> </span></h1>
        
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

                                    <a href="../../Controladores/ControladorEmpleado.php?operacion=vermas&id_empleado=<?=$data[$i][0]?>"><i title="Ver más" class="menu-icon fa fa-search-plus "></a></i>



                                    <a href="../../Controladores/ControladorEmpleado.php?operacion=verhorario&cedula=<?=$data[$i][1]?>"><i title="Horario" class="menu-icon fa fa-list"></a></i>

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
   <script type="text/javascript">var X=3</script>
    <script src="../../vendors/js/datatables.min.js"></script>
    <script src="../../vendors/js/sweetalert.min.js"></script>
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
