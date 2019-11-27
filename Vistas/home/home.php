<!-- -->

<?php include_once "../includes/menu.php"; ?>

  <div class="contenido">
    <div class="content-2">
      <div style="width: 100%; padding-left: 20px; padding-right: 20px;">
        <div class="row">
        <div class="col-md-3">
          <div class="card mb-1 box-shadow"> <!--card mb-1 box-shadow-->
            <div class="row">
            <div class="col NHA" style=";padding: 0; text-align: left; ">
                <img src="../../images/img/user.png" class="img-responsive" height="100%">
              </div>
              <div class="col NHA" style=";text-align: justify;">
                <label><strong>Usuarios Registrados:</strong></label>
                <p style="font-size: 20px;">

                   <?php
                    include('../../Modelos/conexion.php');
                    $sql="SELECT * FROM usuarios WHERE borrado='N'";
                    $resultados=mysqli_query($conectar,$sql);
                    $res=mysqli_num_rows($resultados);
                    echo $res;
           
                   ?>

                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3" >
          <div class="card mb-1 box-shadow"> <!--card mb-1 box-shadow-->
            <div class="row">
            <div class="col NHA" style=";padding: 0; text-align: left; ">
                <img src="../../images/img/vehiculo.png" class="img-responsive" height="100%">
              </div>
              <div class="col NHA" style=";text-align: justify;">
                <label><strong>Proveedores Registrados:</strong></label><br>
                <p style="font-size: 20px;">

                  <?php
                    include('../../Modelos/conexion.php');
                    $sql="SELECT * FROM proveedor WHERE borrado='N'";
                    $resultados=mysqli_query($conectar,$sql);
                    $res=mysqli_num_rows($resultados);
                    echo $res;
           
                   ?>
                  
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mb-1 box-shadow"> <!--card mb-1 box-shadow-->
            <div class="row">
            <div class="col NHA" style=";padding: 0; text-align: left; ">
                <img src="../../images/img/shop.png" class="img-responsive" height="100%">
              </div>
              <div class="col NHA" style=";text-align: justify;">
                <label><strong>Pedidos Pendientes:</strong></label><br>
                <p style="font-size: 20px;">
                  <?php
                    include('../../Modelos/conexion.php');
                    $estado='En Espera';
                    $sql="SELECT * FROM pedido WHERE estado='$estado'";
                    $resultados=mysqli_query($conectar,$sql);
                    $res=mysqli_num_rows($resultados);
                    echo $res;
            
                   ?>
                </p>
              </div>
            </div>
          </div>
        </div>

         <?php if ($_SESSION['tipo_usuario']=='Usuario 2' or $_SESSION['tipo_usuario']=='Admin' ){  ?>
   <div class="col-md-3" >
          <div class="card mb-1 box-shadow"> <!--card mb-1 box-shadow-->
            <div class="row">
            <div class="col NHA" style=";padding: 0; text-align: left; ">
                <img src="../../images/img/cube.png" class="img-responsive" height="100%">
              </div>
              <div class="col NHA" style=";text-align: justify;">
                <label><strong>Empleados laboral:</strong></label><br>
                <p style="font-size: 20px;">

                  <?php
                    include('../../Modelos/conexion.php');
                    $hoy=date('Y-m-d');
                    $sql="SELECT * FROM asistencias WHERE fecha_hora='$hoy'";
                    $resultados=mysqli_query($conectar,$sql);
                    $res=mysqli_num_rows($resultados);
                    echo $res;
           
                   ?>
                  
                </p>
              </div>
            </div>
          </div>
        </div>

<?php } ?>

      </div>
      </div>
      </div>
  </div>




        <div class="content mt-3">


<!-- mensaje flotante de notificacion -->
   <!--          <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Okey</span> Se ha detectado un ingreso no establecido al sistema
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div> -->
            

            <div class="col-md-12">
                      
                            <img style="page-break-after: 1cm; height: 12cm;" class="card-img-top" src="../../images/fachada.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-3"></p>
                            </div>
                      
                    </div>




<?php if ($_SESSION['tipo_usuario']=='Usuario 1' or $_SESSION['tipo_usuario']=='Admin' ){  ?>

    <div class="col-md-7 hidden-xs">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pedidos Pendientes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <?php 
            include('../../Modelos/conexion.php');
              $sql5= "SELECT * FROM pedido INNER JOIN pedido_detalles ON pedido_detalles.id = pedido.id WHERE pedido.estado = 'En Espera'";
              $query5 = mysqli_query($conectar, $sql5);
            ?>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    while($row5=mysqli_fetch_array($query5)) {
                    
                        $id_inventario = $row5['id'];
                        echo '<tr>';
                        echo '<td><a href="index.php?llave=ver_inventario&id='.$row5['id'].'">'.mb_convert_encoding($row5['fecha_registro'], "UTF-8").'</a></td>';
                        echo '<td>'.mb_convert_encoding($row5['tipo'], "UTF-8").'</td>';
                        echo '<td>'.mb_convert_encoding($row5['cantidad_solicitada'], "UTF-8").'</td>';
                        echo '<td>'.mb_convert_encoding($row5['estado'], "UTF-8").'</td>';
                        echo '<td align="center">'; 
                  ?>
                
                  <?php echo '</td>';
                        echo '<td align="center">';
                  ?>
                  <?php
                        echo '</td>';
                        echo '<td align="center">';
                  ?>
                  <?php
                        echo '</td>';
                        echo '</tr>';
                      }
                  
                    
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="index.php?llave=registrar_inventario" class="btn btn-sm btn-info btn-flat pull-left">Nuevo registro</a>
              <a href="../inventario/inventario.php" class="btn btn-sm btn-default btn-flat pull-right">Ver todo el inventario</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          </div>
          <br><br>
        <?php } ?>
                     
        </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->


<?php include_once "../includes/footer.php"; ?>