<?php
include_once "../includes/menu.php"; 
extract($_REQUEST);
$empleado=unserialize($empleado);
$sueldo_neto=unserialize($sueldo_neto);
$asignaciones=unserialize($asignaciones);
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

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    
                     
                    <section style="padding-left: 20px;" class="content-header">
                       <ol class="breadcrumb">

                        <a href="../../Controladores/ControladorPreNomina.php?operacion=prenomina" class="atras" title="Atras"><span class="fa fa-arrow-left" style="font-size: 35px;" ></span></a>

           
                       <h1 align="center">  <span style="margin-left: 1cm;" class="badge badge-info">Detalles Pre-Nóminas </strong><script style="text-align: right;" type="text/javascript">document.write("" + months[month] + " " + year);</script> <i class="menu-icon fa fa-edit"></i> </span></h1>
            
                        </ol>
                    </section >
                      
                    </div>
                        <div class="table-responsive" style="padding-left: 30px; padding-right: 20px;">
                        
                                <table class="table table-striped table-sm " id="table">
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

                           <button  onclick="detalles('<?=$asignaciones[$i]?>', '<?=$deducciones[$i]?>', '<?=$inasistencia[$i]?>', '<?=$sueldo_neto[$i]?>','<?=$empleado[$i][1]?>', '<?=$empleado[$i][2]?>', '<?=$empleado[$i][3]?>', '<?=$empleado[$i][4]?>', '<?=$empleado[$i][5]?>')"><i title="Detalles" class="fa fa-search"  data-toggle="modal" data-target="#mediumModal"></i></button>

                           
                                
                            </td>
                                <?php   
                                $num++;
                                }   ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


           
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->


                <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg"   role="document">
                        <div class="modal-content" >
                            <div class="modal-header">
                                <h5 style="margin-left: 5.5cm;" class="modal-title" id="mediumModalLabel">Detalles de Nómina del empleado</h5>
                              
                            </div>
                            <div class="modal-body">
                                
                            <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="border: hidden">Nombres: <span id="nombres" style="font-weight: normal;"></span></th>
                                            <th style="border: hidden">Apellidos: <span id="apellidos" style="font-weight: normal;"></span></th>
                                            <th style="border: hidden">Cedula: <span id="cedula" style="font-weight: normal;"></span></th>
                                            <th style="border: hidden">Cargo: <span id="nombre" style="font-weight: normal;"></span></th>
                                        </tr>
                                    </thead>
                                </table>

                                <div id="tablita"></div>
                                

                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                               
                            </div>
                        </div>
                    </div>
                </div>
                

        <?php include_once "../includes/footer.php"; ?>
                  


   <script type="text/javascript">
    //descripcion, monto
  
  function detalles(asignaciones, deducciones, inasistencia, sueldo_neto, nombres, apellidos, cedula, nombre, salario) {
var num_ina=parseFloat(inasistencia);  
var inadecimal=num_ina.toFixed(2);
var num_sueldo=parseFloat(sueldo_neto);
var sueldodecimal=num_sueldo.toFixed(2);


// console.log(asignaciones+" "+deducciones+" "+inasistencia+" "+sueldo_neto+" "+salario);


    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: {nombres: nombres, apellidos: apellidos, cedula: cedula}
    }).success(function(respuesta){
        // console.log(respuesta);
        $('#tablita').html(respuesta);
    });
  
    $("#asignaciones").text(asignaciones);
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
