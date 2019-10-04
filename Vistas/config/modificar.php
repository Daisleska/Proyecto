
<?php include_once "../includes/menu.php";
include ('../../Modelos/clasedb.php');

extract($_REQUEST);
$data=unserialize($data);
?>



<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="col-lg-10" style="margin-left: 2cm;">
                    <div class="card">
                      <div class="card-header">
                      <section class="content-header">
                          <ol class="breadcrumb">
                             <li><a href="../../Controladores/ControladorPerfil.php?operacion=verperfil"><i class="fa fa-user"></i> Datos Personales /</a></li>
                             <li><a href="../../Controladores/ControladorPerfil.php?operacion=cambiar_clave"><i class="fa fa-lock"></i> Cambiar Contraseña</a></li>
                         </ol>
                    </section>
                    </div>
                        <div class="card-body card-block">
                        <form action="../../Controladores/ControladorPerfil.php?operacion=actualizar" method="post" class="form-horizontal" enctype="multipart/form-data">
            

                        <div style="padding-left: 50px;" class="form-group">
                            <div class="col col-md-5"><label>Nombre</label></div>
                            <div class="col col-md-6"><input name="nombre" minlength="4" maxlength="20" type="text" class="form-control" required="required" placeholder="Nombre" value="<?=$data[0]?>"></div>


                        </div>
                        <br>
                        <br>


                        <div style="padding-left: 50px;" class="form-group">
                                <div class="col col-md-5"><label>Correo</label></div>
                                <div class="col col-md-6"><input name="correo" required="required" minlength="15" maxlength="25" type="email" class="form-control" placeholder="Correo" value="<?=$data[1]?>"></div>
                        </div>
                        <br>
                        <br>

                        <div style="padding-left: 50px;" class="form-group">
                                    <div class="col col-md-5"><label>Pregunta de Seguridad</label></div>
                                    <div class="col col-md-6"><input name="pregunta" required="required" minlength="6" maxlength="20" type="text" class="form-control" placeholder="Color favorito?" value="<?=$data[2]?>"></div>
                        </div>
                        <br>
                        <br>

                        <div style="padding-left: 50px;" class="form-group">
                                    <div class="col col-md-5"><label>Respuesta de Seguridad</label></div>
                                    <div class="col col-md-6"><input name="respuesta" required="required" minlength="5" maxlength="20" type="text" class="form-control" placeholder="Azul" value="<?=$data[3]?>"></div>
                        </div>
                        <br>
                        <br>
                        
                        <div style="padding-left: 50px;" class="form-group">
                                    <div class="col col-md-2"><label>Imagen</label>
                                    <br>
                                    <img src="" height="150" width="150">
                                    <br>
                                    <br>
                                     <input name="avatar" type="file"  placeholder="Imagen"></div>
                        </div>
                    </div>
               
                  
                        
                        

                    <div class="card-footer">
                    <input type="hidden" name="operacion" value="actualizar">
                    
                    <button type="submit" name="Guardar" value="Guardar" class="btn btn-success">
                    <i class="fa fa-check"></i> 
                    </button></div>


                        
               
                    

                    </form>       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                                


<?php include_once "../includes/footer.php"; ?>
