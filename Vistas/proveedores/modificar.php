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
                     <!--  -->
                 </div>
                </div>
            </div>
            
        </div>

        <!-- contenido -->

       <div class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong>REGISTRAR</strong> Proveedores
              </div>


           <div class="card-body card-block">
           <form action="../../Controladores/ControladorProveedor.php?operacion=actualizar" method="post"  class="form">

            <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-ci" class=" form-control-label">C.I / RIF:</label></div>
                                    <div class="col-12 col-md-6"><input type="text" id="hf-ci" name="cedula" placeholder="Ej: J-5677839" required="required" minlength="8" maxlength="20" class="form-control" value="<?php echo $data['cedula']; ?>"></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-nombres" class=" form-control-label">Nombre:</label></div>
                                    <div class="col-12 col-md-6"><input type="text" id="hf-nombre" name="nombre" placeholder="Ej: Inica"  minlength="5" maxlength="40" required="required" class="form-control" value="<?php echo $data['nombre']; ?>"></div>
                                    </div>

                                    
                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-correo" class=" form-control-label">Correo:</label></div>
                                    <div class="col-12 col-md-6"><input type="email" id="hf-correo" name="email" placeholder="Ej: proveedor@gmail.com" required="required" maxlength="50" class="form-control" value="<?php echo $data['email']; ?>"></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-dir" class=" form-control-label">Dirección:</label></div>
                                    <div class="col-12 col-md-6"><input type="text" id="hf-dir" name="direccion" placeholder="Ej: Aragua, Cagua" required="required" maxlength="50" class="form-control" value="<?php echo $data['direccion']; ?>"></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-tlf" class=" form-control-label">Teléfono:</label></div>
                                    <div class="col-12 col-md-6"><input type="text" id="hf-tlf" name="telefono" placeholder="Ej: 02120010010" maxlength="15" required="required" class="form-control" value="<?php echo $data['telefono']; ?>"></div>
                                    </div>

                                    

                                   
                <dir>
                <input type="hidden" name="operacion" value="actualizar">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                </dir>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-send"></i> Guardar
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Limpiar
                </button>
                                                    </div>
                                                </div>
                                                
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->
            <!-- Right Panel -->

            
 <?php include_once "../includes/footer.php"; ?>