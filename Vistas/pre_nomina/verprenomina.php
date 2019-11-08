<?php
include_once "../includes/menu.php"; 
extract($_REQUEST);
$empleado=unserialize($empleado);
$sueldo_neto=unserialize($sueldo_neto);
$asignaciones=unserialize($asignaciones);
//$asignacion=unserialize($asignacion);
$deducciones=unserialize($deducciones);
$inasistencia=unserialize($inasistencia);

?>

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
        <!-- Header-->
<div class="breadcrumbs"></div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" >
                        <h4 style="text-align: center;">DETALLES DE LA PRE NOMINA</h4>
                        <h4 style="text-align: right;">
                            <script type="text/javascript">document.write("" + months[month] + " " + year);</script></h4>

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
                        <td><?php 
                        if ($j==5) {

                            echo number_format($empleado[$i][$j], 2, ',', '.');

                        }else{

                            echo $empleado[$i][$j];
                             
                         } ?></td>

                            <?php } ?>
                            <td>
                            <?php
                                echo number_format($sueldo_neto[$i], 2, ',', '.');
                             ?>   
                            </td>


                            <td><a href="#"></i></a>
                            <!-- '<?=$asignacion[$i][1]?>', '<?=$asignacion[$i][2]?>', -->

                           <button  onclick="detalles('<?=$asignaciones[$i]?>', '<?=$deducciones[$i]?>', '<?=$inasistencia[$i]?>', '<?=$sueldo_neto[$i]?>','<?=$empleado[$i][1]?>', '<?=$empleado[$i][2]?>', '<?=$empleado[$i][3]?>', '<?=$empleado[$i][4]?>', '<?=$empleado[$i][5]?>')"><i title="Detalles" class="fa fa-search"  data-toggle="modal" data-target="#mediumModal"></i></button>

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
                                <h5 class="modal-title" id="mediumModalLabel">Detalles de Nómina del empleado</h5>
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
                                    <td colspan="3"  style="text-align: center; background-color: black; color: white;">ASIGNACIONES</td>
                                </tr>

                                <tr>
                                    <td>Sueldo base:</td>
                                    <td><span id="salario" style="font-weight: normal;"></span> Bs.S</td>
                                    
                                    
                                </tr>

                               <!--  <tr>
                                    <td><span id="descripcion"></span></td>
                                    <td><span id="monto"></span></td>
                                </tr> -->

                                <tr>
                                    <td>Total de Asignaciones:</td>
                                    <td ><span id="asignaciones" style="font-weight: normal;"></span> Bs.S</td>
                                   
                                </tr>


                                     <td colspan="3" style="text-align: center; background-color: black; color: white;">DEDUCCIONES</td>
                                    
                                    
                                </tr>
                            

                                <tr>
                                    <td>Inasistencias: </td>
                                  
                                    <td><span id="inasistencia" style="font-weight: normal;"></span> Bs.S</td>
                                </tr>

                               

                            

                                <tr>
                                    <td>Total de Deducciones:</td>
                                 
                                    <td><span id="deducciones" style="font-weight: normal;"></span> Bs.S</td>
                                </tr>

                                <tr>
                                    <td>Total a Pagar:</td>
                                    <td><span id="sueldo_neto" style="font-weight: normal;"></span> Bs.S</td>

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
    //descripcion, monto
  
  function detalles(asignaciones, deducciones, inasistencia, sueldo_neto, nombres, apellidos, cedula, nombre, salario ) {
var num_ina=parseFloat(inasistencia);  
var inadecimal=num_ina.toFixed(2);
var num_sueldo=parseFloat(sueldo_neto);
var sueldodecimal=num_sueldo.toFixed(2);

//var sueldodecimal=sueldo_neto.toFixed(2);
  
    $("#asignaciones").text(asignaciones);
    //$("#descripcion").text(descripcion);
    //$("#monto").text(monto);
    $("#deducciones").text(deducciones);
    $("#inasistencia").text(inadecimal);
    $("#sueldo_neto").text(sueldodecimal);
    $("#nombres").text(nombres);
    $("#apellidos").text(apellidos);
    $("#cedula").text(cedula);
    $("#nombre").text(nombre);
    $("#salario").text(salario);
    

  }
  

</script>

<?php include_once "../includes/footer.php"; ?>
