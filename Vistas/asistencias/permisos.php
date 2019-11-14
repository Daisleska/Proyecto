 <?php 
 extract($_REQUEST);
 include_once "../includes/menu.php"; ?>

 <div class="contenido" style="padding-left: 20px">
    <div class="content-2">
         

     <section style="padding-left: 20px;" class="content-header">
      <ol class="breadcrumb">
        <a href="../asistencias/ControlA.php?operacion=index" class="atras" title="Atras"><span class="fa fa-arrow-left" style="font-size: 32px;" ></span></a>
        
        <h1 align="center"><span style="margin-left: 5.5cm;" class="badge badge-info">Permisos <i class="fa fa-file-text-o"></i> </span></h1>
      <br>
      </ol>
</section >

       <div class="table-responsive" style="padding-left: 20px;">
            <table class="table table-striped table-sm " id="table">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Fecha</th>
                    <th>Motivo</th>
                    <th>Cantidad dias</th>
                    <th>Status</th>
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
                            <a href='javascript:ver(".$consulta['id'].")' class='ver'  title='Ver'><span class='fa fa-eye'></span></a>";
                    }

                     
                  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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