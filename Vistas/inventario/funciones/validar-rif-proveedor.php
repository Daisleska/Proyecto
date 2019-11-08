<?php
	
	extract($_REQUEST);

	include('../../../Modelos/conexion.php');

	$sql="SELECT * FROM proveedor WHERE borrado='N' AND cod_rif='$rs' AND cedula='$documento_numero'";

	$resultado=mysqli_query($conectar,$sql);

	$res_busqueda=mysqli_num_rows($resultado);

	if ($res_busqueda>0) {
		echo "2";
	}else{

		echo "1";
	}

	include('../../../Modelos/desconectar.php');

?>