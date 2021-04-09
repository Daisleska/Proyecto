<?php

include("../Modelos/clasedb.php");
extract($_REQUEST);
session_start();

class ControladorPreNomina
{
	

public function prenomina(){ 
	extract($_POST);
	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos
    $mes=date('m');
	$count=0;
	$sql="SELECT id FROM pre_nomina WHERE status=1 AND mes=".$mes;
	$res=mysqli_query($conex,$sql);
	while($fila=mysqli_fetch_array($res)){
		$id=$fila['id'];
		$sql2="SELECT pre_nomina.quincena, COUNT(prenomina_empleado.id_prenomina) AS cantidad, pre_nomina.status, pre_nomina.id FROM pre_nomina INNER JOIN prenomina_empleado ON pre_nomina.id=prenomina_empleado.id_prenomina WHERE pre_nomina.id='$id'";
		$resultado=mysqli_query($conex,$sql2);
		$fila2=mysqli_fetch_assoc($resultado);
		$prenomina[$count]=$fila2;
		$count++;
	}
		
	    header("Location: ../Vistas/pre_nomina/index.php?filas=".$filas."&campos=".$campos."&prenomina=".serialize($prenomina));
	
	
}//fin de la funcion 

public function aprobadas(){ 
	extract($_POST);
	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$count=0;
	$anio=date("Y");
	$sql="SELECT id FROM pre_nomina WHERE status=2 AND anio=".$anio."";
	$res=mysqli_query($conex,$sql);
	while($fila=mysqli_fetch_array($res)){
		$id=$fila['id'];
		$sql2="SELECT pre_nomina.quincena, COUNT(prenomina_empleado.id_prenomina) AS cantidad, pre_nomina.status, pre_nomina.id, pre_nomina.mes, pre_nomina.anio FROM pre_nomina INNER JOIN prenomina_empleado ON pre_nomina.id=prenomina_empleado.id_prenomina WHERE pre_nomina.id='$id'";
		$resultado=mysqli_query($conex,$sql2);
		$fila2=mysqli_fetch_assoc($resultado);
		$aprobadas[$count]=$fila2;
		$count++;
	}
		
	    header("Location: ../Vistas/pre_nomina/aprobadas.php?filas=".$filas."&campos=".$campos."&aprobadas=".serialize($aprobadas));
	
	
}//fin de la funcion 


public function generar(){
	
	$db=new clasedb();
	$conex=$db->conectar();
  
	$sql="SELECT * FROM pre_nomina WHERE mes=MONTH( CURDATE() )";
    
	$res=mysqli_query($conex,$sql);

	$filas=mysqli_num_rows($res);

    //$filas=0;
    if ($filas==0 && date('d')<16) {
	 
    	$sql="INSERT INTO `pre_nomina` (`id`, `quincena`, `mes`, `anio`, `status`) VALUES (NULL, '1', MONTH( CURDATE() ), YEAR( CURDATE() ), 'Procesando')";

    	$res=mysqli_query($conex,$sql);

    	$id_prenomina=mysqli_insert_id($conex);//obteniendo el último id generado
	    //echo $id_prenomina;
        
    	$sql2="SELECT DISTINCT empleado.*,cargos.nombre,cargos.salario FROM empleado, cargos, departamentos WHERE empleado.id_cargo=cargos.id";

        $res2=mysqli_query($conex,$sql2);
        $filas=mysqli_num_rows($res2);//cuantos registro trae la consulta
        
	    $i=0;
	    
	while($data=mysqli_fetch_object($res2)){

		
		$asignaciones[$i]=$this->calcular_asignaciones($data->id);

		//echo $asignaciones[$i];

		$deducciones[$i]=$this->calcular_deducciones($data->id);


		$inasistencias[$i]=$this->inasistencia($data->id);

		
		$diast=$data->salario/30;//valor de un día de trabajo

		$inasistencia[$i]=$inasistencias[$i]*$diast;//monto total de inasistencias 

		$salario=$data->salario/2;

		// $sueldo_neto[$i]=(($data->salario/2)-$inasistencia[$i])+($asignaciones[$i]-$deducciones[$i]);

		$sueldo_neto[$i]=($asignaciones[$i]+$salario)-($deducciones[$i]+$inasistencia[$i]);

        $empleado[$i][0]=$data->id;
        $empleado[$i][1]=$data->nombres;
        $empleado[$i][2]=$data->apellidos;
        $empleado[$i][3]=$data->cedula;
        $empleado[$i][4]=$data->nombre;
        $empleado[$i][5]=$data->salario/2;
	    
	    $sql3="INSERT INTO prenomina_empleado VALUES (NULL,  ".$id_prenomina.", ".$data->id.")";
       
		$resultado=mysqli_query($conex,$sql3);
		$i++;
 
 

    $sql4="INSERT INTO auditoria VALUES (NULL, '".$_SESSION['id_usuario']."', 'generó primera quincena', 'pre_nomina', CURRENT_TIMESTAMP, '".$_SESSION['tipo_usuario']."')";

		$resultado=mysqli_query($conex,$sql4);

    ?>

		<script type="text/javascript">
			alert("¡Se generó exitosamente!");
			window.location="ControladorPreNomina.php?operacion=prenomina";
		</script>
			<?php


    }
     
  	
    }else if ($filas==1  && date('d')>15) {

    	
    	$sql="INSERT INTO `pre_nomina` (`id`, `quincena`, `mes`, `anio`, `status`) VALUES (NULL, '2', MONTH( CURDATE() ), YEAR( CURDATE() ), 'Procesando')";

    	$res=mysqli_query($conex,$sql);

    	$id_prenomina=mysqli_insert_id($conex);//obteniendo el último id generado
	    //echo $id_prenomina;
        
    	$sql2="SELECT empleado.*,cargos.nombre,cargos.salario FROM empleado, cargos WHERE empleado.id_cargo=cargos.id";

        $res2=mysqli_query($conex,$sql2);
        $filas=mysqli_num_rows($res2);//cuantos registro trae la consulta

	    $i=0;
	   
	while($data=mysqli_fetch_object($res2)){

	
	
		$asignaciones[$i]=$this->calcular_asignaciones($data->id);


		$deducciones[$i]=$this->calcular_deducciones($data->id);


		$inasistencias[$i]=$this->inasistencia2($data->id);

		$inasistencias_mes[$i]=$this->inasistencia_mes($data->id);

		$monto[$i]=$this->cestaticket($data->id);

		
		$diast=$data->salario/30;

		$inasistencia[$i]=$inasistencias[$i]*$diast;

		$diasc=$monto[$i]/30;

		$inasistencia_mes[$i]=$inasistencias_mes[$i]*$diasc;

        

		$sueldo_neto[$i]=(($data->salario/2)-$inasistencia[$i])+($asignaciones[$i]-$deducciones[$i])+($monto[$i]-$inasistencia_mes[$i]);

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

    

   $sql4="INSERT INTO auditoria VALUES (NULL, '".$_SESSION['id_usuario']."', 'generó segunda quincena', 'pre_nomina', CURRENT_TIMESTAMP, '".$_SESSION['tipo_usuario']."')";

		$resultado=mysqli_query($conex,$sql4);

    ?>
		<script type="text/javascript">
			alert("¡Se generó exitosamente!");
			window.location="ControladorPreNomina.php?operacion=prenomina";
		</script>
			<?php
    
    
    } elseif (($filas==1 && date('d')<16) || ($filas==2 && date('d')>15)) {
    	?>
		<script type="text/javascript">
			alert("No se pueden generar mas nominas por esta quincena");
			window.location="ControladorPreNomina.php?operacion=prenomina";
		</script>
			<?php
    } else{

    	?>
		<script type="text/javascript">
			alert("No se pueden generar mas nominas por este mes");
			window.location="ControladorPreNomina.php?operacion=prenomina";
		</script>
			<?php

    }


}//fin de la funcion generar

public function aprobar(){
	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="UPDATE pre_nomina SET status='2'  WHERE id=".$id_prenomina;
	$resultado=mysqli_query($conex,$sql);

	$sql2="SELECT * FROM pre_nomina WHERE id='$id_prenomina'";
    
	$res=mysqli_query($conex,$sql2);

	$filas=mysqli_fetch_assoc($res);

    //$filas=0;
    if ($filas['quincena']==1) {
        
    	$sql2="SELECT DISTINCT prenomina_empleado.id_prenomina, empleado.*,cargos.nombre,cargos.salario FROM empleado, cargos, prenomina_empleado WHERE empleado.id_cargo=cargos.id AND prenomina_empleado.id_empleado=empleado.id AND prenomina_empleado.id_prenomina=".$id_prenomina;

        $res2=mysqli_query($conex,$sql2);
        $filas=mysqli_num_rows($res2);//cuantos registro trae la consulta
        
        $i=0;

	while($data=mysqli_fetch_object($res2)){


		$asignaciones[$i]=$this->calcular_asignaciones($data->id);

		//echo $asignaciones[$i];

		$deducciones[$i]=$this->calcular_deducciones($data->id);


		$inasistencias[$i]=$this->inasistencia($data->id);

		
		$diast=$data->salario/30;//valor de un día de trabajo

		$inasistencia[$i]=$inasistencias[$i]*$diast;//monto total de inasistencias 

		$salario=$data->salario/2;

       
        
        $asignacion=floatval($asignaciones[$i]);
        $deduccion=floatval($deducciones[$i]);
        $inasistenciass=floatval($inasistencia[$i]);
        
        $total_asig=$asignacion+$salario;
        $total_deducc=$deduccion+$inasistenciass;

		$sueldo_neto[$i]=($asignaciones[$i]+$salario)-($deducciones[$i]+$inasistencia[$i]);
        
        $monto=floatval($sueldo_neto[$i]);
	    
	   $sql3="INSERT INTO nomina VALUES(NULL, ".$data->id.", ".$id_prenomina.", ".$salario.", ".$total_asig.", ".$total_deducc.", ".$monto.")";
    	   

		$resultado=mysqli_query($conex,$sql3);
		$i++;
    }
    
     $sql="INSERT INTO auditoria VALUES (NULL, '".$_SESSION['id_usuario']."', 'aprobó primera quincena', 'pre_nomina', CURRENT_TIMESTAMP, '".$_SESSION['tipo_usuario']."')";

		$resultado=mysqli_query($conex,$sql);
    ?>
		<script type="text/javascript">
			alert("Nomina Aprobada");
			window.location="ControladorPreNomina.php?operacion=aprobadas";
		</script>
			<?php
   
   
    }else if ($filas['quincena']==2) {
        
    	$sql2="SELECT DISTINCT prenomina_empleado.id_prenomina, empleado.*,cargos.nombre,cargos.salario FROM empleado, cargos, prenomina_empleado WHERE empleado.id_cargo=cargos.id AND prenomina_empleado.id_empleado=empleado.id AND prenomina_empleado.id_prenomina=".$id_prenomina;

        $res2=mysqli_query($conex,$sql2);
        $filas=mysqli_num_rows($res2);//cuantos registro trae la consulta

	    $i=0;
	while($data=mysqli_fetch_object($res2)){

		
		$asignaciones[$i]=$this->calcular_asignaciones($data->id);


		$deducciones[$i]=$this->calcular_deducciones($data->id);


		$inasistencias[$i]=$this->inasistencia2($data->id);

		$inasistencias_mes[$i]=$this->inasistencia_mes($data->id);

		$monto[$i]=$this->cestaticket($data->id);

		
		$diast=$data->salario/30;

		$inasistencia[$i]=$inasistencias[$i]*$diast;

		$diasc=$monto[$i]/30;

		$inasistencia_mes[$i]=$inasistencias_mes[$i]*$diasc;
        
        $salario=$data->salario/2;
     	$asignacion=floatval($asignaciones[$i]);
     	$cestaticket=floatval($monto[$i]);
     	$deduccion=floatval($deducciones[$i]);
        $inasistenciass=floatval($inasistencia[$i]);
        $inasistencia_mess=floatval($inasistencia_mes[$i]);


        $total_asig=$asignacion+$salario+$cestaticket;
        $total_deducc=$deduccion+$inasistenciass+$inasistencia_mess;

		$sueldo_neto[$i]=(($data->salario/2)-$inasistencia[$i])+($asignaciones[$i]-$deducciones[$i])+($monto[$i]-$inasistencia_mes[$i]);
       
        $monto_t=floatval($sueldo_neto[$i]);

        

	    $sql3="INSERT INTO nomina VALUES(NULL, ".$data->id.", ".$id_prenomina.", ".$salario.", ".$total_asig.", ".$total_deducc.", ".$monto_t.")";
    	  
       
		$resultado=mysqli_query($conex,$sql3);
		$i++;
     }
    $sql="INSERT INTO auditoria VALUES (NULL, '".$_SESSION['id_usuario']."', 'aprobó segunda quincena', 'pre_nomina', CURRENT_TIMESTAMP, '".$_SESSION['tipo_usuario']."')";

		$resultado=mysqli_query($conex,$sql);
    ?>
		<script type="text/javascript">
			alert("Nomina Aprobada");
			window.location="ControladorPreNomina.php?operacion=aprobadas";
		</script>
			<?php
}
}//fin de la funcion 

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


//DETALLES DE ASIGNACIONES (ESTO NO SE ESTA USANDO)

public function detalle_asignaciones($id_empleado){
	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT asignacion_deduccion.descripcion, asignacion_deduccion.monto FROM asignacion_deduccion, empleado, empleado_asig WHERE asignacion_deduccion.tipo='Asignacion' AND empleado_asig.id_empleado=empleado.id AND empleado_asig.id_asignaciones=asignacion_deduccion.id AND empleado.id=".$id_empleado."";

	$res=mysqli_query($conex,$sql);
	$filas=mysqli_num_rows($res);
    
    $i =0;
    

	while ($data=mysqli_fetch_object($res)) { 
	  $asignacion[$i][0]= $id_empleado;
	  $asignacion[$i][1]=$data->descripcion;
      $asignacion[$i][2]=$data->monto;
      $i++;
} 

return $asignacion;

}//fin de la función detalle de asignaciones 

           // FIN DETALLES DE ASIGNACIONES





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

	$anio=date("Y");
    $mes=date("m");
    $fecha=$anio."-".$mes."-01";
    $fecha2=$anio."-".$mes. "-15";

	$sql="SELECT COUNT(status) AS inasistencias FROM asistencias WHERE status='NASJ' AND fecha_hora BETWEEN $fecha AND $fecha2 AND id_empleado=".$id_empleado."";
	  
	
    $res=mysqli_query($conex,$sql);

    $data=mysqli_fetch_object($res);

    return $data->inasistencias;


}//fin de la función inasistencias 


public function inasistencia2($id_empleado){

	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

	$anio=date("Y");
    $mes=date("m");
    $fecha=$anio."-".$mes."-16";
    $timestamp = strtotime( $fecha );
    $diasdelmes = date( "t", $timestamp );
    $fecha2=$anio."-".$mes. "-".$diasdelmes;


	$sql="SELECT COUNT(status) AS inasistencias FROM asistencias WHERE status='NASJ' AND fecha_hora BETWEEN $fecha AND $fecha2 AND id_empleado=".$id_empleado."";
	  
	
    $res=mysqli_query($conex,$sql);

    $data=mysqli_fetch_object($res);


    return $data->inasistencias;


}//fin de la función inasistencias

public function inasistencia_mes($id_empleado){

	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

	$anio=date("Y");
    $mes=date("m");
    $fecha=$anio."-".$mes."-01";
    $timestamp = strtotime( $fecha );
    $diasdelmes = date( "t", $timestamp );
    $fecha2=$anio."-".$mes. "-".$diasdelmes;

    $sql="SELECT COUNT(status) AS inasistencias_mes FROM asistencias WHERE status='NASJ' AND fecha_hora BETWEEN $fecha AND $fecha2 AND id_empleado=".$id_empleado."";
	  
	
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

public function ver(){
	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT * FROM pre_nomina WHERE id='$id_prenomina'";
    
	$res=mysqli_query($conex,$sql);

	$filas=mysqli_fetch_assoc($res);

    //$filas=0;
    if ($filas['quincena']==1) {
        
    	$sql2="SELECT DISTINCT prenomina_empleado.id_prenomina, empleado.*,cargos.nombre,cargos.salario FROM empleado, cargos, prenomina_empleado WHERE empleado.id_cargo=cargos.id AND prenomina_empleado.id_empleado=empleado.id AND prenomina_empleado.id_prenomina=".$id_prenomina;

        $res2=mysqli_query($conex, $sql2);
        $filas=mysqli_num_rows($res2);
       
	    $i=0;
	   

	    while($data=mysqli_fetch_object($res2)){

		//detalles de las asignaciones de cada empleado

		$asignaciones[$i]=$this->calcular_asignaciones($data->id);

		//echo $asignaciones[$i];

		$deducciones[$i]=$this->calcular_deducciones($data->id);


		$inasistencias[$i]=$this->inasistencia($data->id);

		
		$diast=$data->salario/30;//valor de un día de trabajo

		$inasistencia[$i]=$inasistencias[$i]*$diast;//monto total de inasistencias 

		$salario=$data->salario/2;

		// $sueldo_neto[$i]=(($data->salario/2)-$inasistencia[$i])+($asignaciones[$i]-$deducciones[$i]);

		$sueldo_neto[$i]=($asignaciones[$i]+$salario)-($deducciones[$i]+$inasistencia[$i]);

        $empleado[$i][0]=$data->id;
        $empleado[$i][1]=$data->nombres;
        $empleado[$i][2]=$data->apellidos;
        $empleado[$i][3]=$data->cedula;
        $empleado[$i][4]=$data->nombre;
        $empleado[$i][5]=$data->salario/2;

	    
		$i++;
     }

    header("Location: ../Vistas/pre_nomina/verprenomina.php?filas=".$filas."&asignaciones=".serialize($asignaciones)."&deducciones=".serialize($deducciones)."&inasistencia=".serialize($inasistencia)."&sueldo_neto=".serialize($sueldo_neto)."&empleado=".serialize($empleado));
    	
    }else if ($filas['quincena']==2) {
        
    	$sql2="SELECT DISTINCT prenomina_empleado.id_prenomina, empleado.*,cargos.nombre,cargos.salario FROM empleado, cargos, prenomina_empleado WHERE empleado.id_cargo=cargos.id AND prenomina_empleado.id_empleado=empleado.id AND prenomina_empleado.id_prenomina=".$id_prenomina;



        $res2=mysqli_query($conex,$sql2);
        $filas=mysqli_num_rows($res2);//cuantos registro trae la consulta

	    $i=0;
	    
	while($data=mysqli_fetch_object($res2)){

	
	
		$asignaciones[$i]=$this->calcular_asignaciones($data->id);


		$deducciones[$i]=$this->calcular_deducciones($data->id);


		$inasistencias[$i]=$this->inasistencia2($data->id);

		$inasistencias_mes[$i]=$this->inasistencia_mes($data->id);

		$monto[$i]=$this->cestaticket($data->id);

		
		$diast=$data->salario/30;

		$inasistencia[$i]=$inasistencias[$i]*$diast;

		$diasc=$monto[$i]/30;

		$inasistencia_mes[$i]=$inasistencias_mes[$i]*$diasc;

        

		$sueldo_neto[$i]=(($data->salario/2)-$inasistencia[$i])+($asignaciones[$i]-$deducciones[$i])+($monto[$i]-$inasistencia_mes[$i]);

        $empleado[$i][0]=$data->id;
        $empleado[$i][1]=$data->nombres;
        $empleado[$i][2]=$data->apellidos;
        $empleado[$i][3]=$data->cedula;
        $empleado[$i][4]=$data->nombre;
        $empleado[$i][5]=$data->salario/2;

        

	    
       
		$i++;
     }
     

    header("Location: ../Vistas/pre_nomina/verprenomina2.php?filas=".$filas."&detalles=".serialize($detalles)."&asignaciones=".serialize($asignaciones)."&deducciones=".serialize($deducciones)."&inasistencia=".serialize($inasistencia)."&monto=".serialize($monto)."&inasistencia_mes=".serialize($inasistencia_mes)."&sueldo_neto=".serialize($sueldo_neto)."&empleado=".serialize($empleado));
    }

} //fin función ver


public function veraprobadas(){
	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();

    //$filas=0;
    if ($quincena==1) {
        
    	$sql2="SELECT DISTINCT prenomina_empleado.id_prenomina, empleado.*,cargos.nombre,cargos.salario FROM empleado, cargos, prenomina_empleado WHERE empleado.id_cargo=cargos.id AND prenomina_empleado.id_empleado=empleado.id AND prenomina_empleado.id_prenomina=".$id_nomina;

        $res2=mysqli_query($conex, $sql2);
        $filas=mysqli_num_rows($res2);
       
	    $i=0;
	   

	    while($data=mysqli_fetch_object($res2)){

		//detalles de las asignaciones de cada empleado

		$asignaciones[$i]=$this->calcular_asignaciones($data->id);

		//echo $asignaciones[$i];

		$deducciones[$i]=$this->calcular_deducciones($data->id);


		$inasistencias[$i]=$this->inasistencia($data->id);

		
		$diast=$data->salario/30;//valor de un día de trabajo

		$inasistencia[$i]=$inasistencias[$i]*$diast;//monto total de inasistencias 

		$salario=$data->salario/2;

		// $sueldo_neto[$i]=(($data->salario/2)-$inasistencia[$i])+($asignaciones[$i]-$deducciones[$i]);

		$sueldo_neto[$i]=($asignaciones[$i]+$salario)-($deducciones[$i]+$inasistencia[$i]);

        $empleado[$i][0]=$data->id;
        $empleado[$i][1]=$data->nombres;
        $empleado[$i][2]=$data->apellidos;
        $empleado[$i][3]=$data->cedula;
        $empleado[$i][4]=$data->nombre;
        $empleado[$i][5]=$data->salario/2;

	    
		$i++;
     }

    header("Location: ../Vistas/pre_nomina/vernomina.php?filas=".$filas."&asignaciones=".serialize($asignaciones)."&deducciones=".serialize($deducciones)."&inasistencia=".serialize($inasistencia)."&sueldo_neto=".serialize($sueldo_neto)."&empleado=".serialize($empleado)."&id_nomina=".serialize($id_nomina)."&mes=".serialize($mes)."&anio=".serialize($anio)."&quincena=".serialize($quincena));
    	
    }else {
        
    	$sql2="SELECT DISTINCT prenomina_empleado.id_prenomina, empleado.*,cargos.nombre,cargos.salario FROM empleado, cargos, prenomina_empleado WHERE empleado.id_cargo=cargos.id AND prenomina_empleado.id_empleado=empleado.id AND prenomina_empleado.id_prenomina=".$id_nomina;



        $res2=mysqli_query($conex,$sql2);
        $filas=mysqli_num_rows($res2);//cuantos registro trae la consulta

	    $i=0;
	    
	while($data=mysqli_fetch_object($res2)){

	
	
		$asignaciones[$i]=$this->calcular_asignaciones($data->id);


		$deducciones[$i]=$this->calcular_deducciones($data->id);


		$inasistencias[$i]=$this->inasistencia2($data->id);

		$inasistencias_mes[$i]=$this->inasistencia_mes($data->id);

		$monto[$i]=$this->cestaticket($data->id);

		
		$diast=$data->salario/30;

		$inasistencia[$i]=$inasistencias[$i]*$diast;

		$diasc=$monto[$i]/30;

		$inasistencia_mes[$i]=$inasistencias_mes[$i]*$diasc;

        

		$sueldo_neto[$i]=(($data->salario/2)-$inasistencia[$i])+($asignaciones[$i]-$deducciones[$i])+($monto[$i]-$inasistencia_mes[$i]);

        $empleado[$i][0]=$data->id;
        $empleado[$i][1]=$data->nombres;
        $empleado[$i][2]=$data->apellidos;
        $empleado[$i][3]=$data->cedula;
        $empleado[$i][4]=$data->nombre;
        $empleado[$i][5]=$data->salario/2;

        

	    
       
		$i++;
     }
     

    header("Location: ../Vistas/pre_nomina/vernomina2.php?filas=".$filas."&detalles=".serialize($detalles)."&asignaciones=".serialize($asignaciones)."&deducciones=".serialize($deducciones)."&inasistencia=".serialize($inasistencia)."&monto=".serialize($monto)."&inasistencia_mes=".serialize($inasistencia_mes)."&sueldo_neto=".serialize($sueldo_neto)."&empleado=".serialize($empleado)."&id_nomina=".serialize($id_nomina)."&mes=".serialize($mes)."&anio=".serialize($anio)."&quincena=".serialize($quincena));
    }

   

} //fin función ver aprobadas








public function eliminar()
{
  extract($_REQUEST);//extrayendo variables del url
  $db=new clasedb();
  $conex=$db->conectar();//conectando con la base de datos

  $sql="DELETE FROM pre_nomina WHERE id=".$id_prenomina;

    $res=mysqli_query($conex,$sql);
    $sql="INSERT INTO auditoria VALUES (NULL, '".$_SESSION['id_usuario']."', 'eliminó quincena', 'pre_nomina', CURRENT_TIMESTAMP, '".$_SESSION['tipo_usuario']."')";

		$resultado=mysqli_query($conex,$sql);
    if ($res) {
      ?>
        <script type="text/javascript">
          alert("Registro eliminado");
          window.location="ControladorPreNomina.php?operacion=prenomina";
        </script>
      <?php
    } else {
      ?>
        <script type="text/javascript">
          alert("Registro no eliminado");
          window.location="ControladorPreNomina.php?operacion=prenomina";
        </script>
      <?php
    }
}//fin de la función eliminar

public function pdfindinomina(){

  extract($_REQUEST);//extrayendo variables del url
  $db=new clasedb();
  $conex=$db->conectar();//conectando con la base de datos

  
  

}

static function controlador($operacion){
		$pago=new ControladorPreNomina();
		
	switch ($operacion) {
		case 'prenomina':
			$pago->prenomina();
			break;

		case 'generar':
			$pago->generar();
			break;

		case 'aprobar':
			$pago->aprobar();
			break;

		case 'ver':
			$pago->ver();
			break;

		case 'veraprobadas':
			$pago->veraprobadas();
			break;

		case 'aprobadas':
			$pago->aprobadas();
			break;

		case 'eliminar':
			$pago->eliminar();
			break;

		case 'pdfindinomina':
			$pago->pdfindinomina();
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