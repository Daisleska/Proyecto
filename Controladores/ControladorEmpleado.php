<?php 
include("../Modelos/clasedb.php");

extract($_REQUEST);
session_start();

class ControladorEmpleado
{
  

public function index(){
  $db=new clasedb();//instanciando clasedb
  $conex=$db->conectar();//conectando con la base de datos

  $sql="SELECT * FROM empleado,cargos,departamentos WHERE empleado.id_cargo=cargos.id AND cargos.id_departamento=departamentos.id";//query

  //ejecutando query
  if ($res=mysqli_query($conex,$sql)) {
    //echo "entro";
    $campos=mysqli_num_fields($res);//cuantos campos trae la consulta 
    $filas=mysqli_num_rows($res);//cuantos registro trae la consulta
    $i=0;
    $datos[]=array();//inicializando array
    //extrayendo datos
    while($data=mysqli_fetch_array($res)){
      for ($j=0; $j <$campos ; $j++) { 
        $datos[$i][$j]=$data[$j];
      }
      $i++;
    }
    
      header("Location: ../Vistas/empleados/index.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
  } else {
    echo "Error en la BD";
  }
  
  
    //enviando datos
}//fin de la funcion index
public function registrar(){
  $db=new clasedb();
  $conex=$db->conectar();
  $cont=0; //para contar si no se ejecutaron consultas
  //consulta de categorias
    $sql="SELECT * FROM cargos";
    if ($res=mysqli_query($conex,$sql)) {
      # se ejecutó la consulta
      $campos_cat=mysqli_num_fields($res);
      $filas_cat=mysqli_num_rows($res);
      $cargos[]=array();
      $i=0;
      while ($data=mysqli_fetch_array($res)) {
        for ($j=0; $j < $campos_cat; $j++) { 
          $cargos[$i][$j]=$data[$j];
        }
        $i++;
      }
    } else {
      # no se ejecutó la consulta
      $cont++;
    }
    
  //-------
  // consulta de tipos
    $sql2="SELECT * FROM departamentos";
    if ($res2=mysqli_query($conex,$sql2)) {
      # se ejecutó la consulta
      $campos_tip=mysqli_num_fields($res2);
      $filas_tip=mysqli_num_rows($res2);
      $departamentos[]=array();
      $i=0;
      while ($data2=mysqli_fetch_array($res2)) {
        for ($j=0; $j < $campos_tip; $j++) { 
          $departamentos[$i][$j]=$data2[$j];
        }
        $i++;
      }

    } else {
      # no se ejecutó la consulta
      $cont++;
    }
    
  //----consulta 3---

$sql3="SELECT * FROM asignacion_deduccion";
    if ($res3=mysqli_query($conex,$sql3)) {
      # se ejecutó la consulta
      $campos_asi=mysqli_num_fields($res3);
      $filas_asi=mysqli_num_rows($res3);
      $asignaciones[]=array();
      $i=0;
      while ($data3=mysqli_fetch_array($res3)) {
        for ($j=0; $j < $campos_asi; $j++) { 
          $asignaciones[$i][$j]=$data3[$j];
        }
        $i++;
      }

    } else {
      # no se ejecutó la consulta
      $cont++;
    }

    if ($cont==0) {
      # se ejecutó
      header("Location: ../Vistas/empleados/registrar.php?campos_cat=".$campos_cat."&filas_cat=".$filas_cat."&cargos=".serialize($cargos)."&campos_tip=".$campos_tip."&filas_tip=".$filas_tip."&departamentos=".serialize($departamentos)."&campos_asi=".$campos_asi."&filas_asi=".$filas_asi."&asignaciones=".serialize($asignaciones));
    } else {
      # hubo un error
      echo "error hector";
     /* header("Location: ../index.php"*/
    }
    
}//fin registrar

public function guardar(){

  
    extract($_POST);
    $cedu=$_POST['cod_rif'];
    $la=$_POST['cedula'];
    

    $connect=mysqli_connect("localhost", "root", "" , "servidata");
    $db=new clasedb();
    $conex=$db->conectar();


      $sql="SELECT * FROM empleado WHERE cedula='".$cedu.$la."'"; 
      $result=mysqli_query($conex,$sql);
      $cuantos=mysqli_num_rows($result);
     

if ($cuantos>0){
      ?>
      <script type="text/javascript">
        alert("El empleado ya se encuentra registrado");
        window.location="ControladorEmpleado.php?operacion=registrar";
      </script>
        <?php
       
      }  else {
        $xx="INSERT INTO empleado VALUES (NULL,'".$cod_rif.$cedula."','".$nombres."','".$apellidos."','".$direccion."','".$telefono."','".$fecha_ingreso."', '".$condicion."', '".$fecha_venc."', '".$ncuenta."', ".$id_cargo.", ".$id_departamento.")";
        //echo $xx;
     $sql=mysqli_query($connect  ,$xx);
     $id_empleado=mysqli_insert_id($connect);
    }  
     
 

if ($_POST['checkbox'] !="")
 {
  if (is_array($_POST['checkbox']))
   {
    //realizamos el ciclo
    while(list ($key,$value)= @each($_POST['checkbox'])) 
    {
      $sql2=mysqli_query($connect  ,"INSERT INTO dia_lab (id_empleado, nombre) VALUES ('".$id_empleado."', ' ".$value."')");
    }
  }
}


if ($_POST['asignaciones'] !="")
 {
  if (is_array($_POST['asignaciones']))
   {
    //realizamos el ciclo
    while(list ($key,$valor)= each($_POST['asignaciones'])) 
    {
      $sql3=mysqli_query($connect  ,"INSERT INTO empleado_asig (id_empleado, id_asignaciones) VALUES ('".$id_empleado."', ' ".$valor."')");
    }
  }
}
  
  if($sql and $sql2 and $sql3 ) {

     $sql="INSERT INTO auditoria VALUES (NULL, '".$_SESSION['id_usuario']."', 'registró empleados', 'empleados', CURRENT_TIMESTAMP, '".$_SESSION['tipo_usuario']."')";

    $resultado=mysqli_query($conex,$sql);
    ?> 


    <script type="text/javascript">
        alert("Se registro éxitosamente");
        window.location="ControladorEmpleado.php?operacion=index";      
      </script>
      <?php 
  
  }else { 
    ?> 

      <script type="text/javascript">
        alert("Registro fallido");
         window.location="ControladorEmpleado.php?operacion=registrar";
      </script>
    <?php 
      }
 } //fin de guardar
      
      
  

public function modificar(){
  extract($_REQUEST);//extrayendo valores de url
  $db=new clasedb();
  $conex=$db->conectar();//conectando con la base de datos
  
  $sql="SELECT empleado.id,empleado.cedula, empleado.nombres, empleado.apellidos, empleado.direccion, empleado.telefono, empleado.fecha_ingreso, empleado.condicion, empleado.fecha_venc, empleado.ncuenta FROM empleado WHERE empleado.id=".$id_empleado."";


  $res=mysqli_query($conex,$sql);//ejecutando consulta
  $data=mysqli_fetch_array($res);//extrayendo datos en array
    
  //-------
  // consulta de tipos
    $sql2="SELECT * FROM departamentos";
    if ($res2=mysqli_query($conex,$sql2)) {
      # se ejecutó la consulta
      $campos_tip=mysqli_num_fields($res2);
      $filas_tip=mysqli_num_rows($res2);
      $departamentos[]=array();
      $i=0;
      while ($data2=mysqli_fetch_array($res2)) {
        for ($j=0; $j < $campos_tip; $j++) { 
          $departamentos[$i][$j]=$data2[$j];
        }
        $i++;
      }

    }

  header("Location: ../Vistas/empleados/modificar.php?data=".serialize($data)."&campos_tip=".$campos_tip."&filas_tip=".$filas_tip."&departamentos=".serialize($departamentos));
}
public function actualizar()
{
  extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
  $db=new clasedb();
  $conex=$db->conectar();//conectando con la base de datos
  


 $sql="UPDATE empleado SET cedula='".$cedula."',nombres='".$nombres."',apellidos='".$apellidos."',direccion='".$direccion."',telefono='".$telefono."' ,fecha_ingreso='".$fecha_ingreso."' ,condicion='".$condicion."',fecha_venc='".$fecha_venc."' ,ncuenta='".$ncuenta."' WHERE id=".$id;

      $res=mysqli_query($conex,$sql);
        if ($res) {
          $sql="INSERT INTO auditoria VALUES (NULL, '".$_SESSION['id_usuario']."', 'modificó empleados', 'empleados', CURRENT_TIMESTAMP, '".$_SESSION['tipo_usuario']."')";

           $resultado=mysqli_query($conex,$sql);
          ?>
            <script type="text/javascript">
              alert("Registro modificado");
              window.location="ControladorEmpleado.php?operacion=index";
            </script>
          <?php
        } else {
          ?>
            <script type="text/javascript">
              alert("Error al modificar el registro");
              window.location="ControladorEmpleado.php?operacion=index";
            </script>
          <?php
        }

}//fin de la función actualizar
public function eliminar()
{
  extract($_REQUEST);//extrayendo variables del url
  $db=new clasedb();
  $conex=$db->conectar();//conectando con la base de datos

  $sql="DELETE FROM empleado WHERE id=".$id_empleado;

    $res=mysqli_query($conex,$sql);
    if ($res) {
      $sql="INSERT INTO auditoria VALUES (NULL, '".$_SESSION['id_usuario']."', 'eliminó empleados', 'empleados', CURRENT_TIMESTAMP, '".$_SESSION['tipo_usuario']."')";

    $resultado=mysqli_query($conex,$sql);
      ?>
        <script type="text/javascript">
          alert("Registro eliminado");
          window.location="ControladorEmpleado.php?operacion=index";
        </script>
      <?php
    } else {
      ?>
        <script type="text/javascript">
          alert("Registro no eliminado");
          window.location="ControladorEmpleado.php?operacion=index";
        </script>
      <?php
    }
}//fin de la función eliminar


public function asignar_horario()
{
  $db=new clasedb();
  $conex=$db->conectar();
 extract($_REQUEST);
  $sql="SELECT empleados_has_dias_lab.dia, empleados_has_dias_lab.id, empleado.cedula FROM empleados_has_dias_lab, empleado WHERE empleado.id=".$id_empleado." "; 

    
    if ($result=mysqli_query($conex,$sql)) {
    $dia[]=array();
    $row_dia=mysqli_num_rows($result);
    
    $i=0;
    while ($data=mysqli_fetch_array($result)) {
      for ($j=0; $j <=3; $j++) { 
        $dia[$i][$j]=$data[$j];
      }
      $i++;   
    }
      header('Location: ../Vistas/empleados/registrar_horario.php?row_dia='.$row_dia.' &dia='.serialize($dia));  
    } else {
      echo "Error en la Base de Datos";
    }
  
  }


public function horario (){
   extract($_POST);

    $db=new clasedb();
    $conex=$db->conectar();
    $sql="INSERT INTO empleados_has_dias_lab (id_empleado, dia, id)  VALUES( ".$id_empleado.", ".$id_dia.",'No')";
       $res=mysqli_query($conex,$sql);
      $resultado=mysqli_num_rows($res);
      
  
 if($resultado) {

    ?> 

      <script type="text/javascript">
        alert("Se Guardo éxitosamente");
        window.location="ControladorEmpleado.php?operacion=index";
      </script>
      <?php 
  
  } else { 
    ?> 

      <script type="text/javascript">
        alert("Error al conectar con la BD");
        window.location="ControladorEmpleado.php?operacion=index";
      </script>
    <?php 
      }
    }// fin de la funcion horario


    public function verhorario(){
   extract($_REQUEST);
  $db=new clasedb();
  $conex=$db->conectar();

  $sql="SELECT DISTINCT empleado.cedula,empleado.nombres, empleado.apellidos, dia_lab.nombre FROM empleado,dia_lab WHERE empleado.cedula=".$cedula."";
  
  if ($res=mysqli_query($conex,$sql)) {
    
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

    header("Location: ../Vistas/diaslab/index.php?campos=".$campos."&filas=".$filas."&data=".serialize($datos));

  } else {
    //en caso de no pasar la consulta
    header("error en la BD");
  }
  
}//fin de verhorario

public function vermas (){
  extract($_REQUEST);

  $db=new clasedb();//instanciando clasedb
  $conex=$db->conectar();//conectando con la base de datos

 $sql="SELECT empleado.cedula, empleado.nombres, empleado.apellidos, empleado.direccion, empleado.telefono, empleado.fecha_ingreso, empleado.condicion, empleado.fecha_venc, empleado.ncuenta, cargos.nombre, departamentos.nombre FROM empleado,cargos,departamentos WHERE empleado.id_cargo=cargos.id AND cargos.id_departamento=departamentos.id AND empleado.id=".$id_empleado."";//query

  //ejecutando query
  if ($res=mysqli_query($conex,$sql)) {
    //echo "entro";
    $campos=mysqli_num_fields($res);//cuantos campos trae la consulta 
    $filas=mysqli_num_rows($res);//cuantos registro trae la consulta
    $i=0;
    $datos[]=array();//inicializando array
    //extrayendo datos
    while($data=mysqli_fetch_array($res)){
      for ($j=0; $j <$campos ; $j++) { 
        $datos[$i][$j]=$data[$j];
      }
      $i++;
    }
    
      header("Location: ../Vistas/empleados/vermas.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));

  } else {
    echo "Error en la BD....";
  }
  
}//fin de la funcion ver mas


static function controlador($operacion){
    $empleado=new ControladorEmpleado();
  switch ($operacion) {
    case 'index':

      $empleado->index();
      break;
    case 'registrar':
      $empleado->registrar();
      break;
    case 'guardar':
      $empleado->guardar();
      break;
    case 'modificar':
      $empleado->modificar();
      break;
    case 'actualizar':
      $empleado->actualizar();
      break;
    case 'eliminar':
      $empleado->eliminar();
      break;

      case 'asignar_horario':
      $empleado->asignar_horario();
      break;


      case 'horario':
      $empleado->horario();
      break;

      case 'verhorario':
      $empleado->verhorario();
      break;


    case 'vermas':
      $empleado->vermas();
      break;
    
    default:
      ?>
        <script type="text/javascript">
          alert("No existe la ruta");
          window.location="ControladorEmpleado.php?operacion=index";
        </script>
      <?php
      break;
  }//cierre del switch
}//cierre de la funcion controlador
}//cierre de la clase


ControladorEmpleado::controlador($operacion);

?>