<?php
session_start();
include("../Modelos/clasedb.php");
extract($_REQUEST);



class ControladorPrivilegios 
{
	

static function buscar_acceso($modulo, $privilegio)
{
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT * FROM privilegios, usuarios_has_privilegios, usuarios WHERE  privilegios.id=usuarios_has_privilegios.id_privilegio AND usuarios.id=usuarios_has_privilegios.id_usuario AND privilegios.modulo= '".$modulo."'  AND privilegios.privilegio= '".$privilegio."' AND usuarios_has_privilegios.status= 'si' AND usuarios.id=".$_SESSION['id_usuario'];
//echo $sql;
	$res=mysqli_query($conex, $sql);
	$hallado=mysqli_num_rows($res);

	return $hallado;	
}
}
?>