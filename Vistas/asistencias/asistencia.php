<?php include_once "../includes/menu.php"; 

$query_perfil=mysqli_query($con,"select * from perfil where id=1");
  $rw=mysqli_fetch_assoc($query_perfil);
  $sql=mysqli_query($con, "select LAST_INSERT_ID(id) as last from facturas order by id desc limit 0,1 ");
  $rws=mysqli_fetch_array($sql);
  $numero=$rws['last']+1;
  ?>


        <section style="padding-left: 20px;" class="content-header">
      <h3>Tablero <small>/  Asistencia</small></h3>
      <ol class="breadcrumb">
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li> -->
        <li class="active"><i class="fa fa-users"></i> Asistencia</li>
        <li style="float: right; padding-left: 640px;"><a href="../asistencias/ControlA.php?operacion=index"><i class="fa fa-table"></i> Consulta de asistencias</a></li>
      </ol>
    </section>
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
            </div>
          </div>
        </form>
      </div>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->



<?php include_once "../includes/footer.php"; ?>