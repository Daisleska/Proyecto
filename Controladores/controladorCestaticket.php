<?php 
include("../Modelos/clasedb.php");
extract($_REQUEST);

class ControladorCestaticket
{
	

public function index(){
	extract($_POST);
	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM cestaticket";//query


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
		
	    header("Location: ../Vistas/cestaticket/index.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	} else {
		echo "Error en la BASE DE DATOS";

	}//enviando datos
}//fin de la funcion login

public function registrar(){

	header("Location: ../Vistas/cestaticket/registrar.php");
}//fin registrar

public function guardar(){
	extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	
	$sql="INSERT INTO cestaticket VALUES (NULL,'".$monto."')";

		$resultado=mysqli_query($conex,$sql);
	
	if($resultado) {
        ?>
		<script type="text/javascript">
			
			if (confirm("Registro exitoso, desea registrar otro?")) {
				window.location="ControladorCestaticket.php?operacion=registrar";	
			}else{
				window.location="ControladorCestaticket.php?operacion=index";
			}
			
		</script>
			<?php

		} 
		
}//fin de la funcion guardar


public function modificar(){
	extract($_REQUEST);//extrayendo valores de url
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	$sql="SELECT * FROM cestaticket WHERE id=".$id_cestaticket."";
	$res=mysqli_query($conex,$sql);//ejecutando consulta
	$data=mysqli_fetch_array($res);//extrayendo datos en array

	header("Location: ../Vistas/cestaticket/modificar.php?data=".serialize($data));
}//fin de la funcion modificar



public function actualizar()
{
	extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	
	$sql="UPDATE cestaticket SET monto='".$monto."' WHERE id=".$id_cestaticket."";

		$res=mysqli_query($conex,$sql);
			if ($res) {
				?>
			        <script type="text/javascript">
						alert("Registro modificado");
						window.location="ControladorCestaticket.php?operacion=index";
					</script>
				<?php
			} else {
				?>
					<script type="text/javascript">
						alert("Error al modificar el registro");
						window.location="ControladorCestaticket.php?operacion=index";
					</script>
			<?php
			}			
			
	
}//fin de la función actualizar


public function eliminar()
{
	extract($_REQUEST);//extrayendo variables del url
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos

	$sql="DELETE FROM cestaticket WHERE id=".$id_cestaticket;

		$res=mysqli_query($conex,$sql);
		if ($res) {
			?>
				<script type="text/javascript">
					alert("Registro eliminado");
					window.location="ControladorCestaticket.php?operacion=index";
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("Registro no eliminado");
					window.location="ControladorCestaticket.php?operacion=index";
				</script>
			<?php
		}
}//fin de la función eliminar

static function controlador($operacion){
		$cesta=new ControladorCestaticket();
	switch ($operacion) {
		case 'index':
			$cesta->index();
			break;
		case 'registrar':
			$cesta->registrar();
			break;
		case 'guardar':
			$cesta->guardar();
			break;
		case 'modificar':
			$cesta->modificar();
			break;
		case 'actualizar':
			$cesta->actualizar();
			break;
		case 'eliminar':
			$cesta->eliminar();
			break;
		default:
			?>
				<script type="text/javascript">
					alert("No existe la ruta");
					window.location="ControladorCestaticket.php?operacion=index";
				</script>
			<?php
			break;
	}//cierre del switch
}//cierre de la funcion controlador
}//cierre de la clase


ControladorCestaticket::controlador($operacion);
?>