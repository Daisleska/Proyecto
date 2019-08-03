<?php 
	require("../config/conexion.php");
	$_SESSION['cedula']=$_POST['cedula'];
	$cedula=$_SESSION['cedula'];
	$date = date("Y-m-d");
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql="SELECT * FROM personas pe WHERE estatus = 'Beneficiado(a)' AND pe.cedula='$cedula' ";

	$consulta=mysqli_query($conectar,$sql);

	if (mysqli_num_rows($consulta) != 0) {

		$sql1="SELECT * FROM asistencias asi
		INNER JOIN  personas pe ON asi.id_personas=pe.id_personas
		WHERE estatus = 'Beneficiado(a)' AND pe.cedula='$cedula' AND asi.fecha='$date;'";

		$consulta1=mysqli_query($conectar,$sql1);
		
		($fila=mysqli_num_rows($consulta1) != 0);
		if ($fila==0) {
?>
	<script type="text/javascript">
		var confirmar=confirm("Personas No ha comido ¿Comer?")
		if (confirmar==true) {
			window.location=("index.php.?llave=marcar_asistencia&cedula=<?php echo $cedula; ?>");
		}
		else {
			window.location=("index.php?llave=asistencia");
		}
	</script>
<?php
			//echo "Estudiante Existe";
		} else {

			//echo "Estudiante ya tiene un instrumetno";
?>
	<script type="text/javascript">
		alert("Personas ya marco su asistencia en el dia de hoy")
		window.location=("index.php?llave=asistencia");
	</script>
<?php
		}
} else {
	$sql5="SELECT * FROM personas WHERE cedula='$cedula' ";

	$consulta5=mysqli_query($conectar,$sql5);
		
	($fila1=mysqli_num_rows($consulta5) != 0);
	if ($fila1==0) {
		echo"<script>alert('¡ERROR! Persona No Se Encuentra Registrado(a).');
               window.location.href='index.php?llave=asistencia'</script>";
		
	} else { 
		$sql5="SELECT * FROM personas WHERE estatus='Censado(a)' AND cedula='$cedula' ";
		$consulta5=mysqli_query($conectar,$sql5);
		($fila1=mysqli_num_rows($consulta5) != 0);
		if ($fila1==0) {
			echo"<script>alert('¡ERROR! Persona Se Encuentra Inhabilitado(a).');
               window.location.href='index.php?llave=asistencia'</script>";
		} else {
			echo"<script>alert('¡ERROR! Personas ya fue registrada hoy(a).');
               window.location.href='index.php?llave=asistencia'</script>"; }
		}
}
?>