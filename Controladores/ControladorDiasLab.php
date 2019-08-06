<?php
session_start();
include("../Modelos/clasedb.php");
extract($_REQUEST);

class ControladorDiasLab
{

public function index()
{
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT empleado.id,empleado.nombres,empleado.ci, empleados_has_dias_lab.dia FROM empleado, empleados_has_dias_lab WHERE empleado.id_empleados_has_dias_lab=empleados_has_dias_lab.id";
	
	if ($res=mysqli_query($conex,$sql)) {
		
		$campos=mysqli_num_fields($res);
		$filas=mysqli_num_rows($res);
		
		$datos[]=array();
		$i=0;
		while ($data=mysqli_fetch_array($res)) {
			for ($j=0; $j < $campos; $j++) { 
				$datos[$i][$j]=$data[$j];
			}
			$i++;
		}

		header("Location: ../Vistas/diaslab/index.php?campos=".$campos."&filas=".$filas."&data=".serialize($datos));

	} else {
		//en caso de no pasar la consulta
		header("Location: ../home.php");
	}
	
}//fin de index
public function registrar()
{
	$db=new clasedb();
	$conex=$db->conectar();
	$cont=0; //para contar si no se ejecutaron consultas
	//
		
	//-------
	// 
		$sql="SELECT * FROM empleados_has_dias_lab";
		if ($res=mysqli_query($conex,$sql)) {
			# se ejecutó la consulta
			$campos=mysqli_num_fields($res);
			$filas=mysqli_num_rows($res);
			$empleado[]=array();
			$i=0;
			while ($data=mysqli_fetch_array($res)) {
				for ($j=0; $j < $campos; $j++) { 
					$empleado[$i][$j]=$data[$j];
				}
				$i++;
			}

		} else {
			# no se ejecutó la consulta
			$cont++;
		}
		
	//-------
		if ($cont==0) {
			# se ejecutó
			header("Location: ../Vistas/diaslab/registrar.php?campos=".$campos."&filas=".$filas."&empleado=".serialize($empleado));
		} else {
			# hubo un error
			header("Location: ../home.php");
		}
		
}//fin registrar

public function guardar()
{
	extract($_POST);

	$db=new clasedb();
	$conex=$db->conectar();
	$cont=0;
	//verificado...
		$sql="SELECT * FROM  empleados_has_dias_lab WHERE...";//Falta 
		//echo $sql;
		if ($res=mysqli_query($conex,$sql)) {
			# se ejecutó la consulta
			$regis=mysqli_num_rows($res);
			
			if ($regis>0) {
				?>
				<script type="text/javascript">
					alert("Registrado...");
					window.location="ControladorDiasLab.php?operacion=index";
				</script>
			<?php
			} else {
				# no está registrado 
				$sql="INSERT INTO empleados_has_dias_lab VALUES(NULL, ".$id_empleado.", '".$dia."')"; 
				//echo $sql;
				if ($res2=mysqli_query($conex,$sql)) {
					?>
				<script type="text/javascript">
					if (confirm("Registro éxitoso, desea registrar otro?")) {
						window.location="ControladorDiasLab.php?operacion=registrar";	
					}else{
						window.location="ControladorDiasLab.php?operacion=index";
					}
				</script>
			<?php	
				} else {
					?>
				<script type="text/javascript">
					alert("Registro fallido");
					window.location="ControladorDiasLab.php?operacion=index";
				</script>
			<?php
				}
				
			}
			
		} else {
			$cont++;
			//echo "no consultó";
		}
		
	//-----

}

public function modificar()
{
	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT * FROM empleados_has_dias_lab WHERE id=".$id;

	$res=mysqli_query($conex,$sql);
	$data_m=mysqli_fetch_array($res);

	$cont=0;

	$sql="SELECT * FROM empleado";
	if($res=mysqli_query($conex,$sql)){
		$campos=mysqli_num_fields($res);
		$filas=mysqli_num_rows($res);
		$empleado[]=array();
		$i=0;
		while($data=mysqli_fetch_array($res)){
			for($j=0; $j<$campos; $j++){
				$empleado[$i][$j]=$data[$j];
			}
			$i++;
		}
	}else{
		$cont++;
}


if ($cont==0){
	header("Location: ../Vistas/diaslab/modificar.php?data_m=".serialize($data_m)."&filas=".$filas."&empleado=".serialize($empleado));
}else{
	header("Location: ControladorDiasLab.php?operacion=index");
}
}

public function actualizar()
{
	extract($_POST);

	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT * FROM empleados_has_dias_lab WHERE...";//falta
	
if ($resul=mysqli_query($conex,$sql)){
	if (mysqli_num_rows($resul)>0){
		?>
		<script type="text/javascript">
		alert("registrado...");
		window.location="ControladorDiasLab.php?operacion=index";
	</script>
		<?php
		}else{
		$sql="UPDATE empleados_has_dias_lab SET id_empleado=".$id_empleado.", dia='".$dia."'WHERE id=".$id_empleados_has_dias_lab;
		echo $sql;
	$cuantos=mysqli_query($conex,$sql);
	if($cuantos){
		?>
	<script type="text/javascript">
	alert("El registro se modifico con éxito");
	window.location="ControladorDiasLab.php?operacion=index";
</script>

		<?php
	} else {
		?>
	<script type="text/javascript">
	alert("No se pudo modificar el registro");
	window.location="ControladorDiasLab.php?operacion=index";
</script>

		<?php
	}
}

} else {

}
}

public function eliminar()
	{
		extract($_REQUEST);
		$db=new clasedb;
		$conex=$db->conectar();
		$sql="DELETE FROM empleados_has_dias_lab WHERE id=".$id;

	$res=mysqli_query($conex, $sql) or die;("No se pudo conectar con la Base de Datos");
	if (mysqli_affected_rows($conex)==0) {
	?>
	<script type="text/javascript">
			alert("No se pudo eliminar el registro");
			window.location="ControladorDiasLab.php?operacion=index";
		</script>
		
	<?php

} else {
	?>
		<script type="text/javascript">
			alert("Registro eliminado");
			window.location="ControladorDiasLab.php?operacion=index";
		</script>
	<?php
}
	}

static function controlador($operacion){
	$diaslab=new ControladorDiasLab();

	switch ($operacion) {
		case 'index':
			$diaslab->index();
			break;
		case 'registrar':
			$diaslab->registrar();
			break;
		case 'guardar':
			$diaslab->guardar();
			break;
			case 'modificar':
			$diaslab->modificar();
			break;
			case 'actualizar':
			$diaslab->actualizar();
			break;
			case 'eliminar':
			$diaslab->eliminar();
			break;
		default:
			?>
		<script type="text/javascript">
			alert("La ruta no existe");
			window.location="ControladorDiasLab.php?operacion=index";
		</script>
	<?php
			break;
	}
}	
}
ControladorDiasLab::controlador($operacion);
?>