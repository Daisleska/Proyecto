<?php 
	require("../../Modelos/conexion.php");
	extract($_REQUEST);

	$sql="INSERT INTO `asistencias` (`id`, `id_empleado`, `fecha_hora` ) VALUES (NULL, '$id_empleado', CURRENT_TIMESTAMP) ";

	$consulta=mysqli_query($conectar,$sql);

	if($consulta) {

		?> 

			<script type="text/javascript">
				alert("Se registro éxitosamente la cédula: <?php echo $cedula ?>
					Bienvenido, tenga buen dia!");
				window.location="../menu/ControladorMenu.php?operacion=asistencia";
			</script>
			<?php 
	
	} else { 
		?> 

			<script type="text/javascript">
				alert("Registro fallido, Vuelva a intentarlo!");
					window.location="../menu/ControladorMenu.php?operacion=asistencia";
			</script>
		<?php 
			}


?>