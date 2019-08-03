<?php include_once "../includes/menu.php"; ?>

        <!-- <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="col-lg-12">
                     <p>Pago De Nomina a Empleados De SERVIFORM</p>

                    <div class="card">

                      <div class="card-header">
                           <strong>Registro de Nomina</strong> 
                                </div>
                                   <div class="card-body card-block">
                                    <form action="" method="post" class="form-horizontal">

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-empleado_nom" class=" form-control-label">Empleado</label></div>
                                    <div class="col-12 col-md-6">
                                    <select id="hf-empleado_nom" name="empleado_nom" class="form-control"><span class="help-block"></span>>
                                        <option value=""></option>
                                        
                                    </select>
                                    </div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-ad_nom" class=" form-control-label">Asignaciones y Deducciones</label></div>
                                    <div class="col-12 col-md-6">
                                    <select id="hf-ad_nom" name="ad_nom" class="form-control"><span class="help-block"></span>>
                                        <option value=""></option>
                                        
                                    </select>
                                    </div>
                                    </div>

                                    

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-monto_nom" class=" form-control-label">Monto </label></div>
                                    <div class="col-12 col-md-6"><input maxlength="20" type="text" id="hf-monto_nom" name="monto_nom" placeholder="Ingrese el monto" class="form-control"><span class="help-block"></span></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-fecha_nom" class=" form-control-label">Fecha</label></div>
                                    <div class="col-12 col-md-6"><input type="date" id="hf-fecha_nom" name="fecha_nom" placeholder="Ingrese la fecha" class="form-control"><span class="help-block"></span></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-periodo_nom" class=" form-control-label">Periodo</label></div>
                                    <div class="col-12 col-md-6"><input type="text" id="hf-periodo_nom" name="periodo_nom" placeholder="Ingrese el periodo" class="form-control"><span class="help-block"></span></div>
                                    </div>


                                    

            
                                </div>
                          
                        </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-send"></i> Guardar
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Limpiar
                </button>
                           </form>  

                                                    </div>
                                                </div>
                                                
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


<?php include_once "../includes/footer.php"; ?>