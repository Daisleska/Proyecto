<?php
	ob_start();
	session_start();

	session_unset(); // remuevo todas las variables de Sesiones
	session_destroy(); // Destruyo la Sesión
	header('Location: ./');