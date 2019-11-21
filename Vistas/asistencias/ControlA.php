<?php 
include("../../Modelos/clasedb.php");
extract($_REQUEST);

class ControlA
{

public function index() {
extract($_REQUEST);
$dia = date("l");
$dia_es="";
$cont=0;
switch ($dia) {
    case "Sunday":
           $dia_es="Domingo";
    break;
    case "Monday":
           $dia_es="Lunes";
    break;
    case "Tuesday":
           $dia_es="Martes";
    break;
    case "Wednesday":
           $dia_es="Miércoles";
    break;
    case "Thursday":
           $dia_es="Jueves";
    break;
    case "Friday":
           $dia_es="Viernes";
    break;
    case "Saturday":
           $dia_es="Sábado";
    break;
	}
    $db=new clasedb();
    $conex=$db->conectar();
    
    //consulta de los empleados que trabajan el dia de hoy//
    $sql="SELECT  empleado.id,empleado.nombres,empleado.apellidos,empleado.cedula,dia_lab.id AS id_dia_lab FROM empleado, dia_lab WHERE dia_lab.id_empleado=empleado.id && dia_lab.nombre LIKE '%".$dia_es."%'";
    //echo $sql;
    $result=mysqli_query($conex,$sql);
    $filas=mysqli_num_rows($result);
    $campos=mysqli_num_fields($result);
    $empleados[]=array();
    $i=0;
    if ($res=mysqli_query($conex,$sql)) {
    while ($data=mysqli_fetch_array($result)) {
    	for ($j=0; $j < $campos ; $j++) { 
    		$empleados[$i][$j]=$data[$j];
    	}
    	$i++;	
    }
    //buscando empleados en la tabla asistencia
    $hoy=date('Y-m-d');
    for ($i=0; $i < $filas; $i++) { 
    	
    	$sql2="SELECT * FROM asistencias WHERE id_empleado=".$empleados[$i][0]." && fecha_hora LIKE '%".$hoy."%'";
    	/*echo $sql2;*/
    	$buscar=mysqli_query($conex,$sql2);
  
    	if (mysqli_num_rows($buscar)==0)  {
            $hallado=$this->BuscandoPermiso($empleados[$i][0]);
            if ($hallado==false) {
                $sql3="INSERT INTO asistencias VALUES(NULL,".$empleados[$i][0].",'".$hoy."','Sin Marcar','')";

            $registro=mysqli_query($conex,$sql3);
            } 
            
    		
    	}


    }
    //buscando los registros en asistencias
    $sql4="SELECT asistencias.id,empleado.nombres,empleado.apellidos,empleado.cedula,asistencias.status,asistencias.justificacion FROM empleado, asistencias WHERE asistencias.id_empleado=empleado.id && asistencias.fecha_hora LIKE '%".$hoy."%'";

  
    $result=mysqli_query($conex,$sql4);
    $filas=mysqli_num_rows($result);
    $campos=mysqli_num_fields($result);
    $asistencia[]=array();
    $i=0;
    if ($res=mysqli_query($conex,$sql)) {
    while ($data=mysqli_fetch_array($result)) {
    	for ($j=0; $j < $campos ; $j++) { 
    		$asistencia[$i][$j]=$data[$j];
    	}
    	$i++;	
    }


	}else{
		$cont++;
	}

$sql3="SELECT justificacion FROM asistencias";
    if ($res3=mysqli_query($conex,$sql3)) {
      # se ejecutó la consulta
      $campos_a=mysqli_num_fields($res3);
      $filas_a=mysqli_num_rows($res3);
      $justificacion[]=array();
      $i=0;
      while ($data3=mysqli_fetch_array($res3)) {
        for ($j=0; $j < $campos_a; $j++) { 
          $justificacion[$i][$j]=$data3[$j];
        }
        $i++;
      }
  }

    } else {
      # no se ejecutó la consulta
      $cont++;
    }
     if ($cont==0){
		//enviando datos
		header("Location: asistencia.php?filas=".$filas."&campos=".$campos."&data=".serialize($asistencia)."&campos_a=".$campos_a."&filas_a=".$filas_a."&justificacion=".serialize($justificacion));
	}else{
		echo "Error en la Base de Datos";
	}
}//fin de la funcion index



