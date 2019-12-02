<?php
include_once "../includes/menu.php"; 
extract($_REQUEST);
$data=unserialize($data);
?>

<script type="text/javascript">

function makeArray() {
for (i = 0; i<makeArray.arguments.length; i++)
this[i + 1] = makeArray.arguments[i];}
var months = new makeArray('Enero','Febrero','Marzo','Abril','Mayo',
'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;

//]]>

</script>
        <!-- Header-->

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    
                     
                    <section style="padding-left: 20px;" class="content-header">
                       <ol class="breadcrumb">

                        <a href="../../Controladores/ControladorPreNomina.php?operacion=aprobadas" class="atras" title="Atras"><span class="fa fa-arrow-left" style="font-size: 35px;" ></span></a>

           
                       <h1 align="center">  <span style="margin-left: 1cm;" class="badge badge-info">Detalles Nóminas </strong><script style="text-align: right;" type="text/javascript">document.write("" + months[month] + " " + year);</script> <i class="menu-icon fa fa-edit"></i> </span></h1>
            
                        </ol>
                    </section >

                           <div class="col-md-2,5">
                             <a style="margin-left: 16cm; width: 3.5cm;" href="../../reportes/reporte_nomina.php?id_nomina=<?=$data[0][8]?>" target="blank" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Reporte PDF</a>

                            </div>
                            
                      
                    </div>
                        <div class="table-responsive" style="padding-left: 30px; padding-right: 20px;">
                        
                                <table class="table table-striped table-sm " id="table">
                                    <thead>
                                       <tr>
                                        <th>N°</th> 
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Cédula</th>
                                        <th>Total Asignaciones</th>
                                        <th>Total Deducciones</th>
                                        <th>Total a pagar</th>
                                        <th>Opciones</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                        <?php $num=1;
                            for ($i=0; $i < $filas; $i++) { 
                                
                            echo "<tr>";        
                        ?>  
                            
                        <td><?=$num?></td>
                        <td><?=$data[$i][1]?></td>
                        <td><?=$data[$i][2]?></td>
                        <td><?=$data[$i][3]?></td>
                        <td><?=number_format($data[$i][5], 2, ',', '.');?></td>
                        <td><?=number_format($data[$i][6], 2, ',', '.');?></td>
                        <td><?=number_format($data[$i][7], 2, ',', '.');?></td>
                           
                        


                            <td><a href="#"></i></a>
                                <input type="hidden" name="id_quincena" value="">
                           <button><a href="../../reportes/reporte_individual.php&id_empleado=<?=$data[$i][0]?>&id_quincena=<?=$data[$i][8]?>"><i title="PDF" class="menu-icon fa fa-search-plus"></i></a></button>

                           
                                
                            </td>
                                <?php   
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
