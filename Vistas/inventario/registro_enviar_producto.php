<?php
extract($_REQUEST);
error_reporting(0); 
/*   session_start();*/
include("../../Modelos/conexion.php");
/*$id_usuario= $_SESSION['id'];*/
    $sql9="SELECT activo FROM productos where id='$id_articulo' ";

    $result=mysqli_query($conectar, $sql9);
 
$resultado=mysqli_fetch_array($result);
  if ($resultado['activo']=='N') {
  	header ("Location: inventario.php?er=1");
  }else{

   /*$sql8="SELECT id_ubicacion FROM almacen where id_producto='$id_articulo'";
echo $sql8;
die();
    $result=mysqli_query($conectar, $sql8);
 
$resultado=mysqli_fetch_array($result);
  	if ($resultado) {
  		header ("Location: inventario.php?er=1");  	
  	} else {
  		# code...
  	}*/
  	
  
	 $hoy = getdate();
     $actual=$hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
  


$sql="INSERT INTO enviados (id_productos, id_ubicacion, id_codigo, cantidad, fecha_registro) VALUES ('".$id_articulo."','".$ubicacion."','".$codigo."','".$stock."','".$actual."')";

$result=mysqli_query($conectar,$sql);


if ($result) {

$sql1="SELECT tipo FROM ubicacion where id='$destino' ";

$result=mysqli_query($conectar, $sql1);
 
$resultado=mysqli_fetch_array($result);

 if ($resultado['tipo']=='I') {

$sql2="SELECT stock FROM almacen where id_producto='$id_articulo' AND id_ubicacion='$destino'";

$result=mysqli_query($conectar,$sql2);

$rr=mysqli_fetch_array($result);

$nuevo_stok= $rr['stock']+$stock;

$sql3="UPDATE almacen SET stock='$nuevo_stok' WHERE id_producto='$id_articulo' AND id_ubicacion='$destino'";

$sumado=mysqli_query($conectar,$sql3);

if ($sumado){

$sql5="SELECT stock FROM productos where id='$id_articulo' AND id_ubicacion='$destino'";

$result=mysqli_query($conectar,$sql5);

$re=mysqli_fetch_array($result);

$nuevo_stock= $re['stock']-$stock;

$sql6="UPDATE productos SET stock='$nuevo_stock' WHERE id='$id_articulo' AND id_ubicacion='$destino'";


$sumado=mysqli_query($conectar,$sql6);

	header ("Location: inventario.php?env=1");
}		else {
	header("Location: inventario.php?env=2");
}

}
die();


$sql="SELECT stock FROM almacen where id_producto='$id_articulo' AND id_ubicacion='$ubicacion'";


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