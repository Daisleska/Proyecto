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
                     <!--  -->
                 </div>
                </div>
            </div>
            
        </div>

        <!-- contenido -->

       <div class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong><i class="fa fa-edit"></i> MODIFICAR ASIGNACIONES Y DEDUCCIONES</strong> 
              </div>


           <div class="card-body card-block">
           <form action="../../Controladores/ControladorAsigDeducc.php?operacion=actualizar" method="POST"  class="form">

            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-descri" class=" form-control-label">Descripción:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-descri" name="descripcion"  required="required" minlength="6" maxlength="30" class="form-control" value="<?php echo $data['descripcion']; ?>"></div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-tipo_ad" class=" form-control-label">Tipo:</label></div>
                <div class="col-12 col-md-6">

                  <select id="hf-tipo_ad" name="tipo" class="form-control" required="required">
                    
                    <option value="<?php echo $data['tipo']; ?>">Selecciona Tipo</option>
                    <option></option>
                    <option value="Asignacion">Asignación</option>
                    <option value="Deduccion">Deducción</option>
                  </select>
                </div>
            </div>
 
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-monto" class=" form-control-label">Monto:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-monto" name="monto" onkeypress="return solonumeros(event)" required="required" minlength="6" maxlength="20" class="form-control" value="<?php echo $data['monto']; ?>"></div>
            </div>
 
 
                <div class="card-footer">
                <input type="hidden" name="operacion" value="actualizar">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-send"></i>
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> 

                                                    </div>
                                                </form>
                                                </div>
                                                
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->
            <!-- Right Panel -->

            
 <?php include_once "../includes/footer.php"; ?>