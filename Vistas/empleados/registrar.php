<?php 
include_once "../includes/menu.php"; 
extract($_REQUEST);
$cargos=unserialize($cargos);
$departamentos=unserialize($departamentos);
$asignaciones=unserialize($asignaciones);

?>
<script type="text/javascript">
    function solonumeros(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key);
        numeros="0123456789";
        especiales="8-37-38-46";
        teclado_especial=false;
        for (var i in especiales) {
            if (key==especiales[i]) {
                teclado_especial=true;

            }
            
        }
        if (numeros.indexOf(teclado)==-1 && !teclado_especial) {
            return false;
        }
    }
</script>




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
                      
                       <h2 style="text-align: center; "><strong>Registrar Empleado</strong><br></h2><hr>                          

                
                    <div class="col-lg-10" style="margin-left: 2cm;">
                     <div class="card">
      
                 
                    <div class="card-body card-block">
                    <form action="../../Controladores/ControladorEmpleado.php" method="post" class="form-horizontal justify-content-center">


                                      
                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                     <div class="col col-md-5"><label for="hf-ci" class=" form-control-label">* Cédula:</label></div>
                    <div class="col-12 col-md-5"><input required="required" type="text" id="hf-ci" minlength="8" maxlength="9" name="cedula" placeholder="Ej: 12.345.678" class="form-control"></div>
                    </div>

                     <div style="padding-left: 50px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-nombres" class=" form-control-label">* Nombres:</label></div>
                    <div class="col-12 col-md-5"><input type="text" id="hf-nombres" minlength="4" maxlength="30" required="required" name="nombres" placeholder="Ej: Juan Armando" class="form-control"></div>
                     </div>

                     <div style="padding-left: 50px;" class="row form-group">
                     <div class="col col-md-5"><label for="hf-apellidos" class=" form-control-label">* Apellidos:</label></div>
                    <div class="col-12 col-md-5"><input type="text" id="hf-apellidos" minlength="4" maxlength="30" required="required" name="apellidos" placeholder="Ej: Hernández Ceballos" class="form-control"></div>
                    </div>

                     <div style="padding-left: 50px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-dir" class=" form-control-label">* Dirección:</label></div>
                    <div class="col-12 col-md-5"><input type="textarea" id="hf-dir" name="direccion" minlength="5" maxlength="35" required="required" placeholder="Ej: La Victoria #00" class="form-control"></div>
                    </div>

                    <div style="padding-left: 50px;" class="row form-group">
                     <div class="col col-md-5"><label for="hf-tlf" class=" form-control-label">* Teléfono:</label></div>
                    <div class="col-12 col-md-5"><input type="text" onkeypress="return solonumeros(event)" id="hf-tlf" name="telefono"  minlength="7" maxlength="11" required="required" placeholder="Ej: 0212-0120300" class="form-control"></div>
                    </div>

                    <div style="padding-left: 50px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-fechai" class=" form-control-label">* Fecha de Ingreso:</label></div>
                    <div class="col-12 col-md-5"><input type="date" id="hf-fechai" name="fecha_ingreso" placeholder="Ej: 12-00-0000" class="form-control"></div>
                    </div>

                     <div style="padding-left: 50px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-condicion" class=" form-control-label">* Condición</label></div>
                    <div class="col-12 col-md-5">
                    <select id="hf-condicion" name="condicion" class="form-control">
                    <option selected="selected">Seleccione</option>
                     <option>Fijo</option>
                    <option>Contratado</option>
                                                                        
                    </select>

                    </div>
                    </div>

                    <div style="padding-left: 50px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-fechav" class=" form-control-label">Fecha de Vencimiento:</label></div>
                    <div class="col-12 col-md-5"><input type="date" id="hf-fechav" name="fecha_venc" placeholder="Ej: 12-00-2000" class="form-control"></div>
                                                            </div>

                    <div style="padding-left: 50px;" class="row form-group">
                     <div class="col col-md-5"><label for="hf-ncuenta" class=" form-control-label">* Número de Cuenta:</label></div>
                    <div class="col-12 col-md-5"><input type="text" onkeypress="return solonumeros(event)" id="hf-ncuenta" name="ncuenta" minlength="20" maxlength="20" placeholder="Ej: 017503002028919920" class="form-control"></div>
                    </div>

                    <div style="padding-left: 50px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-cargo" class=" form-control-label">* Cargo</label></div>
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

                     <div style="padding-left: 50px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-departameno" class=" form-control-label">* Departamento</label></div>
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
                                        <p style="padding-left: 50px;">(*) Campos obligatorios</p>


                    
                    </div>

                    <div class="col-lg-11" style="padding-left: 50px;">
                    <div class="card">
                      <div class="card-header">
                        <strong style="text-align: center;">ASIGNAR DÍAS LABORABLES</strong>
                       
                       <div>
                        <th> Lunes</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="Lunes"> 
                           <br>

                            <th> Martes</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="Martes">
                           <br>

                            <th> Miércoles</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="Mi&eacute;rcoles">
                           <br>

                            <th> Jueves</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="Jueves">
                           <br>

                            <th> Viernes</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="Viernes">
                           <br>

                            <th> Sábado</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="S&aacute;bado">
                           <br>

                            <th> Domingo</th>
                           <input type="checkbox" name="checkbox[]" id="checkbox" value="Domingo">
                           <br>
                       </div>
             </div>
         </div>
               </div>


          <!-- asignaciones y deducciones -->
               <div class="card">
                            <div class="card-header" >
                                <strong class="card-title">Asignaciones / Deducciones</strong>
                            </div>
                            <div class="card-body">

                                <select name="asignaciones[]" data-placeholder="..." multiple class="standardSelect" >
                                    <option value="" selected="selected" disabled="disabled"></option>
                                    <?php 
                    for ($i=0; $i<$filas_asi; $i++){
                    ?>
                    <option value="<?=$asignaciones[$i][0]?>"><?=$asignaciones[$i][1]?> / <?=$asignaciones[$i][2]?></option>
                    <?php
                    }
                    ?>
                                   
                                </select>

                            </div>
                        </div>
            
                    <div class="card-footer">
                    <input type="hidden" name="operacion" value="guardar">
                    <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-check"></i> 
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> 
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

