<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
$empleado=unserialize($empleado);
?>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"></strong>
                            </div>
                            <div class="card-body">

                            </div>
                            <div class="card-body card-block">
                            <form action="../../Controladores/ControladorDiasLab.php" method="post" class="form-horizontal">


                            <div>Transporte
                            <select name="id_empleado" title="Seleccione el empleado" class="standardSelect">

                            <?php 
                            for ($i=0;$i<$filas;$i++){
                            ?>
                            <option value="<?=$empleado[$i][0]?>"><?=$empleado[$i][1]?></option>
                            <?php
                            }
                            ?>

                            </select></div>

                                <select data-placeholder="Choose a country..." multiple class="standardSelect">
                                    <option value=""></option>
                                    <option value="Lunes">Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miercoles">Miércoles</option>
                                    <option value="Jueves">Jueves</option>
                                    <option value="Viernes">Viernes</option>
                                    <option value="Sabado">Sábado</option>
                                    <option value="Domingo">Domingo</option>
                        
                                </select>

                            </div>
                        </div>


                          </div>
                    <div class="card-footer">
                    <input type="hidden" name="operacion" value="guardar">
                    <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-send"></i> Enviar
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
