<?php
	

	extract($_REQUEST);

	include('../conectar.php');

	$sql="INSERT INTO art_categorias(categoria) VALUES('$categoria')";

	$resultado=mysqli_query($conexion,$sql);

	if ($resultado) {
		$id = mysqli_insert_id($conexion);
		echo $id;
	}else{
		echo "-2";
	}

	include('../desconectar.php');
	
?>