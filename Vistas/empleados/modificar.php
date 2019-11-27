<?php 
include_once "../includes/menu.php"; 
extract($_REQUEST);
$data=unserialize($data);
$departamentos=unserialize($departamentos);

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
       
         <h1 align="center">  <span style="margin-left: 5cm;" class="badge badge-info">Registro de Empleados <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >
<br>

 <form action="../../Controladores/ControladorEmpleado.php?operacion=actualizar" method="POST" name="form" class="form">
  
    <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>

     <div class="row" >
          <div class="col-md-4" >
            <label><strong>Cédula</strong> <strong class='estado-r'>*</strong></label>
            <input required="required" type="text" id="hf-ci" minlength="8" maxlength="9" name="cedula" placeholder="Ej: 12.345.678" class="form-control" readonly="readonly" value="<?php echo $data['cedula']; ?>"><br>
          </div>

       
          <div class="col-md-4" >
            <label><strong>Nombres</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" id="hf-nombres" minlength="4" maxlength="30" required="required" name="nombres" placeholder="Ej: Juan Armando" class="form-control" value="<?php echo $data['nombres']; ?>"><br>
          </div>


          <div class="col-md-4" >
            <label><strong>Apellidos</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" id="hf-apellidos" minlength="4" maxlength="30" required="required" name="apellidos" placeholder="Ej: Hernández Ceballos" class="form-control" value="<?php echo $data['apellidos']; ?>"><br>
          </div>
        
         </div>
        <div class="row" >

          <div class="col-md-4" >
            <label><strong>Dirección</strong> <strong class='estado-r'>*</strong></label>
            <input type="textarea" id="hf-dir" name="direccion" minlength="5" maxlength="35" required="required" placeholder="Ej: La Victoria #00" class="form-control" value="<?php echo $data['direccion']; ?>"><br>
          </div>

       
          <div class="col-md-4" >
            <label><strong>Teléfonos</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" onkeypress="return solonumeros(event)" id="hf-tlf" name="telefono"  minlength="7" maxlength="11" required="required" placeholder="Ej: 0212-0120300" class="form-control" value="<?php echo $data['telefono']; ?>"><br>
          </div>


          <div class="col-md-4" >
            <label><strong>Fecha de Ingreso</strong> <strong class='estado-r'>*</strong></label>
            <input type="date" id="hf-fechai" name="fecha_ingreso" placeholder="Ej: 12-00-0000" class="form-control" value="<?php echo $data['fecha_ingreso']; ?>" readonly="readonly"><br>
          </div>
         
        </div>
     
        
        <div class="row" >

          <div class="col-md-4" >
            <label><strong>Condición</strong> <strong class='estado-r'>*</strong></label>
             <select id="hf-condicion" name="condicion" class="form-control" value="<?php echo $data['condicion']; ?>">
                    <option selected="selected">Seleccione</option>
                     <option>Fijo</option>
                    <option>Contratado</option>
                                                                        
                    </select><br>
          </div>

       
          <div class="col-md-4" >
            <label><strong>Fecha de Vencimiento</strong> <strong class='estado-r'>*</strong></label>
            <input type="date" id="hf-fechav" name="fecha_venc" placeholder="Ej: 12-00-2000" class="form-control" value="<?php echo $data['fecha_venc']; ?>"><br>
          </div>


          <div class="col-md-4" >
            <label><strong>Número de Cuenta</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" onkeypress="return solonumeros(event)" id="hf-ncuenta" name="ncuenta" minlength="20" maxlength="20" placeholder="Ej: 017503002028919920" class="form-control" value="<?php echo $data['ncuenta']; ?>"><br>
          </div>
         
        </div>


          <div class="row" style="padding-left: 3cm;">

          <div class="col-md-5" >
            <label><strong>Cargo</strong> <strong class='estado-r'>*</strong></label>
            <select name="id_cargo" title="Seleccione el cargo"class="form-control" value="<?php echo $data['id_cargos']; ?>">
                    <option disabled="disabled" selected="selected" value="">Seleccione el Cargo</option>
                    
                 <?php 
                       include("../../Modelos/conexion.php");
                     $sql="SELECT * FROM cargos";
                    $res_emp=$conectar->query($sql);
                        while ($cargos=$res_emp->fetch_array()) {
                       ?>
                      <option value="<?=$cargos['id']?>" class="id_vaue_externo"><?=$cargos['nombre']?></option>
                      <?php } 

  
                      ?> 
                    </select><br>
          </div>

       
          <div class="col-md-5" >
            <label><strong>Departamento</strong> <strong class='estado-r'>*</strong></label>
            <select name="id_departamento" title="Seleccione el Departamento"class="form-control">
                    <option disabled="disabled" selected="selected" value="<?php echo $data['id_departamentos']; ?>">Seleccione el Departamento</option>
                    <?php 
                    for ($i=0; $i<$filas_tip; $i++){
                    ?>
                    <option value="<?=$departamentos[$i][0]?>"> <?=$departamentos[$i][1]?></option>
                    <?php
                    }
                    ?>
                    </select><br>
          </div>
         
         
        </div>

        
      
        <div class="row" style="padding-left: 350px;">
           <input type="hidden" name="operacion" value="actualizar">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
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

