<?php
	
	include('../../../Modelos/conexion.php');
	extract($_REQUEST);
	error_reporting(0);

	if ($op=='') {
		$sql="SELECT * FROM ubicacion WHERE nombre='$ubicacion' AND borrado='N' ";
	}else{
		$sql="SELECT * FROM ubicacion WHERE nombre='$ubicacion' and id!='$op' AND borrado='N' ";
	}

	$res=mysqli_query($conectar,$sql);

	$res_busqueda=mysqli_num_rows($res); 

	if ($res_busqueda>0) {
		
		echo "2";
	}else{

		echo "1";

	}

	include('../../../Modelos/desconectar.php');

?>