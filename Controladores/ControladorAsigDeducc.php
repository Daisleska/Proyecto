<?php 
include("../Modelos/clasedb.php");
extract($_REQUEST);



class ControladorAsigDeducc
{

public function index() {
	extract($_POST);
	$db=new clasedb();
	$conex=$db->conectar();
	$sql="SELECT id_ad, descripcion_ad, tipo_ad, monto_ad FROM asignacion_deduccion"
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
		header("Location: ../Vistas/asigdeducc/listado_ad.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	}else{
		echo "Error en la Base de Datos";
	}
}//fin de la funcion index


	public function registrar(){
		 header("Location: ../Vistas/asigdeducc/registrar_ad.php");
	}

	public function guardar(){
		extract($_POST);

		$db=new clasedb();
		$conex=$db->conectar();

	$nomexist="SELECT * FROM asignacion_deduccion WHERE descripcion_ad='".$descripcion_ad."'"; 
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
	$sql="INSERT INTO asignacion_deduccion (descripcion_ad, tipo_ad,monto_ad) VALUES ( '$descripcion_ad', '$tipo_ad', '$monto_ad')";

	$resultado=mysqli_query($conex,$sql);
	
	if($resultado) {

		?> 

			<script type="text/javascript">
				alert("Se registro éxitosamente");
				window.location="ControladorAsigDeducc.php?operacion=index";
			</script>
			<?php 
	
	} else { 
		?> 

			<script type="text/javascript">
				alert("Registro fallido");
			</script>
		<?php 
			}
				}	
			}
	public function modificar(){
		extract($_REQUEST);

		$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	$sql="SELECT id_ad, descripcion_ad, tipo_ad, monto_ad FROM asignacion_deduccion WHERE id_ad=".$id_ad."";

	$res=mysqli_query($conex,$sql);//ejecutando consulta
	$data=mysqli_fetch_array($res);//extrayendo datos en array

		header("Location: ../Vistas/asigdeducc/modificar_ad.php?id=".$id_ad);
	}

	public function actualizar(){
		extract($_POST);

		$db=new clasedb();
		$conex=$db->conectar();
    
	$sql="UPDATE asignacion_deduccion SET id_ad='$id',descripcion_ad='$descripcion_ad', tipo_ad='$tipo_ad', monto_ad='$monto_ad' WHERE id_ad='$id'";
	

    $resultado=mysqli_query($conex,$sql);

	if($resultado) {

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
			</script>


		<?php 

	} 
	
	}
	
	public function eliminar()
	{
		extract($_REQUEST);
		$db=new clasedb;
		$conex=$db->conectar();
		$sql="DELETE FROM asignacion_deduccion WHERE id_ad=".$id_ad;
		
	$res=mysqli_query($conex,$sql);
		if ($res) {
			?>
				<script type="text/javascript">
					alert("REGISTRO ELIMINADO");
					window.location="ControladorAsigDeducc.php?operacion=index";
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("REGISTRO NO ELIMINADO");
					window.location="ControladorAsigDeducc.php?operacion=index";
				</script>
			<?php
		}
	}

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