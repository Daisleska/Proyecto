
<?php include_once "../includes/menu.php";
extract($_REQUEST);
$data=unserialize($data);
?>

        <div class="breadcrumbs">

                

                    
        </div>

        <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Registrar</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Listado</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Proovedor</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <!--     registrar MP -->
            <?php 
  require "../../Modelos/conexion.php";
  $programa="SELECT * from proveedor ";
  $query=mysqli_query($conectar,$programa);


?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datosPersonales" data-toggle="tab">Registro de Insumos</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <form class="form-horizontal" action="../menu/ControladorMenu.php?operacion=guardar_materiaprima" method="POST" id="insumos">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="" class="control-label">Proveedor</label>
                        <?php
                          echo "<select  name='id_proveedor' required class='form-control'>
                          <option value=''>Seleccione</option>";
                          while($row=mysqli_fetch_assoc($query)){
                          echo "<option value='".$row['id']."'>".$row['nombre']."</option>";
                          }
                          echo "</select>";
                        ?>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="" class="control-label">Codigo</label>
                      <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código" value="<?php echo 'SERVI-'; echo $rows + 1;?>" readonly>
                      <span class="help-block"></span>
                    </div>

                    <div class="col-sm-4">
                      <label for="" class="control-label">Nombre del Producto</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Produto" required>
                      <span class="help-block"></span>
                    </div>

                  </div>

                  </div>
                  <div class="col-sm-12">
                    <br>
                  </div>

                  <div class="form-group">
                    
                    <div class="col-sm-5">
                      <label for="" class="control-label">Presentacion</label>
                      <input type="text" class="form-control" name="presentacion" id="presentacion" placeholder="Presentacion del producto" required>
                      <span class="help-block"></span>
                    </div>

                    <div class="col-sm-7">
                      <label for="" class="control-label">Observaciones</label>
                      <input type="text" maxlength="120" class="form-control" name="observacion" id="observacion" placeholder="Observaciones" value="">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  </div>
                  <div class="col-sm-12">
                    <br>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <a href="../menu/ControladorMenu.php?operacion=materia_prima" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
                      <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando Datos....">Registrar Producto <i class="ion-android-exit"></i></button>
                    </div>
                  </div>
                </form> 
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
        </div>
      </div>
    </div>
    </section>
                    
                                        </div>
                                        
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

  <!--       listado -->

                              <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-list"></i> LISTADO DE MATERIA PRIMA</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Presentación</th>
                                            <th>Unidad</th>
                                            <th>Opciones</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $num=1;
                                    for($i=0; $i < $filas; $i++){

                                    echo "<tr>";
                                    ?>

                                    <td><?=$num?></td>
                                    <?php 
                                    for ($j=1; $j <=4; $j++) 
                                    { 
                                     ?>

                                    <td><?=$data[$i][$j]?></td>


                                    <?php 

                                    }  ?>
    
                                    <td><a  href="../../Controladores/ControladorMP.php?operacion=modificar&id_materia_prima=<?=$data[$i][0]?>"><i title="Modificar" class="menu-icon fa fa-edit"></a></i>
    
                                    
    

                                    <a href="../../Controladores/ControladorMP.php?operacion=eliminar&id_materia_prima=<?=$data[$i][0]?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>
                                    </td>

                                    <?php   
                                $num++;
                                }   ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
                                            


    
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                       <!-- Proveedoer -->

 <script type="text/javascript">
    function solonumeros(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key);
        numeros="0123456789";
        especiales="8-37-38-46";
        teclado_especial=false;
        for (var i in especiales) {
            if (key==especiales[i]) {
                teclado_especial=true;

            }
            
        }
        if (numeros.indexOf(teclado)==-1 && !teclado_especial) {
            return false;
        }
    }
</script>


       <div class="breadcrumbs">
                       
        </div>

        <!-- contenido -->
 <form action="../../Controladores/ControladorProveedor.php?operacion=guardar" method="POST"  class="form">
       <div style="padding-left: 150px;" class="col-lg-10">
              <div class="card">
              <div class="card-header">
              <strong><i class="fa fa-edit"></i> REGISTRAR PROVEEDOR</strong> 
              </div>


           <div class="card-body card-block">
          

             <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* C.I / RIF:</label></div>

                   <div class="col-12 col-md-6"><input type="text" id="" name="cedula" required="required" placeholder="Ej: J-5677839" minlength="8" maxlength="11" class="form-control"></div>
          </div>



               <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                   <div class="col col-md-4"><label for="hf-email" class=" form-control-label">* Nombre:</label></div>

                   <div class="col-12 col-md-6"><input type="text" id="" name="nombre" minlength="5" maxlength="30" required="required" placeholder="Ej: Inica" class="form-control"></div>
          </div>

                 <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                   <div class="col col-md-4"><label for="hf-email" class=" form-control-label">* Correo:</label></div>

                   <div class="col-12 col-md-6"><input type="email" id="hf-email" required="required" name="email" minlength="15"  maxlength="40" placeholder="Ej: proveedor@gmail.com" class="form-control"></div>
               </div>


          <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* Dirección:</label></div>

                   <div class="col-12 col-md-6"><input type="text" id="" name="direccion" required="required" minlength="5" maxlength="40" placeholder="Ej: Aragua, Cagua" class="form-control"></div>
          </div> 

           <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                   <div class="col col-md-4"><label for="" class=" form-control-label">* Teléfono:</label></div>

                   <div class="col-12 col-md-6"><input type="text" id="" name="telefono" required="required" minlength="7" maxlength="11" onkeypress="return solonumeros(event)" placeholder="Ej: 02120010010" class="form-control"></div>
          </div>
          <p style="padding-left: 50px; padding-top: 10px;">(*) Campos obligatorios</p>
       
                     </div>
                     <div class="card-footer">
                <input type="hidden" name="operacion" value="guardar">
                      <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-check"></i>&nbsp;
                      </button>
 
                            <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i></button>
                            </form>
                               </div>
                         </div>

                
            </div><!-- /#right-panel -->
         </div>
     </div>

</div>
    </div><!-- /#right-panel -->


    <?php include_once "../includes/footer.php"; ?>