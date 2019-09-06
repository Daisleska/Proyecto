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
 <form action="../../Controladores/ControladorProveedor.php?operacion=guardar" method="POST"  class="form">
       <div style="padding-left: 150px;" class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong>REGISTRAR PROVEEDOR</strong> 
              </div>


           <div class="card-body card-block">
          

             <div class="row form-group">
                   <div class="col col-md-3"><label class=" form-control-label">* C.I / RIF:</label></div>

                   <div class="col-12 col-md-7"><input type="text" id="" name="cedula" required="required" placeholder="Ej: J-5677839" minlength="8" maxlength="20" class="form-control"></div>
          </div>



               <div class="row form-group">
                   <div class="col col-md-3"><label for="hf-email" class=" form-control-label">* Nombre:</label></div>

                   <div class="col-12 col-md-7"><input type="text" id="" name="nombre" minlength="5" maxlength="40" required="required" placeholder="Ej: Inica" class="form-control"></div>
          </div>

                 <div class="row form-group">
                   <div class="col col-md-3"><label for="hf-email" class=" form-control-label">* Correo:</label></div>

                   <div class="col-12 col-md-7"><input type="email" id="hf-email" required="required" name="email" maxlength="50" placeholder="Ej: proveedor@gmail.com" class="form-control"></div>
               </div>


          <div class="row form-group">
                   <div class="col col-md-3"><label class=" form-control-label">* Dirección:</label></div>

                   <div class="col-12 col-md-7"><input type="text" id="" name="direccion" required="required" maxlength="50" placeholder="Ej: Aragua, Cagua" class="form-control"></div>
          </div> 

           <div class="row form-group">
                   <div class="col col-md-3"><label for="" class=" form-control-label">* Teléfono:</label></div>

                   <div class="col-12 col-md-7"><input type="text" id="" name="telefono" required="required" maxlength="15" placeholder="Ej: 02120010010" class="form-control"></div>
          </div>
          <p>(*) Campos obligatorios</p>
       
                     </div>
                     <div class="card-footer">
                <input type="hidden" name="operacion" value="guardar">
                      <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-check"></i>&nbsp; Guardar
                      </button>
 
                            <button type="reset" class="btn btn-danger btn-sm">
                             <i class="fa fa-recicle"></i> Limpiar
                              </button>
                            </form>
                               </div>
                         </div>

                
            </div><!-- /#right-panel -->
         </div>

            <!-- Right Panel -->

            
 <?php include_once "../includes/footer.php"; ?>