<p style="text-align: justify;">
	<strong>¿Confirma haber recibido todo los artículos de la lista?</strong>
</p>

<div class="table-responsive">
    <table class="table table-striped table-sm " id="table">
        <thead>
        	<th>#</th>
        	<th>Artículo</th>
        	<th>Cantidad solicitada</th>
        	
        	<th>Cantidad recibida</th>
        </thead>
        <tbody>
        	<?php

				extract($_REQUEST);
				//error_reporting(0);

				include('../../../Modelos/conexion.php');

				$sql="SELECT pedido_detalles.cantidad_solicitada, productos.* FROM pedido_detalles,productos WHERE pedido_detalles.id_pedido='$id' AND pedido_detalles.id_producto=productos.id";

				$resultado=mysqli_query($conectar,$sql);
				$i=0;
				while ($consulta=mysqli_fetch_array($resultado)) {
					$cont=$i+1;
					echo"

						<tr>
							<td>".$cont."</td>
							<td>".$consulta['nombre']."</td>
							<td>".$consulta['cantidad_solicitada']."</td>
					";

					

					echo "<td width='20%'>
							<input style='padding: 0; text-align: center;' type='number' class='form-control' name='cantidad[".$i."]' min='0' max='".$consulta['cantidad_solicitada']."' placeholder='Ej. 1' value='".$consulta['cantidad_solicitada']."'  required='required' id='input_cant1-".$i."'>

							</td>
						</tr>";

					$id_articulo[$i]='<input type="hidden" name="articulo['.$i.']" value="'.$consulta['id'].'">';
					$max[$i]='<input type="hidden" value="'.$consulta['cantidad_solicitada'].'" class="max-'.$i.'">';
					$i++;

							}
			?>

        </tbody>
    </table> 
</div>

<p style="text-align: justify;">
	<strong>Nota:</strong> los siguientes productos se sumarán al inventario automáticamente
</p>

<?php
	for ($j=0;$j<$i;$j++) { 
		echo $id_articulo[$j];
		echo $max[$j];
	}
	echo '<input type="hidden" value="'.$i.'"  id="contador">';
?>
<input type="hidden" name="id" value="<?php echo $id ?>">
<?php
	extract($_REQUEST);

	if ($o==2) {
		$action="pedidos-externos.php?i=".$i;
	}else if($o==1){
		$action="pedidos-internos.php?i=".$i;
	}
?>
<script type="text/javascript">
	 $('#form-pedido').prop('action','<?php echo $action; ?>');
</script>