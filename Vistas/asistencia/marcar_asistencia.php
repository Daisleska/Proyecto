<?php include_once "../includes/menu.php"; ?>


        <section style="padding-left: 20px;" class="content-header">
      <h1>Tablero <small>/  Asistencia</small></h1>
      <ol class="breadcrumb">
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li> -->
        <li class="active"><i class="fa fa-users"></i>  Asistencia</li>
      </ol>
    </section>
     <section style="padding-left: 20px;"  class="invoice">
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-header">
            <i class="fa fa-edit"></i> Control de Asistencia
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-offset-4 col-sm-4 invoice-col">
        <form action="index.php?llave=guardar_asistencia" method="POST" id="asistencia">
            <div class="form-group">
            <label>Cédula de Empleado:</label>
                <input type="text" name="cedula" id="cedula" placeholder="Cédula" class="form-control" required>
            <span class="help-block"></span>
            </div>
          <!-- /.col -->
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
              <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Buscando Persona....">Registrar Asistencia <i class="ion-ios-undo"></i></button>
            </div>
          </div>
        </form>
      </div>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->

<br><br><br><br><br><br><br><br><br><br><br><br><br>

 <footer id="footer-main" style="background: #006699; color: #fff;">
            <div class="container">
                <div class="row">
                    <div class=" col-sm-4">
                        <h4 class="all-tittles">Acerca de</h4>
                        <p style="">
                            SERVIFORM C.A empresa maquiladora, encargada de formular productos de insecticidas... </p>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="all-tittles">Desarrolladores</h4>
                        <br>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-facebook-square"></i>&nbsp; Hector Hernandez<!--  <i class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i><i class="zmdi zmdi-instagram zmdi-hc-fw footer-social"></i> --></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-facebook-square"></i> &nbsp; Daisleska Vilera <!-- <i  class="fa fa-facebook-square"></i><i class="fa fa-instagram"></i> --></li>
                        </ul>
                         <ul class="list-unstyled">
                            <li><i class="fa fa-facebook-square"></i> &nbsp; Genessi Escobar <!-- <i  class="fa fa-facebook-square"></i><i class="fa fa-instagram"></i> --></li>
                        </ul>
                    </div>

                     <div class=" col-sm-4">
                        <h4 class="all-tittles">Extras</h4>
                        <br>
                        <ul class="list-unstyled">
                            <li><a href="">Inicio</a></li>
                            <li><a href="">Correo</a></li>
                            <li><a href="">Telefono</a></li>
                            <li><a href="">Redes Sociales</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>


    

    <!-- Right Panel -->
<?php include_once "../includes/footer.php"; ?>