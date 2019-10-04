<?php 
include_once "../includes/menu.php"; 
extract($_REQUEST);
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


                                            
                                                

                
                    <div class="col-lg-10" style="margin-left: 2cm;">
                     <div class="card">
                    <div class="card-header">
                     <strong><i class="fa fa-edit"></i> REGISTRAR USUARIO</strong> 
                                                    </div>

                 
                    <div class="card-body card-block">
                    <form action="../../Controladores/ControladorUsuario.php?operacion=guardar" method="POST" class="form-horizontal">
                                      

                     <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-nombres" class=" form-control-label">* Nombres:</label></div>
                    <div class="col-12 col-md-6"><input type="text" required="required" id="hf-nombres" minlength="4" maxlength="20" name="nombre" placeholder="Ej: Victor Alvarez" class="form-control"></div>
                     </div>

                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-correo" class=" form-control-label">* Correo:</label></div>
                    <div class="col-12 col-md-6"><input type="email" minlength="15" maxlength="25" required="required" id="hf-correo" name="correo" placeholder="Ej: victor-12@gmail.com" class="form-control"></div>
                     </div>


                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-clave" class=" form-control-label">* Contraseña:</label></div>
                    <div class="col-12 col-md-6"><input type="password" required="required" minlength="6" maxlength="20" id="hf-clave" name="clave" class="form-control"></div>
                     </div>

                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-clave" class=" form-control-label">* Repetir Contraseña:</label></div>
                    <div class="col-12 col-md-6"><input type="password" required="required" minlength="6" maxlength="20" id="hf-clave" name="clave_repetir" class="form-control"></div>
                     </div>
                    
                     <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-tipo_usuario" class=" form-control-label">* Tipo de Usuario:</label></div>
                    <div class="col-12 col-md-6">
                    
                               <select name="tipo_usuario" required="required" title="Seleccione el tipo de Usuario" class="form-control">
                              <?php if ($data[4]=="Admin") {
                              ?>
                              <option value="Admin" <?php if($data[4]=="Admin"){ ?> selected="selected" <?php } ?> >Admin</option>
                              <?php 
                              }
                              ?>
                              <option value="Admin" <?php if($data[4]=="Admin"){ ?> selected="selected" <?php } ?> >Administrador</option>
                              <option value="Usuario 1" <?php if($data[4]=="Usuario 1"){ ?> selected="selected" <?php } ?> >Usuario 1</option>
                              <option value="Usuario 2" <?php if($data[4]=="Usuario 2"){ ?> selected="selected" <?php } ?> >Usuario 2</option>
                              </select>
                       </div>
                       </div>
                    

                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-pregunta" class=" form-control-label">* Pregunta de Seguridad:</label></div>
                    <div class="col-12 col-md-6"><input type="text" required="required" id="hf-pregunta" minlength="5" maxlength="20" name="pregunta" class="form-control"></div>
                     </div>

                    <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                    <div class="col col-md-5"><label for="hf-respuesta" class=" form-control-label">* Respuesta de Seguridad:</label></div>
                    <div class="col-12 col-md-6"><input type="text" required="required" minlength="4" maxlength="20" id="hf-respuesta" name="respuesta" class="form-control"></div>
                     </div>
 
                    <p style="padding-left: 50px; padding-top: 10px;">(*) Campos obligatorios</p>
                    </div>


                    
                    
                    <div class="card-footer">
                    <input type="hidden" name="operacion" value="guardar">
                    <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> 
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
