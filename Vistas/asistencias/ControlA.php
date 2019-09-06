<?php 
include("../../Modelos/clasedb.php");
extract($_REQUEST);

class ControlA
{

public function index() {
	extract($_POST);
	$db=new clasedb();
	$conex=$db->conectar();
	$sql="SELECT * FROM asistencias";

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
		header("Location: consulta.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
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