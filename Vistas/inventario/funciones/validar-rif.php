<?php
	include('../conectar.php');
	extract($_REQUEST);
	
	$i;
	$sql="SELECT * FROM empresa_mantenimiento WHERE empresa_mantenimiento.rif_categoria='".$rs."' AND empresa_mantenimiento.rif=".$documento_numero;
	
	$result=$conexion->query($sql);
	$filas=mysqli_num_rows($result);
	if($filas>0){
		$i=0;
	}else{
		$i=1;
	}

	echo $i;

?>