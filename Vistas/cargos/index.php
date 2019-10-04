<?php
extract($_REQUEST);
$data=unserialize($data);
include_once "../includes/menu.php"; 
?>

        <div class="breadcrumbs">
            <div class="col-sm-5">
                <div class="page-header float-left">

                
    
            </div>
            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">

                     
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-list"></i>  LISTADO DE CARGOS</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Cargo</th>
                                            <th>Salario</th>
                                            <th>Opciones</th>
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
    
                                    <td><a  href="../../Controladores/ControladorCargos.php?operacion=modificar&id_cargos=<?=$data[$i][0]?>"><i title="Modificar" class="menu-icon fa fa-edit"></a></i>
    
                                    
    

                                    <a href="../../Controladores/ControladorCargos.php?operacion=eliminar&id_cargos=<?=$data[$i][0]?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>
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
    </div>



    </div><!-- /#right-panel -->
 <?php include_once "../includes/footer.php"; ?>