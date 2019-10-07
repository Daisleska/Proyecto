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
 <form action="../../Controladores/ControladorAsigDeducc.php?operacion=guardar" method="POST"  class="form">
       <div style="padding-left: 150px;" class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong><i class="fa fa-edit"></i> REGISTRAR ASIGNACIONES Y DEDUCCIONES</strong> 
              </div>


           <div class="card-body card-block">
          

          <div style="padding-left: 50px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* Descripción:</label></div>

                   <div class="col-12 col-md-7"><input type="text" id="" name="descripcion" required="required"  minlength="4" maxlength="30" class="form-control"></div>
          </div>

          <div style="padding-left: 50px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* Tipo:</label></div>

                   <div class="col-12 col-md-7"><select id="hf-tipo_ad" name="tipo" class="form-control" required="required"><span class="help-block"></span>
                      <option value="" selected="selected">Selecciona Tipo</option>
                      <option value="Asignacion">Asignación</option>
                      <option value="Deduccion">Deducción</option>
                  </select></div>
          </div>

          <div style="padding-left: 50px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* Monto:</label></div>

                   <div class="col-12 col-md-7"><input type="text" id="" name="monto" required="required" onkeypress="return solonumeros(event)" minlength="6" maxlength="20" class="form-control"></div>
          </div>

          <div style="padding-left: 50px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* ¿Obligarorio?</label></div>

                   <div class="col-12 col-md-7"><select id="hf-obli" name="obligatorio" class="form-control" required="required"><span class="help-block"></span>
                      <option value="" selected="selected">Selecciona</option>
                      <option value="Si">Sí</option>
                      <option value="No">No</option>
                  </select></div>
          </div>

          <p style="padding-left: 50px; padding-top: 10px;">(*) Campos obligatorios</p>



                     </div>
                     <div class="card-footer">
                <input type="hidden" name="operacion" value="guardar">
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