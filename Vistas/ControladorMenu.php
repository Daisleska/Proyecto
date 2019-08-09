
<?php include_once "menu.php"; ?>


p><?php
		include"../Modelos/clasedb.php";
		switch($_REQUEST['operacion']){

	    //Proveedor
		case'registro_proveedor':include"proveedor/registro_proveedor.php";break;
		case'listado_proveedor':include"proveedor/listado_proveedor.php";break;
		case'modificar_proveedor':include"proveedor/modificar_proveedor.php";break;

		//Materia Prima
        case'registrar_materiaprima':include"Vistas/materia_prima/registrar_materiaprima.php";break;
		case'listado_mp':include"Vistas/materia_prima/listado_mp.php";break;

		//Inventario
		case'registrar_inventario':include"Vistas/inventario/registrar_inventario.php";break;
		case'listado_inventario':include"Vistas/inventario/listado_inventario.php";break;
        
        //Empleados
		case'registro_empleados':include"empleados/registro_empleados.php";break;
		case'listado_empleados':include"empleados/listado_empleados";break;
		

		//Asistencia
		case'registar':include"Vistas/asistencia/registar.php";break;
		case'index':include"Vistas/asistencia/index.php";break;
		case'marcar_asistencia':include"Vistas/asistencia/marcar_asistencia.php";break;

		//Asig/ Deducc
		case'registrar_ad':include"Vistas/asigdeducc/registrar_ad.php";break;
		case'listado_ad':include"Vistas/asigdeducc/listado_ad.php";break;
		case'modificar_ad':include"Vistas/asigdeducc/modificar_ad.php";break;


       //Nomina
		case'registro_pago':include"Vistas/nomina/registro_pago.php";break;
		case'listados_pago':include"Vistas/nomina/listados_pago.php";break;

		//Mantenimiento
		case'usuario':include"Vistas/config/usuario.php";break;
		case'bitacora':include"Vistas/config/bitacora.php";break;
		case'respaldarbd':include"Vistas/config/respaldarbd.php";break;
		case'restaurarbd':include"Vistas/config/restaurarbd.php";break;


		default: include "../home.php";break;

		}
?></p>