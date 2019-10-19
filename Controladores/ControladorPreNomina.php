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
  
	$sql="SELECT * FROM pre_nomina WHERE mes=MONTH( CURDATE() )";
    
	$res=mysqli_query($conex,$sql);

	$filas=mysqli_num_rows($res);

    //$filas=0;
    if ($filas==0) {

    	$sql="INSERT INTO `pre_nomina` (`id`, `quincena`, `mes`, `anio`, `status`) VALUES (NULL, '1', MONTH( CURDATE() ), YEAR( CURDATE() ), 'Procesando')";

    	$res=mysqli_query($conex,$sql);

    	$id_prenomina=mysqli_insert_id($conex);//obteniendo el último id generado
	    //echo $id_prenomina;
        
    	$sql2="SELECT empleado.*,cargos.nombre,cargos.salario FROM empleado, cargos WHERE empleado.id_cargo=cargos.id";

        $res2=mysqli_query($conex,$sql2);
        $filas=mysqli_num_rows($res2);//cuantos registro trae la consulta

	    $i=0;

	while($data=mysqli_fetch_object($res2)){

	
		$asignaciones[$i]=$this->calcular_asignaciones($data->id);

		//echo $asignaciones[$i];

		$deducciones[$i]=$this->calcular_deducciones($data->id);


		$inasistencias[$i]=$this->inasistencia($data->id);

		
		$diast=$data->salario/30;

		$inasistencia=$inasistencias[$i]*$diast;

		$sueldo_neto[$i]=(($data->salario/2)-$inasistencia[$i])+($asignaciones[$i]-$deducciones[$i]);

        $empleado[$i][0]=$data->id;
        $empleado[$i][1]=$data->nombres;
        $empleado[$i][2]=$data->apellidos;
        $empleado[$i][3]=$data->cedula;
        $empleado[$i][4]=$data->nombre;
        $empleado[$i][5]=$data->salario/2;

	    
	    $sql3="INSERT INTO prenomina_empleado VALUES (NULL,  ".$id_prenomina.", ".$data->id.")";
       
		$resultado=mysqli_query($conex,$sql3);


		

		$i++;
     }
     
    header("Location: ../Vistas/pre_nomina/verprenomina.php?filas=".$filas."&asignaciones=".serialize($asignaciones)."&deducciones=".serialize($deducciones)."&inasistencia=".serialize($inasistencia)."&sueldo_neto=".serialize($sueldo_neto)."&empleado=".serialize($empleado));
    	
    }else {

    if ($filas==1) {

    	/*$sql="INSERT INTO `pre_nomina` (`id`, `quincena`, `mes`, `anio`, `status`) VALUES (NULL, '2', MONTH( CURDATE() ), YEAR( CURDATE() ), 'Procesando')";

    	$res=mysqli_query($conex,$sql);

    	$id_prenomina=mysqli_insert_id($conex);//obteniendo el último id generado
	    //echo $id_prenomina;

    	$sql2="SELECT * FROM empleado";

        $res=mysqli_query($conex,$sql2);

	    $i=0;

	while($data=mysqli_fetch_object($res)){
	   $sql3="INSERT INTO `prenomina_empleado` (`id`, `id_prenomina`, `id_empleado`) VALUES (NULL,  ".$id_prenomina.", ".$data->id.")";

		$resultado=mysqli_query($conex,$sql3);

        $asignaciones[$i]=$this->calcular_asignaciones($data->id);
       
		$deducciones[$i]=$this->calcular_deducciones($data->id);

		$inasistencias[$i]=$this->inasistencia($data->id);

		$inasistencias_mes[$i]=$this->inasistencia_mes($data->id);

		$monto[$i]=$this->cestaticket($data->id);
        
        //$diasc=valor del dia de cestaticket;

        $diast=$data->salario/30;

		$inasistencia=$inasistencias[$i]*$diast;

		$sueldo_neto[$i]=(($data->salario/2)-$inasistencia[$i])+($asignaciones[$i]-$deducciones[$i])+($cestaticket-($inasistencia_mes[$i]*$diasc));;

        $empleado[$i][0]=$data->id;
        $empleado[$i][1]=$data->nombres;
        $empleado[$i][2]=$data->apellidos;
        $empleado[$i][3]=$data->cedula;
        $empleado[$i][4]=$data->nombre;
        $empleado[$i][5]=$data->salario;



		$i++;
     }
    	*/
    
    }else{

    	?>
		<script type="text/javascript">
			alert("No se pueden generar mas nominas por este mes");
			window.location="ControladorPreNomina.php?operacion=prenomina";
		</script>
			<?php

    }

}

}//fin de la funcion generar



