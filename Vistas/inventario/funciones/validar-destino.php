<?php 
	extract($_REQUEST);

	include('../conectar.php');

	$sql="SELECT * FROM destinos WHERE destino='$destino'";
	$res=mysqli_query($conexion,$sql);

	$res_busqueda=mysqli_num_rows($res);

	if ($res_busqueda>0) {
		
		echo "2";
	}else{
		echo "1";
	}

	include('../desconectar.php');
?>