	public function eliminar()
	{
		extract($_REQUEST);
		$db=new clasedb;
		$conex=$db->conectar();
		$sql="DELETE FROM asistencias WHERE id=".$id_asistencias;
		
	$res=mysqli_query($conex,$sql);
		if ($res) {
			?>
				<script type="text/javascript">
					alert("Registro eliminado");
					window.location="ControlA.php?operacion=index";
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("Registro no pudo ser eliminado, Vuelva a intentarlo!");
					window.location="ControlA.php?operacion=index";
				</script>
			<?php
		}
	}

protected function BuscandoPermiso($id_empleado){
$db=new clasedb();
$conex=$db->conectar();
/*
consultando permisos*/

$sql="SELECT inicio_permiso, resta FROM permisos WHERE status='En Curso' AND id_empleado=".$id_empleado." ORDER BY id DESC LIMIT 0,1";

$res=mysqli_query($conex,$sql);
$rows=mysqli_num_rows($res);
if ($rows>0) {
$data=mysqli_fetch_object($res);

/*consultando dias restantes del permiso*/
    $hoy=date('Y-m-d');
    $sql2="SELECT DATEDIFF('$hoy','$data->inicio_permiso') AS dias, cantidad_dias,id, resta FROM permisos WHERE status='En Curso' AND id_empleado=".$id_empleado;

    $resul=mysqli_query($conex,$sql2);
  
    $hallado=mysqli_num_rows($resul);

    if ($hallado>0) {
        $datos=mysqli_fetch_assoc($resul);

        if (($datos['dias'])==$datos['cantidad_dias']) {
           
            $resta=0;
            $status='Cumplido';
            $id_permiso=$datos['id'];

            $sql="UPDATE permisos SET resta='$resta', status='$status' WHERE id=$id_permiso";
            mysqli_query($conex,$sql);
            return true;

        } elseif (($datos['dias'])< $datos['cantidad_dias'])   {
            $resta=$datos['cantidad_dias']-$datos['dias'];
            $id_permiso=$datos['id'];

            $sql="UPDATE permisos SET resta='$resta' WHERE id=$id_permiso";
            mysqli_query($conex,$sql);
            return true;
        }
        
    } else {
        return false;
    }
    

//si la resta del permiso es igual a 0 el permiso termino//

    /*if ($dias==0) {

       $sql3="UPDATE permisos SET status='Cumplido' WHERE id_empleado=".$id_empleado;
        $resultado=mysqli_query($conex,$sql3);

     } else{

        $sql="";
      }
*/   }//condicional 1
} //fin de la funcion buscando permisos
  
public function asistencia()
{
extract($_POST);
 $db=new clasedb();
$conex=$db->conectar();

if ($opcion=="asiste") {
   $sql="UPDATE asistencias SET status='A', justificacion='' WHERE id=".$id_asistencia;
} else {

    if ($justificacion!=="") {
        $sql="UPDATE asistencias SET status='NACJ', justificacion='".$justificacion."' WHERE id=".$id_asistencia;
    } else {
        $sql="UPDATE asistencias SET status='NASJ' WHERE id=".$id_asistencia;
    }
    
}
//echo $sql;
 $res=mysqli_query($conex,$sql);

 if ($res) {
            ?>
                <script type="text/javascript">
                    alert("Exitoso!");
                    window.location="ControlA.php?operacion=index";
                </script>
            <?php
        } else {
            ?>
                <script type="text/javascript">
                    alert("Fallido!");
                    window.location="ControlA.php?operacion=index";
                </script>
            <?php
        }
}

public function consulta(){
    extract($_POST);
    $db=new clasedb();
    $conex=$db->conectar();
    

$sql="SELECT * FROM asistencias WHERE fecha_hora LIKE '%".$fecha."%'";
 
 if ($res=mysqli_query($conex,$sql)) {
    $campos=mysqli_num_fields($res);//cuantos campos trae la consulta
    $filas=mysqli_num_rows($res);//cuantas filas trae la consulta
        $i=0;
    
    $datos[]=array();

    while($data=mysqli_fetch_array($res)){
            for ($j=0; $j < $campos; $j++) { 
                $datos[$i][$j]=$data[$j];
            } 
            $i++;
        }
        
            
                   header("Location: consulta.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
               
        } else {
            ?>
                <script type="text/javascript">
                    alert("Fallido!");
                    window.location="ControlA.php?operacion=index";
                </script>
            <?php
        }

}// fin de la funcion consulta


public function permisos(){
     extract($_POST);
    $db=new clasedb();
    $conex=$db->conectar();

    $sql="SELECT empleado.nombres, empleado.cedula, permisos.status, permisos.cantidad_dias, permisos.motivo, permisos.inicio_permiso FROM permisos, empleado WHERE empleado.id=permisos.id_empleado";

    $resul=mysqli_query($conex,$sql);
    $filas=mysqli_num_rows($resul);
    $campos=mysqli_num_fields($resul);
    $permisos[]=array();
    $i=0;
    if ($res=mysqli_query($conex,$sql)) {
    while ($data=mysqli_fetch_array($resul)) {
        for ($j=0; $j < $campos ; $j++) { 
            $permisos[$i][$j]=$data[$j];
        }
        $i++;   
          }

         header("Location:permisos.php?filas=".$filas."&campos=".$campos."&data=".serialize($permisos));
               
        } else {
            ?>
                <script type="text/javascript">
                    alert("Error en la conexion!");
                    window.location="ControlA.php?operacion=index";
                </script>
            <?php
        }

}//fin de la funcion permisos

static function controlador($operacion) {
		$asis=new ControlA();
		switch($operacion) {
			
		case 'index':
		$asis->index();
		break;
		

		case 'eliminar':
 			$asis->eliminar();
 			break;

        case 'consulta':
        $asis->consulta();
        break;
		
        case 'asistencia':
        $asis->asistencia();
        break;

        case 'permisos':
        $asis->permisos();
        break;
		default: 
		?>
		<script type="text/javascript">
			alert("La ruta no existe");
			window.location="ControlA.php?operacion=index";
		</script>
	<?php
	break;
	}

} 
} 

ControlA::controlador($operacion);


?> 