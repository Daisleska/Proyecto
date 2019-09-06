<?php

$mysqli= new mysqli("localhost", "root", "", "servidata");

$salida="";
$query="SELECT * FROM usuarios ORDER BY id";

if (isset($_POST['consulta'])) {
	$q= $mysqli->real_escape_string($_POST['consulta']);
	$query = "SELECT id, nombre, correo, tipo_usuario, borrado FROM usuarios WHERE nombre LIKE  '%" .$q."%' OR correo LIKE '%" .$q."%'  OR tipo_usuario LIKE '%" .$q."%'  OR borrado LIKE '%" .$q."%'";
}

$resultado= $mysqli->query($query);

if ($resultado->num_rows >0) {

	$salida.="<table class='tabla_datos'>
				<thead>
                                       <tr>
                                       	<th>Nro</th>
                                       	<th>Nombre</th>
                                       	<th>Correo</th>
                                       	<th>Pregunta</th>
                                       	<th>Respuesta</th>
                                        <th>Estado</th>
                                       	<th>Opciones</th>
                                       </tr>
                                    </thead>
                                    <tbody>
									";
								while($fila = $resultado->fetch_assoc()){
									$salida.="<tr>
									<td>".$fila['id']."</td>
									<td>".$fila['nombre']."</td>
									<td>".$fila['correo']."</td>
									<td>".$fila['pregunta']."</td>
									<td>".$fila['respuesta']."</td>
									<td>".$fila['borrado']."</td>
									<td></td>
									</tr>";
								}
	
	$salida.="</tbody></table>";

} else{
  $salida.="NO HAY DATOS :(";

}

echo $salida;
$mysqli->close();

?>