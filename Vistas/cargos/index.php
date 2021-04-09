<?php
extract($_REQUEST);
$data=unserialize($data);
include_once "../includes/menu.php"; 
?>

 <div class="contenido" style="padding-left: 20px">
    <div class="content-2">
    <section  class="content-header">
      <ol class="breadcrumb">
       
         <h1 align="center">  <span style="margin-left: 5cm;" class="badge badge-info">Listado de Cargos <i class="menu-icon fa fa-list"></i> </span></h1>
        
      </ol>
   </section >
<br>
<div class="table-responsive">
                                <table class="table table-striped table-sm " id="table">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Cargo</th>
                                            <th>Salario</th>
                                            <th>Departamento</th>
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
                                        if ($data[$i][$j]==$data[$i][2]) {
                                        ?>
                                        
                                         <td><?=number_format($data[$i][$j],2,',','.')?></td>
                                        <?php
                                        }else{
                                            ?>
                                          <td><?=$data[$i][$j]?></td>
                                            <?php
                                        }
                                     

                                    }  ?>
    
                                    <td><a  href="../../Controladores/ControladorCargos.php?operacion=modificar&id=<?=$data[$i][0]?>"><i title="Modificar" class="menu-icon fa fa-edit"></a></i>
    
                                    
    

                                    <a href="../../Controladores/ControladorCargos.php?operacion=eliminar&id_cargos=<?=$data[$i][0]?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>
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
