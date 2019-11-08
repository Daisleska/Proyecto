<?php
		require("../../Modelos/conexion.php");
		extract($_REQUEST);
	$articulo= $_POST['nombre'];
		
	$sql="SELECT stock FROM productos WHERE productos.codigo=".$producto;

	$resultado= $conectar->query($sql);
	
	$rowin = $resultado->fetch_array();
	
	echo $rowin['stock'];
?>