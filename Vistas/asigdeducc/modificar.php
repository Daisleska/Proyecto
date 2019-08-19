<?php 
include ('../../Modelos/clasedb.php');

$db=new clasedb();
$conex=$db->conectar();
extract($_REQUEST);
$sql="SELECT * FROM asignacion_deduccion WHERE id=".$id;
$res=mysqli_query($conex, $sql);
$data=mysqli_fetch_array($res);
?>

<?php include_once "../includes/menu.php"; ?>


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                       
                    </div>
                </div>
            </div>
           <!--  <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="col-lg-12">
            
                    <div class="card">
                      <div class="card-header">
                           <strong>Modificar Asignaciones y Deducciones</strong> 
                                </div>
                                   <div class="card-body card-block">
                                    <form action="../../Controladores/ControladorAsigDeducc.php?operacion=actualizar" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-descrip_ad" class=" form-control-label">Descripción</label></div>
                                    <div class="col-12 col-md-6"><input maxlength="120" type="text" id="hf-descrip_ad" name="descripcion" placeholder="Ingrese la descripción" class="form-control" required="required" value="<?php echo $data['descripcion']; ?>"><span class="help-block"></span></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-tipo_ad" class=" form-control-label">Tipo</label></div>
                                    <div class="col-12 col-md-6">
                                    <select id="hf-tipo_ad" name="tipo" class="form-control" required="required" value="<?php echo $data['tipo']; ?>"><span class="help-block"></span>>
                                        <option value="Asignacion">Asignación</option>
                                        <option value="Deduccion">Deducción</option>
                                    </select>
                                    </div>
                                    </div>


                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-monto_ad" class=" form-control-label">Monto </label></div>
                                    <div class="col-12 col-md-6"><input maxlength="20" type="text" id="hf-monto_ad" name="monto" placeholder="Ingrese el monto" class="form-control" required="required" value="<?php echo $data['monto']; ?>"><span class="help-block"></span></div>
                                    </div>


                                    

            
                                </div>
                           
                        </div>
                <div class="card-footer">
                <input type="hidden" name="operacion" value="actualizar">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-send"></i> Guardar
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