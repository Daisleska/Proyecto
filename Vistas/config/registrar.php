<?php 
include_once "../includes/menu.php"; 
extract($_REQUEST);
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

      <div class="contenido">
    <div class="content-2">
    <section  class="content-header">
      <ol class="breadcrumb">
       
         <h1 align="center">  <span style="margin-left: 5cm;" class="badge badge-info">Registro de Usuario <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >
<br>

 <form action="../../Controladores/ControladorUsuario.php?operacion=guardar" method="POST" name="form" class="form">
  
    <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>

     <div class="row" >
          <div class="col-md-4" >
            <label><strong>Nombres</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" required="required" id="hf-nombres" minlength="4" maxlength="20" name="nombre" placeholder="Ej: Victor Alvarez" class="form-control"><br>
          </div>

       
          <div class="col-md-4" >
            <label><strong>Correo</strong> <strong class='estado-r'>*</strong></label>
            <input type="email" minlength="15" maxlength="25" required="required" id="hf-correo" name="correo" placeholder="Ej: victor-12@gmail.com" class="form-control"><br>
          </div>


          <div class="col-md-4" >
            <label><strong>Contraseña</strong> <strong class='estado-r'>*</strong></label>
            <input type="password" required="required" minlength="6" maxlength="20" id="hf-clave" name="clave" class="form-control"><br>
          </div>
        
         </div>
        <div class="row" >

          <div class="col-md-4" >
            <label><strong>Repetir Contraseña</strong> <strong class='estado-r'>*</strong></label>
            <input type="password" required="required" minlength="6" maxlength="20" id="hf-clave" name="clave_repetir" class="form-control"><br>
          </div>

       
          <div class="col-md-4" >
            <label><strong>Tipo de Usuario</strong> <strong class='estado-r'>*</strong></label>
            <select name="tipo_usuario" required="required" title="Seleccione el tipo de Usuario" class="form-control">
                              <?php if ($data[1]=="Admin") {
                              ?>
                              <option value="Admin" <?php if($data[1]=="Admin"){ ?> selected="selected" <?php } ?> >Admin</option>
                              <?php 
                              }
                              ?>
                              <option value="Admin" <?php if($data[1]=="Admin"){ ?> selected="selected" <?php } ?> >Administrador</option>
                              <option value="Usuario 1" <?php if($data[1]=="Usuario 1"){ ?> selected="selected" <?php } ?> >Usuario 1</option>
                              <option value="Usuario 2" <?php if($data[1]=="Usuario 2"){ ?> selected="selected" <?php } ?> >Usuario 2</option>
                              </select><br>
          </div>


          <div class="col-md-4" >
            <label><strong>Pregunta de Seguridad</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" required="required" id="hf-pregunta" minlength="5" maxlength="20" name="pregunta" class="form-control" placeholder="Ej: Mascota"><br>
          </div>
         
        </div>
     
        
        <div class="row" >

          <div class="col-md-4" >
            <label><strong>Respuesta de Seguridad</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" required="required" minlength="4" maxlength="20" id="hf-respuesta" name="respuesta" class="form-control" placeholder="Ej: Bucky"><br>
          </div>

       
        </div>

          
       
        <div class="row" style="padding-left: 350px;">
           <input type="hidden" name="operacion" value="guardar">
                    <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-check"></i> 
                    </button>
                    <p style="color: white;">.</p>
                    <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> 
                    </button>
        </div>
      </form>
    </div>

   <br><br><br><br><br><br><br><br><br><br><br><br>     
   <?php include_once "../includes/footer.php"; ?>
    <script src="../../bootstrap/js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script>
            
   

  

