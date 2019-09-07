<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
$data=unserialize($data);
?>

        <div class="breadcrumbs">
           
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn" >
                <div class="row">

                    <div class="col-md-9">
                        <div class="card" >
                            <div class="card-header">
                                <strong class="card-title"><i style="color: #006699;" class="fa fa-user"></i> Empleado: <?php
        for ($j=1; $j <=1; $j++) { 
        ?>
        <input type="hidden" name="id" value="<?=$data[$i][0]?>"> <?=$data[$j][1]?> <?=$data[$j][2]?> C.I: <?=$data[$j][0]?>

        <?php } ?> </strong> 
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Dias Laborables</th>
                                                                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <?php $num=1; 
                                    for ($i=0; $i < $filas; $i++) { 
                                    echo "<tr>";        
                                    ?>  
                                    <td><?=$num?></td>
                                    <?php for ($j=3; $j <=3; $j++) { ?>
                                    <td><?=$data[$i][$j]?></td>

                                    <?php } ?>

                                    <?php   
                                    $num++;
                                    }   ?>
                                       
                                        
                                    </tbody>
                                 
                                </table>
                                    <td><button class="btn btn-primary btn-sm"><a href="../../Controladores/ControladorDiasLab.php?operacion=modificar&id_empleado=<?=$data[$i][0]?>">Modificar</a></button>

                                  

                                    <button class="btn btn-danger btn-sm"><a href="javascript:eliminar(<?=$data[$i][0]?>)">Eliminar</a></button>
                                    </td>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php include_once "../includes/footer.php"; ?>
