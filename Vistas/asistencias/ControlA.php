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
    
    $sql="SELECT * FROM empleado, dia_lab WHERE dia_lab.id_empleado=empleado.id && dia_lab.nombre LIKE '%".$dia_es."%'";
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

    /*for ($i=0; $i < $filas; $i++) { 
    	for ($j=0; $j < $campos; $j++) { 
    		echo $empleados[$i][$j];
    	}
    	echo "<br>";
    }*/
    

 //var_dump($dia);
 //die();
	/*extract($_POST);
	$db=new clasedb();
	$conex=$db->conectar();
	$sql="SELECT * FROM dia_lab
		WHERE 
		LIKE '%$date%'";
*/
	
	
	//$campos=mysqli_num_fields($res);//cuantos campos trae la consulta
	//$filas=mysqli_num_rows($res);//cuantas filas trae la consulta

		//$i=0;
	
	//$datos[]=array();

	/*while($data=mysqli_fetch_array($res)){
			for ($j=0; $j < $campos; $j++) { 
				$datos[$i][$j]=$data[$j];
			} 
			$i++;
		}*/
		//enviando datos
		header("Location: asistencia.php?filas=".$filas."&campos=".$campos."&data=".serialize($empleados));
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