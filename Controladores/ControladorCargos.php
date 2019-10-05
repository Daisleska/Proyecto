<?php 
include("../Modelos/clasedb.php");
extract($_REQUEST);

class ControladorCargos
{
	

public function index(){
	extract($_POST);
	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT id, nombre, salario FROM cargos";//query


	//ejecutando query
	if ($res=mysqli_query($conex,$sql)) {
		//echo "entro";
		$campos=mysqli_num_fields($res);//cuantos campos trae la consulta	
		$filas=mysqli_num_rows($res);//cuantos registro trae la consulta
		$i=0;
		$datos[]=array();//inicializando array
		//extrayendo datos
		while($data=mysqli_fetch_array($res)){
			for ($j=0; $j <$campos; $j++) { 
				$datos[$i][$j]=$data[$j];
			} 
			$i++;
		}
		
	    header("Location: ../Vistas/cargos/index.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	} else {
		echo "Error en la BASE DE DATOS";

	}//enviando datos
}//fin de la funcion login

public function registrar(){

	header("Location: ../Vistas/cargos/registrar.php");
}//fin registrar

public function guardar(){
	extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT nombre, salario FROM cargos WHERE nombre='".$nombre."'";

	$res=mysqli_query($conex,$sql);
	$cuantos=mysqli_num_rows($res);
	//echo $cuantos;
	if ($cuantos>0) {
		?>
		<script type="text/javascript">
			alert("El Cargo ya existe");
			window.location="ControladorCargos.php?operacion=registrar";
		</script>
			<?php
	} else {
		
			
		$sql="INSERT INTO cargos VALUES (NULL,'".$nombre."','".$salario."')";

		$resultado=mysqli_query($conex,$sql);
	
	if($resultado) {
        ?>
		<script type="text/javascript">
			
			if (confirm("Registro exitoso, desea registrar otro?")) {
				window.location="ControladorCargos.php?operacion=registrar";	
			}else{
				window.location="ControladorCargos.php?operacion=index";
			}
			
		</script>
			<?php

		} 
		}
}//fin de la funcion guardar




public function modificar(){
	extract($_REQUEST);//extrayendo valores de url
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	$sql="SELECT nombre, salario FROM cargos WHERE id=".$id_cargos."";
	$res=mysqli_query($conex,$sql);//ejecutando consulta
	$data=mysqli_fetch_array($res);//extrayendo datos en array

	header("Location: ../Vistas/cargos/modificar.php?data=".serialize($data));
}//fin de la funcion modificar



public function actualizar()
{
	extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
						$sql="UPDATE cargos SET nombre='".$nombre."',salario='".$salario."' WHERE id=".$id_cargos;

							$res=mysqli_query($conex,$sql);
							if ($res) {
								?>
									<script type="text/javascript">
										alert("Registro modificado");
										window.location="ControladorCargos.php?operacion=index";
									</script>
								<?php
							} else {
								?>
									<script type="text/javascript">
										alert("Error al modificar el registro");
										window.location="ControladorCargos.php?operacion=index";
									</script>
								<?php
							}			
			
}//fin de la función actualizar


public function eliminar()
{
	extract($_REQUEST);//extrayendo variables del url
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos

	$sql="DELETE FROM cargos WHERE id=".$id_cargos;

		$res=mysqli_query($conex,$sql);
		if ($res) {
			?>
				<script type="text/javascript">
					alert("Registro eliminado");
					window.location="ControladorCargos.php?operacion=index";
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("Registro no eliminado");
					window.location="ControladorCargos.php?operacion=index";
				</script>
			<?php
		}
}//fin de la función eliminar

static function controlador($operacion){
		$cargo=new ControladorCargos();
	switch ($operacion) {
		case 'index':
			$cargo->index();
			break;
		case 'registrar':
			$cargo->registrar();
			break;
		case 'guardar':
			$cargo->guardar();
			break;
		case 'modificar':
			$cargo->modificar();
			break;
		case 'actualizar':
			$cargo->actualizar();
			break;
		case 'eliminar':
			$cargo->eliminar();
			break;
		default:
			?>
				<script type="text/javascript">
					alert("No existe la ruta");
					window.location="ControladorCargos.php?operacion=index";
				</script>
			<?php
			break;
	}//cierre del switch
}//cierre de la funcion controlador
}//cierre de la clase


ControladorCargos::controlador($operacion);
?>