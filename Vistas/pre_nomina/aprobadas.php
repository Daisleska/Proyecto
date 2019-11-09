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
                    <div class="card">
                        <div class="card-header" >
                            
                          

                            <h4 style="text-align: center;"> NOMINA
                            <script style="text-align: right;" type="text/javascript">document.write("" + months[month] + " " + year);</script></h4> 
                           <div class="col-md-2,5">
                                 <a style="margin-left: 16cm; width: 3.5cm;" href="../../reportes/reporte_nomina.php" target="blank" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Reporte PDF</a>

                            </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
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
                          if ($aprobadas !=NULL) {
                          foreach ($aprobadas as $aprobad) {
                              ?>
                              <tr>
                                  <td><?=$num?></td>
                                  <td>Almacen y Recursos Humanos</td>
                                  <td><?php echo($aprobad['cantidad']); ?></td>
                                  <td><?php echo($aprobad['status']); ?></td>
                                <td>
                                 
                                 <a style="width: 1cm;" href="../../reportes/reporte_empleados_nomina.php" target="blank" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> </a>

                            
                           
                              </tr>
                              <?php
                              $num++;
                          }
                          } else {
                            ?>
                            <tr>
                                <td style="color: red; text-align: center;" colspan="5">No hay nominas</td>
                            </tr>
                            <?php
                          } ?>
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
