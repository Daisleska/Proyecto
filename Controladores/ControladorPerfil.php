<?php
include("../Modelos/clasedb.php");
session_start();
extract($_REQUEST);

class ControladorPerfil{


	static function controlador($operacion)
{
	$perfil=new ControladorPerfil();
	switch ($operacion) {
		case 'cambiar_clave':
			$perfil->cambiar_clave();
			break;

		case 'actualizar_clave':
			$perfil->actualizar_clave();
			break;

		case 'verperfil':
			$perfil->verperfil();
			break;

		case 'modificar':
			$perfil->modificar();
			break;

		case 'actualizar':
			$perfil->actualizar();
			break;



	

		default:
			?>
				<script type="text/javascript">
					alert("No existe la ruta");
					window.location="../home/home.php";
				</script>
			<?php
			break;
	}//cierre del switch
}//fin de la funcion controlador

public function cambiar_clave()
{
	extract($_REQUEST);//extrayendo valores de url
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	$sql="SELECT clave FROM usuarios WHERE usuarios.id=".$_SESSION['id_usuario'];;
	$res=mysqli_query($conex,$sql);//ejecutando consulta
	$data=mysqli_fetch_array($res);//extrayendo datos en array

	header("Location: ../Vistas/config/cambiarclave.php?data=".serialize($data));
}

public function actualizar_clave()
{
    extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();
   
   if ($clave=="" || $clave_nueva_confirm=="") {
   
   ?>
    <script type="text/javascript">
    	alert("Los campos de clave no deben estar vacios");
		window.location="ControladorPerfil.php?operacion=cambiar_clave";
    </script>

   <?php 
   }else
   {
   	$sql="SELECT clave FROM usuarios WHERE usuarios.id=".$_SESSION['id_usuario'];;
        $res=mysqli_query($conex,$sql);
        $row=mysqli_fetch_object($res);
        $clave_actual=hash('sha256',$clave_actual); 
   	if ($row->clave==$clave_actual) {
   		if ($clave==$clave_nueva_confirm) {

   		$clave=hash('sha256',$clave);
        $sql="UPDATE usuarios SET clave='".$clave."' WHERE usuarios.id=".$_SESSION['id_usuario'];;

        $res=mysqli_query($conex,$sql);
              if ($res) {
                ?>
                  <script type="text/javascript">
                    alert("contraseña cambiada");
                    window.location="ControladorPerfil.php?operacion=verperfil";
                  </script>
                <?php
              } else {
                ?>
                  <script type="text/javascript">
                    alert("Error al cambiar la contraseña");
                    window.location="ControladorPerfil.php?operacion=verperfil";
                  </script>
                <?php
              }  

   			
   		}else
   		{
   			?>
    <script type="text/javascript">
    	alert("La contraseña y confirmar contraseña no coinciden");
		window.location="ControladorPerfil.php?operacion=cambiar_clave";
    </script>

   <?php 
   		}
   	}else
   	{
   	?>
    <script type="text/javascript">
    	alert("La clave actual no coinciden con el registro");
		window.location="ControladorPerfil.php?operacion=actualizar_clave";
    </script>

   <?php 	
   	}
 

 }


	
}//fin de la funcion cambiar clave







public function verperfil (){
  extract($_REQUEST);

  $db=new clasedb();//instanciando clasedb
  $conex=$db->conectar();//conectando con la base de datos

   
  	$sql="SELECT nombre, correo, pregunta, respuesta FROM usuarios WHERE usuarios.id=".$_SESSION['id_usuario'];;//query
  
			

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
    
      header("Location: ../Vistas/config/perfil.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));

  } else {
    echo "Error en la BD....";
  }
  
}//fin de la funcion verperfil



public function modificar(){
	extract($_REQUEST);//extrayendo valores de url
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	$sql="SELECT nombre, correo, pregunta, respuesta FROM usuarios WHERE usuarios.id=".$_SESSION['id_usuario'];;
	$res=mysqli_query($conex,$sql);//ejecutando consulta
	$data=mysqli_fetch_array($res);//extrayendo datos en array

	header("Location: ../Vistas/config/modificar.php?data=".serialize($data));
}//fin de la funcion modificar


public function actualizar(){
	extract($_REQUEST);
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM usuarios WHERE correo='".$correo."' AND id!=".$_SESSION['id_usuario'];;
	$res=mysqli_query($conex,$sql);
	$cuantos=mysqli_num_rows($res);
	//echo $cuantos;
	if ($cuantos>0) {
		?>
		<script type="text/javascript">
			alert("Ya existe un usuario con este correo");
			window.location="ControladorPerfil.php?operacion=verperfil";
		</script>
			<?php

		}else{
		
			$sql="UPDATE usuarios SET nombre='".$nombre."', correo='".$correo."', pregunta='".$pregunta."',respuesta='".$respuesta."' WHERE usuarios.id=".$_SESSION['id_usuario'];;


			$res=mysqli_query($conex,$sql);
			if ($res) {
					?>
					<script type="text/javascript">
						alert("Registro modificado");
						window.location="ControladorPerfil.php?operacion=verperfil";
					</script>
					<?php
			} else {
					?>
					<script type="text/javascript">
						alert("Error al modificar el registro");
						window.location="ControladorPerfil.php?operacion=verperfil";
					</script>
					<?php
					}			
			
	
	}
}//fin de la función actualizar








}//fin de la clase controlador Perfil






ControladorPerfil::controlador($operacion);
?>