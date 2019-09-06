


<?php include_once "../includes/menu.php"; ?>
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
                  <form action="../../Controladores/ControladorPerfil.php?operacion=actualizar_clave" id="cambiarclave" method="POST" class="form-horizontal myaccount" role="form">
                  <input type="hidden" name="operacion" value="cambiar_clave">
                   <input type="hidden" name="id_usuario" value="<?=$id_usuario?>">

                  <div class="form-group">
                    <div class="col col-md-4"><label>Contraseña Actual</label></div>
                    <div class="col col-md-6">
                      <input type="password" name="clave_actual" id="clave_actual" class="form-control" minlength="6" maxlength="20" required="required" placeholder="Contraseña Actual">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="form-group">
                    <div class="col col-md-4"><label>Nueva Contraseña</label></div>
                    <div class="col col-md-6">
                      <input type="password" class="form-control" name="clave" id="clave" minlength="6" maxlength="20" required="required" placeholder="Nueva Contraseña">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="form-group">
                    <div class="col col-md-4"><label>Confirmar Contraseña</label></div>
                    <div class="col col-md-6">
                      <input type="password" name="clave_nueva_confirm" id="clave_nueva_confirm" class="form-control" minlength="6" maxlength="20" required="required" placeholder="Confirmar Contraseña ">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <br>
                  <br>


                 <div class="card-footer">
                <input type="hidden" name="operacion" value="actualizar_clave"><input type="hidden" name="id_usuario" value=".$_SESSION['id_usuario'];">
                <button type="submit" class="btn btn-success">
                <i class="fa fa-check"></i> Guardar
                </button>
                </div>
         
                </form>
              </div>
            </div>
           </div>
         </div>
      </div>
    </div>

<?php include_once "../includes/footer.php"; ?>
