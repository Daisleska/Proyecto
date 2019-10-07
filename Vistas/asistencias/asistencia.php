<?php include_once "../includes/menu.php"; 

extract($_REQUEST);
$data=unserialize($data);

/*$query_perfil=mysqli_query($con,"select * from perfil where id=1");
  $rw=mysqli_fetch_assoc($query_perfil);
  $sql=mysqli_query($con, "select LAST_INSERT_ID(id) as last from facturas order by id desc limit 0,1 ");
  $rws=mysqli_fetch_array($sql);
  $numero=$rws['last']+1;*/
  ?>



<div class="col-md-12"><section style="padding-left: 20px;" class="content-header">
        <h3>Asistencia</h3>
      <ol class="breadcrumb">
        <li><i class="fa fa-users"><a href="../menu/ControladorMenu.php?operacion=asistencia"></i> Asistencia /</a></li>

        <li><i class="fa fa-table"><a href="../asistencias/ControlA.php?operacion=index"></i>Consulta de asistencias</a></li>
    
        
      </ol>
</section ></div>

     <section style="padding-left: 20px;"  class="invoice">
      <div class="row">
        <div class="col-md-12">
          <h3 class="page-header">
            <i class="fa fa-edit"></i> Control de Asistencia
          </h3>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-offset-4 col-sm-4 invoice-col">
        <form action="../../Controladores/controladorAsistencia.php" method="POST" id="asistencia">
            <div class="form-group">
            <label>Cédula de Empleado:</label>
                <input type="text" name="cedula" id="cedula" placeholder="Cédula" class="form-control" required>
            <span class="help-block"></span>
            </div>
          <!-- /.col -->
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
                <input type="hidden" name="operacion" value="guardar">
              <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Buscando Empleado....">Registrar Asistencia <i class="ion-ios-undo"></i></button>


   <!--  justificacion -->
                
      <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                            Inasistencia
                        </button>


    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <form action="" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Inasistencia Justificada?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <label>No Justificado:</label>
                               <input type="checkbox" name="no_justificado">

                               <label>Justificacion:</label>
                               <textarea maxlength="500"  placeholder=" Explique su Motivo de inisistencia" name="justificado"> </textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary">Confirmar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- justificacion -->
            </div>
          </div>
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
                        <div class="input-daterange">
                          <div class="col-sm-offset-3 col-sm-8">
                            <div data-date-format="yyyy/mm/dd" data-date="yyyy/mm/dd" class="input-group input-large">
                              <input type="text" name="start_date" id="start_date" class="form-control" placeholder="Desde"/>
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" name="end_date" id="end_date" class="form-control" placeholder="Hasta"/>
                            </div>
                          </div>
                        </div>
                        <div  class="col-sm-2">
                          <button type="button" name="search1" id="search1" class="btn btn-primary active" ><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        
                      </div><br>
                    </div>
                    <table id="order_data_censo" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Cédula</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Status</th>
                          <th>Justificación</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>

              <?php $num=1; echo $filas;
              for ($i=0; $i < $filas; $i++) { 
                                
              echo "<tr>";    
              ?>  
              
              <td><?=$num?></td>
            <?php for ($j=1; $j < $campos; $j++) { ?>
            <td><?=$data[$i][$j]?></td>

              <?php } ?>

              <td>

              <a href="ControlA.php?operacion=eliminar&id_asistencias=<?=$data[$i][0]?>"><i style="font-size: 20px;" title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>
                                
              </td>
                <?php 
                $num++;
                }   ?>
                      </tbody>
                    </table>
                  </div>
                   
                  </div>

      <!-- info row -->
     
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->
    </div>


      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->

 



<?php include_once "../includes/footer.php"; ?>