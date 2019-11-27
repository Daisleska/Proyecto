<?php
		require("../../../Modelos/conexion.php");
		extract($_REQUEST);
	/*$articulo= $_POST['articulo'];*/
		
	$sql="SELECT id FROM productos WHERE productos.codigo='$producto'";
$resultado=mysqli_query($conectar,$sql);
	
$resut=mysqli_fetch_array($resultado);


	echo $resut['id'];
?>