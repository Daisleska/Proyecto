<?php
extract($_REQUEST);
$data=unserialize($data);
?>

<?php include_once "../includes/menu.php";?> 
        <div class="breadcrumbs">
            <!-- <div class="col-sm-4">
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
                    <div style=" padding-left: 18px;">
                    <button  class="btn btn-primary"><i class="fa fa-mail-reply"><a href="../../Controladores/ControladorEmpleado.php?operacion=index"></i>&nbsp;</a> Volver</button></div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Informacion del Empleado </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Cédula</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Fecha de Ingreso</th>
                                            <th>Condición</th>
                                            <th>Fecha de Vencimiento</th>
                                            <th>Salario</th>
                                            <th>N° Cuenta</th>
                                            <th>Cargo</th>
                                            <th>Departamento</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <?php $num=1; 
                                    for ($i=0; $i <$filas; $i++) { 
                                    echo "<tr>";        
                                    ?>  
                                    <td><?=$num?></td>
                                    <?php for ($j=1; $j <$campos; $j++) { ?>
                                    <td><?=$data[$i][$j]?></td>

                                    <?php } ?>

                                    <button class="btn btn-secondary"><i class="fa fa-edit"><a href="../../Controladores/ControladorDiasLab.php?operacion=modificar&id_empleado=<?=$data[$i][0]?>"></a></i>&nbsp;Modificar</button>

        

                                    <button class="btn btn-primary"><i class="fa fa-trash-o"><a href="javascript:eliminar(<?=$data[$i][0]?>)"></a></i>&nbsp;Eliminar</button>

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
