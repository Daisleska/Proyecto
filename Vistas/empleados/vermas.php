<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Listado</h1>
                    </div>
                </div>
            </div>
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
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Empleado</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                         
                                            
                                            <th>C.I</th>
                                            <td></td>
                                            <th>Nombres</th>
                                            <td></td>
                                            <tr></tr>
                                            <th>Apellidos</th>
                                            <td></td>
                                            <th>Dirección</th>
                                            <td></td>
                                            <tr></tr>
                                            <th>Teléfono</th>
                                            <td></td>
                                            <th>Fecha de Ingreso</th>
                                            <td></td>
                                            <tr></tr>
                                            <th>Condición</th>
                                            <td></td>
                                            <th>Fecha de Vencimiento</th>
                                            <td></td>
                                            <tr></tr>
                                            <th>Salario</th>
                                            <td></td>>
                                            <th>N° Cuenta</th>
                                            <td></td>
                                            <tr></tr>
                                            <th>Cargo</th>
                                            <td></td>
                                            <th>Departamento</th>
                                            <td></td>


                                                                                   
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <?php $num=1; 
                                    for ($i=0; $i < $filas; $i++) { 
                                    echo "<tr>";        
                                    ?>  
                                    <td><?=$num?></td>
                                    <?php for ($j=1; $j <=11; $j++) { ?>
                                    <td><?=$data[$i][$j]?></td>

                                    <?php } ?>

                                    <td><button><a href="../../Controladores/ControladorDiasLab.php?operacion=modificar&id_empleado=<?=$data[$i][0]?>">Modificar</a></button>

        

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
