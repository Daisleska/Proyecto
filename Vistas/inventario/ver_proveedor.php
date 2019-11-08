<?php
	extract($_REQUEST);
	include('../../Modelos/conexion.php');
	$sql="SELECT * FROM proveedor WHERE proveedor.id='$cod'";

	$resultado=mysqli_query($conectar,$sql);

	while ($consulta=mysqli_fetch_array($resultado)) {
		if ($inf==1) {
			echo $consulta['nombre'];
		}else if($inf==2){

			?>

				<div style="text-align: left;">
					<div class="row">
					<div class="col-md-6">
						<label><strong>RIF:</strong></label>
						<?php echo $consulta['cod_rif']."-".$consulta['cedula']; ?><br>
						
						<label><strong>Correo electrónico:</strong></label>
						<?php if ($consulta['email']=='') {
							echo "N/A";
						}else{
							echo $consulta['email'];
						} ?><br>

					</div>
					<div class="col-md-6">
						<label><strong>Teléfono:</strong></label>
						<?php  

							if ($consulta['telefono']=='') {
								echo "N/A";
							}else{

								echo $consulta['telefono'];
							}

						?><br>
						
					</div>
				</div>	

				
				<hr>
				<div class="row">
					<div class="col">
						<label><strong>Dirección:</strong></label><br>
						<?php

							if ($consulta['direccion']=='') {
								echo "N/A";
							}else{

								echo $consulta['direccion'];
							}
						 ?>
					</div>
				</div>
				</div>

			<?php
		}
		
	}

/*	include('../../Modelos/desconectar.php');*/

?>