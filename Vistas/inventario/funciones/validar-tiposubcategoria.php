<?php

	extract($_REQUEST);
	
	include('../conectar.php');

	$sql="SELECT * FROM art_tipos_subcategorias WHERE tipo_subcategoria='$tiposubcategoria' AND id_subcategoria=$subcategoria";


	$res=mysqli_query($conexion,$sql);

	$res_busqueda=mysqli_num_rows($res); 

	if ($res_busqueda>0) {
		echo "2";
	}else{
		echo "1";
	}

	include('../desconectar.php');

?>