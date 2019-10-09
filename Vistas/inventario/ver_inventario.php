<?php 
	require '../../Modelos/conexion.php';
	extract($_REQUEST);

  $sq= "SELECT * FROM inventario te INNER JOIN productos tei ON te.id_productos=tei.id INNER JOIN proveedor pro ON tei.id=pro.id 
  WHERE te.id='$id_inventario'";
	$result = mysqli_query($conectar,$sq);
	while ($row=mysqli_fetch_array($result)) {
		$estado = $row['estado'];
		$fecha1 = str_replace('-', '/', date("d-m-Y", strtotime($row['fecha_entrega'])));
    $fecha2 = str_replace('-', '/', date("d-m-Y", strtotime($row['fecha_vencimiento'])));
?>
	
    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-list-alt"></i> <span> Nombre del Producto</span>
            <small class="pull-right"><b>Fecha de Registro: <?php echo $fecha1; ?></b></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <label>Código:</label>
            <input type="text" class="form-control" value="<?php echo $row['codigo_insumo']; ?>" disabled=""><br>
            <label>Proveedor:</label>
            <input type="text" class="form-control" value="<?php echo $row['nombre_proveedor']; ?>" disabled="">
        </div>
        <div class="col-sm-4">
	        <strong></strong>
        	<label>Nombre:</label>
	        <input type="text" class="form-control" value="<?php echo $row['nombre']; ?>" disabled=""><br>
	        <label>Cantidad:</label>
	        <input type="text" class="form-control" value="<?php echo $row['cantidad']; ?>" disabled="">
        </div>
        <div class="col-sm-4">
        	<strong></strong>
        	<label>Marca:</label>
        	<input type="text" class="form-control" value="<?php echo $row['marca']; ?>" disabled=""><br>
          <label>Fecha de Vencimiento:</label>
          <input type="text" class="form-control" value="<?php echo $fecha2; ?>" disabled=""><br>
        </div>
        <div class="col-sm-12">
          <label>Observaciones:</label>
          <textarea readonly="" disabled="" class="form-control"><?php echo $row['observaciones']; ?></textarea><br>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-5 col-sm-7">
            <a href="index.php?llave=inventario" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->
<?php } ?>