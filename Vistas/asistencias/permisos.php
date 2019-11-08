 <?php include_once "../includes/menu.php"; ?>


<div class="row">
        <div class="col-md-12">
          <h1 align="center"> Asistencias <span class="badge badge-info">Permisos <i class="menu-icon fa fa-key"></i> </span></h1>
        </div>
        <!-- /.col -->
 </div>

 <div class="content mt-3">
     <div class="animated fadeIn">
          <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Motivos</strong> <small> Detalles del Permiso</small>
                            </div>
                            <div class="card-body card-block">
                                <form>

                                 <select data-placeholder="Motivo del Permiso" class="standardSelect" tabindex="1">
                                    <option value=""></option>
                                    <option value="United States">Reposo</option>
                                    <option value="United Kingdom">Permiso</option>
                                    <option value="Afghanistan">Luto</option>
                                   </select>
                                   <br>

                                <div class="form-group">
                                    <label class=" form-control-label">Fecha del Permiso</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="date" class="form-control">
                                    </div>
                                  
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Cantidad de dias </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-plus"></i></div>
                                        <input type="number" class="form-control">
                                    </div>
                                       
                                </div>

                                 <div class="form-group">
                                    <label class=" form-control-label">Fin del Permiso</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="date" class="form-control">
                                    </div>
                               
                            </div>
                              
                             <button class="btn btn-primary"><i class="fa fa-check">Aceptar</i></button>
                        </div>
                    </form>
  </div>
</div>

<?php include_once "../includes/footer.php"; ?>