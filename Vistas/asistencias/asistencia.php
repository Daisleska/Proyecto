<?php include_once "../includes/menu.php"; 

extract($_REQUEST);
$asistencia=unserialize($asistencia);
$justificacion=unserialize($justificacion);

/*$query_perfil=mysqli_query($con,"select * from perfil where id=1");
  $rw=mysqli_fetch_assoc($query_perfil);
  $sql=mysqli_query($con, "select LAST_INSERT_ID(id) as last from facturas order by id desc limit 0,1 ");
  $rws=mysqli_fetch_array($sql);
  $numero=$rws['last']+1;*/
  ?>



<div class="col-md-12">
  <section style="padding-left: 20px;" class="content-header">
      <ol class="breadcrumb">
       
         <h1 align="center">  <span style="margin-left: 6.5cm;" class="badge badge-info">Asistencias <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >
</div>

     <section style="padding-left: 10px;"  class="invoice">
      
      <!-- info row -->
      <section style="padding-left: 10px;"  class="invoice">
       <div class="box-body">
           <div class="table-responsive"  style="overflow-x: hidden;">
               <div class="row" style="padding-left: 40px;">
                 <ul class="nav nav-tabs" >

                    <li class="nav-item">
                     <a class="nav-link active" href="../asistencias/ControlA.php?operacion=index">Asistencia</a>
                     </li>
        
                    <li class="nav-item">
                     <a class="nav-link" href="../menu/ControladorMenu.php?operacion=consulta">Listado</a>
                     </li>
                    <li class="nav-item">
                     <a class="nav-link " href="../menu/ControladorMenu.php?operacion=permisos">Permisos</a>
                     </li>
                   
               </ul>
            </div> 
                  <br>

                <div class="row" style="padding-left: 40px;">
                    <div class="col-">
                          <label><b>A:</b> Asistió, <b>NACJ:</b> No Asistió (Con Justificativo), <b>NASJ:</b> No Asistió (Sin Justificativo)</label>
                        </div>
                     </div>

           <div class="content mt-3">
                <div class="animated fadeIn">
                  <div class="row">
                    <div class="col-md-12">
                   
                 <table class="table table-striped table-sm " id="table" >
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Cédula</th>
                          <th>Estado</th>
                          <th>Justificación</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>

              <?php $num=1; 
              for ($i=0; $i < $filas; $i++) { 
              echo "<tr>";    
              ?>  
              
              <td><?=$num?></td>
            <?php for ($j=1; $j <$campos; $j++) { ?>
            <td><?php=utf8_encode($asistencia[$i][$j])?></td>

              <?php } ?>

              <td>

                    <?php 
                   if (utf8_encode($asistencia[$i][4])=="Sin Marcar") {
                    ?>
               <i data-toggle="modal" onclick="asistio(<?=$asistencia[$i][0]?>)" data-target="#mediumModal" style="font-size: 20px;" title="Marcar Asistencia" class="menu-icon fa fa-check"></i>

               <i data-toggle="modal" onclick="noasistio(<?=$asistencia[$i][0]?>)" data-target="#mediumModal" style="font-size: 20px;" title="No asistió" class="menu-icon fa fa-times"></i>
                  <?php 
                  }else{
                    if(utf8_encode($asistencia[$i][4])=="A"){?>
                    <i data-toggle="modal" onclick="noasistio(<?=$asistencia[$i][0]?>)" data-target="#mediumModal" style="font-size: 20px;" title="No asistió" class="menu-icon fa fa-times"></i>
                    <?php

                  }else{
                    ?>
                    <i data-toggle="modal" onclick="asistio(<?=$asistencia[$i][0]?>)" data-target="#mediumModal" style="font-size: 20px;" title="Marcar Asistencia" class="menu-icon fa fa-check"></i>
                    <?php
                  }
                }
                 ?>
               
                                
              </td>
                <?php 
                $num++;
                }   ?>
                       </tbody>
                     </table>
                    </div> 
                  
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
      <!-- info row -->
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->


<form action="ControlA.php?operacion=asistencia" method="POST">
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <form action="" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Asistencia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <div id="asiste" style="display: none;">
                              <div class="row" >
                                <div class="col-md-12">
                                  <label>¿Seguro que desea marcar como asistió?</label>
                                </div>   
                              </div>
                            </div>

                            <div id="noasiste" style="display: none;">
                              <div class="row" >
                                <div class="col-md-12">
                                  <label>¿Seguro que desea marcar como no asistió?</label>
                                </div>   
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                   <label>Justificación: </label>
                                   <select class="" name="justificacion">
                                   <option value="" selected="selected" disabled="disabled"></option>
                                  <option>Reposo</option>
                                  <option>Permiso</option>
                                  </select>
                             <label>Dias de Permiso: </label>
                             <input type="number" title="Ingrese la cantidad de dias de permiso" name="dias_permiso">
                                </div>
                             </div>
                            </div>
                             
                            </div>
                            <div class="modal-footer"> 
                              <input type="hidden" name="id_asistencia" id="id_asistencia">
                              <input type="hidden" name="opcion" id="opcion">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                </form>
                <!-- justificacion -->
    </div>


      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->

    <?php include_once "../includes/footer.php"; ?>


    <script type="text/javascript">
  
  function asistio(id_asistencia) {
    
    /*console.log(id_asistencia);*/
    $("#opcion").val('asiste');
    $("#id_asistencia").val(id_asistencia);
    if($("#noasiste").is(":visible")){
      $("#asiste").css('display', 'block');
      $("#noasiste").removeAttr('display');


    }else{
      $("#asiste").css('display', 'block');
      $("#noasiste").css('display', 'none');
    }
  }

  function noasistio(id_asistencia) {
    
    /*console.log(id_asistencia);*/
    $("#opcion").val('noasiste');
    $("#id_asistencia").val(id_asistencia);
    if($("#asiste").is(":visible")){
      $("#noasiste").css('display', 'block');
      $("#asiste").removeAttr('display');


    }else{
      $("#noasiste").css('display', 'block');
      $("#asiste").css('display', 'none');
    }
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