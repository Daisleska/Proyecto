<?php
include_once "../includes/menu.php"; 
extract($_REQUEST);
...
 ?>

 
        <!-- Header-->

        <div class="breadcrumbs">
           
         

                    
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

               

                    

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a title="Descargar PDF" style="float: right; padding-right: 40px;" href=#><i style="font-size: 30px;" class="fa fa-cloud-download"></i>&nbsp;</a>

                                <div>
                                  <strong style="margin-right: 4cm;" class="card-title"><i class="fa fa-list"></i> NOMINA PENDIENTE</strong>
                                </div>

                                
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                       <tr>
                                        <th>N°</th>
                                        <th>Cedula</th>
                                        <th>Nombre</th>
                                        <th>Monto</th>
                                        <th>Quincena</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                          <?php $num=1;
                            for ($i=0; $i < $filas; $i++) { 
                                
                            echo "<tr>";        
                            ?>  
                            
                            <td><?=$num?></td>
                        <?php for ($j=1; $j < $campos; $j++) { ?>
                        <td><?=$prenomina[$i][$j]?></td>

                            <?php } ?>

                            <td><a href="../../Controladores/ControladorPreNomina.php?operacion=modificar&id_empleado=<?=$prenomina[$i][0]?>"><i title="Modificar" class="menu-icon fa fa-edit"></i></a>


                                
                            </td>
                                <?php   
                                $num++;
                                }   ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
<?php include_once "../includes/footer.php"; ?>
