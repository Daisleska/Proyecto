<?php

	extract($_REQUEST);
	include('../../Modelos/conexion.php');
	$sql="SELECT * FROM pedido WHERE id='$id'";
	$resultado=mysqli_query($conectar,$sql);

	while ($consulta=mysqli_fetch_array($resultado)) {
		
		$pedido=$consulta['tipo'];
	}
	include('../../Modelos/desconectar.php');

	if ($pedido=='interno') {
		header('location: ../../reportes/pedido-interno-pdf.php?id='.$id);
	}

	if ($pedido=='externo') {
		header('location: pedido-externo-pdf.php?id='.$id);
	}
?>