
<?php include_once "../includes/menu.php";
include ('../../Modelos/clasedb.php');

extract($_REQUEST);
$data=unserialize($data);
?>



<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="col-lg-12">
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
            

                        <div class="form-group">
                            <div class="col col-md-2"><label>Nombre</label></div>
                            <div class="col col-md-6"><input name="nombre" maxlength="30" type="text" class="form-control" required="required" placeholder="Nombre" value="<?=$data[0]?>"></div>


                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                                <div class="col col-md-2"><label>Correo</label></div>
                                <div class="col col-md-6"><input name="correo" required="required" maxlength="30" type="email" class="form-control" placeholder="Correo" value="<?=$data[1]?>"></div>
                        </div>
                        <br>
                        <br>

                        <div class="form-group">
                                    <div class="col col-md-2"><label>Pregunta</label></div>
                                    <div class="col col-md-6"><input name="pregunta" required="required" minlength="2" maxlength="90" type="text" class="form-control" placeholder="Color favorito?" value="<?=$data[2]?>"></div>
                        </div>
                        <br>
                        <br>

                        <div class="form-group">
                                    <div class="col col-md-2"><label>Respuesta</label></div>
                                    <div class="col col-md-6"><input name="respuesta" required="required" minlength="2" maxlength="90" type="text" class="form-control" placeholder="Azul" value="<?=$data[3]?>"></div>
                        </div>
                        <br>
                        <br>
                        
                        <div class="form-group">
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
                    <i class="fa fa-check"></i> Guardar
                    </button></div>


                        
               
                    

                    </form>       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                                


<?php include_once "../includes/footer.php"; ?>
