<?php
	extract($_REQUEST);
	include('../conectar.php');
	$sql="SELECT * FROM articulos WHERE id='$cod'";

	$resultado=mysqli_query($conexion,$sql);

	while ($consulta=mysqli_fetch_array($resultado)) {
		if ($inf==1) {
			echo $consulta['articulo'];
		}else if ($inf==2){

			?>
			

			<label><strong><h4>Detalles del Artículo:</h4></strong></label><br><br>
			<div class="row">
				<div class="col">
				 <label><strong>Imagen del Artículo:</strong></label><br>
             <?php
        
         
  echo "<img class=\"foto\" src=\""."img/".$consulta['foto']."\"/ width='40%' heigth='40%' >";
           ?>
			</div>
				
				<div class="col">
					<label><strong>En stock:</strong></label>
					<?php echo $consulta['stock']; ?><br>	
					<label><strong>Stock minimo:</strong></label>
					<?php echo $consulta['stock_minimo']; ?><br>
					<label><strong>Stock maximo:</strong></label>
					<?php echo $consulta['stock_maximo']; ?><br>
                    <label><strong>Descripción:</strong></label>
					<?php echo $consulta['informacion']; ?><br>
					<label><strong>Valor unitario:</strong></label>

					<?php echo $consulta['valor_unitario']; 


					$sql3="SELECT moneda.*, articulos.id_moneda FROM moneda,articulos WHERE articulos.id_moneda=moneda.id AND articulos.id='$cod'";

					$res3=mysqli_query($conexion,$sql3);
					while ($con2=mysqli_fetch_array($res3)) {
						echo" ".$con2['simbolo'];
					}


					?>

					<br>
							
				</div>
			</div><hr>
		<div class="row">
				<div class="col">
					<label><strong>Codígo del artículo:</strong></label>
					<?php echo $consulta['codarticulo'].'<br>'; ?>

					<label><strong>Categoría:</strong></label>
					<?php 
						if ($consulta['id_categoria']=='') {
							echo "<strong>N/A</strong><br>";
						}else{
							$id_categoria=$consulta["id_categoria"];
							$sql2="SELECT * FROM art_categorias WHERE id='$id_categoria'";
							$res=mysqli_query($conexion,$sql2);
							while ($con=mysqli_fetch_array($res)) {
								
								echo $con['categoria'].'<br>';
							}
						}
					 ?>
				
				<label><strong>Subcategoría:</strong></label>
				<?php 
					$id_subcategoria=$consulta['id_subcategoria'];

					$sql3="SELECT art_subcategorias.*, articulos.id_subcategoria FROM art_subcategorias,articulos WHERE articulos.id_subcategoria=art_subcategorias.id AND articulos.id='$cod'";

					$res3=mysqli_query($conexion,$sql3);
					$subcategoria='N/A';
					while ($con2=mysqli_fetch_array($res3)) {
						$subcategoria=$con2['subcategoria'];
					}

					echo $subcategoria;
				?>
				<br>
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
					
 <?php
$sql="SELECT * FROM articulos WHERE id='$cod'";
$result=mysqli_query($conexion,$sql);

		//declaramos arreglo para guardar codigos
$arrayCodigos=array();
?>



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
			
		</div>
	
</div>
			<?php
		}
		
	}

	include('../desconectar.php');

?>


<script src="js/JsBarcode.all.min.js"></script>
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
		
	</script>