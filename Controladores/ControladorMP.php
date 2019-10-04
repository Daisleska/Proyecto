<?php 
include("../Modelos/clasedb.php");
extract($_REQUEST);

class ControladorMP
{
	

public function index(){
	extract($_POST);
	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM materia_prima";//query


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
		
	    header("Location: ../Vistas/materia_prima/index.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	} else {
		echo "Error en la BASE DE DATOS";

	}//enviando datos
}//fin de la funcion login

public function registrar(){

	header("Location: ../Vistas/materia_prima/registrar.php");
}//fin registrar

public function guardar(){
	extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM materia_prima WHERE codigo='".$codigo."'";

	$res=mysqli_query($conex,$sql);
	$cuantos=mysqli_num_rows($res);
	//echo $cuantos;
	if ($cuantos>0) {
		?>
		<script type="text/javascript">
			alert("Ya existe");
			window.location="ControladorMP.php?operacion=registrar";
		</script>
			<?php
	} else {
		
			
		$sql="INSERT INTO materia_prima VALUES (NULL,'".$codigo."','".$nombre."','".$presentacion."','".$unidad."')";

		$resultado=mysqli_query($conex,$sql);
	
	if($resultado) {
        ?>
		<script type="text/javascript">
			
			if (confirm("Registro exitoso, desea registrar otro?")) {
				window.location="ControladorMP.php?operacion=registrar";	
			}else{
				window.location="ControladorMP.php?operacion=index";
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
	
	$sql="SELECT * FROM materia_prima WHERE id=".$id_materia_prima."";
	$res=mysqli_query($conex,$sql);//ejecutando consulta
	$data=mysqli_fetch_array($res);//extrayendo datos en array

	header("Location: ../Vistas/materia_prima/modificar.php?data=".serialize($data));
}//fin de la funcion modificar



public function actualizar()
{
	extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	$sql="SELECT * FROM materia_prima WHERE codigo='".$codigo."' AND id<>".$id;
//echo $sql;
	$res=mysqli_query($conex,$sql);

	$cant=mysqli_num_rows($res);//trae cuantos registros tiene la consulta
		if ($cant>0) {
			?>
				<script type="text/javascript">
					alert("Materia Prima ya registrada");
					window.location="ControladorMP.php?operacion=index";
				</script>
			<?php
		}else{
		
						$sql="UPDATE materia_prima SET codigo='".$codigo."',nombre='".$nombre."',presentacion='".$presentacion."',unidad='".$unidad."' WHERE id=".$id;

							$res=mysqli_query($conex,$sql);
							if ($res) {
								?>
									<script type="text/javascript">
										alert("Registro modificado");
										window.location="ControladorMP.php?operacion=index";
									</script>
								<?php
							} else {
								?>
									<script type="text/javascript">
										alert("Error al modificar el registro");
										window.location="ControladorMP.php?operacion=index";
									</script>
								<?php
							}			
			
		}//fin del condicional de correo registrado
}//fin de la función actualizar


public function eliminar()
{
	extract($_REQUEST);//extrayendo variables del url
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos

	$sql="DELETE FROM materia_prima WHERE id=".$id_materia_prima;

		$res=mysqli_query($conex,$sql);
		if ($res) {
			?>
				<script type="text/javascript">
					alert("Registro eliminado");
					window.location="ControladorMP.php?operacion=index";
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("Registro no eliminado");
					window.location="ControladorMP.php?operacion=index";
				</script>
			<?php
		}
}//fin de la función eliminar

static function controlador($operacion){
		$mp=new ControladorMP();
	switch ($operacion) {
		case 'index':
			$mp->index();
			break;
		case 'registrar':
			$mp->registrar();
			break;
		case 'guardar':
			$mp->guardar();
			break;
		case 'modificar':
			$mp->modificar();
			break;
		case 'actualizar':
			$mp->actualizar();
			break;
		case 'eliminar':
			$mp->eliminar();
			break;
		default:
			?>
				<script type="text/javascript">
					alert("No existe la ruta");
					window.location="ControladorMP.php?operacion=index";
				</script>
			<?php
			break;
	}//cierre del switch
}//cierre de la funcion controlador
}//cierre de la clase


ControladorMP::controlador($operacion);
?>