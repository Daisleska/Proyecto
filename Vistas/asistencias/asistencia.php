<?php include_once "../includes/menu.php"; 

$query_perfil=mysqli_query($con,"select * from perfil where id=1");
  $rw=mysqli_fetch_assoc($query_perfil);
  $sql=mysqli_query($con, "select LAST_INSERT_ID(id) as last from facturas order by id desc limit 0,1 ");
  $rws=mysqli_fetch_array($sql);
  $numero=$rws['last']+1;
  ?>


<section style="padding-left: 20px;" class="content-header">
        <h3>Asistencia</h3>
      <ol class="breadcrumb">
        <li><i class="fa fa-users"><a href="../menu/ControladorMenu.php?operacion=asistencia"></i> Asistencia /</a></li>

        <li><i class="fa fa-table"><a href="../asistencias/ControlA.php?operacion=index"></i>Consulta de asistencias</a></li>
    
        
      </ol>
</section >
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
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Inasistencia Justificada?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <label>No Justificado:
                               <input type="checkbox" name="no_justificado"></label>

                               <label>Justificacion:
                               <input type="text" maxlength="500" name="justificado"></label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- justificacion -->
            </div>
          </div>
        </form>
      </div>
      </div>
    </div>


      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->

 



<?php include_once "../includes/footer.php"; ?>