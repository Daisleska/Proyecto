<?php
	
	include('../conectar.php');
	extract($_REQUEST);
	error_reporting(0);

	if ($op=='') {
		$sql="SELECT * FROM art_ubicacion WHERE ubicacion='$ubicacion' AND borrado='N' ";
	}else{
		$sql="SELECT * FROM art_ubicacion WHERE ubicacion='$ubicacion' and id!='$op' AND borrado='N' ";
	}

	$res=mysqli_query($conexion,$sql);

	$res_busqueda=mysqli_num_rows($res); 

	if ($res_busqueda>0) {
		
		echo "2";
	}else{

		echo "1";

	}

	include('../desconectar.php');

?>