<?php
	extract($_REQUEST);
	include('../conectar.php');

	$sql="UPDATE notificaciones_detalles SET visto='S' WHERE id_usuario='$user' AND visto='N'";

	$resultado=mysqli_query($conexion,$sql);

	if ($resultado) {
		
		echo "1";
	}else{
		echo "2";
	}

	include('../desconectar.php');

?>