<?php
include('../Modelos/clasedb.php');
extract($_REQUEST);
//echo password_hash("12345", PASSWORD_DEFAULT); 
class ControladorPerfil{


	static function controlador($operacion)
{
	$perfil=new ControladorPerfil();
	switch ($operacion) {
		case 'cambiar_clave':
			$perfil->cambiar_clave();
			break;

		default:
			?>
				<script type="text/javascript">
					alert("No existe la ruta");
					window.location="ControladorPerfil.php?operacion=index";
				</script>
			<?php
			break;
	}//cierre del switch
}//fin de la funcion controlador

public function cambiar_clave()
{
	extract($_POST);
	if ($clave_nueva=="" || $clave_nueva_confirm=="") {
		# en caso de que vengan vacias
		?>
			<script type="text/javascript">
				var id_usuario="<?php echo $id_usuario; ?>";
				alert('Los campos de clave nueva no deben estar vacios...');
				window.location="../Vistas/config/perfil.php?id_usuario="+id_usuario;
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

ControladorPerfil::controlador($operacion);
?>