
<?php include_once "../includes/menu.php";
extract($_REQUEST);
$data=unserialize($data);
?>

        <div class="breadcrumbs">
           
            <div class="col-sm-5">
                <div class="page-header float-left">
                    <div class="page-title">
                        <div>
                           
                        </div>
                  </div>
                </div>
            </div>

                        <div class="col-sm-7">
                <div class="page-header float-right">
                   <ol class="breadcrumb text-right">
                            <li><a href="../../Controladores/ControladorMP.php?operacion=registrar">Registrar Materia Prima</a></li>

                            <li><a href="../../Controladores/ControladorProveedor.php?operacion=registrar">Registrar Proveedor</a>
                            </li>
                        </ol>
                </div>
            </div>

                    
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-list"></i> LISTADO DE MATERIA PRIMA</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Presentación</th>
                                            <th>Unidad</th>
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
                                    for ($j=1; $j <=4; $j++) 
                                    { 
                                     ?>

                                    <td><?=$data[$i][$j]?></td>


                                    <?php 

                                    }  ?>
    
                                    <td><a  href="../../Controladores/ControladorMP.php?operacion=modificar&id_materia_prima=<?=$data[$i][0]?>"><i title="Modificar" class="menu-icon fa fa-edit"></a></i>
    
                                    
    

                                    <a href="../../Controladores/ControladorMP.php?operacion=eliminar&id_materia_prima=<?=$data[$i][0]?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>
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