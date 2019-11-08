<?php
	extract($_REQUEST);
	include('../conectar.php');
	$sql="SELECT proveedores.*,rif_categoria.simbologia FROM proveedores,rif_categoria WHERE proveedores.id='$cod' AND proveedores.cod_rif=rif_categoria.id";

	$resultado=mysqli_query($conexion,$sql);

	while ($consulta=mysqli_fetch_array($resultado)) {
		if ($inf==1) {
			echo $consulta['empresa'];
		}else if($inf==2){

			?>

				<div style="text-align: left;">
					<div class="row">
					<div class="col-md-6">
						<label><strong>RIF:</strong></label>
						<?php echo $consulta['simbologia']."-".$consulta['rif']; ?><br>
						
						<label><strong>Correo electrónico:</strong></label>
						<?php if ($consulta['correo']=='') {
							echo "N/A";
						}else{
							echo $consulta['correo'];
						} ?><br>

					</div>
					<div class="col-md-6">
						<label><strong>Teléfono #1:</strong></label>
						<?php  

							if ($consulta['telef1']=='') {
								echo "N/A";
							}else{

								echo $consulta['telef1'];
							}

						?><br>
						<label><strong>Teléfono #2:</strong></label>
						<?php if ($consulta['telef2']=='') {
							echo "N/A";
						}else{
							echo $consulta['telef2'];
						} ?><br>
						
					</div>
				</div>	

				
				<hr>
				<div class="row">
					<div class="col">
						<label><strong>Otros:</strong></label><br>
						<?php

							if ($consulta['otros']=='') {
								echo "N/A";
							}else{

								echo $consulta['otros'];
							}
						 ?>
					</div>
				</div>
				</div>

			<?php
		}
		
	}

	include('../desconectar.php');

?>