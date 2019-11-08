<?php
	

	extract($_REQUEST);

	include('../../../Modelos/conexion.php');

	$sql="SELECT * FROM productos WHERE id='$id'";

	$resultado=mysqli_query($conectar,$sql);

	while ($consulta=mysqli_fetch_array($resultado)) {
		
		$pedidomax=$consulta['stock_maximo']-$consulta['stock'];

		echo $pedidomax;
	}

	include('../../../Modelos/desconectar.php');
?>