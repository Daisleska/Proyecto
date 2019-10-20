<?php 
include ('../../Modelos/clasedb.php');
include_once "../includes/menu.php";
extract ($_REQUEST);
$data=unserialize($data);
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

        <div class="content mt-3">
            <div class="animated fadeIn">
                
<div class="col-lg-10" style="margin-left: 2cm;">
                    <div class="card">
                      <div class="card-header">
                           <strong><i class="fa fa-edit"></i> MODIFICAR EMPLEADO
                          
                    
                 </strong>   
                                </div>
                                   <div class="card-body card-block">
                                    <form action="../../Controladores/ControladorEmpleado.php?operacion=actualizar" method="POST" class="form-horizontal">
                                    
                                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                                    <div class="col col-md-5"><label for="hf-ci" class=" form-control-label">C.I:</label></div>
                                    <div class="col-12 col-md-5"><input type="number" id="hf-ci" name="cedula" readonly="readonly" class="form-control" value="<?php echo $data['cedula']; ?>"></div>
                                    </div>

                                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                                    <div class="col col-md-5"><label for="hf-nombres" class=" form-control-label">Nombres:</label></div>
                                    <div class="col-12 col-md-5"><input type="text" id="hf-nombres" name="nombres" placeholder="Ingrese el nombre" minlength="4" maxlength="30" required="required"class="form-control" value="<?php echo $data['nombres']; ?>"></div>
                                    </div>

                                    
                                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                                    <div class="col col-md-5"><label for="hf-apellidos" class=" form-control-label">Apellidos:</label></div>
                                    <div class="col-12 col-md-5"><input type="text" id="hf-apellidos" name="apellidos" placeholder="Ingrese el apellido" minlength="4" maxlength="30" required="required" class="form-control" value="<?php echo $data['apellidos']; ?>"></div>
                                    </div>

                                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                                    <div class="col col-md-5"><label for="hf-dir" class=" form-control-label">Dirección:</label></div>
                                    <div class="col-12 col-md-5"><input type="textarea" id="hf-dir" name="direccion" placeholder="Ingrese la dirección" minlength="5" maxlength="30" required="required" class="form-control" value="<?php echo $data['direccion']; ?>"></div>
                                    </div>

                                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                                    <div class="col col-md-5"><label for="hf-tlf" class=" form-control-label">Teléfono:</label></div>
                                    <div class="col-12 col-md-5"><input type="text" id="hf-tlf" name="telefono" placeholder="Ingrese el número de teléfono" onkeypress="return solonumeros(event)" required="required" minlength="7" maxlength="11" class="form-control" value="<?php echo $data['telefono']; ?>"></div>
                                    </div>

                                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                                    <div class="col col-md-5"><label for="hf-fechai" class=" form-control-label">Fecha de Ingreso:</label></div>
                                    <div class="col-12 col-md-5"><input type="date" id="hf-fechai" name="fecha_ingreso" placeholder="Ingrese la fecha de ingreso"  required="required" class="form-control" value="<?php echo $data['fecha_ingreso']; ?>"></div>
                                    </div>

                                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                                    <div class="col col-md-5"><label for="hf-condicion" class=" form-control-label">Condición</label></div>
                                    <div class="col-12 col-md-5">
                                    <select id="hf-condicion" name="condicion" required="required" class="form-control" value="<?php echo $data['condicion']; ?>">
                                    <option value="Fijo">Fijo</option>
                                    <option value="Contratado">Contratado</option>             
                                    </select></div>
                                    </div>

                                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                                    <div class="col col-md-5"><label for="hf-fechav" class=" form-control-label">Fecha de Vencimiento:</label></div>
                                    <div class="col-12 col-md-5"><input type="date" id="hf-fechav" name="fecha_venc" placeholder="Ingrese la fecha de vencimiento" required="required" class="form-control" value="<?php echo $data['fecha_venc']; ?>"></div>
                                    </div>

                                    
                                


                                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                                    <div class="col col-md-5"><label for="hf-ncuenta" class=" form-control-label">Número de Cuenta:</label></div>
                                    <div class="col-12 col-md-5"><input type="text" id="hf-ncuenta" name="ncuenta" placeholder="Ingrese el número de cuenta" onkeypress="return solonumeros(event)" minlength="20" maxlength="20" required="required" class="form-control" value="<?php echo $data['ncuenta']; ?>"></div>
                                    </div>
                                </div>

                <dir>
                <input type="hidden" name="operacion" value="actualizar">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                </dir>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-check"></i>
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i>
                </button>
                <button class="btn btn-primary btn-sm"><a href="../../Controladores/ControladorEmpleado.php?operacion=index"><i class="fa fa-mail-reply"></i>&nbsp;</a></button>
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