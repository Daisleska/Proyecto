<?php 
include_once "../includes/menu.php"; 
extract($_REQUEST);
$data=unserialize($data);
?>

<!DOCTYPE html>
<html>

<head>
<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
<script type="text/javascript">
            window.onload = function() {
                document.getElementById('cambiar').onclick = function () {
                    if( $(this).prop('checked') ) {
            $('#clave_anterior').removeAttr('disabled');
            $('#clave').removeAttr('disabled');
            $('#clave_repetir').removeAttr('disabled');
          }else{
            $('#clave_anterior').attr('disabled',true);
            $('#clave').attr('disabled',true);
            $('#clave_repetir').attr('disabled',true);
          }
                }
            }
            
        </script>
</head>
       

        <div class="content mt-3">
            <div class="animated fadeIn">
            

                <div class="col-lg-10" style="margin-left: 2cm;">
                    <div class="card">
                      <div class="card-header">
                           <strong><i class="fa fa-edit"></i> MODIFICAR USUARIO</strong> 
                                </div>
                                   <div class="card-body card-block">
                                    <form action="../../Controladores/controladorUsuario.php?operacion=actualizar" method="post" class="form-horizontal">
            
                        
                        <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                            <div class="col col-md-5">
                            <label>Nombre</label></div>
                            <div class="col-12 col-md-5"><input name="nombre" minlength="4" maxlength="20" type="text" class="form-control" required="required" placeholder="nombre" value="<?=$data[1]?>"></div>
                        </div>


                        <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                              <div class="col col-md-5">
                              <label>Correo</label></div>
                              <div class="col-12 col-md-5"><input name="correo" required="required" minlength="15"maxlength="25" type="email" class="form-control" placeholder="Correo" value="<?=$data[2]?>"></div>
                        </div>

                        <div style="padding-left: 50px; padding-top: 10px;">¿Desea cambiar la clave? 
                        <input type="checkbox" name="cambiar" id="cambiar" value="1"></div>
                        <br>
                        

                        <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                              <div class="col col-md-5">
                                    <label>Contraseña Anterior</label></div>
                                    <div class="col-12 col-md-5"><input name="clave_anterior" id="clave_anterior" required="required" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña" disabled="disabled"></div>
                        </div>
                      </br>

                         
                        
                        <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                              <div class="col col-md-5">
                                    <label>Contraseña</label></div>
                                    <div class="col-12 col-md-5"><input   name="clave" id="clave" required="required" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña" disabled="disabled" ></div>
                        </div>

                      
                        <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                              <div class="col col-md-5">
                                    <label>Repetir Contraseña</label></div>
                                    <div class="col-12 col-md-5"><input   name="clave_repetir" id="clave_repetir" required="required" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña" disabled="disabled"></div>
                        </div>

                        <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                              <div class="col col-md-5"><label>Tipo de Usuario</label></div>
                               <div class="col-12 col-md-5"><select name="tipo_usuario" title="Seleccione el tipo de Usuario" class="form-control">
                              <?php if ($data[4]=="Admin") {
                              ?>
                              <option value="Admin" <?php if($data[4]=="Admin"){ ?> selected="selected" <?php } ?> >Admin</option>
                              <?php 
                              }
                              ?>
                              <option value="Usuario 1" <?php if($data[4]=="Usuario 1"){ ?> selected="selected" <?php } ?> >Usuario 1</option>
                              <option value="Usuario 2" <?php if($data[4]=="Usuario 2"){ ?> selected="selected" <?php } ?> >Usuario 2</option>
                              </select></div>
                       </div>

                        <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                              <div class="col col-md-5">
                                    <label>Pregunta de Seguridad</label></div>
                                    <div class="col-12 col-md-5"><input name="pregunta" required="required" minlength="5" maxlength="20" type="text" class="form-control" placeholder="color favorito?" value="<?=$data[5]?>"></div>
                        </div>

                        <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                              <div class="col col-md-5">
                                    <label>Respuesta de Seguridad</label></div>
                                    <div class="col-12 col-md-5"><input name="respuesta" required="required" minlength="4" maxlength="20" type="text" class="form-control" placeholder="Azul"value="<?=$data[6]?>"></div>
                        </div>
                      </div>

                                    

            
                               
                <div><input type="hidden" name="operacion" value="actualizar"><input type="hidden" name="id_usuarios" value="<?=$data[0]?>"><br>
                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-check"></i>&nbsp; 
                      </button>
                <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> 
                </button>
                <button  class="btn btn-primary btn-sm"><a href="../../Controladores/ControladorUsuario.php?operacion=index"><i class="fa fa-mail-reply"></i>&nbsp;</a></button>
            
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


    <!-- <script src="../../vendors/jquery/dist/jquery.min.js"></script> -->
<?php include_once "../includes/footer.php"; ?>