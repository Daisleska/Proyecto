<?php include_once "../includes/menu.php";
extract($_REQUEST);
$datos=unserialize($datos);
?>
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

         <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Registrar</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reporte</a>
      
                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                     <!--  registrar -->

                                  <!-- contenido -->
 <form action="../../Controladores/ControladorRecibidos.php?operacion=guardar" method="POST"  class="form">
       <div style="padding-left: 150px;" class="col-md-12">
              <div class="card">
              <div class="card-header">
              <strong class="card-title"><i class="fa fa-list"></i>  REGISTRAR RECIBIDOS</strong> 
              </div>


           <div class="card-body card-block">
          
          <div style="padding-left: 50px; padding-top: 10px;" class="row form-group">
                <div class="col col-md-4"><label for="hf-materia" class=" form-control-label">* Materia Prima</label></div>
                    <div class="col-12 col-md-6">
                    <select name="id_pmp" title="Seleccione"class="form-control">
                    <option disabled="disabled" selected="selected" value="">Seleccione la Materia Prima</option>
                    <?php 
                    for ($i=0; $i<$filas; $i++){
                    ?>
                    <option value="<?=$datos[$i][0]?>"><?=$datos[$i][2]?></option>
                    <?php
                    }
                    ?>
                    </select>
                    </div>
                    </div>

          <div style="padding-left: 50px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* Cantidad:</label></div>

                   <div class="col-12 col-md-6"><input type="text" id="" name="cantidad" required="required" onkeypress="return solonumeros(event)" minlength="4" maxlength="15" class="form-control"></div>
          </div>

          <div style="padding-left: 50px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* Fecha:</label></div>

                   <div class="col-12 col-md-6"><input type="date" id="" name="fecha" required="required" class="form-control"></div>
          </div>


          <div style="padding-left: 50px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* CE:</label></div>

                   <div class="col-12 col-md-6"><input type="text" id="" name="ce" required="required" minlength="4" maxlength="10" class="form-control"></div>
          </div>

           <div style="padding-left: 50px;" class="row form-group">
                   <div class="col col-md-4"><label class=" form-control-label">* Observación:</label></div>

                   <div class="col-12 col-md-6"><textarea id="" name="observacion"  minlength="4" maxlength="40" class="form-control"></textarea></div>
          </div>

          <p style="padding-left: 50px; padding-top: 10px;">(*) Campos obligatorios</p>



                     </div>
                     <div class="card-footer">
                <input type="hidden" name="operacion" value="guardar">
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
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                         <!--  reporte -->

                                <?php
 include("../../Modelos/clasedb.php");
$db=new clasedb();//instanciando clasedb
  $conex=$db->conectar();//conectando con la base de datos

  $sql="SELECT * FROM recibidos";//query
  //ejecutando query
  if ($res=mysqli_query($conex,$sql)) {
    //echo "entro";
    $campos=mysqli_num_fields($res);//cuantos campos trae la consulta 
    $filas=mysqli_num_rows($res);//cuantos registro trae la consulta
    $i=0;
    $datos[]=array();//inicializando array
    //extrayendo datos
    while($data=mysqli_fetch_array($res)){
      for ($j=0; $j <$campos; $j++) { 
        $datos[$i][$j]=$data[$j];
      } 
      $i++;
    }
    } else {
    echo "Error en la BASE DE DATOS";

  }//enviando datos

?>

        <div class="breadcrumbs">
            <div class="col-sm-5">
                <div class="page-header float-left">

                
    
            </div>
            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">

                     
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-list"></i>  LISTADO DE RECIBIDOS</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Materia Prima</th>
                                            <th>Cantidad</th>
                                            <th>Fecha</th>
                                            <th>Observación</th>
                                            <th>CE</th>
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
                                    for ($j=1; $j < $campos; $j++) 
                                    { 
                                     ?>

                                    <td><?=$datos[$i][$j]?></td>


                                    <?php 

                                    }  ?>
    
                                    <td><a  href="../../Controladores/ControladorRecibidos.php?operacion=modificar&id_recibidos=<?=$datos[$i][0]?>"><i title="Modificar" class="menu-icon fa fa-edit"></a></i>
    
                                    
    

                                    <a href="../../Controladores/ControladorRecibidos.php?operacion=eliminar&id_recibidos=<?=$datos[$i][0]?>"><i title="Eliminar" class="menu-icon fa fa-trash-o"></a></i>
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
       
    <!--    fin de reporte -->
                                  

                                </div>
                            </div>
                        </div>
                    </div>

    

            <!-- Right Panel -->

            
 <?php include_once "../includes/footer.php"; ?>