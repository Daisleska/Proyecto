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
         
         <h1 align="center">  <span style="margin-left: 3.5cm;" class="badge badge-info">Registro de Cargos <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >
<br>

 <form action="../../Controladores/ControladorCargos.php?operacion=guardar" method="POST" name="form" class="form">
  
        <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>
        
              
        
        <div class="row">
          <div class="col-md-4">
            <label><strong>Cargo</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" class="form-control" name="nombre" placeholder="Ej. Asistente" required="required" minlength="4" maxlength="30"><br>
          </div>
          <div class="col-md-4">
            <label><strong>Salario</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" class="form-control" name="salario" onkeypress="return solonumeros(event)" minlength="5" maxlength="20" placeholder="Ej. 100000"><br>
          </div>

           <div class="col-md-4">
            <label><strong>Departamento</strong> <strong class='estado-r'>*</strong></label>
             <select name="id_departamento" title="Seleccione el Departamento"class="form-control">
                    <option disabled="disabled" selected="selected" value="">Seleccione</option>
                    <?php 
                    for ($i=0; $i<$filas; $i++){
                    ?>
                    <option value="<?=$data[$i][0]?>"> <?=$data[$i][1]?></option>
                    <?php
                    }
                    ?>
                    </select>
          </div>
        </div>
      
        <div>
           <input type="hidden" name="operacion" value="guardar">

           <button type="reset" class="btn btn-danger btn-sm col-md-1">
          <i class="fa fa-ban"></i></button>

          <button type="submit" name="enviar" class="btn btn-primary btn-sm col-md-1"><i class="fa fa-check"></i>&nbsp;</button>
        </div>
      </form>
    </div>
   </div>
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>     
   <?php include_once "../includes/footer.php"; ?>
    <script src="../../bootstrap/js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script>
            <!-- Right Panel -->

            
 <?php include_once "../includes/footer.php"; ?>