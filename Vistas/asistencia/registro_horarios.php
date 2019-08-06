<?php include_once "../includes/menu.php"; ?>

        <div class="breadcrumbs">
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
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                                            
                                                

                
                 <div class="col-lg-6">
                <div class="card">
                <div class="card-header">
                 <strong>Registro de Horarios</strong> 
                </div>
                <div class="card-body card-block">
                 <form action="" method="post" class="form-horizontal">
                <div class="row form-group">
                <div class="col col-md-3"><label for="hf-empleado" class=" form-control-label">Empleado</label></div>
                <div class="col-12 col-md-9">
                <select id="hf-empleado" name="empleado" class="form-control">
                <option></option>
                </select>
                <span class="help-block">Seleccione el empleado</span></div>
                </div>

                
                <div class="row form-group">
                <div class="col col-md-3"><label for="hf-horasp" class=" form-control-label">Horas Pautadas</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-horasp" name="horas_p" placeholder="Ingrese las horas pautadas" class="form-control"><span class="help-block">Ingrese las horas pautadas</span></div>
                </div>

                 <div class="row form-group">
                 <div class="col col-md-3"><label for="hf-horast" class=" form-control-label">Horas Trabajadas</label></div>
                 <div class="col-12 col-md-9"><input type="text" id="hf-horast" name="horas_p" placeholder="Ingrese las horas trabajadas" class="form-control"><span class="help-block">Ingrese las horas trabajadas</span></div>
                </div>

                <div class="row form-group">
                <div class="col col-md-3"><label for="hf-fecha" class=" form-control-label">Fecha</label></div>
                <div class="col-12 col-md-9"><input type="date" id="hf-fecha" name="fecha" placeholder="Ingrese la fecha" class="form-control"><span class="help-block">Ingrese la fecha</span></div>
                                                            </div>

                <div class="row form-group">
                <div class="col col-md-3"><label for="hf-dia" class=" form-control-label">Dia</label></div>
                <div class="col-12 col-md-9">
                <select id="hf-dia" name="dia" class="form-control">
                <option>Lunes</option>
                <option>Martes</option>
                <option>Miércoles</option>
                <option>Jueves</option>
                <option>Sábado</option>
                <option>Domingo</option>
                </select>

                <span class="help-block">Seleccione el dia</span></div>
                </div>
                </form>
                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
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

<?php include_once "../includes/footer.php"; ?>