<?php

	extract($_REQUEST);

	include('../conectar.php');

	$sql="SELECT * FROM vehiculos WHERE apodo='$apodo' AND borrado='N'";

	$resultados=mysqli_query($conexion,$sql);

	$res=mysqli_num_rows($resultados);

	if ($res>0) {
		
		echo "2";
	}else{

		echo "1";
	}

	include('../desconectar.php');

?>