<?php
  date_default_timezone_set('America/Caracas');
  require_once('../../Modelos/conexion.php');
  $date=date("Y-m-d");

  $sql5= "SELECT * FROM inventario INNER JOIN productos ON productos.id = inventario.id_productos  WHERE inventario.estado='aceptado'";
  $query5 = mysqli_query($conectar, $sql5);

     include_once "../includes/menu.php";
?>
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <!-- /.box-header -->
          <div class="box box-success">
            <div class="box-header">
              <div class="col-xs-8">
              <h3 class="box-title"><i class="fa fa-list-alt"></i>Almacén Materia Prima</h3>  
              </div>
              <div class="col-xs-2">
                <?php if($_SESSION['tipocuenta']=="Administrador(a)" ) { ?>
                <a href="index.php?llave=registrar_inventario" class="btn btn-block btn-primary btn-sm"><i class="fa fa-edit"></i> Registrar Producto</a>
                <?php } ?>   
              </div>
              <div class="col-md-2">
                <a href="../../reportes/reporte_existencia.php" target="blank" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Reporte PDF</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                  <th>Estado</th>
                  <th>Nombre</th>
                  <th>Cantidad</th>
                  <th>Unidad</th>
                  <th>Fecha de Registro</th>
                  <th>Fecha de Vencimiento</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      while($row=mysqli_fetch_array($query5)) {
                        $fecha_entrega = str_replace('-', '/', date("d-m-Y", strtotime($row['fecha_entrega'])));
                        $fecha1 = str_replace('-', '/', date("d-m-Y", strtotime($row['fecha_vencimiento'])));
                      $id_inventario = $row['id'];
                      $cantidad=$row['cantidad'];
                      $fecha_vencimiento=$row['fecha_vencimiento'];
                  ?>
                    <tr>
                    <?php
                     /* echo '<td>'.mb_convert_encoding($row['codigo'], "UTF-8").'</td>';*/
                      echo '<td><span class="label label-success">'.mb_convert_encoding($row['estado'], "UTF-8").'</span></td>';
                      echo '<td>'.mb_convert_encoding($row['nombre'], "UTF-8").'</td>';
                      echo '<td align="center">'; ?>
                      <?php if ($row['cantidad']<=5) { ?>  <span class="label label-danger"><?php echo $row['cantidad']; ?></span> <?php } else { echo $row['cantidad']; } ?>
                      <?php echo '</td>';
                       echo '<td>'.mb_convert_encoding($row['unidad'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($fecha_entrega, "UTF-8").'</td>';
                      echo '<td align="center">'; ?>
                      <?php if ($row['fecha_vencimiento']<"$date") { ?>  <span class="label label-danger"><?php echo $fecha1; ?></span> <?php } else { echo $fecha1; } ?>
                      <?php echo '</td>';
                      echo '<td align="center">';
                        //echo '<a href="index.php?llave=ver_inventario&id_inventario='.$row['id_inventario'].'" title="Agregar Mas Productos"><button type="button" class="btn btn-warning btn-xs">
                        //<i class="fa fa-plus"></i></button></a>';
                        echo ' <a href="../menu/ControladorMenu.php?operacion=ver_inventario&id_inventario='.$row['id'].'" title="Ver"><button type="button" class="btn btn-primary btn-xs">
                        <i class="ion-eye"></i></button></a>';
                      /*if($_SESSION['tipocuenta']=="Administrador(a)" ) {*/
                        echo ' <a href="index.php?llave=modificar_inventario&id_inventario='.$row['id'].'" title="Modificar"><button type="button" class="btn btn-success btn-xs">
                        <i class="fa fa-edit"></i></button></a>';
                        echo ' <a href="../menu/ControladorMenu.php?operacion=usar&id_inventario='.$row['id'].'" title="Usar Producto"><button type="button" class="btn btn-warning btn-xs">
                        <i class="fa fa-minus"></i></button></a>';
                      }
                      echo '</td>';
                      echo '</tr>';
                   /* }*/
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->

        </div>
      </div>
    </section>
  </tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


     <?php include_once "../includes/footer.php"; ?>