<?php
extract($_REQUEST);
$data=unserialize($data);
?>
  <?php include_once "../includes/menu.php"; ?>

   <section style="padding-left: 20px;" class="content-header">
      <ol class="breadcrumb">
        <li><i class="fa fa-users"><a href="../menu/ControladorMenu.php?operacion=asistencia"></i> Asistencia /</a></li>

        <li><i class="fa fa-table"><a href="../asistencias/ControlA.php?operacion=index"></i>Consulta de asistencias</a></li>
    
        <li class="col-md-2,5" style=" padding-left: 290px;">
        <a href="../../reportes/reporte_asistencia.php" target="blank" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Reporte PDF</a>
        </li>
      </ol>
</section >
     <section style="padding-left: 20px;"  class="invoice">
      <!-- <div class="row">
        <div class="col-md-12">
          <h2 class="page-header">
            <i class="fa fa-edit"></i> Listado de Asistencia
          </h2>
        </div>
      </div> -->
       <div class="box-body">
                    <div class="table-responsive"  style="overflow-x: hidden;">
                      <div class="row">
                        <div class="input-daterange">
                          <div class="col-sm-offset-3 col-sm-8">
                            <div data-date-format="yyyy/mm/dd" data-date="yyyy/mm/dd" class="input-group input-large">
                              <input type="text" name="start_date" id="start_date" class="form-control" placeholder="Desde"/>
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" name="end_date" id="end_date" class="form-control" placeholder="Hasta"/>
                            </div>
                          </div>
                        </div>
                        <div  class="col-sm-2">
                          <button type="button" name="search1" id="search1" class="btn btn-primary active" ><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        
                      </div><br>
                    </div>
                    <table id="order_data_censo" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Cédula</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Fecha de Registro</th>
                          <th>Departamento</th>
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

              <td>

              <a href="ControlA.php?operacion=eliminar&id_asistencias=<?=$data[$i][0]?>"><i style="font-size: 20px;" title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>
                                
              </td>
                <?php 
                $num++;
                }   ?>
                      </tbody>
                    </table>
                  </div>
                   
                  </div>

      <!-- info row -->
     
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->

    <?php include_once "../includes/footer.php"; ?>