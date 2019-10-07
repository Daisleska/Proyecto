<?php include_once "../includes/menu.php";
extract($_REQUEST);
$empleado=unserialize($empleado);
  
 


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
                    
                 </div>
                </div>
            </div>
            
        </div>

        <!-- contenido -->
 <form action="../../Controladores/ControladorPreNomina.php?operacion=pagar" method="POST"  class="form">
       <div style="padding-left: 150px;" class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong class="card-title"><i class="fa fa-list"></i>  PAGAR</strong> 
              </div>


           <div class="card-body card-block">
          

                    <div style="padding-left: 50px;" class="row form-group">
                    <div class="col col-md-3"><label for="hf-empleado" class=" form-control-label">Empleado: </label></div>
                    <div class="col-12 col-md-7">
                    <select name="id_empleado" title="Seleccione el empleado"class="form-control">
                    <option disabled="disabled" selected="selected" value="">Seleccione el Empleado</option>
                    <?php 
                    for ($i=0; $i<$filas_em; $i++){
                    ?>
                    <option value="<?=$empleado[$i][0]?>"><?=$empleado[$i][1]?> | <?=$empleado[$i][2]?></option>
                    <?php
                    }
                    ?>
                    </select>
                    </div>
                    </div>



                     </div>
                     <div class="card-footer">
                <input type="hidden" name="operacion" value="pagar">
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