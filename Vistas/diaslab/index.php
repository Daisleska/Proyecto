<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
$data=unserialize($data);
?>

        <div class="breadcrumbs">
           
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn" >
                <div class="row">

                    <div class="col-md-9" style="margin-left: 2.5cm;">
                        <div class="card" >
                            <div class="card-header">
                                <strong class="card-title"><i style="color: #006699;" class="fa fa-user"></i> Empleado: <?php
        for ($j=1; $j <=1; $j++) { 
        ?>
        <input type="hidden" name="id" value="<?=$data[$i][0]?>"> C.I: <?=$data[$j][1]?> <?=$data[$j][3]?> <?=$data[$j][2]?>

        <?php } ?> </strong> 
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Días Laborables</th>
                                                                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <?php $num=1; 
                                    for ($i=0; $i < $filas; $i++) { 
                                    echo "<tr>";        
                                    ?>  
                                    <td><?=$num?></td>
                                    <?php for ($j=4; $j <=4; $j++) { ?>
                                    <td><?=$data[$i][$j]?></td>

                                    <?php } ?>

                                    <?php   
                                    $num++;
                                    }   ?>
                                       
                                        
                                    </tbody>
                                 
                                </table>
                                    

                                    <button class="btn btn-primary btn-sm"><a href="../../Controladores/ControladorDiasLab.php?operacion=modificar&id_empleado=<?=$data[0][0]?>"><i class="fa fa-edit"></i></a></button>


                                    <button class="btn btn-primary btn-sm"><a href="../../Controladores/ControladorEmpleado.php?operacion=index"><i class="fa fa-mail-reply"></i></a></button>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php include_once "../includes/footer.php"; ?>
