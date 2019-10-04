<?php include_once "../includes/menu.php"; 
date_default_timezone_set('America/Caracas');
require_once('../../Modelos/conexion.php');
extract($_REQUEST);
$data=unserialize($data);

?>



        <div class="breadcrumbs">
           
          <!--   <div class="col-sm-5">
                <div class="page-header float-left">
                    <div class="page-title">
                        <div>
                            LISTADO
                        </div>
                  </div>
                </div>
            </div>

                        <div class="col-sm-7">
                <div class="page-header float-right">
                   <ol class="breadcrumb text-right">

                            <li class="active"></li>
                        </ol>
                </div>
            </div> -->

                    
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                
                                <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="../../Controladores/ControladorPerfil.php?operacion=verperfil"><i class="fa fa-user"></i> Datos Personales /</a></li>
        <li><a href="../../Controladores/ControladorPerfil.php?operacion=cambiar_clave"><i class="fa fa-lock"></i> Cambiar Contraseña</a></li>
      </ol>
    </section>
                            </div>
                            <div class="card-body">
                            
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                    
                                 
                                        <th>Nombre</th>
                                
                                        <th>Correo</th>
                                  
                                  
                                        <th>Pregunta</th>
                            
                                  
                                        <th>Respuesta</th>
                                        
                                    </tr>
                                        
                                        
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <?php $num=1; 
                                    for ($i=0; $i <$filas; $i++) { 
                                    echo "<tr>";      
                                    ?>  
                                    <td><?=$num?></td>
                                    <?php for ($j=0; $j < $campos; $j++) { ?>
                                    <td><?=$data[$i][$j]?></td>

                                    <?php } ?>

                                    <?php   
                                    $num++;
                                    }   ?>
                                    

                                       
                                        
                                    </tbody>

                                </table>

                            <form action="../../Controladores/ControladorPerfil.php?operacion=modificar" method="POST">
                                
                                <button type="submit" class="btn btn-success" id="submit_btn"><i class="fa fa-edit"></i>
                                
                                </button>
                            </form>



                            </div>
                        </div>
                    </div>




                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
<?php include_once "../includes/footer.php"; ?>