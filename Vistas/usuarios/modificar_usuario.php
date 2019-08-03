<?php 

extract($_REQUEST);
$data=unserialize($data);
?>
<?php include_once "../includes/menu.php"; ?>
       

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                           <strong>Modificar Usuarios</strong> 
                                </div>
                                   <div class="card-body card-block">
                                    <form action="../../Controladores/controladorUsuario.php?operacion=modificar" method="post" class="form-horizontal">
            

                        <div class="form-group">
                            <label>Nombre</label>
                            <input name="nombre" maxlength="30" type="text" class="form-control" required="required" placeholder="nombre" value="<?=$data[1]?>">
                        </div>


                            <div class="form-group">
                                <label>Correo</label>
                                <input name="correo" required="required" maxlength="30" type="email" class="form-control" placeholder="Correo" value="<?=$data[2]?>">
                        </div>

                        <div>¿Desea cambiar la clave?
                        <input type="checkbox" name="cambiar" id="cambiar" value="1">
                        </div>
                                <div class="form-group">
                                    <label>Contraseña Anterior</label>
                                    <input name="clave_anterior" id="clave_anterior" required="required" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña" disabled="disabled">
                        </div>

                         
                        
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input   name="clave" id="clave" required="required" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña" disabled="disabled" >
                        </div>

                      
                                <div class="form-group">
                                    <label>Repetir Contraseña</label>
                                    <input   name="clave_repetir" id="clave_repetir" required="required" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña" disabled="disabled">
                        </div>

                        <div class="form-group">
                                    <label>Pregunta de Seguridad</label>
                                    <input name="pregunta" required="required" minlength="2" maxlength="90" type="text" class="form-control" placeholder="color favorito?" value="<?=$data[5]?>">
                        </div>

                        <div class="form-group">
                                    <label>Respuesta</label>
                                    <input name="respuesta" required="required" minlength="2" maxlength="90" type="text" class="form-control" placeholder="Azul"value="<?=$data[6]?>">
                        </div>

                                    

            
                                </div>
                           
                        </div>
                <div><input type="hidden" name="operacion" value="actualizar"><input type="hidden" name="id_usuarios" value="<?=$data[0]?>"><br>
                </div>
                <div class="card-footer">
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


    <!-- <script src="../../vendors/jquery/dist/jquery.min.js"></script> -->
<?php include_once "../includes/footer.php"; ?>