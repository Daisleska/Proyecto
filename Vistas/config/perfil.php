<?php
 /* date_default_timezone_set('America/Caracas');
  require_once('../config/conexion.php');*/ /*Hacemos la Conexión a la Base de Datos*/

  /*$id=$_SESSION['id'];
  $sql="SELECT * FROM usuario where id='$id'";
  $query = mysqli_query($conectar,$sql);*/
?>




<?php include_once "../includes/menu.php"; ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Mi Perfil<small>Datos Personales</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Mi Perfil</a></li>
        <li class="active">Datos Personales</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <?php while($row=mysqli_fetch_assoc($query)){
            $registro = str_replace('-', '/', date("d-m-Y", strtotime($row['registro'])));
            $ruta_img = $row['profile'];
            $sexo = $row['sexo'];
            $pregunta = $row['pregunta'];
            $usuario = $row['usuario'];
          ?>
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <form action="index.php?llave=cambiar_imagen" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php
                  $profile = $row['profile'];
                  if ($profile == "male.png") {
                    echo "<img class='profile-user-img img-responsive img-circle' src='../img/male.png'>";
                  } else if ($profile == "female.png") {
                    echo "<img class='profile-user-img img-responsive img-circle' src='../img/female.png'>";
                  } else if ($profile == "$ruta_img") { ?>
                    <img class="profile-user-img img-responsive img-circle" src="../img/<?=$_SESSION['usuario'];?>/<?php echo $ruta_img;?>" alt="Foto de Perfil">
                 <?php } ?>
                <h3 class="profile-username text-center"><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></h3>
                <p class="text-muted text-center"><?php $row['tipocuenta'];?></p>
                <div class="form-group col-xs-12">
                  <center><input id="imagen" type="file" name="profile" multiple=true class="file" required></center>      
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datosPersonales" data-toggle="tab">Datos Personales</a></li>
              <li><a href="facebook" data-toggle="tab">Cambiar Contraseña</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <form class="form-horizontal" action="index.php?llave=guardar_perfil" method="POST" id="cambiar-perfil">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-0 control-label"></label>
                    <div class="col-sm-4">
                      <label for="inputName" class="control-label">Tipo de Cuenta</label>
                      <input type="text" class="form-control" name="tipocuenta" id="tipocuenta" placeholder="Tipo de Cuenta" value="<?php echo $row['tipocuenta']; ?>" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Usuario</label>
                      <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $row['usuario']; ?>" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $row['email']; ?>">
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Apellido</label>
                      <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" value="<?php echo $row['apellido']; ?>">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Cédula</label>
                      <input type="number" class="form-control" id="" name="" placeholder="Cédula" value="<?php echo $row['cedula']; ?>" maxlength="8" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Sexo</label><br>
                        <p>
                          <input name="sexo" type="radio" id="Masculino" value="M"<?php if ($sexo=="M") { ?> checked="checked" <?php } ?> class="minimal"/>
                          <label for="Masculino">Masculino</label>
                          <input name="sexo" type="radio" id="Femenino" value="F"<?php if ($sexo=="F") { ?> checked="checked" <?php } ?> class="minimal"/>
                          <label for="Femenino">Femenino</label>
                        </p>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Ocupación</label>
                      <input type="text" class="form-control" name="ocupacion" id="ocupacion" placeholder="Ocupación" value="<?php echo $row['ocupacion']; ?>">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Telefono</label>
                      <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="<?php echo $row['telefono']; ?>" maxlength="11" min="1">
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                    <label for="inputExperience" class="control-label">Dirección</label>
                      <textarea class="form-control" name="direccion" id="direccion" placeholder="Dirección"><?php echo $row['direccion']; ?></textarea>
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="pregunta-Seguridad" class="control-label">Pregunta de Seguridad</label>
                      <select class="form-control" name="pregunta">
                        <option value="1" <?php if ($pregunta=="1") {?> selected="selected" <?php } ?> >¿Nombre de tu mascota?</option>
                        <option value="2" <?php if ($pregunta=="2") {?> selected="selected" <?php } ?> >¿Segundo apellido de tu madre?</option>
                        <option value="3" <?php if ($pregunta=="3") {?> selected="selected" <?php } ?> >¿Heroe Favorito?</option>
                        <option value="4" <?php if ($pregunta=="4") {?> selected="selected" <?php } ?> >¿Equipo Favorito?</option>
                        <option value="5" <?php if ($pregunta=="5") {?> selected="selected" <?php } ?> >¿Nombre de su mejor amigo?</option>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputSkills" class="control-label">Respuesta de Seguridad</label>
                      <input type="text" class="form-control" name="respuesta" id="respuesta" value="<?php echo $row['respuesta']; ?>" placeholder="Respuesta de Seguridad">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputSkills" class="control-label">Registrado Desde:</label>
                      <input type="text" class="form-control" name="registro" id="registro" value="<?php echo $registro;?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando Datos....">Modificar Datos</button>
                    </div>
                  </div>
                </form> <?php } ?>
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="cambiarClave">
                <form action="../../Controladores/controladorPerfil.php" id="cambiar-clave" method="POST" class="form-horizontal myaccount" role="form">
                  <input type="hidden" name="operacion" value="cambiar_clave">
        <input type="hidden" name="id_usuario" value="<?=$id_usuario?>">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Contraseña Actual</label>
                    <div class="col-sm-10">
                      <input type="password" name="clave" id="old_password" class="form-control" placeholder="Contraseña Actual">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" name="clave" id="clave" class="col-sm-2 control-label">Nueva Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="clave_nueva" id="password" placeholder="Nueva Contraseña">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Confirmar Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" name="clave_nueva_confirm" id="clave_nueva_confirm" class="form-control" placeholder="Confirmar Contraseña ">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                      <input type="hidden" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" />
                      <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando contraseña....">Cambiar Contraseña</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->   
      </div>
    </section>



 <!--  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
    



    

<?php include_once "../includes/footer.php"; ?>