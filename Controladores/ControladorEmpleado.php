<?php 
include("../Modelos/clasedb.php");

extract($_REQUEST);


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

  header("Location: ../Vistas/empleados/registrar.php");
}//fin registrar

public function guardar(){
    extract($_POST);

    $db=new clasedb();
    $conex=$db->conectar();

      $sql="SELECT * FROM empleado WHERE ci_e='".$ci_e."'"; 
      $result=mysqli_query($conex,$sql);
      $cuantos=mysqli_num_rows($result);

if ($cuantos>0){
      ?>
      <script type="text/javascript">
        alert("El empleado ya se encuentra registrado");
        window.location="ControladorEmpleado.php?operacion=registrar";
      </script>
        <?php
      }   
      else {

     $sql="INSERT INTO empleado (ci_e , nombres_e, apellidos_e, direccion_e, telefono_e, $fecha_ingreso_e, condicion_e, fecha_venc_e, cargo_e, salario_e, ncuenta_e) VALUES ('$ci_e','$nombres_e','$apellidos_e','$direccion_e','$telefono_e','$fecha_ingreso_e', '$condicion_e', '$fecha_venc_e', '$cargo_e', '$salario_e', '$ncuenta_e')";

  $resultado=mysqli_query($conex,$sql);
  
  if($resultado) {

    ?> 

      <script type="text/javascript">
        alert("Se registro éxitosamente");
        window.location="../home.php";
      </script>
      <?php 
  
  } else { 
    ?> 

      <script type="text/javascript">
        alert("Registro fallido");
      </script>
    <?php 
      }
        } 
      }

public function modificar(){
  extract($_REQUEST);//extrayendo valores de url
  $db=new clasedb();
  $conex=$db->conectar();//conectando con la base de datos
  
  $sql="SELECT * FROM empleado WHERE ci_e=".$ci_e."";
  $res=mysqli_query($conex,$sql);//ejecutando consulta
  $data=mysqli_fetch_array($res);//extrayendo datos en array

  header("Location: ../Vistas/empleados/modificar.php?data=".serialize($data));
}
public function actualizar()
{
  extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
  $db=new clasedb();
  $conex=$db->conectar();//conectando con la base de datos
  


 $sql="UPDATE empleado SET ci_e='".$ci_e."',nombres_e='".$nombres_e."',apellidos_e='".$apellidos_e."',direccion_e='".$direccion_e."',telefono_e='".$telefono_e."' ,fecha_ingreso_e='".$fecha_ingreso_e."' ,condicion_e='".$condicion_e."',fecha_venc_e='".$fecha_venc_e."' ,cargo_e='".$cargo_e."' ,salario_e='".$salario_e."' ,ncuenta_e='".$ncuenta_e."' WHERE id=".$id_e;

      $res=mysqli_query($conex,$sql);
        if ($res) {
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

  $sql="DELETE FROM empleado WHERE ci_e=".$ci_e;

    $res=mysqli_query($conex,$sql);
    if ($res) {
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