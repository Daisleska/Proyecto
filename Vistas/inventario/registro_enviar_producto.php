<?php
extract($_REQUEST);
error_reporting(0); 
/*   session_start();*/
include("../../Modelos/conexion.php");
/*$id_usuario= $_SESSION['id'];*/
                  
	 $hoy = getdate();
     $actual=$hoy['year']."-".$hoy['mon']."-".$hoy['mday'];



$sql="INSERT INTO enviados (id_productos, id_ubicacion, id_codigo, cantidad, fecha_registro) VALUES ('".$producto."','".$ubicacion."','".$codigo."','".$stock."','".$actual."')";


$result=mysqli_query($conectar,$sql);


if ($result) {



$sql="SELECT tipo FROM ubicacion ";

$result=mysqli_query($conectar, $sql);

$resultado=mysqli_fetch_array($result);
 
 if ($resultado['tipo']=='I') {
 	


$sql="SELECT stock FROM almacen where id_producto='$id_articulo' AND id_ubicacion='$destino'";

$result=mysqli_query($conectar,$sql);

$rr=mysqli_fetch_array($result);

$nuevo_stok= $rr['stock']+$stock;

$sql="UPDATE almacen SET stock='$nuevo_stok' WHERE id_producto='$id_articulo' AND id_ubicacion='$destino' ";

$resultado=mysqli_query($conectar, $sql);

if ($resultado){

	header ("Location: inventario.php?env=1");
}		else {
	header("Location: inventario.php?env=2");
}

$sql="SELECT stock FROM almacen where id_producto='$id_articulo' AND id_ubicacion='$ubicacion '";

$result=mysqli_query($conectar,$sql);

$rr=mysqli_fetch_array($result);

$nuevo_stok= $rr['stock']-$stock;

$sql="UPDATE almacen SET stock='$nuevo_stok 'WHERE id_producto='$id_articulo' AND id_ubicacion='$ubicacion '";

$resultado=mysqli_query($conectar, $sql);


 	}	elseif ($resultado['tipo']=='E') {


$sql="SELECT stock FROM almacen where id_producto='$id_articulo' AND id_ubicacion='$destino '";
$resultado=mysqli_query($conectar, $sql);
$rr=mysqli_fetch_array($resultado);

$nuevo_stok= $rr['stock']+$stock;

$sql="UPDATE almacen SET stock='$nuevo_stok' WHERE id_producto='$id_articulo' AND id_ubicacion='$destino' ";

$resultado=mysqli_query($conectar, $sql);



$sql="SELECT stock FROM almacen where id_producto='$id_articulo' AND id_ubicacion='$ubicacion '";

$result=mysqli_query($conectar,$sql);

$rr=mysqli_fetch_array($result);

$nuevo_stok= $rr['stock']-$stock;

$sql="UPDATE almacen SET stock='$nuevo_stok' WHERE id_producto='$id_articulo' AND id_ubicacion='$ubicacion '";

$resultado=mysqli_query($conectar, $sql);


if ($resultado){

	header ("Location: inventario.php?env=1");
}		else {
	header("Location: inventario.php?env=2");
}
$sql="SELECT stock FROM productos WHERE id='$id_articulo'";

$resul=mysqli_query($conectar, $sql);

$mielda=mysqli_fetch_array( $resul);
$nuevo_stok= $mielda['stock']-$stock;

$sql="UPDATE productos SET stock=$nuevo_stok WHERE id='$id_articulo'";

$resultado=mysqli_query($conectar, $sql);



} 

 	} 
?>