<?php 
include_once "../includes/menu.php"; 
extract($_REQUEST);
$cargos=unserialize($cargos);
$departamentos=unserialize($departamentos);
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

        <div class="content mt-3 container">
            <div class="animated fadeIn">


                                            
                                                

                
                    <div class="col-lg-11">
                     <div class="card">
                    <div class="card-header">
                     <strong><i class="fa fa-edit"></i> Registro de Empleados</strong> 
                                                    </div>

                 
                    <div class="card-body card-block">
                    <form action="../../Controladores/ControladorEmpleado.php" method="post" class="form-horizontal justify-content-center">
                                      
                    <div style="padding-left: 20px; padding-top: 10px;" class="row form-group">
                     <div class="col col-md-4"><label for="hf-ci" class=" form-control-label">* Cédula:</label></div>
                    <div class="col-12 col-md-5"><input required="required" type="text" id="hf-ci" name="cedula" placeholder="Ej: 12.345.678" class="form-control"></div>
                    </div>

                     <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-4"><label for="hf-nombres" class=" form-control-label">* Nombres:</label></div>
                    <div class="col-12 col-md-5"><input type="text" id="hf-nombres" name="nombres" placeholder="Ej: Juan Armando" class="form-control"></div>
                     </div>

                     <div style="padding-left: 20px;" class="row form-group">
                     <div class="col col-md-4"><label for="hf-apellidos" class=" form-control-label">* Apellidos:</label></div>
                    <div class="col-12 col-md-5"><input type="text" id="hf-apellidos" name="apellidos" placeholder="Ej: Hernández Ceballos" class="form-control"></div>
                    </div>

                     <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-4"><label for="hf-dir" class=" form-control-label">* Dirección:</label></div>
                    <div class="col-12 col-md-5"><input type="textarea" id="hf-dir" name="direccion" placeholder="Ej: La Victoria #00" class="form-control"></div>
                    </div>

                    <div style="padding-left: 20px;" class="row form-group">
                     <div class="col col-md-4"><label for="hf-tlf" class=" form-control-label">* Teléfono:</label></div>
                    <div class="col-12 col-md-5"><input type="text" id="hf-tlf" name="telefono" placeholder="Ej: 0212-0120300" class="form-control"></div>
                    </div>

                    <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-4"><label for="hf-fechai" class=" form-control-label">* Fecha de Ingreso:</label></div>
                    <div class="col-12 col-md-5"><input type="date" id="hf-fechai" name="fecha_ingreso" placeholder="Ej: 12-00-0000" class="form-control"></div>
                    </div>

                     <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-4"><label for="hf-condicion" class=" form-control-label">* Condición</label></div>
                    <div class="col-12 col-md-5">
                    <select id="hf-condicion" name="condicion" class="form-control">
                    <option selected="selected">Seleccione</option>
                     <option>Fijo</option>
                    <option>Contratado</option>
                                                                        
                    </select>

                    </div>
                    </div>

                    <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-4"><label for="hf-fechav" class=" form-control-label">Fecha de Vencimiento:</label></div>
                    <div class="col-12 col-md-5"><input type="date" id="hf-fechav" name="fecha_venc" placeholder="Ej: 12-00-2000" class="form-control"></div>
                                                            </div>


                     <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-4"><label for="hf-salario" class=" form-control-label">Salario:</label></div>
                    <div class="col-12 col-md-5"><input type="text" id="hf-salario" name="salario" placeholder="Ej: 1.000.000" class="form-control"></div>
                    </div>


                    <div style="padding-left: 20px;" class="row form-group">
                     <div class="col col-md-4"><label for="hf-ncuenta" class=" form-control-label">* Número de Cuenta:</label></div>
                    <div class="col-12 col-md-5"><input type="text" id="hf-ncuenta" name="ncuenta" placeholder="Ej: 017503002028919920" class="form-control"></div>
                    </div>

                    <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-4"><label for="hf-cargo" class=" form-control-label">* Cargo</label></div>
                    <div class="col-12 col-md-5">
                    <select name="id_cargo" title="Seleccione el cargo"class="form-control">
                    <option disabled="disabled" selected="selected" value="">Seleccione el Cargo</option>
                    <?php 
                    for ($i=0; $i<$filas_cat; $i++){
                    ?>
                    <option value="<?=$cargos[$i][0]?>"><?=$cargos[$i][1]?></option>
                    <?php
                    }
                    ?>
                    </select>
                    </div>
                    </div>

                     <div style="padding-left: 20px;" class="row form-group">
                    <div class="col col-md-4"><label for="hf-departameno" class=" form-control-label">* Departamento</label></div>
                    <div class="col-12 col-md-5">
                    <select name="id_departamento" title="Seleccione el Departamento"class="form-control">
                    <option disabled="disabled" selected="selected" value="">Seleccione el Departamento</option>
                    <?php 
                    for ($i=0; $i<$filas_tip; $i++){
                    ?>
                    <option value="<?=$departamentos[$i][0]?>"> <?=$departamentos[$i][1]?></option>
                    <?php
                    }
                    ?>
                    </select>
                    </div>
                    </div>
                                        <p>(*) Campos obligatorios</p>


                    
                    </div>

                    <div class="col-lg-9">
                    <div class="card">
                      <div class="card-header">
                        <strong>Asignar dias Laborables al Empleado:</strong>
                       
                       <div>
                        <th> Lunes</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="Lunes"> 
                           <br>

                            <th> Martes</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="Martes">
                           <br>

                            <th> Miércoles</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="Miercoles">
                           <br>

                            <th> Jueves</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="Jueves">
                           <br>

                            <th> Viernes</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="Viernes">
                           <br>

                            <th> Sábado</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="Sabado">
                           <br>

                            <th> Domingo</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="Domingo">
                           <br>
                       </div>
             </div>
         </div>
               </div>
            
                    <div class="card-footer">
                    <input type="hidden" name="operacion" value="guardar">
                    <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-check"></i> Guardar
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Limpiar
                    </button></div></div>
              
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
