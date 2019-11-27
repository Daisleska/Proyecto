<?php
extract($_REQUEST);
$data=unserialize($data);
?>

<?php include_once "../includes/menu.php"; ?>
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


<div class="contenido" style="padding-left: 20px">
    <div class="content-2">
     <section class="content-header">
      <ol class="breadcrumb">
         
         <h1 align="center">  <span style="margin-left: 3.5cm;" class="badge badge-info">Cambiar Contraseña <i class="menu-icon fa fa-edit"></i> </span></h1>

         <li style="padding-left: 4cm;"><a href="../../Controladores/ControladorPerfil.php?operacion=verperfil"><i class="fa fa-user"></i> Perfil </a></li>
        
      </ol>
   </section >
<br>

 <form action="../../Controladores/ControladorPerfil.php?operacion=actualizar_clave" method="POST" name="form" class="form">
         <input type="hidden" name="operacion" value="cambiar_clave">
         
         <input type="hidden" name="id_usuario" value="<?=$id_usuario?>">
  
        <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>
        
              
        
        <div class="row">
          <div class="col-md-4">
            <label><strong>Contraseña Actual</strong> <strong class='estado-r'>*</strong></label>
            <input type="password" name="clave_actual" id="clave_actual" class="form-control" minlength="6" maxlength="20" required="required" placeholder="Contraseña Actual"<br>
          </div>
          <div class="col-md-4">
            <label><strong>Nueva Contraseña</strong> <strong class='estado-r'>*</strong></label>
            <input type="password" class="form-control" name="clave" id="clave" minlength="6" maxlength="20" required="required" placeholder="Nueva Contraseña"><br>
          </div>

           <div class="col-md-4">
            <label><strong>Confirmar Contraseña</strong> <strong class='estado-r'>*</strong></label>
             <input type="password" name="clave_nueva_confirm" id="clave_nueva_confirm" class="form-control" minlength="6" maxlength="20" required="required" placeholder="Confirmar Contraseña ">
          </div>
        </div>
      
        <div>
           <input type="hidden" name="operacion" value="actualizar_clave"><input type="hidden" name="id_usuario" value=".$_SESSION['id_usuario'];">
                <form action="../../Controladores/ControladorPerfil.php?operacion=modificar" method="POST">
                                
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                
                                </button>
                            </form>
        </div>
      </form>
    </div>
   </div>
   <br><br><br><br><br><br><br><br><br><br><br><br>     
   <?php include_once "../includes/footer.php"; ?>
    <script src="../../bootstrap/js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script>
            <!-- Right Panel -->

            
 <?php include_once "../includes/footer.php"; ?>