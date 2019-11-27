<?php
	extract($_REQUEST);
	include('../../Modelos/conexion.php');
	$sql="SELECT productos.*, proveedor.nombre AS pro FROM productos, proveedor WHERE proveedor.id=productos.id_proveedor AND productos.id='$cod'";
	

	$resultado=mysqli_query($conectar,$sql);

	while ($consulta=mysqli_fetch_array($resultado)) {
		if ($inf==1) {
			echo $consulta['nombre'];
		}else if ($inf==2){

			?>
			

			<label><strong><h4>Detalles del Producto:</h4></strong></label><br><br>
			<div class="row">
			<!-- 	<div class="col">
				 <label><strong>Imagen del Producto:</strong></label><br>
             <?php
        
         
  echo "<img class=\"foto\" src=\""."img/".$consulta['foto']."\"/ width='40%' heigth='40%' >";
           ?>
			</div> -->
				
				<div class="col">
					<label><strong>En stock:</strong></label>
					<?php echo $consulta['stock']; ?><br>	
					<label><strong>Stock minimo:</strong></label>
					<?php echo $consulta['stock_minimo']; ?><br>
					<label><strong>Stock maximo:</strong></label>
					<?php echo $consulta['stock_maximo']; ?><br>

					<br>
							
				</div>
			</div><hr>
		<div class="row">
				<div class="col-md-6">
					<label><strong>Codígo del Producto:</strong></label>
					<?php echo $consulta['codigo'].'<br>'; ?>
				</div>
				<div class="col-md-6">
					<label><strong>Presentación:</strong></label>
					<?php 
						echo $consulta['presentacion'].'<br>';
					 ?>
				</div>
		</div>

			<div class="row">
				<div class="col-md-6">
				<label><strong>Unidad:</strong></label>
				<?php 
					

					echo $consulta['unidad'].'<br>';
				?>
				<br>
			</div>

			<div class="col-md-6">
					<label><strong>Activo</strong></label>
					<?php  

						if ($consulta['activo']=='S') {
							echo "Si<br>";
						}
						if ($consulta['activo']=='N') {
							
							echo "No<br>";
						}
					?>	
				</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<label><strong>Proveedor:</strong></label>
				<?php 
					

					echo $consulta['pro'].'<br>';
				?>
					</div>
				</div>
					
 <!-- <?php
$sql="SELECT * FROM productos WHERE id='$cod'";
$result=mysqli_query($conectar,$sql);

		//declaramos arreglo para guardar codigos
$arrayCodigos=array();
?>
 -->

<!-- 
	<div class="col">
	
	<LABEL><STRONG>Código de Barras</STRONG></LABEL> <br>
			<?php 
			while($ver=mysqli_fetch_row($result)):
				$arrayCodigos[]=(string)$ver[16]; 
				?>
				<tr>

					<td>
						<svg id='<?php echo "barcode".$ver[16]; ?>'>
						</td>
					</tr>
				<?php endwhile; ?>
			
		</div> -->
	
</div>
			<?php
		}
		
	}

/*	include('../../Modelos/desconectar.php');*/

?>


<!-- <script src="js/JsBarcode.all.min.js"></script>
	<script type="text/javascript">

		function arrayjsonbarcode(j){
			json=JSON.parse(j);
			arr=[];
			for (var x in json) {
				arr.push(json[x]);
			}
			return arr;
		}

		jsonvalor='<?php echo json_encode($arrayCodigos) ?>';
		valores=arrayjsonbarcode(jsonvalor);

		for (var i = 0; i < valores.length; i++) {

			JsBarcode("#barcode" + valores[i], valores[i].toString(), {
				format: "code128",
				lineColor: "#000",
				width: 2,
				height: 30,
				displayValue: true
			});
		}
		
	</script> -->