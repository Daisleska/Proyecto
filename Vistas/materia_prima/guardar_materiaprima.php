<?php 
	
	require_once('../../Modelos/conexion.php');
	extract ($_REQUEST);
	$date = date("Y-m-d");
	
	$sql=" INSERT INTO producto VALUES ('NULL','".$id_proveedor."','".$codigo."','".$nombre."', CURRENT_TIMESTAMP,'".$presentacion."','".$observacion."')";
	
	$query= mysqli_query($conectar,$sql);
	if ($query) {
		echo "	<script type='text/javascript'>
					alert('Registro Exitoso');
					window.open('../menu/ControladorMenu.php?operacion=materia_prima','_self');
				</script>";
	} else {
		echo "	<script type='text/javascript'>
					alert('No Se Registraron Los Datos');
					window.open('../menu/ControladorMenu.php?operacion=registrar_materiaprima','_self');
				</script>";
	}

?>
