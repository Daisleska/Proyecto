<?php
	error_reporting(0);
	date_default_timezone_set('America/Caracas');
	session_start();
/*Código para ataque por la URL*/
	if (!$_SESSION) {
		header("Location: ../login/login.php");
	}
/*Fin*/
 include_once "../includes/menu.php"; ?>


<?php
		include"../Modelos/clasedb.php";
		switch($_REQUEST['operacion']){

	    //Proveedor
		case'registrar_pro':include"Vistas/proveedor/registrar.php";break;
		case'index':include"Vistas/proveedor/index.php";break;

		//Materia Prima
        case'registar':include"Vistas/materia_prima/registar.php";break;
		case'index':include"Vistas/materia_prima/index.php";break;
		case'guardar_MP':include"../materia_prima/guardar_materiaprima.php";break;

		//Inventario
		case'registar':include"Vistas/inventario/registar.php";break;
		case'index':include"Vistas/inventario/index.php";break;
		case'usar':include"../inventario/usar_producto.php";break;
		case'añadir':include"../inventario/añadir_producto.php";break;
		case'existencia_pro':include"../inventario/actualizado_producto.php";break;
		case'inventario':include"../inventario/inventario.php";break;
		case'registro_inv':include"../inventario/registrar_inventario.php";break;
		case'guardar_inventario':include"../inventario/guardar_inventario.php";break;
		case'ver_inventario':include"../inventario/ver_inventario.php";break;


        
        //Empleados
		case'registar_inventario':include"../inventario/registrar_inventario.php";break;
		case'hindex':include"Vistas/empleado/index.php";break;
		case'inventario':include"../inventario/inventario.php";break;

		//Asistencia
		case'asistencia':include"../asistencias/asistencia.php";break;
		case'consulta':include"../asistencias/consulta.php";break;
		case'lista_consulta':include"../asistencias/lista_consulta.php";break;
		case'marcar_asistencia':include"../asistencias/marcar_asistencia.php";break;
		case'guardar':include"../../Controladores/controladorAsistencia.php";break;
		case'permisos':include"../asistencias/permisos.php";break;

		//Asig/ Deducc
		case'registar':include"Vistas/asigdeducc/registar.php";break;
		case'index':include"Vistas/asigdeducc/index.php";break;


       //Nomina
		case'registar':include"Vistas/nomina/registar.php";break;
		case'index':include"Vistas/nomina/index.php";break;

		//Mantenimiento
		case'usuario':include"Vistas/mantenimiento/usuario.php";break;
		case'auditoria':include"../config/auditoria.php";break;
		case'bitacora':include"../config/bitacora.php";break;
		case'mantenimiento':include"../config/mantenimiento.php";break;
		case'respaldarbd':include"Vistas/mantenimiento/respaldarbd.php";break;
		case'restaurarbd':include"Vistas/mantenimiento/restaurarbd.php";break;


		default: include "home.php";break;

		}
?>
<?php include_once "../includes/footer.php"; ?>