<?php 

$archivo = $_GET['id'];

$directorio = '../DB';

$dir = $directorio.'/'.$archivo; 

if (!unlink($dir)) {
	echo "No pudo ser borrado";
}else
{
	echo "Respaldo  borrado exitosamente";
echo ' <meta http-equiv="refresh" content="0;URL=../backup.php">' ;
}





 ?>