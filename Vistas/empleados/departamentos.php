
<?php

include("../../Modelos/clasedb.php");
$db=new clasedb();//instanciando clasedb
$conex=$db->conectar();//conectando con la base de datos

$id=$_POST['id_cargo'];

$sql1="SELECT nombre FROM cargos WHERE id=".$id;

$resul=mysqli_query($conex,$sql1);
$filas=mysqli_fetch_assoc($resul);

$cargo=$filas['nombre'];

$sql="SELECT cargos.id_departamento, departamentos.nombre FROM departamentos, cargos WHERE cargos.id_departamento=departamentos.id AND cargos.nombre='".$cargo."'";

$resultado=mysqli_query($conex,$sql);


while ($fila=mysqli_fetch_assoc($resultado)) {

	$html='<option value="$fila["id_departamento"]">'.$fila["nombre"].'</option>';
    echo($html);
}




	







?>