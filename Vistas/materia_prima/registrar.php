<?php include_once "../includes/menu.php"; ?>


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
                     <ol class="breadcrumb text-right">
                            <li><a href="../../Controladores/ControladorMP.php?operacion=index">Listado de Materia Prima</a></li>

                            
                        </ol>
                 </div>
                </div>
            </div>
            
        </div>

        <!-- contenido -->
 <form action="../../Controladores/ControladorMP.php?operacion=guardar" method="POST"  class="form">
       <div style="padding-left: 150px;" class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong><i class="fa fa-edit"></i> REGISTRAR MATERIA PRIMA</strong> 
              </div>


           <div class="card-body card-block">
          

             <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* Código:</label></div>

                   <div class="col-12 col-md-6"><input type="text" id="" name="codigo" required="required"  minlength="4" maxlength="8" class="form-control"></div>
          </div>



               <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                   <div class="col col-md-4"><label for="hf-nombre" class=" form-control-label">* Nombre:</label></div>

                   <div class="col-12 col-md-6"><input type="text" id="" name="nombre" minlength="5" maxlength="30" required="required"  class="form-control"></div>
          </div>

                 <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                   <div class="col col-md-4"><label for="hf-presentacion" class=" form-control-label">* Presentación:</label></div>

                   <div class="col-12 col-md-6"><input type="text" id="hf-presentacion" minlength="5" required="required" name="presentacion" maxlength="50" class="form-control"></div>
               </div>


          <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* Unidad:</label></div>

                   <div class="col-12 col-md-6"><select name="unidad" class="form-control" required="required">
                    <option selected="selected">Seleccione</option>
                    <option value="Kgs">Kgs</option>
                    <option value="Lts">Lts</option>
                                                                        
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