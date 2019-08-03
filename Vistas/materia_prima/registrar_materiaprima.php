<?php include_once "../includes/menu.php"; ?>


       <div class="breadcrumbs">
           <div class="col-sm-5">
                <div class="page-header float-left">
                   
                        <div class="page-title">
                          MATERIA PRIMA
                        </div>
                </div>
            </div>

            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">

                      <ol class="breadcrumb text-right">
                            <li><a href="registrar_otroproveedor.php">Recibido de otro Proveedor</a></li>
                            <li class="active">Recibido de INICA</li>
                        </ol>
                   
              </div>
                </div>
            </div>
            
        </div>

        <!-- contenido -->
       <div class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong><li><i class="fa fa-edit"></i>  REGISTRAR</li></strong> 
              </div>


           <div class="card-body card-block">
           <form action="" method="post" class="form-horizontal">

             <div class="row form-group">
                   <div class="col col-md-2"><label class=" form-control-label">Fecha</label></div>

                   <div class="col-12 col-md-10"><input type="date" id="" name="" placeholder="00-00-0000" class="form-control"><span class="help-block">Ingrese la Fecha</span></div>
          </div>



               <div class="row form-group">
                   <div class="col col-md-2"><label for="" class=" form-control-label">Código</label></div>

                   <div class="col-12 col-md-10"><input maxlength="30" type="text" id="" name="" placeholder="" class="form-control"><span class="help-block">Ingrese el código</span></div>
          </div>

                 <div class="row form-group">
                      <div class="col col-md-2"><label for="" class=" form-control-label">Producto</label></div>
                          <div class="col-12 col-md-10"><input maxlength="30" type="text" placeholder="Producto" class="form-control"><span class="help-block">Ingrese el Nombre del Producto</span></div>
                 </div>

                 <div class="row form-group">
                   <div class="col col-md-2"><label class=" form-control-label">Cantidad</label></div>

                   <div class="col-12 col-md-10"><input maxlength="10" type="text" id="" name="" placeholder="0000" class="form-control"><span class="help-block">Ingrese la Cantidad</span></div>
          </div> 

           <div class="row form-group">
                   <div class="col col-md-2"><label for="" class=" form-control-label">Unidad</label></div>

                   <div class="col-12 col-md-10"><input type="text" id="" name="" placeholder="ltrs / pzas / klg" class="form-control"><span class="help-block">Ingrese la Unidad</span></div>
          </div>

           <div class="row form-group">
                   <div class="col col-md-2"><label for="hf-email" class=" form-control-label">Proveedor</label></div>

                   <div class="col-12 col-md-10">
                    <select class="form-control">
                       <option selected="selected">INICA Cagua</option>
                   </select></div>
          </div>
   
                     </div>
                     <div class="card-footer">
                      <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-send"></i> Guardar
                      </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                             <i class="fa fa-recicle"></i> Limpiar
                              </button>
                               </div>
                         </div>

                </form>
            </div><!-- /#right-panel -->
        </div>
      </div>
      

            <!-- Right Panel -->


<?php include_once "../includes/footer.php"; ?>