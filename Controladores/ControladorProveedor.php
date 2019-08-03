<?php 
include("../Modelos/clasedb.php");

extract($_REQUEST);


class ControladorProveedor
{
	

public function index(){
	extract($_POST);
	$db=new clasedb();//instanciando clasedb
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT ci_pro, nombre_pro, email_pro, direccion_pro, telefono_pro FROM proveedor";//query


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
		
	    header("Location: ../Vistas/proveedores/listado_proveedor.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	} else {
		echo "Error en la BASE DE DATOS";
	}

	
	
	
		//enviando datos
}//fin de la funcion login

public function registrar(){

	header("Location: ../Vistas/proveedores/registro_proveedor.php");
}//fin registrar

public function guardar(){
	extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos

	$sql="SELECT  ci_pro, nombre_pro, email_pro, direccion_pro, telefono_pro FROM proveedor  WHERE ci_pro='".$ci_pro."'";

	$res=mysqli_query($conex,$sql);
	$cuantos=mysqli_num_rows($res);
	//echo $cuantos;
	if ($cuantos>0) {
		?>
		<script type="text/javascript">
			alert("EL PROVEEDOR CON ESTA CEDULA/RIF YA EXISTE");
			window.location="ControladorProveedor.php?operacion=registrar";
		</script>
			<?php
	} else {
		
			
		$sql="INSERT INTO proveedor(ci_pro, nombre_pro, email_pro, direccion_pro, telefono_pro) VALUES('$ci_pro','$nombre_pro','$email_pro','direccion_pro','$telefono_pro')";

		$resultado=mysqli_query($conex,$sql);
	
	if($resultado) {
        ?>
		<script type="text/javascript">
			
			if (confirm("REGISTRO EXITOSO, DESEA REGISTRAR OTRO?")) {
				window.location="ControladorProveedor.php?operacion=registrar";	
			}else{
				window.location="ControladorProveedor.php?operacion=index";
			}
			
		</script>
			<?php

		} 
		}
}//fin de la funcion guardar




public function modificar(){
	extract($_REQUEST);//extrayendo valores de url
	$db=new clasedb();
	$conex=$db->conectar();//conectando con la base de datos
	
	$sql="SELECT * FROM usuarios WHERE id=".$id_usuarios."";
	$res=mysqli_query($conex,$sql);//ejecutando consulta
	$data=mysqli_fetch_array($res);//extrayendo datos en array

	header("Location: ../Vistas/usuarios/modificar.php?data=".serialize($data));
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
						$sql="UPDATE usuarios SET nombre='".$nombre."',correo='".$correo."',tipo_usuario='".$tipo_usuario."',clave='".$clave."',pregunta='".$pregunta."',respuesta='".$respuesta."' WHERE id=".$id_usuario;

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
			
			$sql="UPDATE usuarios SET nombre='".$nombre."',correo='".$correo."',tipo_usuario='".$tipo_usuario."',pregunta='".$pregunta."',respuesta='".$respuesta."' WHERE id=".$id_usuarios;

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

	$sql="DELETE FROM usuarios WHERE id=".$id_usuario;

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

static function controlador($operacion){
		$nombre=new ControladorProveedor();
	switch ($operacion) {
		case 'index':
			$nombre->index();
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
		default:
			?>
				<script type="text/javascript">
					alert("No existe la ruta");
					window.location="ControladorProveedor.php?operacion=index";
				</script>
			<?php
			break;
	}//cierre del switch
}//cierre de la funcion controlador
}//cierre de la clase


ControladorProveedor::controlador($operacion);


?>