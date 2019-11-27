<?php
extract($_REQUEST);
$data=unserialize($data);
include_once "../includes/menu.php"; 
?>

 <div class="contenido">
    <div class="content-2">
    <section  class="content-header">
      <ol class="breadcrumb">
       
         <h1 align="center">  <span style="margin-left: 2cm;"  class="badge badge-info">Listado de Asignaciones y Deducciones <i class="menu-icon fa fa-list"></i> </span></h1>
        
      </ol>
   </section >
<br>
<div class="table-responsive">
                                <table class="table table-striped table-sm " id="table">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Descripción</th>
                                            <th>Tipo</th>
                                            <th>Monto</th>
                                            <th>opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $num=1;
                                    for($i=0; $i < $filas; $i++){

                                    echo "<tr>";
                                    ?>

                                    <td><?=$num?></td>
                                    <?php 
                                    for ($j=1; $j < $campos; $j++) 
                                    { 
                                     ?>

                                    <td><?=$data[$i][$j]?></td>


                                    <?php 

                                    }  ?>
    
                                    <td><a  href="../../Controladores/ControladorAsigDeducc.php?operacion=modificar&id=<?=$data[$i][0]?>"><i title="Modificar" class="menu-icon fa fa-edit"></a></i>
    
                                    
    

                                    <a href="../../Controladores/ControladorAsigDeducc.php?operacion=eliminar&id=<?=$data[$i][0]?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>
                                    </td>

                                    <?php   
                                $num++;
                                }   ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


<br><br><br><br><br><br><br><br><br><br><br><br>
 <?php include_once "../includes/footer.php"; ?>

  <?php
        error_reporting(0);
        extract($_REQUEST);
        //Registro
        if ($reg==1) {
            echo "
              iziToast.success({
                title: '¡Registrado! ',
                message: 'Asignacion registrado correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($reg==2){
          echo
               "iziToast.error({
                title: '¡Error al registrar! ',
                message: 'El Producto no pudo ser registrado',
                color: '#ffb6bb',
            
              });";
        } 

        //Actualizar artículos 
        if ($act==1) {
            echo "
              iziToast.success({
                title: '¡Actualizado! ',
                message: 'Producto actualizado correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($act==2){
          echo
               "iziToast.error({
                title: '¡Error al actualizar! ',
                message: 'El Producto no pudo ser actualizado',
                color: '#ffb6bb',
            
              });";
        }

        //Eliminar productos

        if ($e==1) {
            echo "
              iziToast.success({
                title: '¡Eliminado! ',
                message: 'Artículo eliminado correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($e==2){
          echo
               "iziToast.error({
                title: '¡Error al eliminar! ',
                message: 'El artículo no pudo ser eliminado',
                color: '#ffb6bb',
            
              });";
        }


        //Enviar productos
   if ($env==1) {
            echo "
              iziToast.success({
                title: '¡Enviado! ',
                message: 'Artículo se ha enviado correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($env==2){
          echo
               "iziToast.error({
                title: '¡Error al enviar! ',
                message: 'El artículo no pudo ser enviado',
                color: '#ffb6bb',
            
              });";
        } 

      ?>
    </script>
     <script>
      feather.replace();
    </script>

     <script src="../../vendors/js/datatables.min.js"></script>
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
