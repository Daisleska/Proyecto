<?php
include_once "../includes/menu.php"; 
extract($_REQUEST);
$data=unserialize($data);
$asignaciones=unserialize($asignaciones);
$emple=unserialize($emple);





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
                   
             <center>
                  <button class="btn btn-primary btn-sm" data-toggle="modal" title="agregar" data-target="#centermodal"> Agregar <i class="ti-pencil-alt"></i></button>
                </center>
               
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
    
                                    
    

                                    <a href="../../Controladores/ControladorAsigDeducc.php?operacion=eliminarasigdeducc&id=<?=$data[$i][0]?>&id_empleado=<?=$emple[0][0]?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>
                                    </td>

                                    <?php   
                                $num++;
                                }   ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 style="margin-left: 2cm;" class="modal-title" id="exampleModalCenterTitle">Agregar Asignaciones | Deducciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="../../Controladores/ControladorAsigDeducc.php?operacion=agregar&id=<?=$emple[0][0]?>" method="POST" name="form" class="form">
                    <div class="modal-body">
                    <p><?=$emple[0][1]?> <?=$emple[0][3]?> <?=$emple[0][2]?></p>
                      <label><strong>Asignación | Deducciones </strong></label>

                     
                       <select name="asignaciones[]" data-placeholder="Seleccione" multiple="multiple" class="standardSelect" >
             <option value="" selected="selected" disabled="disabled"></option>
                                    <?php 
                    for ($i=0; $i<$filas_asi; $i++){
                    ?>
                    <option value="<?=$asignaciones[$i][0]?>"><?=$asignaciones[$i][1]?> | <?=$asignaciones[$i][2]?></option>
                    <?php
                    }
                    ?>
                                   
             </select><br>
                    
                <input type="hidden" name="operacion" value="agregar">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn enviar btn-primary">Registrar</button>
                    </div>
                  </form> 
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
