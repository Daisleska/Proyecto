 <?php
extract($_REQUEST);
$data=unserialize($data);
?>

<?php include_once "../includes/menu.php"; ?>

        <div class="breadcrumbs">
            <div class="col-sm-5">
                <div class="page-header float-left">
                  <!-- <div class="page_tittle">
                     <i class="fa fa-list">  Listado de proveedores</i>
                  </div>
                </div> -->
            </div>
            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">

                     <!-- <ol class="breadcrumb text-right">
                            <li><a href="#"></a></li>
                 
                

                            <li class="active"> Recibido de INICA</li>
                        </ol> -->
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
                                <strong class="card-title"><i class="fa fa-list">   Listado de Proveedores</i></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>C.I/RIF</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
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
    
                                    <td><a href="../../Controladores/ControladorProveedor.php?operacion=modificar&id=<?=$data[$i][0]?>">Modificar</a>
    
                                    
                                    
                                   <a href='javascript:eliminar(".$data[$i][0].")'>Eliminar</a>

                                    

                                    <a href="../../Controladores/ControladorProveedor.php?"></a></td>

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