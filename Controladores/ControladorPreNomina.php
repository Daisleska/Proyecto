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


public function generar(){
	
	$db=new clasedb();
	$conex=$db->conectar();
	$i=1;
    $sql="INSERT INTO `pre_nomina` (`id`, `quincena`, `status`) VALUES (NULL, CURDATE(), ".$i.")";

    $result=mysqli_query($conex,$sql);//esto funciona


    $consulta="SELECT * FROM pre_nomina";
    $rs=mysqli_query($conex,$consulta);
    $id_prenomina=mysqli_insert_id($conex);//obteniendo el último id generado
	/*/echo $id_prenomina;/*/
    
    $sql2="SELECT * FROM empleado";

    $res=mysqli_query($conex,$sql2);

	$i=0;

	while($data=mysqli_fetch_array($res)){

   
         $sql3="INSERT INTO `prenomina_empleado` (`id`, `id_prenomina`, `id_empleado`) VALUES (NULL,  ".$id_prenomina.", ".$i.")";

         $resultado=mysqli_query($conex,$sql3);

         //echo $sql3;

      $i++;
     }
     

  
}//fin de la funcion generar




static function controlador($operacion){
		$pago=new ControladorPreNomina();
	switch ($operacion) {
		case 'prenomina':
			$pago->prenomina();
			break;

		case 'generar':
			$pago->generar();
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