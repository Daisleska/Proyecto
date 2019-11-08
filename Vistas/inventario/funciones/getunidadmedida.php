<?php
		require("../conectar.php");
	$medida = $_POST['art'];

		$sql="SELECT * FROM articulos WHERE articulos.id=".$medida;
	$resultado=$conexion->query($sql);
	$resss=$resultado->fetch_array();
		$sql="SELECT * FROM unidad_medida WHERE unidad_medida.id=".$resss['id_unidad_medida'];
	$resultadop= $mysqli->query($sql);
	
	$htmll= "<option value='0'>Seleccionar Insumo</option>";
	
	while($rowin = $resultadop->fetch_assoc())
	{
		$htmll.= "<option value='".$rowin['id']."'>".$rowin['unidad_medida']."</option>";
	}
	
	echo $htmll;
?>