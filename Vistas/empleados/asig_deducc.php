<?php
extract($_REQUEST);
$data=unserialize($data);
include_once "../includes/menu.php"; 
?>

 <div class="contenido" style="padding-left: 20px">
    <div class="content-2">
    <section  class="content-header">
      <ol class="breadcrumb">

        <a href="../../Controladores/ControladorEmpleado.php?operacion=index" class="atras" title="Atras"><span class="fa fa-arrow-left" style="font-size: 35px;" ></span></a>

       
         <h1 align="center">  <span style="margin-left: 3cm;" class="badge badge-info">Asignaciones y Deducciones <i class="menu-icon fa fa-list"></i> </span></h1>
        
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
                                            <th>Opciones</th>
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
    
                                    <td>
    
                                    
    

                                    <a href="../../Controladores/ControladorAsigDeducc.php?operacion=eliminarasigdeducc&id=<?=$data[$i][0]?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>
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
