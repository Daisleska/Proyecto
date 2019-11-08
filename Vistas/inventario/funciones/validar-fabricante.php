<?php
	extract($_REQUEST);
	include('../conectar.php');

	$sql="SELECT * FROM fabricantes_ve WHERE borrado='N' AND fabricante='$tipo'";

	$resultado=mysqli_query($conexion,$sql);

	$res_busqueda=mysqli_num_rows($resultado);

	if ($res_busqueda>0) {
		echo "2";
	}else{

		echo "1";
	}

	include('../desconectar.php');
?>