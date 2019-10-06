<?php 
include("../Modelos/clasedb.php");
extract($_REQUEST);

class ControladorRecibidos
{
	

public function index(){
	extract($_POST);
	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM recibidos";//query


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
		
	    header("Location: ../Vistas/recibidos/index.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	} else {
		echo "Error en la BASE DE DATOS";

	}//enviando datos
}//fin de la funcion login

public function registrar()

	{
	$db=new clasedb();
	$conex=$db->conectar();
	$cont=0; //para contar si no se ejecutaron consultas
	//
	
		$sql="SELECT * FROM materia_prima";
		if ($res=mysqli_query($conex,$sql)) {
			# se ejecutó la consulta
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

		} else {
			# no se ejecutó la consulta
			$cont++;
		}
		
	//-------
		if ($cont==0) {
			# se ejecutó
			header("Location: ../Vistas/recibidos/registrar.php?campos=".$campos."&filas=".$filas."&datos=".serialize($datos));
		} else {
			# hubo un error
			header("Location: ../home.php");
		}
		
}//fin registrar


public function guardar(){
	extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
		
		$sql="INSERT INTO recibidos VALUES (NULL,".$id_pmp.",'".$cantidad."','".$fecha."','".$ce."','".$observacion."')";

		$resultado=mysqli_query($conex,$sql);
	
	if($resultado) {
        ?>
		<script type="text/javascript">
			
			if (confirm("Registro exitoso, desea registrar otro?")) {
				window.location="ControladorRecibidos.php?operacion=registrar";	
			}else{
				window.location="ControladorRecibidos.php?operacion=index";
			}
			
		</script>
			<?php

		} 
		
}//fin de la funcion guardar




public function modificar(){
	extract($_REQUEST);//extrayendo valores de url
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	$sql="SELECT * FROM recibidos WHERE id=".$id_recibidos."";
	$res=mysqli_query($conex,$sql);//ejecutando consulta
	$data=mysqli_fetch_array($res);//extrayendo datos en array

	header("Location: ../Vistas/recibidos/modificar.php?data=".serialize($data));
}//fin de la funcion modificar



public function actualizar()
{
	extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	
		
    $sql="UPDATE recibidos SET id_pmp='".$id_pmp."',cantidad='".$cantidad."',fecha='".$fecha."',observacion='".$observacion."',ce='".$ce."' WHERE id=".$id;

							$res=mysqli_query($conex,$sql);
							if ($res) {
								?>
									<script type="text/javascript">
										alert("Registro modificado");
										window.location="ControladorRecibidos.php?operacion=index";
									</script>
								<?php
							} else {
								?>
									<script type="text/javascript">
										alert("Error al modificar el registro");
										window.location="ControladorRecibidos.php?operacion=index";
									</script>
								<?php
							}			
			
		
}//fin de la función actualizar


public function eliminar()
{
	extract($_REQUEST);//extrayendo variables del url
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos

	$sql="DELETE FROM recibidos WHERE id=".$id_recibidos;

		$res=mysqli_query($conex,$sql);
		if ($res) {
			?>
				<script type="text/javascript">
					alert("Registro eliminado");
					window.location="ControladorRecibidos.php?operacion=index";
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("Registro no eliminado");
					window.location="ControladorRecibidos.php?operacion=index";
				</script>
			<?php
		}
}//fin de la función eliminar

static function controlador($operacion){
		$recibido=new ControladorRecibidos();
	switch ($operacion) {
		case 'index':
			$recibido->index();
			break;
		case 'registrar':
			$recibido->registrar();
			break;
		case 'guardar':
			$recibido->guardar();
			break;
		case 'modificar':
			$recibido->modificar();
			break;
		case 'actualizar':
			$recibido->actualizar();
			break;
		case 'eliminar':
			$recibido->eliminar();
			break;
		default:
			?>
				<script type="text/javascript">
					alert("No existe la ruta");
					window.location="ControladorRecibidos.php?operacion=index";
				</script>
			<?php
			break;
	}//cierre del switch
}//cierre de la funcion controlador
}//cierre de la clase


ControladorRecibidos::controlador($operacion);
?>