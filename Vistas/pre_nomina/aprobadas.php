<?php
include_once "../includes/menu.php"; 
extract($_REQUEST);
$prenomina=unserialize($prenomina);
 ?>

 
        <!-- Header-->

        <div class="breadcrumbs">
           
         

                    
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

               

                    

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" >
                            
                               

                                <div>
                                  
                                </div>

<div class="form-1-2">
    
      <input type="text" name="caja_busqueda" id="caja_busqueda" placeholder=" Buscar">

      <button  type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>

    </div>
    

                            <div class="col-md-2,5">
                                 <p style="margin-left: 17cm;"><a href="#" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"> Reporte PDF</i></a></p>
                            </div>
                                
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                       <tr>
                                        <th>N°</th>
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

                            <td><a href="../../Controladores/ControladorPreNomina.php?operacion=vermas&id_empleado=<?=$data[$i][0]?>"><i title="Ver Detalles" class="menu-icon fa fa-search-plus"></i></a>

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
