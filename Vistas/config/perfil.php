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
                                    <thead>
                                       <tr>
                                         <th>N°</th>
                                    
                                 
                                        <th>Nombre</th>
                                
                                        <th>Correo</th>
                                  
                                  
                                        <th>Pregunta</th>
                            
                                  
                                        <th>Respuesta</th>
                                     
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

                                    <td><?=$data[$i][$j]?></td>


                                    <?php 

                                    }  

                                   
                                $num++;
                                }   ?>

                                    </tbody>
                                </table>
                                <form action="../../Controladores/ControladorPerfil.php?operacion=modificar" method="POST">
                                
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                                
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