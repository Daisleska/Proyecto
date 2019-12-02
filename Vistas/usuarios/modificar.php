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

      <div class="contenido">
    <div class="content-2">
    <section  class="content-header">
      <ol class="breadcrumb">
         
        
         <h1 align="center">  <span style="margin-left: 5cm;" class="badge badge-info">Modificar Usuario <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >
<br>

 <form action="../../Controladores/controladorUsuario.php?operacion=actualizar" method="POST" name="form" class="form">
  
    <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>

     <div class="row" style="padding-left: 2cm;">
          <div class="col-md-5" >
            <label><strong>Nombre</strong> <strong class='estado-r'>*</strong></label>
            <input name="nombre" minlength="4" maxlength="20" type="text" class="form-control" required="required" placeholder="nombre" value="<?=$data[1]?>"><br>
          </div>

       
          <div class="col-md-5" >
            <label><strong>Correo</strong> <strong class='estado-r'>*</strong></label>
            <input name="correo" required="required" minlength="15"maxlength="25" type="email" class="form-control" placeholder="Correo" value="<?=$data[2]?>"><br>
          </div>

         </div>

        <div style="padding-left: 50px; padding-top: 10px;">¿Desea cambiar la clave? 
        <input type="checkbox" name="cambiar" id="cambiar" value="1"></div>
        <br>

        <div class="row" >

          <div class="col-md-4" >
            <label><strong>Contraseña Anterior</strong> <strong class='estado-r'>*</strong></label>
            <input name="clave_anterior" id="clave_anterior" required="required" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña" disabled="disabled"><br>
          </div>

       
          <div class="col-md-4" >
            <label><strong>Contraseña</strong> <strong class='estado-r'>*</strong></label>
            <input   name="clave" id="clave" required="required" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña" disabled="disabled" ><br>
          </div>


          <div class="col-md-4" >
            <label><strong>Repetir Contraseña</strong> <strong class='estado-r'>*</strong></label>
            <input   name="clave_repetir" id="clave_repetir" required="required" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña" disabled="disabled"><br>
          </div>
         
        </div>
     
        
        <div class="row" >

          <div class="col-md-4" >
            <label><strong>Tipo de Usuario</strong> <strong class='estado-r'>*</strong></label>
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

       
          <div class="col-md-4" >
            <label><strong>Pregunta de Seguridad</strong> <strong class='estado-r'>*</strong></label>
            <input name="pregunta" required="required" minlength="5" maxlength="20" type="text" class="form-control" placeholder="color favorito?" value="<?=$data[5]?>"><br>
          </div>


          <div class="col-md-4" >
            <label><strong>Respuesta de Seguridad</strong> <strong class='estado-r'>*</strong></label>
            <input name="respuesta" required="required" minlength="4" maxlength="20" type="text" class="form-control" placeholder="Azul"value="<?=$data[6]?>"><br>
          </div>
         
        </div>
        
      
        <div class="row" style="padding-left: 350px;">
           <input type="hidden" name="operacion" value="actualizar">
                <input type="hidden" name="id.usuarios" value="<?=$data[0]?>">
                    <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-check"></i>
                </button>
                <p style="color: white">..</p>
                <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i></button>
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
            
   

   <script type="text/javascript">
     function seleccionar_todo(){
   for (i=0;i<document.f1.elements.length;i++)
      if(document.f1.elements[i].type == "checkbox")
         document.f1.elements[i].checked=1
}

function deseleccionar_todo(){
   for (i=0;i<document.f1.elements.length;i++)
      if(document.f1.elements[i].type == "checkbox")
         document.f1.elements[i].checked=0
}
   </script>

