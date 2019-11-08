<?php include_once "../includes/menu.php"; 

extract($_REQUEST);
$data=unserialize($data);
$justificacion=unserialize($justificacion);

/*$query_perfil=mysqli_query($con,"select * from perfil where id=1");
  $rw=mysqli_fetch_assoc($query_perfil);
  $sql=mysqli_query($con, "select LAST_INSERT_ID(id) as last from facturas order by id desc limit 0,1 ");
  $rws=mysqli_fetch_array($sql);
  $numero=$rws['last']+1;*/
  ?>



<div class="col-md-12"><section style="padding-left: 20px;" class="content-header">
      <ol class="breadcrumb">
        <li><i class="fa fa-users"><a href="../menu/ControladorMenu.php?operacion=asistencia"></i> Asistencia /</a></li>

        <li><i class="fa fa-table"><a href="../asistencias/ControlA.php?operacion=index"></i>Consulta de asistencias</a></li>
    
        
      </ol>
</section ></div>

     <section style="padding-left: 20px;"  class="invoice">
      <div class="row">
        <div class="col-md-12">
          <h1 align="center"> Asistencias <span class="badge badge-info">Control <i class="menu-icon fa fa-edit"></i> </span></h1>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-offset-4 col-sm-4 invoice-col">
        <form action="../../Controladores/controladorAsistencia.php" method="POST" id="asistencia">
           

          <!-- /.col -->
          <!-- <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
                <input type="hidden" name="operacion" value="guardar">
              <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Buscando Empleado...."><i class="fa fa-check"></i></button>
               
                
            </div>
          </div> -->
        </form>
      </div>
      </div>
      <section style="padding-left: 20px;"  class="invoice">
      <!-- <div class="row">
        <div class="col-md-12">
          <h2 class="page-header">
            <i class="fa fa-edit"></i> Listado de Asistencia
          </h2>
        </div>
      </div> -->
       <div class="box-body">
                    <div class="table-responsive"  style="overflow-x: hidden;">
                      <div class="row">
                        
                        <div class="col-sm-9">
                          <label><b>A:</b> Asistió, <b>NACJ:</b> No Asistió (Con Justificativo), <b>NASJ:</b> No Asistió (Sin Justificativo)</label>
                        </div>
                        <div class="col-sm-3">
                        <a href="../menu/ControladorMenu.php?operacion=consulta"><button type="button" title="Listado" class="btn btn-secondary"><i class="fa fa-list"></i>&nbsp;</a></button></div>
                      </div><br>
                      <div class="col-sm-3">
                        <a href="../menu/ControladorMenu.php?operacion=Permisos"><button type="button" title="Permiso" class="btn btn-secondary"><i class="fa fa-truck"></i>&nbsp;</a></button></div>
                    </div>


                     <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                          
                            <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered" >
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Cédula</th>
                          <th>Status</th>
                          <th>Justificacion</th>
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
            <td><?=utf8_encode($data[$i][$j])?></td>

              <?php } ?>

              <td>

                    <?php 
                   if (utf8_encode($data[$i][4])=="Sin Marcar") {
                    ?>
               <i data-toggle="modal" onclick="asistio(<?=$data[$i][0]?>)" data-target="#mediumModal" style="font-size: 20px;" title="Marcar Asistencia" class="menu-icon fa fa-check"></i>

               <i data-toggle="modal" onclick="noasistio(<?=$data[$i][0]?>)" data-target="#mediumModal" style="font-size: 20px;" title="No asistió" class="menu-icon fa fa-times"></i>
                  <?php 
                  }else{
                    if(utf8_encode($data[$i][4])=="A"){?>
                    <i data-toggle="modal" onclick="noasistio(<?=$data[$i][0]?>)" data-target="#mediumModal" style="font-size: 20px;" title="No asistió" class="menu-icon fa fa-times"></i>
                    <?php

                  }else{
                    ?>
                    <i data-toggle="modal" onclick="asistio(<?=$data[$i][0]?>)" data-target="#mediumModal" style="font-size: 20px;" title="Marcar Asistencia" class="menu-icon fa fa-check"></i>
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
                   
                  </div>

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
                                  <label>Seguro que desea marcar como asistió?</label>
                                </div>   
                              </div>
                            </div>

                            <div id="noasiste" style="display: none;">
                              <div class="row" >
                                <div class="col-md-12">
                                  <label>Seguro que desea marcar como no asistió?</label>
                                </div>   
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                   <label>Justificación: </label>
                                   <select class="" name="justificacion" >
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






<?php include_once "../includes/footer.php"; ?>