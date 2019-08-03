<?php 
include("../Modelos/clasedb.php");

extract($_REQUEST);


class ControladorUsuarios
{
	

public function login(){
	extract($_POST);
	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT id,nombre,correo,pregunta,respuesta FROM usuarios WHERE borrado='N'";//query


	//ejecutando query
	if ($res=mysqli_query($conex,$sql)) {
		//echo "entro";
		$campos=mysqli_num_fields($res);//cuantos campos trae la consulta	
		$filas=mysqli_num_rows($res);//cuantos registro trae la consulta
		$i=0;
		$datos[]=array();//inicializando array
		//extrayendo datos
		while($data=mysqli_fetch_array($res)){
			for ($j=0; $j <$campos; $j++) { 
				$datos[$i][$j]=$data[$j];
			} 
			$i++;
		}
		
	    header("Location: ../Vistas/usuarios/lista_usuarios.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	} else {
		echo "Error en la BASE DE DATOS";
	}

	
	
	
		//enviando datos
}//fin de la funcion login

public function registrar(){

	header("Location: ../Vistas/usuarios/registrar_usuarios.php");
}//fin registrar

public function guardar(){
	extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT * FROM usuarios WHERE correo='".$correo."'";
	$res=mysqli_query($conex,$sql);
	$cuantos=mysqli_num_rows($res);
	//echo $cuantos;
	if ($cuantos>0) {
		?>
		<script type="text/javascript">
			alert("EL USUARIO CON ESTE CORREO YA EXISTE");
			window.location="controladorUsuario.php?operacion=registrar";
		</script>
			<?php
	} else {
		if ($clave == $clave_repetir) {
			
		$clave=hash('sha256',$clave); 
		$sql="INSERT INTO usuarios(nombre,correo,clave,pregunta,respuesta) VALUES('".$nombre."','".$correo."','".$clave."','".$pregunta."','".$respuesta."')";

		//echo $sql;
		$result=mysqli_query($conex,$sql);
		$id_usuarios=mysqli_insert_id($conex);//obteniendo el último id generado
		//echo $id_usuario;
		if ($result) {
			//---------asignando privilegios --------
			for ($i=1; $i <= 18; $i++) { 
				$sql="INSERT INTO usuarios_has_privilegios VALUES(null,".$id_usuarios.",".$i.",'No')";
				mysqli_query($conex,$sql);
			}
			//--------------------
			?>
		<script type="text/javascript">
			
			if (confirm("REGISTRO EXITOSO, DESEA REGISTRAR OTRO?")) {
				window.location="controladorUsuario.php?operacion=registrar_ad";	
			}else{
				window.location="../Vistas/login/login.php";
			}
			
		</script>
			<?php

		} else {
			?>
		<script type="text/javascript">
			
			if (confirm("REGISTRO FALLIDO, DESEA VOLVER A INTENTARLO?")) {
				window.location="controladorUsuario.php?operacion=registrar";	
			}else{
				window.location="controladorUsuario.php?operacion=index";
			}
			
		</script>
			<?php
		}//cierre del else de $result = true
		} else {
			?>
		<script type="text/javascript">
			
			if (confirm("REGISTRO FALLIDO, LAS CLAVES NO COINCIDEN?")) {
				window.location="controladorUsuario.php?operacion=registrar";	
			}else{
				window.location="controladorUsuario.php?operacion=index";
			}
			
		</script>
			<?php
		}
		
	}//cierre del else de cuantos>0
}//fin de la funcion guardar




public function modificar(){
	extract($_REQUEST);//extrayendo valores de url
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	$sql="SELECT * FROM usuarios WHERE id=".$id_usuarios."";
	$res=mysqli_query($conex,$sql);//ejecutando consulta
	$data=mysqli_fetch_array($res);//extrayendo datos en array

	header("Location: ../Vistas/usuarios/modificar_usuario.php?data=".serialize($data));
}//fin de la funcion modificar



public function actualizar()
{
	extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	$sql="SELECT * FROM usuarios WHERE correo='".$correo."' AND id<>".$id_usuario;
//echo $sql;
	$res=mysqli_query($conex,$sql);

	$cant=mysqli_num_rows($res);//trae cuantos registros tiene la consulta
		if ($cant>0) {
			?>
				<script type="text/javascript">
					alert("USUARIO YA REGISTRADO");
					window.location="controladorUsuario.php?operacion=login";
				</script>
			<?php
		}else{
			//modificando en caso de que quiera cambiar la clave
			if (isset($cambiar)) {
				$sql="SELECT clave FROM usuarios WHERE id=".$id_usuario;
				$res=mysqli_query($conex,$sql);
				$row=mysqli_fetch_object($res);
				$clave_anterior=hash('sha256',$clave_anterior); 
				if ($row->clave==$clave_anterior) {
					if ($clave_repetir==$clave) {
						$clave=hash('sha256',$clave);
						$sql="UPDATE usuarios SET nombre='".$nombre."',correo='".$correo."',clave='".$clave."',pregunta='".$pregunta."',respuesta='".$respuesta."' WHERE id=".$id_usuario;

							$res=mysqli_query($conex,$sql);
							if ($res) {
								?>
									<script type="text/javascript">
										alert("REGISTRO MODIFICADO");
										window.location="controladorUsuario.php?operacion=login";
									</script>
								<?php
							} else {
								?>
									<script type="text/javascript">
										alert("ERROR AL MODIFICAR EL REGISTRO");
										window.location="controladorUsuario.php?operacion=login";
									</script>
								<?php
							}			
					} else {
						?>
						<script type="text/javascript">
							alert("LA CLAVE Y REPETIR CLAVE NO COINCIDEN");
							window.location="controladorUsuario.php?operacion=login";
						</script>
						<?php	
					}//fin del condicional de la clave y repetir no coinciden
					
				} else {
					?>
						<script type="text/javascript">
							alert("LA CLAVE ANTERIOR NO COINCIDE");
							window.location="controladorUsuario.php?operacion=login";
						</script>
					<?php
				}//fin del condicional de comparacion con clave anterior
				
			} else {
			
			$sql="UPDATE usuarios SET nombre='".$nombre."',correo='".$correo."',pregunta='".$pregunta."',respuesta='".$respuesta."' WHERE id=".$id_usuarios;

			$res=mysqli_query($conex,$sql);
				if ($res) {
					?>
						<script type="text/javascript">
							alert("REGISTRO MODIFICADO");
							window.location="controladorUsuario.php?operacion=login";
						</script>
					<?php
				} else {
					?>
						<script type="text/javascript">
							alert("ERROR AL MODIFICAR EL REGISTRO");
							window.location="controladorUsuario.php?operacion=login";
						</script>
					<?php
				}
			}//fin del condicional de cambiar
		}//fin del condicional de correo registrado
}//fin de la función actualizar


public function eliminar()
{
	extract($_REQUEST);//extrayendo variables del url
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos

	$sql="UPDATE usuarios SET borrado='S'  WHERE id=".$id_usuarios;


		$res=mysqli_query($conex,$sql);
		if ($res) {
			?>
				<script type="text/javascript">
					alert("REGISTRO ELIMINADO");
					window.location="controladorUsuario.php?operacion=login";
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("REGISTRO NO ELIMINADO");
					window.location="controladorUsuario.php?operacion=login";
				</script>
			<?php
		}
}//fin de la función eliminar

public function asignar_registrar()
{
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT id, nombre FROM usuarios"; 

	$sql2="SELECT id, modulo, privilegio FROM privilegios";

	if ($res=mysqli_query($conex,$sql)) {
		$usuarios[]=array();
		$row_use=mysqli_num_rows($res);
		
		$i=0;
		while ($data=mysqli_fetch_array($res)) {
			for ($j=0; $j < 3; $j++) { 
				$usuarios[$i][$j]=$data[$j];
			}
			$i++;		
		}
	}
		
		if ($result=mysqli_query($conex,$sql2)) {
		$privilegios[]=array();
		$row_priv=mysqli_num_rows($result);
		
		$i=0;
		while ($data=mysqli_fetch_array($result)) {
			for ($j=0; $j < 3; $j++) { 
				$privilegios[$i][$j]=$data[$j];
			}
			$i++;		
		}
			header('Location: ../Vistas/usuarios/asignar_privilegios.php?row_use='.$row_use.'&row_priv='.$row_priv.' &privilegios='.serialize($privilegios).' &usuarios='.serialize($usuarios));	
		} else {
			echo "Error en la Base de Datos";
		}
	
	}



public function buscar_privilegios_usuario()
{
	extract($_POST);
	$db=new clasedb();
	$conex=$db->conectar();

	$sql="SELECT * FROM usuarios WHERE id=".$id_usuario;
	$res=mysqli_query($conex,$sql);
	$data=mysqli_fetch_object($res);
	$nombre=$data->nombre;
	$correo=$data->correo;
	//buscando privilegios
		$sql="SELECT privilegios.*,usuarios_has_privilegios.status FROM privilegios,usuarios_has_privilegios,usuarios WHERE  privilegios.id=usuarios_has_privilegios.id_privilegio AND usuarios.id=usuarios_has_privilegios.id_usuario AND usuarios.id=".$id_usuarios;
	//echo $sql;
		if ($res2=mysqli_query($conex,$sql)) {
			if (mysqli_num_rows($res2)>0) {
				$privilegios[]=array();
				$i=0;
				$row_priv=mysqli_num_rows($res2);
				while ($data2=mysqli_fetch_array($res2)) {
					for ($j=0; $j < 4; $j++) { 
						$privilegios[$i][$j]=$data2[$j];
					}
					$i++;
				}
			header('Location: ../Vistas/usuarios/asignar_privilegios.php?nombre='.$nombre.'&correo='.$correo.'&row_priv='.$row_priv.'&privilegios='.serialize($privilegios));			
			} else {
				?>
				<script type="text/javascript">
					alert("NO EXISTEN PRIVILEGIOS REGISTRADOS");
					window.location="controladorUsuario.php?operacion=index";
				</script>
				<?php
			}
}
}//cierre de la funcion


static function controlador($operacion){
		$nombre=new ControladorUsuarios();
	switch ($operacion) {
		case 'login':

			$nombre->login();
			break;
		case 'registrar':
			$nombre->registrar();
			break;
		case 'guardar':
			$nombre->guardar();
			break;
		case 'modificar':
			$nombre->modificar();
			break;
		case 'actualizar':
			$nombre->actualizar();
			break;
		case 'eliminar':
			$nombre->eliminar();
			break;
		case 'asignar_registrar':
			$nombre->asignar_registrar();

			break;
		case 'buscar_privilegios_usuario':
			$nombre->buscar_privilegios_usuario();
			break;
		default:
			?>
				<script type="text/javascript">
					alert("No existe la ruta");
					window.location="controladorUsuario.php?operacion=login";
				</script>
			<?php
			break;
	}//cierre del switch
}//cierre de la funcion controlador
}//cierre de la clase


ControladorUsuarios::controlador($operacion);


?>