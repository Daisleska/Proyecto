<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
$data=unserialize($data);
?>

        <div class="breadcrumbs">
           <!--  <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Listado</h1>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                         <div style=" padding-left: 18px;">
                    <a href="../../Controladores/ControladorEmpleado.php?operacion=asignar_horario&id_empleado=<?=$data[$i][0]?>"><i title="registrar" class="menu-icon fa fa-edit"></a></i></div>

                 <div style="text-align: right;">
                    <button  class="btn btn-primary"><a href="../../Controladores/ControladorEmpleado.php?operacion=index"><i class="fa fa-mail-reply"></i>&nbsp; Modificar</a></button></div>

                             <div class="card">
                     
                            <div class="card-header">
                                <strong class="card-title">Horario</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                         
                                            
                                            <th>Lunes</th>
                                            <th>Martes</th>
                                            <th>Miércoles</th>
                                            <th>Jueves</th>
                                            <th>Viernes</th>
                                            <th>Sábado</th>
                                            <th>Domingo</th>


                                                                                   
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <?php $num=1; 
                                    for ($i=0; $i < $filas; $i++) { 
                                    echo "<tr>";        
                                    ?>  
                                    <td><?=$num?></td>
                                    <?php for ($j=1; $j <$campos; $j++) { ?>
                                    <td><?=$data[$i][$j]?></td>

                                    <?php } ?>

                                    <td><button></button>

        

                                    <button><a href="javascript:eliminar(<?=$data[$i][0]?>)">Eliminar</a></button>
                                    </td>
                                    <?php   
                                    $num++;
                                    }   ?>

                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php include_once "../includes/footer.php"; ?>