public function calcular_asignaciones($id_empleado){
	
	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();
    $total=0;

	$sql="SELECT SUM(asignacion_deduccion.monto) AS total FROM asignacion_deduccion,empleado,empleado_asig WHERE asignacion_deduccion.tipo='Asignacion' AND empleado_asig.id_empleado=empleado.id AND empleado_asig.id_asignaciones=asignacion_deduccion.id AND empleado.id=".$id_empleado."";
	  
	
	//echo $sql."<br>";
    if($res=mysqli_query($conex,$sql)){

    $data=mysqli_fetch_object($res);

    if ($data->total>=0) {
    	$total=$data->total;
    }
    }
    return $total;

}//fin de la funcion calcular asignaciones 


public function calcular_deducciones($id_empleado){
	
	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT SUM(asignacion_deduccion.monto) AS total FROM asignacion_deduccion,empleado,empleado_asig WHERE asignacion_deduccion.tipo='Deduccion' AND empleado_asig.id_empleado=empleado.id AND empleado_asig.id_asignaciones=asignacion_deduccion.id AND empleado.id=".$id_empleado."";
	  
	
	//echo $sql;
    $res=mysqli_query($conex,$sql);

    $data=mysqli_fetch_object($res);
    $total=0;
    if (!is_null($data->total)) {
    	$total=$data->total;
    }
    
    return $total;

}//fin de la funcion calcular deducciones



public function inasistencia($id_empleado){

	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT COUNT(status) AS inasistencias FROM asistencias WHERE status='NASJ' AND fecha_hora BETWEEN DAY(CURRENT_TIMESTAMP()-14) AND CURRENT_TIMESTAMP AND id_empleado=".$id_empleado."";
	  
	
    $res=mysqli_query($conex,$sql);

    $data=mysqli_fetch_object($res);

    return $data->inasistencias;


}//fin de la función inasistencias 


public function inasistencia_mes($id_empleado){

	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT COUNT(status) AS inasistencias_mes FROM asistencias WHERE status='NASJ' AND fecha_hora BETWEEN DAY(CURRENT_TIMESTAMP()-28) AND CURRENT_TIMESTAMP AND id_empleado=".$id_empleado."";
	  
	
    $res=mysqli_query($conex,$sql);

    $data=mysqli_fetch_object($res);

    return $data->inasistencias_mes;


}//fin de la función inasistencias del mes  



public function cestaticket($id_empleado){

	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT monto FROM cestaticket";
	  
	
    $res=mysqli_query($conex,$sql);

    $data=mysqli_fetch_object($res);

    return $data->monto;


}//fin de la función cestaticket  

static function controlador($operacion){
		$pago=new ControladorPreNomina();
	switch ($operacion) {
		case 'prenomina':
			$pago->prenomina();
			break;

		case 'generar':
			$pago->generar();
			break;

		case 'calcular_asignaciones':
			$pago->calcular_asignaciones();
			break;

		case 'calcular_deducciones':
			$pago->calcular_deducciones();
			break;

		case 'inasistencia':
			$pago->inasistencia();
			break;

		case 'inasistencia_mes':
			$pago->inasistencia_mes();
			break;

		case 'cestaticket':
			$pago->cestaticket();
			break;


		case 'aprobadas':
			$pago->aprobadas();
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