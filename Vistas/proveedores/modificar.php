<?php 
include ('../../Modelos/clasedb.php');
include_once "../includes/menu.php";
extract ($_REQUEST);
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
       <div class="breadcrumbs">
           <div class="col-sm-5">
                <div class="page-header float-left">
                   
                        <!-- <ol class="breadcrumb text-right">
                            <li><a href="#">Proveedores</a></li>
                            <li class="active">Materia Prima</li>
                        </ol> -->
                </div>
            </div>

            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">
                    
                 </div>
                </div>
            </div>
            
        </div>

        <!-- contenido -->
 <form action="../../Controladores/ControladorProveedor.php?operacion=actualizar" method="POST"  class="form">
       <div style="padding-left: 150px;" class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong><i class="fa fa-edit"></i> MODIFICAR PROVEEDOR</strong> 
              </div>


           <div class="card-body card-block">
          
            <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-ci" class=" form-control-label">C.I / RIF:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-ci" name="cedula" placeholder="Ej: J-5677839"  minlength="8" maxlength="20" readonly="readonly" class="form-control" value="<?php echo $data['cedula']; ?>"></div>
            </div>

            <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-nombres" class=" form-control-label">Nombre:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-nombre" name="nombre" placeholder="Ej: Inica"  minlength="5" maxlength="30" required="required" class="form-control" value="<?php echo $data['nombre']; ?>"></div>
            </div>

                                    
            <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-correo" class=" form-control-label">Correo:</label></div>
                <div class="col-12 col-md-6"><input type="email" id="hf-correo" name="email" placeholder="Ej: proveedor@gmail.com" required="required" minlength="15" maxlength="40" class="form-control" value="<?php echo $data['email']; ?>"></div>
            </div>

            <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-dir" class=" form-control-label">Dirección:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-dir" name="direccion" placeholder="Ej: Aragua, Cagua" required="required" minlength="5" maxlength="40" class="form-control" value="<?php echo $data['direccion']; ?>"></div>
            </div>

            <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-tlf" class=" form-control-label">Teléfono:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-tlf" name="telefono" placeholder="Ej: 02120010010" onkeypress="return solonumeros(event)" minlength="7" maxlength="11" required="required" class="form-control" value="<?php echo $data['telefono']; ?>"></div>
            </div>
          
                     </div>
                     <div class="card-footer">
                <input type="hidden" name="operacion" value="actualizar">
                      <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-check"></i>&nbsp; 
                      </button>
 
                            <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> 
                            </form>
                               </div>
                         </div>

                
            </div><!-- /#right-panel -->
         </div>

            <!-- Right Panel -->

            
 <?php include_once "../includes/footer.php"; ?>