<?php
include_once "../includes/menu.php"; 
extract($_REQUEST);
$prenomina=unserialize($prenomina);

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

    <div class="content mt-3" style="padding-left: 20px;">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                 
                 <section style="padding-left: 20px;" class="content-header">
                    <ol class="breadcrumb">
           
                   <h1 align="center">  <span style="margin-left: 3cm;" class="badge badge-info">Pre-Nóminas </strong><script style="text-align: right;" type="text/javascript">document.write("" + months[month] + " " + year);</script> <i class="menu-icon fa fa-edit"></i> </span></h1>
            
                    </ol>
                  </section >
                 <div class="row" style="padding-left:600px;">
                     <ul class="nav nav-tabs" >

                    <li class="nav-item">
                     <a class="nav-link" title="Generar nueva pre-nomina" href="../../Controladores/ControladorPreNomina.php?operacion=generar">Generar</a>
                     </li>

                    <li class="nav-item">
                     <a class="nav-link" title="Ver nominas aprobadas" href="../../Controladores/ControladorPreNomina.php?operacion=aprobadas">Aprobadas</a>
                     </li>
        
                  
                   
               </ul>

             </div>
                            
                           
                            </div>
                            <div class="table-responsive" style="padding-left: 30px; padding-right: 20px;">
                                <table class="table table-striped table-sm " id="table">
                                    <thead>
                                       <tr>
                                        <th>N°</th>
                                        <th>Departamento</th>
                                        <th>Cantidad</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                          <?php $num=1;
                          if ($prenomina!=NULL) {
                          foreach ($prenomina as $prenomin) {
                              ?>
                              <tr>
                                  <td><?=$num?></td>
                                  <td><?php echo($prenomin['departamento']); ?></td>
                                  <td><?php echo($prenomin['cantidad']); ?></td>
                                  <td><?php echo($prenomin['status']); ?></td>
                                <td><button><a href="../../Controladores/ControladorPreNomina.php?operacion=ver&id_prenomina=<?php echo($prenomin['id']); ?>"><i title="Ver Detalles" class="menu-icon fa fa-search-plus"></i></a></button>
                                <button><a href="../../Controladores/ControladorPreNomina.php?operacion=aprobar&id_prenomina=<?php echo($prenomin['id']);?>"><i title="Aprobar" class="fa fa-check"></a></i></button>
                                <button><a href="../../Controladores/ControladorPreNomina.php?operacion=eliminar&id_prenomina=<?php echo($prenomin['id']);?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i></button>
                           
                              </tr>
                              <?php
                              $num++;
                          }
                          } 
                            ?>
                           

                                    </tbody>
                                </table>

                               <!--  <div class="col-md-2,5">
                                 <p style="margin-left: 8cm;"><a href="../../Controladores/ControladorPreNomina.php?operacion=aprobadas" class="btn btn-block btn-danger btn-sm">Reportes</a></p> </div> -->
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

