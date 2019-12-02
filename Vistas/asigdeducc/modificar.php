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
       
         <h1 align="center">  <span style="margin-left: 1cm;" class="badge badge-info">Modificar Asignaciones y Deducciones <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >
<br>

 <form action="../../Controladores/ControladorAsigDeducc.php?operacion=actualizar" method="POST" name="form" class="form">
  
    <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>

     <div class="row" >
          <div class="col-md-4" >
            <label><strong>Descripción</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" class="form-control" name="descripcion" minlength="7" maxlength="30" placeholder="Ej. " required="required" value="<?php echo $data['descripcion']; ?>"><br>
          </div>

       
          <div class="col-md-4" >
            <label><strong>Tipo</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" class="form-control" name="tipo"  placeholder="Ej. " required="required" readonly="readonly" value="<?php echo $data['tipo']; ?>"><br>
          </div>


          <div class="col-md-4" >
            <label><strong>Monto</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" class="form-control" name="monto" onkeypress="return solonumeros(event)" minlength="5" maxlength="20" placeholder="Ej. 100000" required="required" value="<?php echo $data['monto']; ?>"><br>
          </div>

         
        </div>
      </div>
      
      
        <div class="row" style="padding-left: 350px;">
          <input type="hidden" name="operacion" value="actualizar">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i></button>

                <p style="color: white">..</p>
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-check"></i>
                </button>
        </div>
      </form>
    </div>

   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>     
   <?php include_once "../includes/footer.php"; ?>
    <script src="../../bootstrap/js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script>
            

            
 <?php include_once "../includes/footer.php"; ?>