<?php 
include ('../../Modelos/clasedb.php');
include_once "../includes/menu.php";
extract ($_REQUEST);
$data=unserialize($data);
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
                           <strong>Modificar Empleado</strong> 
                                </div>
                                   <div class="card-body card-block">
                                    <form action="Controladores/ControladorEmlepado?operacion=actualizar" method="post" class="form-horizontal">
                                    
                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-ci" class=" form-control-label">C.I:</label></div>
                                    <div class="col-12 col-md-6"><input type="number" id="hf-ci" name="cedula" placeholder="Ingrese el número de cedula" required="required" class="form-control" value="<?php echo $data['cedula']; ?>"></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-nombres" class=" form-control-label">Nombres:</label></div>
                                    <div class="col-12 col-md-6"><input type="text" id="hf-nombres" name="nombres" placeholder="Ingrese el nombre" required="required" class="form-control" value="<?php echo $data['nombres']; ?>"></div>
                                    </div>

                                    
                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-apellidos" class=" form-control-label">Apellidos:</label></div>
                                    <div class="col-12 col-md-6"><input type="text" id="hf-apellidos" name="apellidos" placeholder="Ingrese el apellido" required="required" class="form-control" value="<?php echo $data['apellidos']; ?>"></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-dir" class=" form-control-label">Dirección:</label></div>
                                    <div class="col-12 col-md-6"><input type="textarea" id="hf-dir" name="direccion" placeholder="Ingrese la dirección" required="required" class="form-control" value="<?php echo $data['direccion']; ?>"></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-tlf" class=" form-control-label">Teléfono:</label></div>
                                    <div class="col-12 col-md-6"><input type="number" id="hf-tlf" name="telefono" placeholder="Ingrese el número de teléfono" required="required" class="form-control" value="<?php echo $data['telefono']; ?>"></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-fechai" class=" form-control-label">Fecha de Ingreso:</label></div>
                                    <div class="col-12 col-md-6"><input type="date" id="hf-fechai" name="fecha_ingreso" placeholder="Ingrese la fecha de ingreso"  required="required" class="form-control" value="<?php echo $data['fecha_ingreso']; ?>"></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-condicion" class=" form-control-label">Condición</label></div>
                                    <div class="col-12 col-md-6">
                                    <select id="hf-condicion" name="condicion" required="required" class="form-control" value="<?php echo $data['condicion']; ?>">
                                    <option value="Fijo">Fijo</option>
                                    <option value="Contratado<">Contratado</option>             
                                    </select></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-fechav" class=" form-control-label">Fecha de Vencimiento:</label></div>
                                    <div class="col-12 col-md-6"><input type="date" id="hf-fechav" name="fecha_venc" placeholder="Ingrese la fecha de vencimiento" required="required" class="form-control" value="<?php echo $data['fecha_venc']; ?>"></div>
                                    </div>

                                    
                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-salario" class=" form-control-label">Salario:</label></div>
                                    <div class="col-12 col-md-6"><input type="number" id="hf-salario" name="salario" placeholder="Ingrese el salario" required="required" class="form-control" value="<?php echo $data['salario']; ?>"></div>
                                    </div>


                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-ncuenta" class=" form-control-label">Número de Cuenta:</label></div>
                                    <div class="col-12 col-md-6"><input type="text" id="hf-ncuenta" name="ncuenta" placeholder="Ingrese el número de cuenta" required="required" class="form-control" value="<?php echo $data['ncuenta']; ?>"></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-cargo" class=" form-control-label">Cargo:</label></div>
                                    <div class="col-12 col-md-6">
                                    <select id="hf-cargo" name="id_cargo" required="required" class="form-control">
                                    <option value="<?php echo $data['nombre']; ?>"></option>            
                                    </select></div>
                                    </div>
                <dir>
                <input type="hidden" name="operacion" value="actualizar">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                </dir>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-send"></i> Guardar
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Limpiar
                </button>
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