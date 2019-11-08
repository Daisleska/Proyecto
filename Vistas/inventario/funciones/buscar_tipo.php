<?php
	
	include('../conectar.php');

	extract($_REQUEST);

	$sql="SELECT * FROM art_tipos_subcategorias WHERE id_subcategoria='$id'";

	$resultado=mysqli_query($conexion,$sql);

	$tipos='';

	while ($consulta=mysqli_fetch_array($resultado)) {
		
		$tipos.='<option value="'.$consulta['id'].'"> '.$consulta['tipo_subcategoria'].'</option>';
	}

	echo $tipos;

	include('../desconectar.php');


?>