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
           
            <div class="col-sm-5">
                <div class="page-header float-left">
                    <div class="page-title">
                        <div>
                            LISTADO
                        </div>
                  </div>
                </div>
            </div>

                        <div class="col-sm-7">
                <div class="page-header float-right">
                   <ol class="breadcrumb text-right">

                            <li class="active"></li>
                        </ol>
                </div>
            </div>

                    
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                	<h2 style="padding-left: 20px;">Administrador</h2>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a style="float: right; padding-right: 40px;" href="../../reportes/reporte_usuarios.php">Descargar PDF</a>

                                <strong class="card-title"><i class="fa fa-list">
                                    </i>Lista de Usuarios Registrados</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                       <tr>
                                       	<th>Nro</th>
                                       	<th>Nombre</th>
                                       	<th>Correo</th>
                                       	<th>Pregunta</th>
                                       	<th>Respuesta</th>
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

							<td><i class="menu-icon fa fa-edit"><a href="../../Controladores/controladorUsuario.php?operacion=modificar&id_usuarios=<?=$data[$i][0]?>"></i>Modificar</a>

							<i class="menu-icon fa fa-recycle"><a href="../../Controladores/controladorUsuario.php?operacion=eliminar&id_usuarios=<?=$data[$i][0]?>">Eliminar</a></i>

               <i class="menu-icon fa fa-edit"> <a href="../../Controladores/controladorUsuario.php?operacion=asignar_registrar">Asignación de Privilegios</a></i>
                                
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
