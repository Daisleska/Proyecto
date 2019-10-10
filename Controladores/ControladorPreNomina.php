<?php

include("../Modelos/clasedb.php");
extract($_REQUEST);

class ControladorPreNomina
{
	

public function prenomina(){
	extract($_POST);
	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM pre_nomina WHERE status=1";//query


	//ejecutando query
	if ($res=mysqli_query($conex,$sql)) {
		//echo "entro";
		$campos=mysqli_num_fields($res);//cuantos campos trae la consulta	
		$filas=mysqli_num_rows($res);//cuantos registro trae la consulta
		$i=0;
		$prenomina[]=array();//inicializando array
		//extrayendo datos
		while($data=mysqli_fetch_array($res)){
			for ($j=0; $j <$campos; $j++) { 
				$prenomina[$i][$j]=$data[$j];
			} 
			$i++;
		}
		
	    header("Location: ../Vistas/pre_nomina/index.php?filas=".$filas."&campos=".$campos."&prenomina=".serialize($prenomina));
	} else {
		echo "Error en la BASE DE DATOS";

	}//enviando datos
}//fin de la funcion 

public function aprobadas(){
	extract($_POST);
	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM pre_nomina WHERE status=2";//query


	//ejecutando query
	if ($res=mysqli_query($conex,$sql)) {
		//echo "entro";
		$campos=mysqli_num_fields($res);//cuantos campos trae la consulta	
		$filas=mysqli_num_rows($res);//cuantos registro trae la consulta
		$i=0;
		$prenomina[]=array();//inicializando array
		//extrayendo datos
		while($data=mysqli_fetch_array($res)){
			for ($j=0; $j <$campos; $j++) { 
				$prenomina[$i][$j]=$data[$j];
			} 
			$i++;
		}
		
	    header("Location: ../Vistas/pre_nomina/aprobadas.php?filas=".$filas."&campos=".$campos."&prenomina=".serialize($prenomina));
	} else {
		echo "Error en la BASE DE DATOS";

	}//enviando datos
}//fin de la funcion 

public function generar(){
	
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT * FROM pre_nomina";

	echo $sql;



	/*/$i=1;
    $sql="INSERT INTO `pre_nomina` (`id`, `quincena`, `status`) VALUES (NULL, CURDATE(), ".$i.")";

    $result=mysqli_query($conex,$sql);//esto funciona

    $id_prenomina=mysqli_insert_id($conex);//obteniendo el último id generado
	//echo $id_prenomina;
    
    $sql2="SELECT * FROM empleado";

    $res=mysqli_query($conex,$sql2);

	$i=0;

	while($data=mysqli_fetch_object($res)){
	   $sql3="INSERT INTO `prenomina_empleado` (`id`, `id_prenomina`, `id_empleado`) VALUES (NULL,  ".$id_prenomina.", ".$data->id.")";
		$resultado=mysqli_query($conex,$sql3);
		$i++;
     }/*/






}//fin de la funcion generar





public function ver(){

    $db=new clasedb();
	$conex=$db->conectar();
    $suma=0;
    $resta=0;
    
    $sql="SELECT empleado.cedula, empleado.nombres, empleado.id_cargo, cargos.salario, asignacion_deduccion.tipo, asignacion_deduccion.monto FROM empleado, cargos, asignacion_deduccion WHERE empleado.id_cargo=cargos.id";
    
    $res=mysqli_query($conex,$sql);
	
	while($data=mysqli_fetch_object($res)){
	   if ($data->tipo="Asignacion") {
	   	   $suma=$suma+$data->monto;
	   }
      
	   else{
           $resta=$resta+$data->monto;
	   }
	    
	    $sueldo_neto=(($salario/2) +$suma-$resta);
		$i++;
     }





	





}//fin de la funcion ver




static function controlador($operacion){
		$pago=new ControladorPreNomina();
	switch ($operacion) {
		case 'prenomina':
			$pago->prenomina();
			break;

		case 'generar':
			$pago->generar();
			break;

		case 'aprobadas':
			$pago->aprobadas();
			break;

		case 'ver':
			$pago->ver();
			break;

		case 'pago':
			$pago->pago();
			break;

		case 'vermas':
			$pago->vermas();
			break;

		case 'aprobar':
			$pago->aprobar();
			break;

		case 'buscar':
			$pago->buscar();
			break;
		
		default:
			?>
				<script type="text/javascript">
					alert("No existe la ruta");
					window.location="ControladorPreNomina.php?operacion=index";
				</script>
			<?php
			break;
	}//cierre del switch
}//cierre de la funcion controlador
}//cierre de la clase


ControladorPreNomina::controlador($operacion);
?>