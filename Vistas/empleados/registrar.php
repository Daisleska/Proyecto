<?php 
include_once "../includes/menu.php"; 
extract($_REQUEST);
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


                                            
                                                

                
                    <div class="col-lg-12">
                     <div class="card">
                    <div class="card-header">
                     <strong>Registro de Empleados</strong> 
                                                    </div>

                    </div>
                    <div class="card-body card-block">
                    <form action="../../Controladores/ControladorEmpleado.php" method="post" class="form-horizontal">
                                      
                    <div style="padding-left: 20px; padding-top: 10px;" class="row form-group">
                     <div class="col col-md-3"><label for="hf-ci" class=" form-control-label">C.I:</label></div>
                    <div class="col-12 col-md-6"><input type="number" id="hf-ci" name="cedula" placeholder="" class="form-control"><span class="help-block">Ingrese el número de cedula</span></div>
                    </div>

                     <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-3"><label for="hf-nombres" class=" form-control-label">Nombres:</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="hf-nombres" name="nombres" placeholder="" class="form-control"><span class="help-block">Ingrese el nombre</span></div>
                     </div>

                     <div style="padding-left: 20px;" class="row form-group">
                     <div class="col col-md-3"><label for="hf-apellidos" class=" form-control-label">Apellidos:</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="hf-apellidos" name="apellidos" placeholder="" class="form-control"><span class="help-block">Ingrese el apellido</span></div>
                    </div>

                     <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-3"><label for="hf-dir" class=" form-control-label">Dirección:</label></div>
                    <div class="col-12 col-md-6"><input type="textarea" id="hf-dir" name="direccion" placeholder="" class="form-control"><span class="help-block">Ingrese la dirección</span></div>
                    </div>

                    <div style="padding-left: 20px;" class="row form-group">
                     <div class="col col-md-3"><label for="hf-tlf" class=" form-control-label">Teléfono:</label></div>
                    <div class="col-12 col-md-6"><input type="number" id="hf-tlf" name="telefono" placeholder="" class="form-control"><span class="help-block">Ingrese el número de teléfono</span></div>
                    </div>

                    <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-3"><label for="hf-fechai" class=" form-control-label">Fecha de Ingreso:</label></div>
                    <div class="col-12 col-md-6"><input type="date" id="hf-fechai" name="fecha_ingreso" placeholder="Ingrese la fecha de ingreso" class="form-control"><span class="help-block">Ingrese la fecha de ingreso</span></div>
                    </div>

                     <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-3"><label for="hf-condicion" class=" form-control-label">Condición</label></div>
                    <div class="col-12 col-md-6">
                    <select id="hf-condicion" name="condicion" class="form-control">
                     <option>Fijo</option>
                    <option>Contratado</option>
                                                                        
                    </select>

                    <span class="help-block">Seleccione la condición</span></div>
                    </div>

                    <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-3"><label for="hf-fechav" class=" form-control-label">Fecha de Vencimiento:</label></div>
                    <div class="col-12 col-md-6"><input type="date" id="hf-fechav" name="fecha_venc" placeholder="Ingrese la fecha de vencimiento" class="form-control"><span class="help-block">Ingrese la fecha de vencimiento</span></div>
                                                            </div>


                     <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-3"><label for="hf-salario" class=" form-control-label">Salario:</label></div>
                    <div class="col-12 col-md-6"><input type="number" id="hf-salario" name="salario" placeholder="" class="form-control"><span class="help-block">Ingrese el salario</span></div>
                    </div>


                    <div style="padding-left: 20px;" class="row form-group">
                     <div class="col col-md-3"><label for="hf-ncuenta" class=" form-control-label">Número de Cuenta:</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="hf-ncuenta" name="ncuenta" placeholder="" class="form-control"><span class="help-block">Ingrese el número de cuenta</span></div>
                    </div>

                    <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-3"><label for="hf-cargo" class=" form-control-label">Cargo</label></div>
                    <div class="col-12 col-md-6">
                    <select name="id_cargos" title="Seleccione el cargo"class="form-control">
                    <?php 
                    for ($i=0;$i<$filas;$i++){
                    ?>
                    <option value="<?=$cargos[$i][0]?>"><?=$cargos[$i][1]?></option>
                    <?php
                    }
                    ?>
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
