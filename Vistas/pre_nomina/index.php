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

<div class="breadcrumbs"></div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" >
                            
                           <!--  <div class="form-1-2">
                                <input type="text" name="caja_busqueda" id="caja_busqueda" placeholder=" Buscar">
                                <button  type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
                            </div> -->

                            <h4 style="text-align: center;"> PRE NOMINA
                            <script style="text-align: right;" type="text/javascript">document.write("" + months[month] + " " + year);</script></h4> 
                           <div class="col-md-2,5">
                                 <p style="margin-left: 17cm;"><a href="../../Controladores/ControladorPreNomina.php?operacion=generar" class="btn btn-block btn-danger btn-sm">Generar</a></p>
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
                          if ($prenomina!=NULL) {
                          foreach ($prenomina as $prenomin) {
                              ?>
                              <tr>
                                  <td><?=$num?></td>
                                  <td>Almacen y Recursos Humanos</td>
                                  <td><?php echo($prenomin['cantidad']); ?></td>
                                  <td><?php echo($prenomin['status']); ?></td>
                                <td><button><a href="../../Controladores/ControladorPreNomina.php?operacion=ver&id_prenomina=<?php echo($prenomin['id']); ?>"><i title="Ver Detalles" class="menu-icon fa fa-search-plus"></i></a></button>
                                <button><a href="../../Controladores/ControladorPreNomina.php?operacion=aprobar&id_prenomina=<?php echo($prenomin['id']);?>"><i title="Aprobar" class="fa fa-check"></a></i></button>
                                <button><a href="../../Controladores/ControladorPreNomina.php?operacion=eliminar&id_prenomina=<?php echo($prenomin['id']);?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i></button>
                           
                              </tr>
                              <?php
                              $num++;
                          }
                          } else {
                            ?>
                            <tr>
                                <td style="color: red; text-align: center;" colspan="5">No hay prenominas</td>
                            </tr>
                            <?php
                          } ?>
                                    </tbody>
                                </table>

                                <div class="col-md-2,5">
                                 <p style="margin-left: 8cm;"><a href="../../Controladores/ControladorPreNomina.php?operacion=aprobadas" class="btn btn-block btn-danger btn-sm">Reportes</a></p>

                                

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
<?php include_once "../includes/footer.php"; ?>
