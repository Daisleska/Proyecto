<?php
	extract($_REQUEST);
	include('../conectar.php');

	$sql="SELECT * FROM art_tipos_subcategorias WHERE borrado='N' AND id_subcategoria='$subcategoria' AND tipo_subcategoria='$tipo' ";

	$resultado=mysqli_query($conexion,$sql);

	$res=mysqli_num_rows($resultado);

	include("../desconectar.php");

	if ($res>0) {
		echo "2";
	}else{
		echo "1";
	}

?>
