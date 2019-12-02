

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
       
         <h1 align="center">  <span style="margin-left: 4cm;" class="badge badge-info">Registro de Cestaticket <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >
<br>

 <form action="../../Controladores/ControladorCestaticket.php?operacion=guardar" method="POST" name="form" class="form">
  
    <div class="row" style="padding-left: 250px;">
          <div class="col-md-5" >
            <label><strong>Monto</strong></label>
            <input type="text" class="form-control" name="monto" onkeypress="return solonumeros(event)" minlength="5" maxlength="20" placeholder="Ej. 100000"><br>
          </div>

         
        </div>
      </div>
      
      
        <div class="row" style="padding-left: 350px;">
           <input type="hidden" name="operacion" value="guardar">

           <button type="reset" class="btn btn-danger btn-sm col-md-1"><i class="fa fa-ban"></i></button>

          <p style="color: white">..</p>
          <button type="submit" name="enviar" class="btn btn-primary btn-sm col-md-1"><i class="fa fa-check"></i>&nbsp;</button>
        </div>
      </form>
    </div>

   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>     
   <?php include_once "../includes/footer.php"; ?>
    <script src="../../bootstrap/js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script>
            

            
 <?php include_once "../includes/footer.php"; ?>