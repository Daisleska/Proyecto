<?php
include_once "../includes/menu.php"; 
extract($_REQUEST);
$aprobadas=unserialize($aprobadas);

 ?>
<!-- Header-->
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

<div class="breadcrumbs"></div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                     
                     <section style="padding-left: 20px;" class="content-header">
                    <ol class="breadcrumb">

                    <a href="../../Controladores/ControladorPreNomina.php?operacion=prenomina" class="atras" title="Atras"><span class="fa fa-arrow-left" style="font-size: 35px;" ></span></a>
           
                   <h1 align="center">  <span style="margin-left: 3cm;" class="badge badge-info">Nóminas Aprobadas </strong><script style="text-align: right;" type="text/javascript">document.write(year);</script> <i class="menu-icon fa fa-edit"></i> </span></h1>
            
                    </ol>
                  </section >
              
                            
                           <div class="col-md-2,5">
                                 <a style="margin-left: 16cm; width: 3.5cm;" href="../../reportes/reporte_nomina_aprobada.php" target="blank" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Reporte PDF</a>

                            </div>
                            </div>
                            <div class="card-body">
                                <table  class="table table-striped table-sm " id="table">
                                    <thead>
                                       <tr>
                                        <th>N°</th>
                                        <th>Quincena</th>
                                        <th>Mes</th>
                                        <th>Cantidad</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                          <?php $num=1;
                          

                          if ($aprobadas !=NULL) {
                          foreach ($aprobadas as $aprobad) {
                          setlocale(LC_TIME, 'es_ES', 'esp_esp');
                          $fech=date_create_from_format('!m', $aprobad['mes']);
                          $mes=strftime("%B", $fech->getTimestamp());
                          $month=ucfirst($mes);
                              ?>
                              <tr>
                                  <td><?=$num?></td>
                                  <td><?php echo($aprobad['quincena']); ?></td>
                                  <td><?php echo($month); ?></td>
                                  <td><?php echo($aprobad['cantidad']); ?></td>
                                  <td><?php echo($aprobad['status']); ?></td>
                                <td>
                                 
                                 <button><a href="../../Controladores/ControladorPreNomina.php?operacion=veraprobadas&id_nomina=<?php echo($aprobad['id']); ?>&mes=<?php echo($month);?>&anio=<?php echo($aprobad['anio']); ?>&quincena=<?php echo($aprobad['quincena']); ?>"><i title="Ver Detalles" class="menu-icon fa fa-search-plus"></i></a></button>

                              </tr>
                              <?php
                              $num++;
                          }
                          }
                            ?>
                           
                                    </tbody>
                                </table>

                              
                                

                                </div>
                            </div>
                        </div>
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
