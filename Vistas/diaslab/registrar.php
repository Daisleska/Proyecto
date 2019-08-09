
<?php include_once "../includes/menu.php"; ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                       
                    </div>
                </div>
            </div>
           <!--  <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                           <strong>Registro de Horario</strong> 
                                </div>
                                   <div class="card-body card-block">
                                    <form action="../../Controladores/ControladorDiasLab.php?operacion=guardar" method="POST" class="form">

                                    <div style="padding-left: 20px;" class="row form-group">
                                    <div class="col col-md-3"><label for="hf-empleado" class=" form-control-label">Empleado</label></div>
                                    <div class="col-12 col-md-6">
                                    <select name="id_empleado" title="Seleccione el empleado"class="form-control">
                                    <?php 
                                    for ($i=0;$i<$filas;$i++){
                                    ?>
                                    <option value="<?=$empleado[$i][0]?>"><?=$empleado[$i][1]?></option>
                                        <?php
                                     }
                                    ?>
                                    </select>
                                    </div>
                                    </div>

                                    <div style="padding-left: 20px;" class="row form-group">
                                    <div class="col col-md-3"><label for="hf-diaslab" class=" form-control-label">Días Laborables</label></div>
                                    <div class="form-check-inline form-check">
                                    <label for="inline-checkbox1" class="form-check-label ">
                                    <input type="checkbox" id="inline-checkbox1" name="dia" value="Lunes" class="form-check-input">Lunes
                                    </label>
                                    
                                    <label for="inline-checkbox2" class="form-check-label ">
                                    <input type="checkbox" id="inline-checkbox2" name="dia" value="Mertes" class="form-check-input">Martes
                                    </label>
                                    <label for="inline-checkbox3" class="form-check-label ">
                                    <input type="checkbox" id="inline-checkbox3" name="dia" value="Miercoles" class="form-check-input">Miércoles
                                    </label>
                                    <label for="inline-checkbox4" class="form-check-label ">
                                    <input type="checkbox" id="inline-checkbox4" name="dia" value="Jueves" class="form-check-input">Jueves
                                    </label>
                                    <label for="inline-checkbox5" class="form-check-label ">
                                    <input type="checkbox" id="inline-checkbox5" name="dia" value="Viernes" class="form-check-input">Viernes
                                    </label>
                                    <label for="inline-checkbox6" class="form-check-label ">
                                    <input type="checkbox" id="inline-checkbox6" name="dia" value="Sabado" class="form-check-input">Sábado
                                    </label>
                                    <label for="inline-checkbox7" class="form-check-label ">
                                    <input type="checkbox" id="inline-checkbox7" name="dia" value="Domingo" class="form-check-input">Domingo
                                    </label>


                            
                                    
                                    

                            </div>
                        </div>

                                    


                                    

            
                                </div>
                           
                        </div>
                <div class="card-footer">
                <input type="hidden" name="operacion" value="guardar">
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-send"></i> Guardar
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