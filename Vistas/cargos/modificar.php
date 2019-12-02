<?php 
include ('../../Modelos/clasedb.php');
include_once "../includes/menu.php";
extract ($_REQUEST);
$data=unserialize($data);
$cargos=unserialize($cargos);
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
       
         <h1 align="center">  <span style="margin-left: 5.5cm;" class="badge badge-info">Modificar Cargos <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >
<br>

 <form action="../../Controladores/ControladorCargos.php?operacion=actualizar" method="POST" name="form" class="form">
  
    <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>

     <div class="row" >
      <div class="col-md-4">
            <label><strong>Cargo</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" class="form-control" name="nombre" placeholder="Ej. Asistente" required="required" minlength="4" maxlength="40" value="<?php echo $data['nombre']; ?>"><br>
          </div>
          <div class="col-md-4">
            <label><strong>Salario</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" class="form-control" name="salario" onkeypress="return solonumeros(event)" minlength="5" maxlength="20" placeholder="Ej. 100000" value="<?php echo $data['salario']; ?>"><br>
          </div>

            <div class="col-md-4">
            <label><strong>Departamento</strong> <strong class='estado-r'>*</strong></label>
             <select name="id_departamento" title="Seleccione el Departamento"class="form-control">
                    <option disabled="disabled" selected="selected" value="">Seleccione</option>
                    <?php 
                    for ($i=0; $i<$filas; $i++){
                    ?>
                    <option value="<?=$cargos[$i][0]?>"> <?=$cargos[$i][1]?></option>
                    <?php
                    }
                    ?>
                    </select>
          </div>
      </div>
      
      
        <div class="row" style="padding-left: 350px;">
          <input type="hidden" name="operacion" value="actualizar">
                <input type="hidden" name="id" value="<?=$data[0]?>">
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-check"></i>
                </button>

                <p style="color: white">..</p>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i></button>
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