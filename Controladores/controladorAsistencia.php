<?php 
	require("../Modelos/conexion.php");
	$_SESSION['cedula']=$_POST['cedula'];
	$cedula=$_SESSION['cedula'];
	$date = date("Y-m-d");
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql="SELECT * FROM empleado WHERE empleado.cedula='$cedula'";

	$consulta=mysqli_query($conectar,$sql);

	if (mysqli_num_rows($consulta) != 0) {
		$datos=mysqli_fetch_object($consulta);
		$id_empleado=$datos->id;
		$sql1="SELECT * FROM asistencias
		WHERE  id_empleado='$id_empleado' AND asistencias.fecha_hora LIKE '%$date%'";

		$consulta1=mysqli_query($conectar,$sql1);
		
		($fila=mysqli_num_rows($consulta1)!= 0);
		if ($fila==0) {
		?>
		<script type="text/javascript">
		var confirmar=confirm("¿Empleado asistio a laborar hoy? Si no asistió será enviado a una vista para cargar el motivo de inasistencia")
		if (confirmar==true) {
			window.location=("../Vistas/menu/ControladorMenu.php?operacion=marcar_asistencia&id_empleado=<?php echo $id_empleado ?> ");
		}
		else {
			window.location=("../Vistas/menu/ControladorMenu.php?operacion=asistencia");
		}
	</script>
<?php
			//echo "Estudiante Existe";
		} else {

			//echo "Estudiante ya tiene un instrumetno";
?>
	<script type="text/javascript">
		alert("este empleado ya marco su asistencia en el dia de hoy")
		window.location=("../Vistas/asistencias/ControlA.php?operacion=index");
	</script> 
<?php
		}
} else {
	$sql5="SELECT * FROM empleado WHERE cedula='$cedula' ";

	$consulta5=mysqli_query($conectar,$sql5);
		
	($fila1=mysqli_num_rows($consulta5) != 0);
	if ($fila1==0) {
		echo"<script>alert('¡ERROR! Empleado No Se Encuentra Registrado(a).');
               window.location.href='../Vistas/asistencias/ControlA.php?operacion=index'</script>";
		
	} else { 
		$sql5="SELECT * FROM empleado WHERE estatus='si' AND cedula='$cedula' ";
		$consulta5=mysqli_query($conectar,$sql5);
		($fila1=mysqli_num_rows($consulta5) != 0);
		if ($fila1==0) {
			echo"<script>alert('¡ERROR! Persona Se Encuentra Inhabilitado(a).');
               window.location.href='../Vistas/menu/ControladorMenu.php?operacion=asistencia'</script>";
		} else {
			echo"<script>alert('¡ERROR! Personas ya fue registrada hoy(a).');
               window.location.href='../Vistas/menu/ControladorMenu.php?operacion=asistencia'</script>"; }
		}
}
?>