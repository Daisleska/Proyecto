<?php include_once "../includes/menu.php" ?>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4 class="text-white">Listado de Archivos BD | <a href="backup-bd.php" title="Respaldar BD" class="icon-users-1" title="Restaurar BD" style="background-color: #2ECC71; border:0px;"><i class="fa  fa-cloud-download"></i></a></h4>
                            
                                <div class="asset-inner" style="background-color: transparent; color: white;">
                                <table  width="95%" style="margin-left: 20px; padding: 30px; background-color: white; color: white;">
                            <tbody>
                           <?php 

                  /**
 * Funcion que muestra la estructura de carpetas a partir de la ruta dada.
 */
function obtener_estructura_directorios($ruta){
    // Se comprueba que realmente sea la ruta de un directorio
    if (is_dir($ruta)){
        // Abre un gestor de directorios para la ruta indicada
        $gestor = opendir($ruta);
        echo '<table class="table responsive-table " id="table">
                  <thead>
                    <tr>
                      <th>Archivo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>';

        // Recorre todos los elementos del directorio
        while (($archivo = readdir($gestor)) !== false)  {
            
            $ruta_completa = $ruta . "/" . $archivo;

            // Se muestran todos los archivos y carpetas excepto "." y ".."
            if ($archivo != "." && $archivo != "..") {
                // Si es un directorio se recorre recursivamente
                if (is_dir($ruta_completa)) {
                  echo 
                  '<tr> <td>'. $archivo .'</td>';
                  echo '<td><a class="btn btn-primary" title="Restaurar BD" style="background-color: #2ECC71; border:0px;" data-position="bottom" data-tooltip="Restaurar" href="Modelos/restaurar.php?id='.$archivo.'"><i class="fa fa-cloud-upload"></i></a> 
                       <a class="btn btn-primary" style="background-color: #ABB2B9  ; border: 0px;"" data-position="bottom" title="Eliminar BD"  data-tooltip="Eliminar" href="../modelo/borrar.php?id='.$archivo.'"><i class="fa fa-trash-o"></i></a></td>
                    </tr>';

                    obtener_estructura_directorios($ruta_completa);
                } else {
                    echo '<tr>
                  <td><strong>'. $archivo .'</strong></td>';
                  echo '<td><a class="icon-hammer" title="Restaurar BD" style="background-color: #2ECC71; border:0px;" data-position="bottom" data-tooltip="Restaurar" href="Modelos/restaurar.php?id='.$archivo.'"><i class="fa fa-cloud-upload"></i></a> 
                       <a class="icon-trash" style="background-color: #ABB2B9  ; border: 0px;""  data-position="bottom" data-tooltip="Eliminar" title="Eliminar BD" href="Modelos/borrar.php?id='.$archivo.'"><i class="fa fa-trash-o"></i></a></td>
                    </tr>';
                }
            }
        }
        
        // Cierra el gestor de directorios
        closedir($gestor);
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No es una ruta de directorio valida<br/>";
    }
}

                 ?>

                 <?php 
                 obtener_estructura_directorios("DB/"); ?>


                            
                             </tbody>
    </table>
                            </div>
                          
                            
<br>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- data table JS
    ============================================ -->

    <script type="text/javascript">
        $('#table').DataTable({
            "searching": true,
            language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "Mostrando 0 de 0 Entradas",
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
    </script>
<?php include_once "../includes/footer.php"; ?>