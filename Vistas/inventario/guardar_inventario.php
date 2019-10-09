<?php 
	
	require_once('../../Modelos/conexion.php');
	extract ($_REQUEST);
	$date = date("Y-m-d");
	
	$sql=" INSERT INTO inventario VALUES ('NULL','".$id_productos."','".$estado."','".$observaciones."','".$cantidad."',CURRENT_TIMESTAMP,'".$fecha_vencimiento."')";
	
	$query= mysqli_query($conectar,$sql);
	if ($query) {
		echo "	<script type='text/javascript'>
					alert('Registro Exitoso');
					window.open('../menu/ControladorMenu.php?operacion=inventario','_self');
				</script>";
	} else {
		echo "	<script type='text/javascript'>
					alert('No Se Registraron Los Datos');
					window.open('../menu/ControladorMenu.php?operacion=inventario','_self');
				</script>";
	}

?>