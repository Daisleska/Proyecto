<?php
include_once "../includes/menu.php"; 
extract($_REQUEST);
$datos=unserialize($datos);
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
                                 <p style="margin-left: 17cm;"><a href="../../Controladores/ControladorPreNomina.php?operacion=generar" class="btn btn-block btn-danger btn-sm">Generar</a></p>
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
                        <td><?=$datos[$i][$j]?></td>

                            <?php } ?>

                            <td><a href="../../Controladores/ControladorPreNomina.php?operacion=vermas&id_empleado=<?=$datos[$i][0]?>"><i title="Ver Detalles" class="menu-icon fa fa-search-plus"></i></a>

                           <a href="../../Controladores/ControladorPreNomina.php?operacion=aprobar&id_empleado=<?=$aprobar[$i][0]?>"><i title="Aprobar" class="fa fa-check"></a></i>
                                
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
