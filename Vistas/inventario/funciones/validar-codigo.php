<?php
	function id_clean($id){

      $cadena = preg_replace("/[^0-9]+/", "*", $id);
      return $cadena;
    }
	include('../../../Modelos/conexion.php');
	extract($_REQUEST);
	error_reporting(0);
	if ($act=='') {
		$sql="SELECT * FROM productos WHERE codigo='$codigo' AND borrado='N' ";
	}else{
		$act=id_clean($act);
		$sql="SELECT * FROM productos WHERE codigo='$codigo' AND borrado='N' AND id!='$act'";
	}
	
	$resultado=mysqli_query($conectar,$sql);

	$res=mysqli_num_rows($resultado);

	if ($res>0) {
		echo "2";
	}else{
		echo "1";
	}
	include('../../../Modelos/desconectar.php');
?>