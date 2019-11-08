<?php
	
	extract($_REQUEST);

	include('../conectar.php');

	$sql="INSERT INTO art_tipos_subcategorias(id_subcategoria,tipo_subcategoria) VALUES ('$subcategoria','$tipo') ";

	$resultado=mysqli_query($conexion,$sql);

	if ($resultado) {
		
		$id=mysqli_insert_id($conexion);

		echo $id;

	}else{

		echo "-2";
	}

	include ('../desconectar.php');
?>