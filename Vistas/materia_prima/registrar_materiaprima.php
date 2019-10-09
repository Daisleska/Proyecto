
<?php 
  require "../../Modelos/conexion.php";
  $programa="SELECT * from proveedor ";
  $query=mysqli_query($conectar,$programa);

  $programa1="SELECT * FROM producto";
  $resultado=mysqli_query($conectar,$programa1);
  $rows = mysqli_num_rows($resultado);
include_once "../includes/menu.php";
?>
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#"></a>Inventario</li>
        <li class="active">Registrar Producto</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datosPersonales" data-toggle="tab">Registro de Insumos</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <form class="form-horizontal" action="../../Controladores/ControladorMP.php?operacion=guardar" method="POST" id="insumos">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="" class="control-label">Proveedor</label>
                        <?php
                          echo "<select  name='id_proveedor' required class='form-control'>
                          <option value=''>Seleccione</option>";
                          while($row=mysqli_fetch_assoc($query)){
                          echo "<option value='".$row['id']."'>".$row['nombre']."</option>";
                          }
                          echo "</select>";
                        ?>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="" class="control-label">Codigo</label>
                      <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código" value="<?php echo 'SERVI-'; echo $rows + 1;?>" readonly>
                      <span class="help-block"></span>
                    </div>

                    <div class="col-sm-4">
                      <label for="" class="control-label">Nombre del Producto</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Produto" required>
                      <span class="help-block"></span>
                    </div>

                  </div>

                  </div>
                  <div class="col-sm-12">
                    <br>
                  </div>

                  <div class="form-group">
                    
                    <div class="col-sm-5">
                      <label for="" class="control-label">Presentacion</label>
                      <input type="text" class="form-control" name="presentacion" id="presentacion" placeholder="Presentacion del producto" required>
                      <span class="help-block"></span>
                    </div>

                    <div class="col-sm-7">
                      <label for="" class="control-label">Observaciones</label>
                      <input type="text" maxlength="120" class="form-control" name="observacion" id="observacion " placeholder="Observaciones" value="">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  </div>
                  <div class="col-sm-12">
                    <br>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <a href="../menu/ControladorMenu.php?operacion=materia_prima" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
                      <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando Datos....">Registrar Producto <i class="ion-android-exit"></i></button>
                    </div>
                  </div>
                </form> 
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
        </div>
      </div>
    </div>
    </section>

            <!-- Right Panel -->


<?php include_once "../includes/footer.php"; ?>