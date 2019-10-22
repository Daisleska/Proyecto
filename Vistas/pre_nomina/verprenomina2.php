<?php
include_once "../includes/menu.php"; 
extract($_REQUEST);
$empleado=unserialize($empleado);
$sueldo_neto=unserialize($sueldo_neto);
$asignaciones=unserialize($asignaciones);
$deducciones=unserialize($deducciones);
$inasistencia=unserialize($inasistencias);
$inasistencia_mes=unserialize($inasistencia_mes);
$monto=unserialize($monto);


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

                           <button  onclick="detalles('<?=$asignaciones[$i]?>', '<?=$deducciones[$i]?>', '<?=$inasistencia[$i]?>', '<?=$monto[$i]?>', '<?=$inasistencia_mes[$i]?>', '<?=$sueldo_neto[$i]?>','<?=$empleado[$i][1]?>', '<?=$empleado[$i][2]?>', '<?=$empleado[$i][3]?>', '<?=$empleado[$i][4]?>', '<?=$empleado[$i][5]?>' )"><i title="Detalles" class=" fa fa-search"  data-toggle="modal" data-target="#mediumModal"></i></button>

                           <button><a href="#"><i title="Aprobar" class="fa fa-check"></a></i></button>
                                
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
                                <h5 class="modal-title" id="mediumModalLabel">Detalles de Nómina del Empleado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="border: hidden">Nombres: <span id="nombres" style="font-weight: normal;"></span></th>
                                            <th style="border: hidden">Apellidos: <span id="apellidos" style="font-weight: normal;"></span></th>
                                            <th style="border: hidden">Cedula: <span id="cedula" style="font-weight: normal;"></span></th>
                                            <th style="border: hidden">Cargo: <span id="nombre" style="font-weight: normal;"></span></th>
                                        </tr>
                                    </thead>
                                </table>


                                <table border="1" width="750" >
                                <caption></caption>
                                
                                <tr>
                                    
                                     <td td style="text-align: center; background-color: black; color: white;">DESCRIPCIÓN</td>  

                                    <td  style="text-align: center; background-color: black; color: white;">ASIGNACIONES</td>

                                     <td  style="text-align: center; background-color: black; color: white;">DEDUCCIONES</td>
                                    
                                    
                                </tr>

                                <tr>
                                    <td>Sueldo base:</td>
                                    <td><span id="salario" style="font-weight: normal;"></span> Bs.S</td>
                                    <td></td>
                                    
                                </tr>

                                <tr>
                                    <td>Asignaciones:</td>
                                    <td><span id="asignaciones" style="font-weight: normal;"></span> Bs.S</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Cestaticket:</td>
                                    <td><span id="monto" style="font-weight: normal;"></span> Bs.S</td>
                                    <td></td>
                                </tr>

                                
                                 

                                <tr>
                                    <td>Inasistencias: </td>
                                    <td></td>
                                    <td><span id="inasistencia" style="font-weight: normal;"></span> Bs.S</td>
                                </tr>

                                <tr>
                                    <td>Inasistencias del Mes: </td>
                                    <td></td>
                                    <td><span id="inasistencia_mes" style="font-weight: normal;"></span> Bs.S</td>
                                </tr>

                                <tr>
                                    <td>Deducciones:</td>
                                    <td></td>
                                    <td><span id="deducciones" style="font-weight: normal;"></span> Bs.S</td>
                                </tr>

                                <tr>
                                    <td>Total a Pagar:</td>
                                    <td><span id="sueldo_neto" style="font-weight: normal;"></span> Bs.S</td>
                                    <td></td>
                                </tr>
                                
                            </table>

                               
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


   <script type="text/javascript">
  
  function detalles(asignaciones,deducciones, inasistencia, monto, inasistencia_mes, sueldo_neto,  nombres, apellidos, cedula, nombre, salario) {
    
    console.log(inasistencia+"sdfghjk");
    $("#asignaciones").text(asignaciones);
    $("#deducciones").text(deducciones);
    $("#inasistencia").text(inasistencia);
    $("#monto").text(monto);
    $("#inasistencia_mes").text(inasistencia_mes);
    $("#sueldo_neto").text(sueldo_neto);
    $("#nombres").text(nombres);
    $("#apellidos").text(apellidos);
    $("#cedula").text(cedula);
    $("#nombre").text(nombre);
    $("#salario").text(salario);

    

  }
  


</script>

<?php include_once "../includes/footer.php"; ?>
