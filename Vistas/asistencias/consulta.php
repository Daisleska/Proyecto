<?php
extract($_REQUEST);
$data=unserialize($data);
?>
  <?php include_once "../includes/menu.php"; ?>

   <section style="padding-left: 20px;" class="content-header">
      <ol class="breadcrumb">
        <a href="../asistencias/ControlA.php?operacion=index" class="atras" title="Atras"><span class="fa fa-arrow-left" style="font-size: 35px;" ></span></a>

       <h1 style="padding-left: 40px;"> Asistencias <span class="badge badge-info">Reportes <i class="menu-icon fa fa-list"></i> </span></h1>
      <br>
    
        <li class="col-md-2,5" style=" padding-left: 290px;">
        <a href="../../reportes/reporte_asistencia.php" target="blank" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i>PDF</a>
        </li>
      </ol>
</section >
     <section style="padding-left: 20px;"  class="invoice">
      
       <div class="box-body">
                    <div class="table-responsive"  style="overflow-x: hidden;">
                      <form action="../asistencias/ControlA.php?operacion=consulta" method="POST">
                        
                     <div class="row">
                        <div class="col-md-4">    
                        <div class="input-group">    
                       <input class="form-control" type="date" name="fecha">
                       
                          <button type="submit" id="buscar" class="btn btn-primary active" ><i class="fa fa-search"></i></button>
                        </form>
                          </div>
                        </div>
                      
                      </div><br>
                    </div>

              <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                          
                            <div class="card-body">
                    <table  class="table table-striped table-sm " id="table" >
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Cédula</th>
                          <th>Fecha de Registro</th>
                          <th>Justificación</th>
                        
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

                <?php 
                $num++;
                }   ?>
                      </tbody>
                    </table>
                  </div>
                   
                  </div>

                </div>
              </div>
            </div>
          </div>
      <!-- info row -->
     
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->
  </div>

    <?php include_once "../includes/footer.php"; ?>

    <script src="../../vendors/js/sweetalert.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
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