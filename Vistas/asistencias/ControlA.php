<?php 
include("../../Modelos/clasedb.php");
extract($_REQUEST);

class ControlA
{

public function index() {
extract($_REQUEST);
$dia = date("l");
$dia_es="";
switch ($dia) {
    case "Sunday":
           $dia_es="Domingo";
    break;
    case "Monday":
           $dia_es="Lunes";
    break;
    case "Tuesday":
           $dia_es="Martes";
    break;
    case "Wednesday":
           $dia_es="Miércoles";
    break;
    case "Thursday":
           $dia_es="Jueves";
    break;
    case "Friday":
           $dia_es="Viernes";
    break;
    case "Saturday":
           $dia_es="Sábado";
    break;
	}
    $db=new clasedb();
    $conex=$db->conectar();
    
    $sql="SELECT empleado.id,empleado.nombres,empleado.apellidos,empleado.cedula,dia_lab.id AS id_dia_lab FROM empleado, dia_lab WHERE dia_lab.id_empleado=empleado.id && dia_lab.nombre LIKE '%".$dia_es."%'";
    //echo $sql;
    $result=mysqli_query($conex,$sql);
    $filas=mysqli_num_rows($result);
    $campos=mysqli_num_fields($result);
    $empleados[]=array();
    $i=0;
    if ($res=mysqli_query($conex,$sql)) {
    while ($data=mysqli_fetch_array($result)) {
    	for ($j=0; $j < $campos ; $j++) { 
    		$empleados[$i][$j]=$data[$j];
    	}
    	$i++;	
    }
    //buscando empleados en la tabla asistencia
    $hoy=date('Y-m-d');
    for ($i=0; $i < $filas; $i++) { 
    	
    	$sql2="SELECT * FROM asistencias WHERE id_empleado=".$empleados[$i][0]." && fecha_hora LIKE '%".$hoy."%'";
    	//echo $sql2;
    	$buscar=mysqli_query($conex,$sql2);
    	if (mysqli_num_rows($buscar)==0) {
    		$sql3="INSERT INTO asistencias VALUES(NULL,".$empleados[$i][0].",'".$hoy."','No','No se ha marcado asistencia')";
    		$registro=mysqli_query($conex,$sql3);
    	}
    }
    //buscando los registros en asistencias
    $sql4="SELECT asistencias.id,empleado.nombres,empleado.apellidos,empleado.cedula,asistencias.status,asistencias.justificacion FROM empleado, asistencias WHERE asistencias.id_empleado=empleado.id && asistencias.fecha_hora LIKE '%".$hoy."%'";
    echo $sql4;
    $result=mysqli_query($conex,$sql4);
    $filas=mysqli_num_rows($result);
    $campos=mysqli_num_fields($result);
    $asistencia[]=array();
    $i=0;
    if ($res=mysqli_query($conex,$sql)) {
    while ($data=mysqli_fetch_array($result)) {
    	for ($j=0; $j < $campos ; $j++) { 
    		$asistencia[$i][$j]=$data[$j];
    	}
    	$i++;	
    }
	}else{
		echo "error en bdd";
	}

 
		//enviando datos
		header("Location: asistencia.php?filas=".$filas."&campos=".$campos."&data=".serialize($asistencia));
	}else{
		echo "Error en la Base de Datos";
	}
}//fin de la funcion index



	public function eliminar()
	{
		extract($_REQUEST);
		$db=new clasedb;
		$conex=$db->conectar();
		$sql="DELETE FROM asistencias WHERE id=".$id_asistencias;
		
	$res=mysqli_query($conex,$sql);
		if ($res) {
			?>
				<script type="text/javascript">
					alert("Registro eliminado");
					window.location="ControlA.php?operacion=index";
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("Registro no pudo ser eliminado, Vuelva a intentarlo!");
					window.location="ControlA.php?operacion=index";
				</script>
			<?php
		}
	}

static function controlador($operacion) {
		$asis=new ControlA();
		switch($operacion) {
			
		case 'index':
		$asis->index();
		break;
		

		case 'eliminar':
 			$asis->eliminar();
 			break;
		
		default: 
		?>

		<script type="text/javascript">
			alert("La ruta no existe");
			window.location="ControlA.php?operacion=index";
		</script>
	<?php
	break;
	}

} 
} 

ControlA::controlador($operacion);


?> 