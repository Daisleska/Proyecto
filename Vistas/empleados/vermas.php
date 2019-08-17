<<<<<<< HEAD
<?php 
include_once "../includes/menu.php"; 
=======
<?php
>>>>>>> 30a5e08d2e9da07455a10325cc1f8669b4bb9764
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
<<<<<<< HEAD
                                            <th>N°</th>
                                            <th>C.I</th>
=======
                                            <th>#ID</th>
                                            <th>Cédula</th>
>>>>>>> 30a5e08d2e9da07455a10325cc1f8669b4bb9764
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
<<<<<<< HEAD
                                            <th>Opciones</th>


                                                                                   
=======
                                            
>>>>>>> 30a5e08d2e9da07455a10325cc1f8669b4bb9764
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <?php $num=1; 
                                    for ($i=0; $i <$filas; $i++) { 
                                    echo "<tr>";        
                                    ?>  
                                    <td><?=$num?></td>
<<<<<<< HEAD
                                    <?php for ($j=0; $j < $campos; $j++) { ?>
=======
                                    <?php for ($j=1; $j <$campos; $j++) { ?>
>>>>>>> 30a5e08d2e9da07455a10325cc1f8669b4bb9764
                                    <td><?=$data[$i][$j]?></td>

                                    <?php } ?>

<<<<<<< HEAD
                                    <td><a  href="../../Controladores/ControladorEmpleado.php?operacion=modificar&id_empleado=<?=$data[$i][0]?>"><i title="Modificar" class="menu-icon fa fa-edit"></a></i>
=======
                                    <button class="btn btn-secondary"><i class="fa fa-edit"><a href="../../Controladores/ControladorDiasLab.php?operacion=modificar&id_empleado=<?=$data[$i][0]?>"></a></i>&nbsp;Modificar</button>
>>>>>>> 30a5e08d2e9da07455a10325cc1f8669b4bb9764

                                

<<<<<<< HEAD
                                    <a href="../../Controladores/ControladorEmpleado.php?operacion=eliminar&id_empleado=<?=$data[$i][0]?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>
                                    </td>
=======
                                    <button class="btn btn-primary"><i class="fa fa-trash-o"><a href="javascript:eliminar(<?=$data[$i][0]?>)"></a></i>&nbsp;Eliminar</button>

>>>>>>> 30a5e08d2e9da07455a10325cc1f8669b4bb9764
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
