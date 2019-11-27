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


<div class="contenido" style="padding-left: 20px">
    <div class="content-2">
    <section  class="content-header">
      <ol class="breadcrumb">
       
         <h1 align="center">  <span style="margin-left: 4cm;" class="badge badge-info">Modificar Cestaticket <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >
<br>

 <form action="../../Controladores/ControladorCestaticket.php?operacion=actualizar" method="POST" name="form" class="form">
  
    <div class="row" style="padding-left: 250px;">
          <div class="col-md-5" >
            <label><strong>Monto</strong></label>
            <input type="text" class="form-control" name="monto" onkeypress="return solonumeros(event)" minlength="5" maxlength="20" placeholder="Ej. 100000" value="<?php echo $data['monto']; ?>"><br>
          </div>

         
        </div>
      </div>
      
      
        <div class="row" style="padding-left: 350px;">
           <input type="hidden" name="operacion" value="actualizar">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-check"></i>
                </button>
                <p style="color: white">..</p>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i></button>
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