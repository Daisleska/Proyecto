<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
$dia_lab=unserialize($dia_lab);
$empleado=unserialize($empleado);
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
        for ($j=0; $j <1; $j++) { 
        ?>
        <input type="hidden" name="id" value="<?=$empleado[$j][0]?>">

        C.I: <?=$empleado[$j][1]?> <?=$empleado[$j][3]?> <?=$empleado[$j][2]?>

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
                                    <form action="../../Controladores/ControladorDiasLab.php?operacion=actualizar" method="POST" name="form" class="form">
                                    <tbody>

                                   <?php 
                                   $dia=["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
                                    $count=count($dia);

                                
                                  
                                    ?>
                                 <tr>
                                   
                                   <?php $num=1;
                                   
                                    for ($i=0; $i<$filas2; $i++) { 
                                    echo "<tr>"; 
                                    ?>
                                    <td><?=$num?></td>
                                    <td><?=$dia_lab[$i][1]?></td>
                                    <?php
                                    echo $dia_lab[$i][1];
                                    switch ($dia_lab[$i][1]) {
                                        case "Lunes":
                                        echo "es lunes";
                                            
                                            break;

                                        case "Martes":
                                             echo "es martes";
                                        break;

                                        case "Miercoles":
                                             echo "es miercoles";
                                        break;

                                        case "Jueves":
                                             echo "es jueves";
                                        break;

                                        case "Viernes":
                                            echo "es viernes";
                                        break;

                                        case "Sabado":
                                             echo "es sabado";
                                        break;

                                        case "Domingo":
                                             echo "es domingo";
                                        break;
                                        
                                       
                                    }

                                         
                                
                                    $num++;
                                    }   ?>             
                                    </tr>


                                        
                                    </tbody>
                                 
                                </table>
                                <button type="submit" class="btn btn-primary btn-sm">
                               <i class="fa fa-check"></i> 
                               </button>
                           </form>
                                   
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php include_once "../includes/footer.php"; ?>
