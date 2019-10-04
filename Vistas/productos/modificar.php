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
 <form action="../../Controladores/ControladorRecibidos.php?operacion=actualizar" method="POST"  class="form">
       <div style="padding-left: 150px;" class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong><i class="fa fa-edit"></i> MODIFICAR PRODUCTOS</strong> 
              </div>


           <div class="card-body card-block">

          

          <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-nombre" class=" form-control-label">Nombre:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-cantidad" name="nombre"  required="required"  minlength="4" maxlength="30" class="form-control" value="<?php echo $data['nombre']; ?>"></div>
            </div>

            

            <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-presentacíon" class=" form-control-label">Presentación:</label></div>
                <div class="col-12 col-md-6"><input type="text" id="hf-presentacion" name="presentacion" minlength="4" maxlength="40" required="required" class="form-control" value="<?php echo $data['presentacion']; ?>"></div>
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