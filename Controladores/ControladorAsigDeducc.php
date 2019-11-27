<?php 
include("../Modelos/clasedb.php");
extract($_REQUEST);
session_start();



class ControladorAsigDeducc
{

public function index() {
	extract($_POST);
	$db=new clasedb();
	$conex=$db->conectar();
	$sql="SELECT * FROM asignacion_deduccion"
	;

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
		header("Location: ../Vistas/asigdeducc/index.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	}else{
		echo "Error en la Base de Datos";
	}
}//fin de la funcion index


	public function registrar(){
		 header("Location: ../Vistas/asigdeducc/registrar.php");
	}

	public function guardar(){
		extract($_POST);

		$db=new clasedb();
		$conex=$db->conectar();

	$nomexist="SELECT * FROM asignacion_deduccion WHERE descripcion='".$descripcion."'"; 
		$result=mysqli_query($conex,$nomexist);
		$nombresbd=mysqli_num_rows($result);

if ($nombresbd>0){
			?>
			<script type="text/javascript">
				alert("El registro ya existe");
				window.location="ControladorAsigDeducc.php?operacion=registrar";
			</script>
				<?php
			}		
			else {
	$sql="INSERT INTO asignacion_deduccion (descripcion, tipo,monto) VALUES ( '$descripcion', '$tipo', '$monto')";

	$resultado=mysqli_query($conex,$sql);
	
	if($resultado) {
         $sql="INSERT INTO auditoria VALUES (NULL, '".$_SESSION['id_usuario']."', 'registró asignación o deducción', 'asignacion_deduccion', CURRENT_TIMESTAMP, '".$_SESSION['tipo_usuario']."')";

		$resultado=mysqli_query($conex,$sql);
		?> 
		
		<script>
		alert("Registro exitoso");
		 window.location="ControladorAsigDeducc.php?operacion=index";
		</script>
		
			
			<?php 
	
	} else { 
		?> 

			<script type="text/javascript">
				alert("Registro fallido");
				window.location="ControladorAsigDeducc.php?operacion=index";
			</script>
		<?php 
			}
				}	
			}
	public function modificar(){
		extract($_REQUEST);

		$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	$sql="SELECT id, descripcion, tipo, monto FROM asignacion_deduccion WHERE id=".$id."";

	$res=mysqli_query($conex,$sql);//ejecutando consulta
	$data=mysqli_fetch_array($res);//extrayendo datos en array

		header("Location: ../Vistas/asigdeducc/modificar.php?data=".serialize($data));
	}

	public function actualizar(){
		extract($_POST);

		$db=new clasedb();
		$conex=$db->conectar();
    
	$sql="UPDATE asignacion_deduccion SET id='$id',descripcion='$descripcion', tipo='$tipo', monto='$monto' WHERE id='$id'";
	

    $resultado=mysqli_query($conex,$sql);

	if($resultado) {

		$sql="INSERT INTO auditoria VALUES (NULL, '".$_SESSION['id_usuario']."', 'modificó asignación o deducción', 'asignacion_deduccion', CURRENT_TIMESTAMP, '".$_SESSION['tipo_usuario']."')";

		$resultado=mysqli_query($conex,$sql);

		?> 
			<script type="text/javascript">
				alert("El registro se modifico con éxito");
				window.location="ControladorAsigDeducc.php?operacion=index";
			</script>


		<?php 
	} else { 
		?> 

			<script type="text/javascript">
				alert("No se pudo modificar el registro");
				window.location="ControladorAsigDeducc.php?operacion=index";
			</script>


		<?php 

	} 
	
	}
	
	public function eliminar()
	{
		extract($_REQUEST);
		$db=new clasedb;
		$conex=$db->conectar();
		$sql="DELETE FROM asignacion_deduccion WHERE id=".$id;
		
		
	$res=mysqli_query($conex,$sql);
		if ($res) {
			$sql="INSERT INTO auditoria VALUES (NULL, '".$_SESSION['id_usuario']."', 'eliminó asignación o deducción', 'asignacion_deduccion', CURRENT_TIMESTAMP, '".$_SESSION['tipo_usuario']."')";

		$resultado=mysqli_query($conex,$sql);
			?>
				<script type="text/javascript">
					alert("Registro eliminado");
					window.location="ControladorAsigDeducc.php?operacion=index";
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("Registro no eliminado");
					window.location="ControladorAsigDeducc.php?operacion=index";
				</script>
			<?php
		}
	}

public function asigdeducc() {
	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT asignacion_deduccion.id, asignacion_deduccion.descripcion, asignacion_deduccion.tipo, asignacion_deduccion.monto FROM asignacion_deduccion, empleado, empleado_asig WHERE empleado_asig.id_empleado=empleado.id AND empleado_asig.id_asignaciones=asignacion_deduccion.id AND empleado.id=".$id_empleado."";
	

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
		header("Location: ../Vistas/empleados/asig_deducc.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	}else{
		echo "Error en la Base de Datos";
	}
}//fin de la funcion 

public function eliminarasigdeducc() {
	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="DELETE FROM empleado_asig WHERE id=".$id;
    
    $res=mysqli_query($conex,$sql);
		if ($res) {
		
			?>
				<script type="text/javascript">
					alert("Registro eliminado");
					window.location="ControladorEmpleado.php?operacion=index";
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("Registro no eliminado");
					window.location="";
				</script>
			<?php
		}
	}

	

public function agregarasigdeducc() {
	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="INSERT INTO `empleado_asig` (NULL, `id_empleado`, `id_asignaciones`) VALUES ()";

	
}//fin de la funcion


static function controlador($operacion) {
		$ad=new ControladorAsigDeducc();
		switch($operacion) {
			
		case 'index':
		$ad->index();
		break;
		
		case 'registrar':
			$ad->registrar();
		break;
		case 'guardar':
			$ad->guardar();
		break;
		case 'modificar':
			$ad->modificar();
		break;
		case 'actualizar':
			$ad->actualizar();
		break;
		case 'eliminar':
 			$ad->eliminar();
 			break;

 		case 'asigdeducc':
		$ad->asigdeducc();
		break;

		case 'eliminarasigdeducc':
		$ad->eliminarasigdeducc();
		break;

		case 'agregarasigdeducc':
		$ad->agregarasigdeducc();
		break;
		
		default: 
		?>

		<script type="text/javascript">
			alert("La ruta no existe");
			window.location="ControladorAsigDeducc.php?operacion=index";
		</script>
	<?php
	break;
	}

} 
} 

ControladorAsigDeducc::controlador($operacion);


?> 