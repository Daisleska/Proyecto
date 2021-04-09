 <?php 
 extract($_REQUEST);
 include_once "../includes/menu.php"; ?>

 <div class="contenido" >
    <div class="content-2">
         

     <section class="content-header">
      <ol class="breadcrumb">
        <a href="../asistencias/ControlA.php?operacion=index" class="atras" title="Atras"><span class="fa fa-arrow-left" style="font-size: 32px;" ></span></a>
        
        <h1 align="center"><span style="margin-left: 6cm;" class="badge badge-info">Permisos <i class="fa fa-file-text-o"></i> </span></h1>
      <br>
      </ol>
</section >
<center>
  <a data-toggle="modal" data-target="#mediumModal" href="../inventario/registro-inventario.php" class="btn btn-primary"><i  class="ti-pencil-alt"></i> Registrar Permiso</a></center>

       <div class="table-responsive" style="padding-left: 20px;">
            <table class="table table-striped table-sm " id="table">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Fecha</th>
                    <th>Motivo</th>
                    <th>Cantidad de días</th>
                    <th>Estado</th>
                    <!--th>Ubicación Actual</th-->
                    <?php
                      
                        
                        echo '
                          <th>Opciones</th>
                        ' ;
                      
                    ?>
                    
                  </tr>
                </thead>
                  <tbody>
                   <?php 
                  include('../../Modelos/conexion.php');

                   $sql="SELECT permisos.id, empleado.nombres, empleado.cedula, permisos.status, permisos.cantidad_dias, permisos.motivo, permisos.inicio_permiso FROM permisos, empleado WHERE empleado.id=permisos.id_empleado";

                   $data=mysqli_query($conectar,$sql);

                    while($consulta=mysqli_fetch_array($data)) {

                      echo "   
                      <tr>
                        <td>".$consulta['nombres']."</td>
                        <td>".$consulta['cedula']."</td>
                        <td>".$consulta['inicio_permiso']."</td>
                        <td>".$consulta['motivo']."</td>
                        <td>".$consulta['cantidad_dias']."</td>
                        <td>".$consulta['status']."</td>
                        ";


                        echo "  <td>
                            <a href='../asistencias/ControlA.php?operacion=permiso_eliminar&id_permiso=(".$consulta['id'].")' class='eliminar'  title='Eliminar'><span class='fa fa-trash-o'></span></a>";
                    }

                     
                  ?>
                </tbody>
            </table>
            <br><br><br><br><br><br><br><br><br><br><br>
        </div>
    </div>
</div>

<form action="../asistencias/ControlA.php?operacion=permiso_registro" method="POST">
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                          <form action="" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel" style="margin-left: 4cm;">Registrar Permiso</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <h6 class="nota-input" style="margin-left: 2.5cm;">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>
                            
                              <div class="row">
                                <div class="col-md-6">
                                   <label><strong>Justificación</strong><strong class="estado-r">*</strong></label>
                                   <select class="form-control" required="required" name="motivo">
                                   <option value="" selected="selected" >Seleccione</option>
                                  <option value="Reposo">Reposo</option>
                                  <option value="Permiso">Permiso</option>
                                  </select>
                                  </div>
                                
                              <div class="col-md-6">
                                <label><strong>Días de permiso</strong><strong class="estado-r">*</strong></label><input type="number" title="Ingrese la cantidad de dias de permiso" required="required" name="dias_permiso" class="form-control">
                               </div>
                             </div>

                               <div class="row">
                               <div class="col-md-6">
                                <label><strong>Cédula del empleado</strong><strong class="estado-r">*</strong></label>
                                 <input type="number" name="cedula" id="cedula" required="required" placeholder="Ingrese cédula" class="form-control" style="width: 5.8cm; margin-right: 0.7cm;">
                               </div>
                            
                               <div class="col-md-6">
                               <label><strong>Fin del permiso</strong><strong class="estado-r">*</strong></label>
                                 <input type="date" name="fin_permiso" id="cedula" required="required" placeholder="Ingrese cédula" class="form-control">
                               </div>
                             </div>
                             
                            </div>
                            <br><br>
                             
                         
                            <div class="modal-footer"> 
                              <input type="hidden" name="id_asistencia" id="id_asistencia">
                              <input type="hidden" name="opcion" id="opcion">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                </form>

<?php include_once "../includes/footer.php"; ?>
    <script src="../../vendors/js/sweetalert.min.js"></script>
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


<!-- <div class="row">
        <div class="col-md-12">
          <h1 align="center"> Asistencias <span class="badge badge-info">Permisos <i class="menu-icon fa fa-key"></i> </span></h1>
        </div>
        /.col 
 </div>

 <div class="content mt-3">
     <div class="animated fadeIn">
          <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Motivos</strong> <small> Detalles del Permiso</small>
                            </div>
                            <div class="card-body card-block">
                                <form>

                                 <select data-placeholder="Motivo del Permiso" class="standardSelect" tabindex="1">
                                    <option value=""></option>
                                    <option value="United States">Reposo</option>
                                    <option value="United Kingdom">Permiso</option>
                                    <option value="Afghanistan">Luto</option>
                                   </select>
                                   <br>

                                <div class="form-group">
                                    <label class=" form-control-label">Fecha del Permiso</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="date" class="form-control">
                                    </div>
                                  
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Cantidad de dias </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-plus"></i></div>
                                        <input type="number" class="form-control">
                                    </div>
                                       
                                </div>

                                 <div class="form-group">
                                    <label class=" form-control-label">Fin del Permiso</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="date" class="form-control">
                                    </div>
                               
                            </div>
                              
                             <button class="btn btn-primary"><i class="fa fa-check">Aceptar</i></button>
                        </div>
                    </form>
  </div>
</div> -->