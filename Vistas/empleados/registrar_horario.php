<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
$dia=unserialize($dia);
?>
 <form action="../../Controladores/ControladorEmpleado.php" method="post" class="form-horizontal">
 <div style="padding-left: 200px;" class="content mt-3">
            <div class="animated fadeIn">


                <div class="col-lg-9">
                    <div class="card">
                      <div class="card-header">
                           <strong>Asignar dias laborables al empleado: <?php 
    for ($i=6; $i<$row_dia; $i++) { 
       
            ?>
            <tr><i class="fa fa-user"> <?=$dia[$i][2]?> </i>
           </tr>
            <?php
        
    }
?> </strong> 
                                </div>
     
 
<?php 
    for ($i=0; $i <$row_dia; $i++) { 
       
            ?>
           <div  style="padding-bottom:10px;  padding-left: 20px;"> <tr><td> <br><i class="fa fa-calendar"> <?=$dia[$i][0]?></i></td><td>
            <input type="checkbox" name="id_dia[]" value="<?=$dia[$i][0]?>"
                <?php if ($dia[$i][1]=="Si") {
                ?> checked="checked  "  <?php
                } ?>></div> </td> </tr>
            <?php
        
    }
?>
                           
                 
               
                <div class="card-footer">
                <input type="hidden" name="id_empleado" value="<?=$dia[$i][$id_empleado]?>">
                <input type="hidden" name="operacion" value="horario">
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-check"></i> Guardar
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Limpiar
                </button>
                           </form> 

                                                    </div>
                                                </div>
                                                
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->
     
<?php include_once "../includes/footer.php"; ?>
