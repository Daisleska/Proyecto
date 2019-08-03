<?php include_once "../includes/menu.php"; ?>


       <div class="breadcrumbs">
           <div class="col-sm-5">
                <div class="page-header float-left">
                  <div class="page-title">
                    <h4>Registrar</h4>
                  </div>
                   
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Inventario General</a></li>
                            <li class="active">Inventario Diario</li>
                        </ol>
                </div>
            </div>

            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">
                     <select class="form-control">
                            <option><a href="">INVENTARIO  SERVIFORM MATERIA PRIMA</a></option>

                            <option><a href="">ENVIADO A OTRA PLANTA O AGROTIENDA</a></option>

                            <option><a href="registro_materialempaque.php">MATERIAL DE EMPAQUE  CON MAS  MOVIMIENTO SERVIFORM</a></option>

                            <option><a href="">INVENTARIO GRANEL ALMACEN SERVIFORM</a></option>

                            <option><a href="registro_despachop.php">Despachado a produccion</a></option>

                            <option><a href="">Recibido de produccion  P.Terminado</a></option>

                            <option><a href="">Materia Prima Enviada a otra planta</a></option>

                            <option><a href="">Producto Terminado disponible en el almacen</a></option>

                            <option><a href="">ENVIADO A INICA CAGUA PRODUCTO TERMINADO</a></option>

                        </select>
                 </div>
                </div>
            </div>
            
        </div>

        <!-- contenido -->
       <div class="col-lg-12">
              <div class="card">
              <div class="card-header">
              <strong>Enviado a INICA Cagua Producto Terminado</strong> 
              </div>


           <div class="card-body card-block" style="padding-left: 30px;">
           <form action="" method="post" class="form-horizontal">

             <div class="row form-group">
                   <div class="col col-md-2"><label class=" form-control-label">Fecha</label></div>

                   <div class="col-12 col-md-6"><input type="date" id="hf-email" name="hf-email" placeholder="00-00-0000" class="form-control"></div>
          </div>



               <div class="row form-group">
                   <div class="col col-md-2"><label for="hf-email" class=" form-control-label">Código</label></div>

                   <div class="col-12 col-md-6"><input type="email" id="hf-email" name="hf-email" placeholder="" class="form-control"></div>
          </div>

                 <div class="row form-group">
                      <div class="col col-md-2"><label for="hf-password" class=" form-control-label">Producto</label></div>
                          <div class="col-12 col-md-6"><input type="text" placeholder="Producto" class="form-control"></div>
                 </div>



                  <div class="row form-group">
                      <div class="col col-md-2"><label for="" class=" form-control-label">Presentacion</label></div>
                          <div class="col-12 col-md-6"><input type="text" placeholder="ltrs/ klg /pzas" class="form-control"></div>
                 </div>

                 <div class="row form-group">
                   <div class="col col-md-2"><label class=" form-control-label">Cantidad klg/ltrs</label></div>

                   <div class="col-12 col-md-6"><input type="email" id="hf-email" name="hf-email" placeholder="0000" class="form-control"></div>
          </div> 

           <div class="row form-group">
                   <div class="col col-md-2"><label for="hf-email" class=" form-control-label">Cantidad en Paletas</label></div>

                   <div class="col-12 col-md-6"><input type="email" id="hf-email" name="hf-email" placeholder="ltrs / pzas / klg" class="form-control"></div>
          </div>

           <div class="row form-group">
                   <div class="col col-md-2"><label for="hf-email" class=" form-control-label">Observacion</label></div>

                   <div class="col-12 col-md-6">
                    <input type="text" name="Observacion" placeholder="Alguna observacion?" class="form-control">
                   </div>
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