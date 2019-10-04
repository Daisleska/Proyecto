<?php
extract($_REQUEST);
$data=unserialize($data);
 ?>

 
        <!-- Header-->

<?php include_once "../includes/menu.php"; ?>

<?php
  date_default_timezone_set('America/Caracas');
  require_once('../../Modelos/conexion.php');

  $sql= "SELECT *FROM usuarios ORDER BY id_usuarios DESC";
  $consulta = mysqli_query($conectar, $sql);
  
?>



        <div class="breadcrumbs">
           
         

                    
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

               

                	

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a title="Descargar PDF" style="float: right; padding-right: 40px;" href="../../reportes/reporte_usuarios.php"><i style="font-size: 30px;" class="fa fa-cloud-download"></i>&nbsp;</a>

                                <div>
                                  <strong style="margin-right: 4cm;" class="card-title"><i class="fa fa-list"></i> LISTADO DE USUARIOS</strong>
                                </div>

                                <div class="form-1-2">
      <label for="caja_busqueda">Buscar:</label>
      <input type="text" name="caja_busqueda" id="caja_busqueda">
    </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                       <tr>
                                       	<th>N°</th>
                                       	<th>Nombre</th>
                                       	<th>Correo</th>
                                       	<th>Pregunta</th>
                                       	<th>Respuesta</th>
                                        <th>Estado</th>
                                       	<th>Opciones</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                          <?php $num=1;
							for ($i=0; $i < $filas; $i++) { 
                                
							echo "<tr>";		
							?>	
							
							<td><?=$num?></td>
						<?php for ($j=1; $j < $campos; $j++) { ?>
						<td><?=$data[$i][$j]?></td>

							<?php } ?>

							<td><a href="../../Controladores/ControladorUsuario.php?operacion=modificar&id_usuarios=<?=$data[$i][0]?>"><i title="Modificar" class="menu-icon fa fa-edit"></i></a>

							<a href="../../Controladores/ControladorUsuario.php?operacion=eliminar&id_usuarios=<?=$data[$i][0]?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>

                <a href="../../Controladores/ControladorUsuario.php?operacion=asignar_registrar&id_usuarios=<?=$data[$i][0]?>"><i title="Asignar privilegios" class="menu-icon fa fa-edit"></a></i>
                                
							</td>
								<?php	
								$num++;
								} 	?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
<?php include_once "../includes/footer.php"; ?>
