<?php 

$archivo = $_GET['id'];

$directorio = 'DB';

$dir = $directorio.'/'.$archivo;

require_once '../Modelos/clasedb.php';

$comando = "C:/xampp/mysql/bin/mysqldump.exe --opt --user=$user --password=$pass $based > $dir";
system($comando, $error);

echo "Restauracion exitosa";
echo ' <meta http-equiv="refresh" content="0;URL=../backup.php">' ;
 ?>