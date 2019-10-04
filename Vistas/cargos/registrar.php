
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
 <form action="../../Controladores/ControladorCargos.php?operacion=guardar" method="POST"  class="form">
       <div style="padding-left: 150px;" class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong><i class="fa fa-edit"></i> REGISTRAR CARGOS</strong> 
              </div>


           <div class="card-body card-block">
          

          <div style="padding-left: 50px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* Cargo:</label></div>

                   <div class="col-12 col-md-6"><input type="text" id="" name="nombre" required="required"  minlength="4" maxlength="20" class="form-control"></div>
          </div>

            
            <div style="padding-left: 50px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* Salario:</label></div>

                   <div class="col-12 col-md-6"><input type="text" id="" name="salario" required="required"  minlength="6" maxlength="20" class="form-control" onkeypress="return solonumeros(event)"></div>
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