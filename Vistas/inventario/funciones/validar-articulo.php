<?php
		require("../conectar.php");
		extract($_REQUEST);
	$articulo= $_POST['articulo'];
		
	$sql="SELECT stock FROM articulos WHERE articulos.id=".$articulo;

	$resultado= $conexion->query($sql);
	
	$rowin = $resultado->fetch_array();
	
	echo $rowin['stock'];
?>