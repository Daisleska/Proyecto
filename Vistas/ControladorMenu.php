
<?php include_once "includes/menu.php"; ?>


<?php
		include"../Modelos/clasedb.php";
		switch($_REQUEST['operacion']){

	    //Proveedor
		case'registar':include"Vistas/proveedor/registar.php";break;
		case'index':include"Vistas/proveedor/index.php";break;

		//Materia Prima
        case'registar':include"Vistas/materia_prima/registar.php";break;
		case'index':include"Vistas/materia_prima/index.php";break;

		//Inventario
		case'registar':include"Vistas/inventario/registar.php";break;
		case'index':include"Vistas/inventario/index.php";break;
        
        //Empleados
		case'registar':include"Vistas/empleado/registar.php";break;
		case'index':include"Vistas/empleado/index.php";break;

		//Asistencia
		case'registar':include"Vistas/asistencia/registar.php";break;
		case'index':include"Vistas/asistencia/index.php";break;

		//Asig/ Deducc
		case'registar':include"Vistas/asigdeducc/registar.php";break;
		case'index':include"Vistas/asigdeducc/index.php";break;


       //Nomina
		case'registar':include"Vistas/nomina/registar.php";break;
		case'index':include"Vistas/nomina/index.php";break;

		//Mantenimiento
		case'usuario':include"Vistas/mantenimiento/usuario.php";break;
		case'bitacora':include"Vistas/mantenimiento/bitacora.php";break;
		case'respaldarbd':include"Vistas/mantenimiento/respaldarbd.php";break;
		case'restaurarbd':include"Vistas/mantenimiento/restaurarbd.php";break;


		default: include "home.php";break;

		}
?>