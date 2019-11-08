<?php
	

	//buscar_subcategoria.php

	include ('../conectar.php');

	extract($_REQUEST);

	$sql="SELECT * FROM art_subcategorias WHERE id_categoria=".$id;

	$resultado=mysqli_query($conexion,$sql);
	$subcategorias='';
	while($consulta=mysqli_fetch_array($resultado)){

		$subcategorias.='<option value="'.$consulta['id'].'"> '.$consulta['subcategoria'].'</option>';
	}

	echo $subcategorias;

	include('../desconectar.php');
?>