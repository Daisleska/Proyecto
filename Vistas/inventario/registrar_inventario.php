  <?php
  require "../../Modelos/conexion.php";
  $programa="SELECT * FROM producto INNER JOIN proveedor ON producto.id_proveedor=proveedor.id_proveedor ORDER BY nombre";
  $resultado=mysqli_query($conectar,$programa);
  $fecha = date("Y-m-d");
  $fecha_registro = str_replace('-', '/', date("d-m-Y", strtotime($fecha)));
  include_once "../includes/menu.php";
?>
    <section class="content-header">
      <h1>Inventario<small>Registrar Inventario</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#"></a>Inventario</li>
        <li class="active">Registrar Inventario</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datosPersonales" data-toggle="tab"> Inventario</a></li><br>
            </ul><br>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <form class="form-horizontal" action="index.php?llave=guardar_inventario" method="POST" id="inventario">
                  <input type="hidden" name="id_inventario" value="<?php echo $id_inventario; ?>">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="" class="control-label">Producto</label>
                        <?php
                          echo "<select  name='producto' id='insumo' required class='form-control' onchange='cargarAjax()'>
                          <option value=''>Seleccione</option>";
                          while($row=mysqli_fetch_assoc($resultado)){
                          echo "<option value='".$row['id_producto']."'>".$row['nombre']." - ".$row['presentacion']."</option>";
                          }
                          echo "</select>";
                        ?>
                      <span class="help-block"></span>
                    </div>
                    <!--<div class="col-sm-4">
                      <label>Proveedor</label>
                      <input type="text" class="form-control" name="id_proveedor" id="padres" placeholder="Proveedor" value="" readonly="">
                    </div>-->
                    <div class="col-sm-4">
                      <label for="" class="control-label">Estado</label>
                      <select class="form-control" name="estado">
                        <option value="Aceptado">Aceptado</option>
                        <option value="Rechazado">Rechazado</option>
                      </select>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="" class="control-label">Fecha de Vencimiento</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="input-group date form-control" name="fecha_vencimiento" id="fecha_vencimiento" placeholder="Fecha de Vencimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                      </div>
                      <span class="help-block"></span>                    
                    </div>
                  </div><br>

                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="" class="control-label">Observaciones</label>
                      <input type="text" class="form-control" name="observaciones" id="observaciones" placeholder="Observaciones" value="">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="" class="control-label">Cantidad</label>
                      <div class="input-group">
                      <span class="input-group-addon">KG</span>
                      <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Ingrese Cantidad" value="" min="1">
                      </div>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="" class="control-label">Fecha de Entrega</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" name="fecha_entrega" id="fecha_entrega" value="<?php echo $fecha_registro; ?>" readonly>
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">

                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <a href="index.php?llave=inventario" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
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
    </section>

<script type="text/javascript">
  function cargaAjax() {
    if( $('[name=insumo]').val()!='') {
      $('#padres').load('cargar.php',{nombre_proveedor:$('[name=insumo]').val(),is_insumos: <?php echo $row['is_insumos']; ?>});
    }
  }
</script>


            <!-- Right Panel -->
<?php include_once "../includes/footer.php"; ?>