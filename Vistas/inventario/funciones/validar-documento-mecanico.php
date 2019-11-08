<?php
	include('../conectar.php');
	extract($_REQUEST);
	
	$i;
	$sql="SELECT * FROM mecanicos_externos WHERE mecanicos_externos.tipo_documento='".$nacionalidad."' AND mecanicos_externos.numero_documento=".$documento_numero;
	
	$result=$conexion->query($sql);
	$filas=mysqli_num_rows($result);
	if($filas>0){
		$i=0;
	}else{
		$i=1;
	}


	echo $i;

?>