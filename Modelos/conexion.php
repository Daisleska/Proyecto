<?php

	$servidor="localhost";
	$login="root";
	$clave="";
	$bd="servidata";

	$conectar = mysqli_connect($servidor,$login,$clave) or die("<b style='color:red;'>ERROR No se pudo conectar con el servidor<b>" .mysqli_error());

	if($conectar) {
		mysqli_select_db($conectar,$bd) or die ("<b style='color: red;'>ERROR No se pudo conectar con la base de datos</b>" .mysqli_error());
	}

?>