<?php 
include("../Modelos/clasedb.php");
extract($_REQUEST);

class ControladorProductos
{
	

public function index(){
	extract($_POST);
	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM productos";//query


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
		
	    header("Location: ../Vistas/productos/index.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	} else {
		echo "Error en la BASE DE DATOS";

	}//enviando datos
}//fin de la funcion login

public function registrar(){

	header("Location: ../Vistas/productos/registrar.php");
}//fin registrar

public function guardar(){
	extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM productos WHERE nombre='".$nombre."'";

	$res=mysqli_query($conex,$sql);
	$cuantos=mysqli_num_rows($res);
	//echo $cuantos;
	if ($cuantos>0) {
		?>
		<script type="text/javascript">
			alert("El producto ya existe");
			window.location="ControladorProductos.php?operacion=registrar";
		</script>
			<?php
	} else {
		
			
		$sql="INSERT INTO productos VALUES (NULL,'".$nombre."','".$presentacion."','".$unidad."')";

		$resultado=mysqli_query($conex,$sql);
	
	if($resultado) {
        ?>
		<script type="text/javascript">
			
			if (confirm("Registro exitoso, desea registrar otro?")) {
				window.location="ControladorProductos.php?operacion=registrar";	
			}else{
				window.location="ControladorProductos.php?operacion=index";
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
	
	$sql="SELECT * FROM productos WHERE id=".$id_productos."";
	$res=mysqli_query($conex,$sql);//ejecutando consulta
	$data=mysqli_fetch_array($res);//extrayendo datos en array

	header("Location: ../Vistas/productos/modificar.php?data=".serialize($data));
}//fin de la funcion modificar



public function actualizar()
{
	extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	$sql="SELECT * FROM productos WHERE nombre='".$nombre."' AND id<>".$id;
//echo $sql;
	$res=mysqli_query($conex,$sql);

	$cant=mysqli_num_rows($res);//trae cuantos registros tiene la consulta
		if ($cant>0) {
			?>
				<script type="text/javascript">
					alert("Ya existe el producto");
					window.location="ControladorProductos.php?operacion=index";
				</script>
			<?php
		}else{
		
						$sql="UPDATE productos SET nombre='".$nombre."',presentacion='".$presentacion."',unidad='".$unidad."' WHERE id=".$id;

							$res=mysqli_query($conex,$sql);
							if ($res) {
								?>
									<script type="text/javascript">
										alert("Registro modificado");
										window.location="ControladorProductos.php?operacion=index";
									</script>
								<?php
							} else {
								?>
									<script type="text/javascript">
										alert("Error al modificar el registro");
										window.location="ControladorProductos.php?operacion=index";
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

	$sql="DELETE FROM productos WHERE id=".$id_productos;

		$res=mysqli_query($conex,$sql);
		if ($res) {
			?>
				<script type="text/javascript">
					alert("Registro eliminado");
					window.location="ControladorProductos.php?operacion=index";
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("Registro no eliminado");
					window.location="ControladorProductos.php?operacion=index";
				</script>
			<?php
		}
}//fin de la función eliminar

static function controlador($operacion){
		$producto=new ControladorProductos();
	switch ($operacion) {
		case 'index':
			$producto->index();
			break;
		case 'registrar':
			$producto->registrar();
			break;
		case 'guardar':
			$producto->guardar();
			break;
		case 'modificar':
			$producto->modificar();
			break;
		case 'actualizar':
			$producto->actualizar();
			break;
		case 'eliminar':
			$producto->eliminar();
			break;
		default:
			?>
				<script type="text/javascript">
					alert("No existe la ruta");
					window.location="ControladorProductos.php?operacion=index";
				</script>
			<?php
			break;
	}//cierre del switch
}//cierre de la funcion controlador
}//cierre de la clase


ControladorProductos::controlador($operacion);
?>