<?php include_once "../includes/menu.php"; 
date_default_timezone_set('America/Caracas');
require_once('../../Modelos/conexion.php');
extract($_REQUEST);
$data=unserialize($data);
?>

 <div class="content mt-3" style="padding-left: 20px;">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                 
                  <section  class="content-header">
                             <ol class="breadcrumb">
       
                            <h1 align="center">  <span style="margin-left: 5cm;" class="badge badge-info">Datos Personales <i class="fa fa-user"></i> </span></h1>
                            
                            <li style="padding-left: 1cm;"><a href="../../Controladores/ControladorPerfil.php?operacion=cambiar_clave"><i class="fa fa-lock"></i> Cambiar Contraseña</a></li>
                            </ol>

                  </section >
                  <br><br>
             </div>
                                        
             </div>
           </div>
         </div>
         
            <br>
                      
                          
                      
                  
 
              <div class="table-responsive" style="padding-left: 30px; padding-right: 20px;">
               
                                <table class="table table-striped table-sm " id="table">
                                <tr>
                                
                                  <td rowspan="5" style="width: 4.4cm;"><img src="../../images/<?=$data[0][0];?>" style="margin: center;" width="153px" height="150"><br></br>
                                    <form action="../../Controladores/ControladorPerfil.php?operacion=cambiarfoto" method="POST">
                                    <input type="file" style="width: 153px;" name="image" required="required"><br></br>
                                  <button type="submit" class="btn-primary" style="margin-left: 0.5cm;">Cambiar Foto</button></td>
                                  </form>
                             
                                
                                    <?php $nombres=array();
                                          $nombres[0][1]="Nombre";
                                          $nombres[0][2]="Correo";
                                          $nombres[0][3]="Pregunta";
                                          $nombres[0][4]="Respuesta";

                                      ?>
                                      <?php $num=1;
                                    for($i=0; $i < $filas; $i++){

                                    echo "<tr>";
                                    ?>
                                    <?php 
                                    
                                    for ($j=1; $j < $campos; $j++) 

                                    { 
                                     ?>

                                      
                                      <td><strong><?=$nombres[0][$j]?>:</strong> <?=$data[$i][$j]?></td>
                                    </tr>
                                  

                                    <?php 

                                    }  

                                   
                                $num++;
                                }   ?>
                            

                                </table>
                                <br>
                                 <form action="../../Controladores/ControladorPerfil.php?operacion=modificar" method="POST">
                                
                                <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 19cm;"><i class="fa fa-edit"></i>
                                
                                </button>
                            </form>
                                
                            </div>
                        </div>
               
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
<?php include_once "../includes/footer.php"; ?>
    <script src="../../vendors/js/sweetalert.min.js"></script>
    <script src="../../vendors/js/datatables.min.js"></script>
    <script type="text/javascript">
                            


    
                          






   
                


    



<?php include_once "../includes/footer.php"; ?>