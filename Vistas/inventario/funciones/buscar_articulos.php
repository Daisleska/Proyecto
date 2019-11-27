<?php

	include ('../../../Modelos/conexion.php');

	extract($_REQUEST);

	$sql="SELECT nombre, id FROM productos WHERE codigo='$id'";

	$resultado=mysqli_query($conectar,$sql);

	$consulta=mysqli_fetch_array($resultado);

		//$subcategorias.="<script>alert(".."" //'<option value="'.$consulta['id'].'"> '.$consulta['subcategoria'].'</option>';
	

	echo $consulta['nombre'];

/*	include('../../../Modelos/desconectar.php');*/

?>