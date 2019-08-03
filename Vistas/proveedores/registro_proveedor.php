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
                     <!--  -->
                 </div>
                </div>
            </div>
            
        </div>

        <!-- contenido -->

       <div class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong>REGISTRAR</strong> 
              </div>


           <div class="card-body card-block">
           <form action="../../Controladores/ControladorProveedor.php?operacion=index" method="POST"  class="form">

             <div class="row form-group">
                   <div class="col col-md-2"><label class=" form-control-label">C.I/RIF:</label></div>

                   <div class="col-12 col-md-10"><input type="text" id="" name="ci_pro" placeholder="" class="form-control"><span class="help-block">Ingrese la Cedula o Rif</span></div>
          </div>



               <div class="row form-group">
                   <div class="col col-md-2"><label for="hf-email" class=" form-control-label">Nombre:</label></div>

                   <div class="col-12 col-md-10"><input type="text" id="" name="nombre_pro" placeholder="" class="form-control"><span class="help-block">Ingrese el Nombre</span></div>
          </div>

                 <div class="row form-group">
                   <div class="col col-md-2"><label for="hf-email" class=" form-control-label">Correo:</label></div>

                   <div class="col-12 col-md-10"><input type="email" id="hf-email" name="email_pro" placeholder="proveedor@gmail.com" class="form-control"><span class="help-block">Ingrese el Correo</span></div>
               </div>


                 <div class="row form-group">
                   <div class="col col-md-2"><label class=" form-control-label">Dirección:</label></div>

                   <div class="col-12 col-md-10"><input type="text" id="" name="direccion_pro" placeholder="" class="form-control"><span class="help-block">Ingrese la Dirección</span></div>
          </div> 

           <div class="row form-group">
                   <div class="col col-md-2"><label for="" class=" form-control-label">Teléfono:</label></div>

                   <div class="col-12 col-md-10"><input type="text" id="" name="telefono_pro" placeholder="" class="form-control"><span class="help-block">Ingrese el número de Teléfono</span></div>
          </div>
       
                <input type="hidden" name="operacion" value="guardar">
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