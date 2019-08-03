<?php
session_start();
include('../Modelos/clasedb.php');
extract($_REQUEST);
//echo password_hash("12345", PASSWORD_DEFAULT); 
class ControladorLogin{

static function controlador($operacion)
{
	$login=new ControladorLogin();
	switch ($operacion) {
		case 'login':
			$login->loguear();
			break;
		case 'olvido':
			$login->olvido();
			break;
		case 'validar_correo':
			$login->validar_correo();
			break;
		case 'respuestas':
			$login->verificar_respuesta();
			break;
		case 'cambiar_clave':
			$login->cambiar_clave();
			break;
		case 'logout':
			$login->logout();
			break;
		default:
			# code...
			break;
	}//cierre del switch
}//fin de la funcion controlador
public function loguear()
{

	extract($_POST);
	$db=new clasedb();
	$conex=$db->conectar();
	
	//validando campos vacios

	if ($correo=="" || $clave=="") {
		?>
		<script type="text/javascript">
			alert('Existen campos que no deben estar vacíos');
			window.location="../Vistas/login/login.php"
		</script>

		<?php
		
	} else {
		$clave=hash('sha256',$clave); 
	$sql="SELECT * FROM usuarios WHERE correo='".$correo."' AND clave='".$clave."'";

	if ($res=mysqli_query($conex,$sql)) {
		$hallado=mysqli_num_rows($res);
		if ($hallado==0) {
			?>
				<script type="text/javascript">
					alert('Correo o Contraseña incorrecto');
					window.location="../Vistas/login/login.php"
				</script>

			<?php	
		} else {
			//creando variables de sesión
			$data=mysqli_fetch_object($res);
			
			$_SESSION['id_usuario']=$data->id;
			$_SESSION['correo']=$correo;
			$_SESSION['logueado']="Si";
			header("Location:../Vistas/home/home.php");
		}
		
	} else {
		echo "Problemas con la conexión, Intenta nuevamente...";
	}
	
		
	}
	
}//fin de la funcion loguear

public function logout()
{
	if ($_SESSION["logueado"]=="Si"){

		session_unset();

		if (session_destroy()) {
		?>
				<script type="text/javascript">
					alert('Ha cerrado sesión correctamente...');
					window.location="../Vistas/login/login.php"
				</script>

			<?php	
			} else {
				echo "Error, intente nuevamente";
			}
		}
}// fin de la funcion logout
public function olvido()
{
	header('Location:../Vistas/login/recuperar.php');
}//fin de la funcion olvido
public function validar_correo()
{
	extract($_POST);
	$db= new clasedb();
	$conex=$db->conectar();

	$sql="SELECT * FROM usuarios WHERE correo='".$correo."'";

	if ($res=mysqli_query($conex,$sql)) {

		if (mysqli_num_rows($res)>0) {
			while ($data=mysqli_fetch_object($res)) {
				$id_usuario=$data->id;
				$pregunta=$data->pregunta;
				//echo $pregunta;
			}
		header("Location:../Vistas/login/pregunta.php?id_usuario=".$id_usuario."&pregunta=".$pregunta);
		} else {

		?>
				<script type="text/javascript">
					alert('Correo no registrado');
					window.location="../Vistas/login/recuperar.php"
				</script>

			<?php
		}
		
	} else {
		echo "Error en la Base de Datos..";
	}
	
}//fin de la funcion validar_correo

public function verificar_respuesta()
{
	extract($_POST);
	$db= new clasedb();
	$conex=$db->conectar();

	$sql="SELECT * FROM usuarios WHERE respuesta='".$respuesta."' AND id=".$id_usuario;
	
	if ($res=mysqli_query($conex,$sql)) {
			if (mysqli_num_rows($res)>0) {
				# respuesta correcta
				?>
				<script type="text/javascript">
					var id_usuario="<?php echo $id_usuario; ?>"
					alert('Respuesta correcta...');
					window.location="../Vistas/login/clave_nueva.php?id_usuario="+id_usuario;
				</script>

			<?php	
			} else {
				# respuesta incorrecta
				?>
				<script type="text/javascript">
					
					alert('Respuesta incorrecta...');
					window.location="../Vistas/login/recuperar.php"
				</script>

			<?php	
			}
			
		} else {
			echo "Error en la BDD";
		}


}
public function cambiar_clave()
{
	extract($_POST);
	if ($clave_nueva=="" || $clave_nueva_confirm=="") {
		# en caso de que vengan vacias
		?>
			<script type="text/javascript">
				var id_usuario="<?php echo $id_usuario; ?>";
				alert('Los campos de clave nueva no deben estar vacios...');
				window.location="../Vistas/login/clave_nueva.php?id_usuario="+id_usuario;
			</script>
		<?php	

	} else {
		# en caso de que no vengan vacias
		if ($clave_nueva==$clave_nueva_confirm) {
			# en caso de que sean iguales
			$db=new clasedb();
			$conex=$db->conectar();
			$clave_nueva=hash('sha256',$clave_nueva);
			$sql="UPDATE usuarios SET clave='".$clave_nueva."' WHERE id=".$id_usuario;
			//echo $sql;
			if ($res=mysqli_query($conex,$sql)) {
				# si no hubo error de conexion
				if ($res) {
					# en caso de que se hizo el update
					?>
					<script type="text/javascript">
						alert('Cambio de clave exitoso...');
						window.location="../Vistas/login/login.php";
					</script>
				<?php	
				} else {
					# en caso de que falló el update
					?>
						<script type="text/javascript">
							alert('Falla al cambiar clave...');
							window.location="../Vistas/login/recuperar.php";
						</script>
					<?php	
				}
				
			} else {
				# si hubo falla de conexion
				echo "Error en la Base de Datos";
			}
			
		} else {
			# en caso de no ser iguales
			?>
			<script type="text/javascript">
				var id_usuario="<?php echo $id_usuario; ?>";
				alert('Los campos de clave nueva no coinciden...');
				window.location="../Vistas/login/clave_nueva.php?id_usuario="+id_usuario;
			</script>
		<?php	
		}
		
	}
	
}//fin de la funcion cambiar clave


}//fin de la clase ControladorLogin

ControladorLogin::controlador($operacion);
?>