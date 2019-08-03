<?php
extract($_REQUEST);
$data=unserialize($data);
?>

<?php include_once "../includes/menu.php"; ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Listado</h1>
                    </div>
                </div>
            </div>
           <!--  <div class="col-sm-8">
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
                                <strong class="card-title">Listado de Asignaciones y Deducciones</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descripción</th>
                                            <th>Tipo</th>
                                            <th>Monto</th>
                                            <th>opciones</th>
                                            
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $num=1;
                                    for($i=0; $i < $filas; $i++){

                                    echo "<tr>";
                                    ?>

                                    <td><?=$num?></td>
                                    <?php 
                                    for ($j=1; $j < $campos; $j++) 
                                    { 
                                     ?>

                                    <td><?=$data[$i][$j]?></td>


                                    <?php 

                                    }  ?>
    
                                    <td><a href="../../Controladores/ControladorAsigDeducc.php?operacion=modificar&id_ad=<?=$data[$i][0]?>">Modificar</a>
    
                                    
                                    
                                   <a href='../../Controladores/ControladorAsigDeducc.php?operacion=eliminar&id_ad(<?=$data[$i][0]?>)'>Eliminar</a>
                                    

                                    <a href="../../Controladores/ControladorAsigDeducc.php?"></a>
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

 <?php include_once "../includes/footer.php"; ?>