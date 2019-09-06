<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
$data=unserialize($data);
?>


  <div class="breadcrumbs">
           


                    
        </div>
        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="box-title"><i class="fa fa-table"></i> Auditoria</h3>  
                               
                            </div>
                            <div class="card-body">
                            
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
       
    
    
                                <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Usuario</th>
                                      <th>Fecha</th>
                                      <th>Hora</th>
                                      <th>Actividad</th>
                                  </tr>
                                </thead>

                                <tbody>
                                <?php $num=1;
                                for ($i=0; $i < $filas; $i++) { 
                                
                                echo "<tr>";    
                                ?>  
              
                                <td><?=$num?></td>
                                <?php for ($j=1; $j < $campos; $j++) { ?>
                                <td><?=$data[$i][$j]?></td>

                                <?php } ?>
                                    
                                        
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