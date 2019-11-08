<?php 

$nombre = 'servidata'.date('d-m-Y').'.sql';
$directorio = 'backup/DB';

$dir = $directorio.'/'.$nombre;

require '../../Modelos/conexion.php';

$comando = "C:/xampph/mysql/bin/mysqldump.exe --opt --root=$login --=$clave $bd > $dir";
system($comando, $error);

echo ' <meta http-equiv="refresh" content="0;URL=backup.php">' ;
 ?>