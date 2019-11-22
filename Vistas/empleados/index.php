<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
$data=unserialize($data);
?>

       
         <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                     <a href="../../reportes/reporte_empleados.php" target="blank" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Reporte PDF</a>

                    <div class="col-md-12">
                      <div class="card">   
                            <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Cédula</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Fecha de Ingreso</th>
                                            <th>Opción</th>                                     
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <?php $num=1; 
                                    for ($i=0; $i < $filas; $i++) { 
                                    echo "<tr>";        
                                    ?>  
                                    <td><?=$num?></td>
                                    <?php for ($j=1; $j <=6; $j++) { ?>
                                    <td><?=$data[$i][$j]?></td>

                                    <?php } ?>

                                    <td><a  href="../../Controladores/ControladorEmpleado.php?operacion=modificar&id_empleado=<?=$data[$i][0]?>"><i title="Modificar" class="menu-icon fa fa-edit"></a></i>

                                    <a href="../../Controladores/ControladorEmpleado.php?operacion=vermas&id_empleado=<?=$data[$i][0]?>"><i title="Ver más" class="menu-icon fa fa-search-plus "></a></i>



                                    <a href="../../Controladores/ControladorEmpleado.php?operacion=verhorario&cedula=<?=$data[$i][1]?>"><i title="Horario" class="menu-icon fa fa-list"></a></i>

                                    <a href="../../Controladores/ControladorEmpleado.php?operacion=eliminar&id_empleado=<?=$data[$i][0]?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>
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
