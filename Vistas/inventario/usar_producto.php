<?php 
  require '../../Modelos/conexion.php';
  include_once "../includes/menu.php";
  extract($_REQUEST);

  $sql5= "SELECT * FROM inventario inv
  INNER JOIN producto pro ON inv.id_producto = pro.id_producto 
  INNER JOIN proveedores prov ON pro.id_proveedores=prov.id_proveedores";
  $query5 = mysqli_query($conectar, $sql5);
  if ($row=mysqli_fetch_array($query5)) {
    $estado =['estado'];
    $fecha1 = str_replace('-', '/', date("d-m-Y", strtotime($row['fecha_registro'])));
    $fecha_registro = str_replace('-', '/', date("d-m-Y", strtotime($row['fecha_registro'])));
?>
  <section class="content-header">
      <h1>Consultas<small>Modificar Producto</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Inventario</li>
        <li class="active">Proveedores</li>
      </ol>
    </section>
    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-truck"></i> <span> Modificar Producto</span>
            <small class="pull-right"><b>Fecha de Registro</b>: <?php echo $fecha1; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
      <form action="index.php?llave=modificado_producto" method="POST" id="usar_producto">
        <input type="hidden" name="id_inventario" value="<?php echo $row['id_inventario']; ?>">
        <div class="col-sm-12 invoice-col">
          <div class="col-sm-4">
            <label>Insumo:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?> - <?php echo $row['marca']; ?>" readonly="">     
          </div>
          <div class="col-sm-4">
            <label>Estado:</label>
            <select name="estado" id="estado" class="form-control" readonly disabled="">
              <option value="Aceptado" <?php if($estado=="Aceptado") {?> selected="selected" <?php } ?>>Aceptado</option>
              <option value="Rechazado" <?php if($estado=="Rechazado") {?> selected="selected" <?php } ?>>Rechazado</option>
            </select>
          </div>
          <div class="col-sm-4">
            <label>Cantidad:</label>
            <input type="text" name="cantidad" id="cantidad" class="form-control" value="<?php echo $row['cantidad']; ?>"required placeholder="Cantidad" readonly>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-sm-12"><br>
          <div class="col-sm-offset-4 col-sm-4">
            <label>Cantidad a Usar:</label>
            <input type="number" name="cantidad_usar" id="cantidad_usar" class="form-control"  placeholder="Cantidad a Usar" required min="1">
            <span class="help-block"></span>            
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-5 col-sm-7"><br>
            <a href="index.php?llave=inventario" class="btn btn-danger">Regresar...<i class="ion-ios-undo"></i></a>
            <button type="submit" class="btn btn-success" value="Registrar">Modificar...<i class="fa fa-check-square-o"></i></button>
          </div>
        </div>
        </form>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->
<?php } ?>

<?php include_once "../includes/footer.php"; ?>