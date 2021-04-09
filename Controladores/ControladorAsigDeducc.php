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
	$cont=0;


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

	$sql3="SELECT * FROM asignacion_deduccion";
    if ($res3=mysqli_query($conex,$sql3)) {
      # se ejecutó la consulta
      $campos_asi=mysqli_num_fields($res3);
      $filas_asi=mysqli_num_rows($res3);
      $asignaciones[]=array();
      $i=0;
      while ($data3=mysqli_fetch_array($res3)) {
        for ($j=0; $j < $campos_asi; $j++) { 
          $asignaciones[$i][$j]=$data3[$j];
        }
        $i++;
      }

    } else {
      # no se ejecutó la consulta
      $cont++;
    }


    $sql2="SELECT id, cedula, nombres, apellidos FROM empleado WHERE empleado.id=".$id_empleado."";

	if ($resultado=mysqli_query($conex,$sql2)) {
	
	$camposem=mysqli_num_fields($resultado);//cuantos campos trae la consulta
	$filasem=mysqli_num_rows($resultado);//cuantas filas trae la consulta

		$i=0;
	
	$emple[]=array();

	while($empleados=mysqli_fetch_array($resultado)){
			for ($j=0; $j < $camposem; $j++) { 
				$emple[$i][$j]=$empleados[$j];
			} 
			$i++;
		}

	}else{
		# no se ejecutó la consulta
      $cont++;
	}


    
		header("Location: ../Vistas/empleados/asig_deducc.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos)."&campos_asi=".$campos_asi."&filas_asi=".$filas_asi."&asignaciones=".serialize($asignaciones)."&campos_em=".$campos_em."&filas_em=".$filas_em."&emple=".serialize($emple));
	}else{
		echo "Error en la Base de Datos";
	}
	


}//fin de la funcion 

public function eliminarasigdeducc() {
	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();
	

	$sql="DELETE FROM empleado_asig WHERE id_empleado=".$id_empleado." AND id_asignaciones=".$id."";
    
    $res=mysqli_query($conex,$sql);

		if ($res) {
		
			?>
				<script type="text/javascript">
					alert("Registro eliminado");
					header("Location: ../Vistas/empleados/index.php");
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("Registro no eliminado");
					header("Location: ../Vistas/empleados/index.php");
				</script>
			<?php
		}
	}

	

public function agregar() {
	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();
    $id=$_REQUEST['id'];

	if (is_array($_POST['asignaciones']))
   {
    //realizamos el ciclo
    while(list ($key,$valor)= each($_POST['asignaciones'])) 
    {
      
     $sql="SELECT * FROM empleado_asig WHERE id_asignaciones=' ".$valor."' AND id_empleado=".$id."";
     $res=mysqli_query($conex, $sql);
     $result=mysqli_num_rows($res);

     
     if($result>0){
     	

     }else{

     	$sql2="INSERT INTO empleado_asig VALUES (NULL, ".$id.", ' ".$valor."')";
     	$resultado=mysqli_query($conex, $sql2);


     }
     
    }

  

    
}

	

	

	
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

		case 'agregar':
		$ad->agregar();
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