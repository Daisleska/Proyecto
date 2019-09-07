<?php
include("../Modelos/clasedb.php");
extract($_REQUEST);


class ControladorBitacora {

public function bitacora_guardar(){

}//fin función bitácora guardar

public function bitacora_fecha(){

	extract($_POST);
	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM auditoria WHERE fecha=".$fecha." ORDER BY id_usuario DESC";

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
		
	    header("Location: ../Vistas/config/auditoria.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	} else {
		echo "Error en la BASE DE DATOS";
	}

	
	
	
		//enviando datos

}//fin función bitácora fecha


public function bitacora_usuario(){

	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM auditoria WHERE id_usuario=".$id_usuario." ORDER BY id_usuario DESC";

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
		
	    header("Location: ../Vistas/config/auditoria.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	} else {
		echo "Error en la BASE DE DATOS";
	}

}//fin función bitácora usuario

public function bitacora_hora(){

	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM auditoria WHERE hora=".$hora." ORDER BY id_usuario DESC";

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
		
	    header("Location: ../Vistas/config/auditoria.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	} else {
		echo "Error en la BASE DE DATOS";
	}

	

}//fin función bitácora hora

public function bitacora_actividad(){

	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM auditoria WHERE actividad=".$actividad." ORDER BY id_usuario DESC";

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
		
	    header("Location: ../Vistas/config/auditoria.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	} else {
		echo "Error en la BASE DE DATOS";
	}

	

}//fin función bitácora actividad


public function bitacora_todo(){

	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM auditoria ORDER BY id_usuario DESC";

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
		
	    header("Location: ../Vistas/config/auditoria.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	} else {
		echo "Error en la BASE DE DATOS";
	}

	

}//fin función bitácora todos



static function controlador($operacion)
{
	$bitacora=new ControladorBitacora();
	switch ($operacion) {

        case 'bitacora_guardar':
        	$bitacora->bitacora_guardar();
        	break;

		case 'bitacora_fecha':
			$bitacora->bitacora_fecha();
			break;

		case 'bitacora_usuario':
		    $bitacora->bitacora_usuario();
			break;

		case 'bitacora_hora':
			$bitacora->bitacora_hora();
			break;

		case 'bitacora_actividad':
		    $bitacora->bitacora_actividad();
			break;

		case 'bitacora_todo':
			$bitacora->bitacora_todo();
			break;

    default:
			?>
				<script type="text/javascript">
					alert("No existe la ruta");
					window.location="";
				</script>
			<?php
			break;
	}//cierre del switch
}//fin de la funcion controlador

}//fin de la clase Controlador Bitacora




ControladorBitacora::controlador($operacion);


?>