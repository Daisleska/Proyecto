<?php 
include ('../../Modelos/clasedb.php');
include_once "../includes/menu.php";
extract ($_REQUEST);
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


<div class="contenido">
    <div class="content-2">
    <section  class="content-header">
      <ol class="breadcrumb">
       
         <h1 align="center">  <span style="margin-left: 5.5cm;" class="badge badge-info">Modificar Datos <i class="menu-icon fa fa-edit"></i> </span></h1>
         <li style="padding-left: 4cm;"><a href="../../Controladores/ControladorPerfil.php?operacion=verperfil"><i class="fa fa-user"></i> Perfil </a></li>
        
      </ol>
   </section >
<br>

 <form action="../../Controladores/ControladorPerfil.php?operacion=actualizar" method="POST" name="form" class="form">
  
    <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>

     <div class="row" style="padding-left: 2cm;">
      <div class="col-md-5">
            <label><strong>Nombre</strong> <strong class='estado-r'>*</strong></label>
            <input name="nombre" minlength="4" maxlength="20" type="text" class="form-control" required="required" placeholder="Nombre" value="<?=$data[0]?>"><br>
          </div>
          <div class="col-md-5">
            <label><strong>Correo</strong> <strong class='estado-r'>*</strong></label>
            <input name="correo" required="required" minlength="15" maxlength="25" type="email" class="form-control" placeholder="Correo" value="<?=$data[1]?>"><br>
          </div>

    </div>
     <div class="row" style="padding-left: 2cm;">

            <div class="col-md-5">
            <label><strong>Pregunta de Seguridad</strong> <strong class='estado-r'>*</strong></label>
             <input name="pregunta" required="required" minlength="6" maxlength="20" type="text" class="form-control" placeholder="Color favorito?" value="<?=$data[2]?>">
          </div><br>

          <div class="col-md-5">
            <label><strong>Respuesta de Seguridad</strong> <strong class='estado-r'>*</strong></label>
             <input name="respuesta" required="required" minlength="5" maxlength="20" type="text" class="form-control" placeholder="Azul" value="<?=$data[3]?>">
          </div><br>
      </div>

      <br>
      
        <div class="row" style="padding-left: 350px;">
         <input type="hidden" name="operacion" value="actualizar">
                    
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>
        </div>
      </form>
    </div>

   <br><br><br><br><br><br><br><br><br><br><br><br>     
   <?php include_once "../includes/footer.php"; ?>
    <script src="../../bootstrap/js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script>
            

            
 <?php include_once "../includes/footer.php"; ?>