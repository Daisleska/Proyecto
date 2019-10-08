<?php 
include ('../../Modelos/clasedb.php');
include_once "../includes/menu.php";
extract ($_REQUEST);
$data=unserialize($data);
?>
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
 <form action="../../Controladores/ControladorMP.php?operacion=actualizar" method="POST"  class="form">
       <div style="padding-left: 150px;" class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong><i class="fa fa-edit"></i> MODIFICAR MATERIA PRIMA</strong> 
              </div>


           <div class="card-body card-block">
          

         <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-codigo" class=" form-control-label">Código:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-codigo" name="codigo"  required="required" minlength="4" maxlength="8" class="form-control" value="<?php echo $data['codigo']; ?>"></div>
            </div>

            <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-nombre" class=" form-control-label">Nombre:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-nombre" name="nombre"   minlength="5" maxlength="30" required="required" class="form-control" value="<?php echo $data['nombre']; ?>"></div>
            </div>

                                    
            <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-presentacion" class=" form-control-label">Presentación:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-presentacion" name="presentacion" required="required" minlength="5" maxlength="50" class="form-control" value="<?php echo $data['presentacion']; ?>"></div>
            </div>

            <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-unidad" class=" form-control-label">Unidad:</label></div>
                <div class="col-12 col-md-6"><select id="hf-unidad" name="unidad"  required="required"  class="form-control" value="<?php echo $data['unidad']; ?>">

                <option selected="selected">Seleccione</option>

                <option value="Kgs">Kgs</option>
                <option value="Lts">Lts</option>

                    
                </select></div>
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