<?php 
include ('../../Modelos/clasedb.php');
include_once "../includes/menu.php";
extract ($_REQUEST);
$data=unserialize($data);
$materia_prima=unserialize($materia_prima);
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
 <form action="../../Controladores/ControladorRecibidos.php?operacion=actualizar" method="POST"  class="form">
       <div style="padding-left: 150px;" class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong><i class="fa fa-edit"></i> MODIFICAR RECIBIDOS</strong> 
              </div>


           <div class="card-body card-block">

          <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-5"><label for="hf-materia" class=" form-control-label">* Materia Prima</label></div>
                    <div class="col-12 col-md-6">
                    <select name="id_materia_prima" title="Seleccione"class="form-control">
                    <option disabled="disabled" selected="selected" value="">Seleccione la Materia Prima</option>
                    <?php 
                    for ($i=0; $i<$filas; $i++){
                    ?>
                    <option value="<?=$materia_prima[$i][0]?>"><?=$materia_prima[$i][2]?></option>
                    <?php
                    }
                    ?>
                    </select>
                    </div>
                    </div>
          

          <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-cantidad" class=" form-control-label">Cantidad:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-cantidad" name="cantidad"  required="required" onkeypress="return solonumeros(event)" minlength="4" maxlength="15" class="form-control" value="<?php echo $data['cantidad']; ?>"></div>
            </div>

            <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-fecha" class=" form-control-label">Fecha:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-fecha" name="fecha"  required="required" class="form-control" value="<?php echo $data['fecha']; ?>"></div>
            </div>

            <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-observacion" class=" form-control-label">Observación:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-observacion" name="observacion" minlength="4" maxlength="40" required="required" class="form-control" value="<?php echo $data['observacion']; ?>"></div>
            </div>

            <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-ce" class=" form-control-label">CE:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-ce" name="ce" minlength="4" maxlength="10" required="required" class="form-control" value="<?php echo $data['ce']; ?>"></div>
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