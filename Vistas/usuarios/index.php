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


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                   <section class="content-header"  style="padding-left: 15px">
                        <ol class="breadcrumb">
                          <h1 align="center">  <span style="margin-left: 6.5cm;" class="badge badge-info">Usuarios Registrados <i class="menu-icon fa fa-users"></i> </span></h1>

                          <a title="Descargar PDF" style="margin-left: 5.5cm; padding-right: 40px;" href="../../reportes/reporte_usuarios.php"><i style="font-size: 30px;" class="fa fa-cloud-download"></i>&nbsp;</a>
                        </ol>
                   </section>
                        
                                

                               

                            
                            </div>
                            <div class="card-body" style="padding-left: 30px; padding-right: 20px;">
                                <table class="table table-striped table-sm" id="table">
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

    <script src="../../vendors/js/feather.min.js"></script>
    <script>
      feather.replace();
    </script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/datatables.min.js"></script>
    <script type="text/javascript">

       <?php
        error_reporting(0);
        extract($_REQUEST);
        //Registro
        if ($reg==1 or $registrado=='s') {
            echo "
              iziToast.success({
                title: '¡Registrado! ',
                message: 'Usuario registrado correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($reg==2 or $registrado=='n'){
          echo
               "iziToast.error({
                title: '¡Error al registrar! ',
                message: 'El Usuario no pudo ser registrado',
                color: '#ffb6bb',
            
              });";
        }
         if ($e==1) {
            echo "
              iziToast.success({
                title: 'Exito! ',
                message: 'Operacion realizada con exito',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($e==2){
          echo
               "iziToast.error({
                title: '¡Error ! ',
                message: 'No se realizòla operacion',
                color: '#ffb6bb',
            
              });";
        }

        //Eliminar articulos
      ?>
</script>
<script type="text/javascript">
         $(document).ready( function () {
          $('#table').DataTable({
            "searching": true,
            language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
              }
            }
          });
      } );
         </script>

