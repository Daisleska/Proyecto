<?php
include_once "../includes/menu.php"; 
extract($_REQUEST);
$empleado=unserialize($empleado);
$sueldo_neto=unserialize($sueldo_neto);
$asignaciones=unserialize($asignaciones);
?>
        <!-- Header-->
<div class="breadcrumbs"></div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" >
                                <div></div>

                        <div class="form-1-2">
                            <input type="text" name="caja_busqueda" id="caja_busqueda" placeholder=" Buscar">
                            <button  type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="col-md-2,5"></div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                       <tr>
                                        <th>N°</th> 
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Cedula</th>
                                        <th>Cargo</th>
                                        <th>Salario Base</th>
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
                        <?php for ($j=1; $j < 6; $j++) { ?>
                        <td><?=$empleado[$i][$j]?></td>

                            <?php } ?>
                            <td><?=$sueldo_neto[$i]?></td>
                            <td><a href="#"></i></a>

                           <button class="btn-primary" onclick="detalles('<?=$asignaciones[$i]?>','<?=$empleado[$i][1]?>')"><i title="Detalles" class="btn btn-secondary mb-1  fa fa-search"  data-toggle="modal" data-target="#mediumModal"></i></button>

                           <a href="#"><i title="Aprobar" class="fa fa-check"></a></i>
                                
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


                <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Detalles de Nomina del empleado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <p><b>Nombres: </b></p><span id="nombres"></span>  
                            <p><b>Asignaciones: </b></p><span id="asignaciones"></span>  
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>


   <script type="text/javascript">
  
  function detalles(asignaciones,nombres) {
    
    console.log(asignaciones);
    $("#asignaciones").text(asignaciones);
    $("#nombres").text(nombres);
  }
  


</script>

<?php include_once "../includes/footer.php"; ?>
