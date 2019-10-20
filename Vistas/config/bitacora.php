<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
$usuarios=unserialize($usuarios);



?>

  <div class="breadcrumbs">
           


                    
        </div>
        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                              <h3></small><i class="fa fa-table"></i> Bit&aacute;cora de Acciones</h3>  
                               
                            </div>
                            <div class="card-body">
                            
                            <div class="row form-group col-md-offset-3">
                            <table width="100%" border="0" align="center" style="margin: 2cm;">
                          <tr>
                               <td colspan="2" width="40%">Buscar por fecha:</label></td>
                               <td colspan="2" width="40%"><label>Buscar por Usuario:</label></td>
                          </tr>
                          <tr>
                          <form action="../../Controladores/ControladorBitacora.php?operacion=bitacora_fecha" method="POST">
                            <td><input type="date" class="form-control" name="fecha" title="Seleccione una fecha"/></td>
                            <td><button class="btn btn-success" type="submit" name="operacion" value="bitacora_fecha"><i class="fa fa-search"><span class="glyphicon glyphicon-search"></span></button></td>
                         </form>



                          <form action="../../Controladores/ControladorBitacora.php?operacion=bitacora_usuario" method="POST">
                           <td><select  name="id_usuario" class="form-control">
                           <option>Seleccione</option>

                            <?php 
                              for ($i=0;$i<$filas; $i++){
                            ?>
                            <option value="<?=$usuarios[$i][0]?>"><?=$usuarios[$i][1]?></option>
                            <?php
                            }
                            ?>

                           </select></td>

                            <td><button class="btn btn-success" type="submit" name="operacion" value="bitacora_usuario"><i class="fa fa-search"><span class="glyphicon glyphicon-search"></span></button></td>
                          </form>
                          </tr>


                          <tr>
                             <td colspan="2" width="40%"><label>Buscar por Hora:</label></td>
                             <td colspan="2" width="40%"><label>Buscar por Actividad:</label></td>
                          </tr>
                          <tr>
                          <form action="../../Controladores/ControladorBitacora.php?operacion=bitacora_hora" method="POST">
                          <td><select name="hora" class="form-control">
                          <option>Seleccione</option>
        
                          

                         </select></td>
                         <td><button class="btn btn-success" type="submit" name="operacion" value="bitacora_hora"><i class="fa fa-search"><span class="glyphicon glyphicon-search"></span></button></td>
                         </form>

       
                        <form action="../../Controladores/ControladorBitacora.php?operacion=bitacora_actividad" method="POST">
                          <td><select  name="accion" class="form-control">
                           <option>Seleccione</option>
                         
                         
                       </select></td>
                         <td><button class="btn btn-success" type="submit" name="operacion" value="bitacora_actividad"><span class="glyphicon glyphicon-search"><i class="fa fa-search"></span></button></td>
                       </form>
                       </tr>
                      
                       </table>
                       </div>

                      <p align="center"><a href="../../Controladores/ControladorBitacora.php?operacion=bitacora_todo" class="btn btn-success">Ver Todos <i class="#"></i></a></p><br>

                          


                            </div>
                        </div>
                    </div>




                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
                


    



<?php include_once "../includes/footer.php"; ?>