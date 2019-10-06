<?php 
include("../../Modelos/clasedb.php");
extract($_REQUEST);

class ControlA
{

public function index() {

$dia = date("l");
switch ($dia) {
    case "Sunday":
           echo "Hoy es domingo";
    break;
    case "Monday":
           echo "Hoy es lunes ";
    break;
    case "Tuesday":
           echo "Hoy es martes";
    break;
    case "Wednesday":
           echo "Hoy es miércoles";
    break;
    case "Thursday":
           echo "Hoy es jueves";
    break;
    case "Friday":
           echo "Hoy es viernes";
    break;
    case "Saturday":
           echo "Hoy es sábado";
    break;
}
 var_dump($dia);
 die();
	extract($_POST);
	$db=new clasedb();
	$conex=$db->conectar();
	$sql="SELECT * FROM dia_lab
		WHERE 
		LIKE '%$date%'";

	if ($res=mysqli_query($conex,$sql)) {
	
	$campos=mysqli_num_fields($res);//cuantos campos trae la consulta
	$filas=mysqli_num_rows($res);//cuantas filas trae la consulta

		$i=0;
	
	$datos[]=array();

	while($data=mysqli_fetch_array($res)){
			for ($j=0; $j < $campos; $j++) { 
				$datos[$i][$j]=$data[$j];
			} 
			$i++;
		}
		//enviando datos
		header("Location: asistencia.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
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