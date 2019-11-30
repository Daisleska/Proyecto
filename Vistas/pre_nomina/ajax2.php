<?php

include("../../Modelos/clasedb.php");
$db=new clasedb();//instanciando clasedb
$conex=$db->conectar();//conectando con la base de datos

$cedula=$_POST['cedula'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];

$sql="SELECT id FROM empleado WHERE cedula='$cedula' AND nombres='$nombres' AND apellidos='$apellidos'";
$resultado=mysqli_query($conex,$sql);
$fila=mysqli_fetch_assoc($resultado);
$id=$fila['id'];

$html='<table border="1" width="750" >
       	<caption></caption>                        
        <tr>
            <td colspan="3"  style="text-align: center; background-color: black; color: white;">ASIGNACIONES</td>
        </tr>';

//salario
$sql="SELECT empleado.*,cargos.nombre,cargos.salario FROM empleado, cargos WHERE empleado.id_cargo=cargos.id AND empleado.id='$id'";
$resultado=mysqli_query($conex,$sql);
$fila=mysqli_fetch_assoc($resultado);
$salarioTotal=$fila['salario'];
$salario=$fila['salario']/2;


$html.='<tr>
            <td>Sueldo base:</td>
            <td><span id="salario" style="font-weight: normal;">'.number_format($salario,2,',','.').'</span> Bs.S</td>
        </tr>';

//cestaticket
$sql="SELECT * FROM cestaticket";
$resultado=mysqli_query($conex,$sql);
$fila=mysqli_fetch_assoc($resultado);
$cestaticket=$fila['monto'];
$html.='<tr>
            <td>Cestaticket:</td>
            <td><span style="font-weight: normal;">'.number_format($cestaticket,2,',','.').'</span> Bs.S</td>
        </tr>';


//asignaciones
$sql="SELECT asignacion_deduccion.descripcion, asignacion_deduccion.monto FROM empleado INNER JOIN empleado_asig ON empleado.id=empleado_asig.id_empleado INNER JOIN asignacion_deduccion ON empleado_asig.id_asignaciones=asignacion_deduccion.id WHERE empleado.id='$id' AND asignacion_deduccion.tipo='Asignacion'";
$resultado=mysqli_query($conex,$sql);
while ($fila=mysqli_fetch_assoc($resultado)) {
	$html.='<tr>
				<td><span style="font-weight: normal;">'.$fila["descripcion"].'</span></td>
        		<td><span id="identificador" style="font-weight: normal;">'.number_format($fila["monto"],2,',','.').'</span> Bs.S</td>
        	</tr>';
}

$sql="SELECT SUM(asignacion_deduccion.monto) AS total FROM empleado INNER JOIN empleado_asig ON empleado.id=empleado_asig.id_empleado INNER JOIN asignacion_deduccion ON empleado_asig.id_asignaciones=asignacion_deduccion.id WHERE empleado.id='$id' AND asignacion_deduccion.tipo='Asignacion'";
$resultado=mysqli_query($conex,$sql);
$fila=mysqli_fetch_assoc($resultado);
$total=$fila['total']+$salario+$cestaticket;

$html.='<tr>
	        <td>Total de Asignaciones:</td>
	        <td ><span id="asignaciones" style="font-weight: normal;">'.number_format($total,2,',','.').'</span> Bs.S</td>
	    </tr>';


    $anio=date("Y");
    $mes=date("m");
    $fecha=$anio."-".$mes."-16";
    $timestamp = strtotime( $fecha );
    $diasdelmes = date( "t", $timestamp );
    $fecha2=$anio."-".$mes. "-".$diasdelmes;

$sql="SELECT COUNT(status) AS inasistencias FROM asistencias WHERE status='NASJ' AND fecha_hora BETWEEN $fecha AND $fecha2 AND id_empleado='$id'";
$resultado=mysqli_query($conex,$sql);
$fila=mysqli_fetch_assoc($resultado);

$inasistencias=$fila['inasistencias'];
$diast=$salarioTotal/30;//valor de un día de trabajo
$inasistencia=$inasistencias*$diast;//monto total de inasistencias 

$html.='</tr>
             <td colspan="3" style="text-align: center; background-color: black; color: white;">DEDUCCIONES</td>
        </tr>
        <tr>
            <td>Inasistencias: </td>
            <td><span id="inasistencia" style="font-weight: normal;">'.number_format($inasistencia,2,',','.').'</span> Bs.S</td>
        </tr>';

//inasistencia del mes
    $anio=date("Y");
    $mes=date("m");
    $fecha=$anio."-".$mes."-01";
    $timestamp = strtotime( $fecha );
    $diasdelmes = date( "t", $timestamp );
    $fecha2=$anio."-".$mes. "-".$diasdelmes;


$sql="SELECT COUNT(status) AS inasistencias_mes FROM asistencias WHERE status='NASJ' AND fecha_hora BETWEEN $fecha AND $fecha2 AND id_empleado='$id'";
$resultado=mysqli_query($conex,$sql);
$fila=mysqli_fetch_assoc($resultado);

$inasistencias_mes=$fila['inasistencias_mes'];
$diasc=$cestaticket/30;
$inasistencia_mes=$inasistencias_mes*$diasc;//monto total de inasistencias del mes

$html.='<tr>
            <td>Inasistencias del Mes: </td>
            <td><span style="font-weight: normal;">'.number_format($inasistencia_mes,2,',','.').'</span> Bs.S</td>
        </tr>';

//deducciones
$sql="SELECT asignacion_deduccion.descripcion, asignacion_deduccion.monto FROM empleado INNER JOIN empleado_asig ON empleado.id=empleado_asig.id_empleado INNER JOIN asignacion_deduccion ON empleado_asig.id_asignaciones=asignacion_deduccion.id WHERE empleado.id='$id' AND asignacion_deduccion.tipo='Deduccion'";
$resultado=mysqli_query($conex,$sql);
while ($fila=mysqli_fetch_assoc($resultado)) {
	$html.='<tr>
				<td><span style="font-weight: normal;">'.$fila["descripcion"].'</span></td>
        		<td><span style="font-weight: normal;">'.number_format($fila["monto"],2,',','.').'</span> Bs.S</td>
        	</tr>';
}

$sql="SELECT SUM(asignacion_deduccion.monto) AS total FROM empleado INNER JOIN empleado_asig ON empleado.id=empleado_asig.id_empleado INNER JOIN asignacion_deduccion ON empleado_asig.id_asignaciones=asignacion_deduccion.id WHERE empleado.id='$id' AND asignacion_deduccion.tipo='Deduccion'";
$resultado=mysqli_query($conex,$sql);
$fila=mysqli_fetch_assoc($resultado);
$total2=$fila['total']+$inasistencia+$inasistencia_mes;

$total3=$total-$total2;

$html.='<tr>
	        <td>Total de Deducciones:</td>
	        <td ><span id="deducciones" style="font-weight: normal;">'.number_format($total2,2,',','.').'</span> Bs.S</td>
	    </tr>
	    <tr>
	        <td style="background-color:    #cfcfcf; color: black;">Total a Pagar:</td>
	        <td style="background-color:        #cfcfcf;"><span id="sueldo_neto" style="font-weight: normal;">'.number_format($total3,2,',','.').'</span> Bs.S</td>
	    </tr>
	</table>';

echo($html);

?>