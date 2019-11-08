<?php
	extract($_REQUEST);
	include('../conectar.php');

	$sql="SELECT * FROM tipo_vehiculo WHERE borrado='N' AND tipo_vehiculo='$tipo'";

	$resultado=mysqli_query($conexion,$sql);

	$res_busqueda=mysqli_num_rows($resultado);

	if ($res_busqueda>0) {
		echo "2";
	}else{

		echo "1";
	}

	include('../desconectar.php');
?>