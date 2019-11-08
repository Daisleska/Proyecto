<?php
extract($_REQUEST);
$data=unserialize($data);
?>
  <?php include_once "../includes/menu.php"; ?>

   <section style="padding-left: 20px;" class="content-header">
      <ol class="breadcrumb">

       <h1 align="center"> Asistencias <span class="badge badge-info">Reportes <i class="menu-icon fa fa-list"></i> </span></h1>
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
                        <div class="col-md-3">    
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
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered" >
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