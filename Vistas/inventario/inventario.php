<?php


          function id_clean($id){

              $cadena = preg_replace("/[^0-9]+/", "*", $id);
              return $cadena;
          }
          error_reporting(0);
          extract($_REQUEST);
          $borrar=id_clean($borrar);

          if ($borrar=='') {
            # code...
          }else{

              include('../../Modelos/conexion.php');

              $sql="UPDATE productos SET borrado='S' WHERE id='$borrar'";

              $resultado=mysqli_query($conectar,$sql);

              if ($resultado) {
                header('location: inventario.php?e=1');
              }else{
                header('location : inventario.php?e=2');
              }

              include('../../Modelos/desconectar.php');
          }
      

          if(isset($_POST['btn-agregar'])){
          
              extract($_REQUEST);
              $ar=id_clean($ar);
              if ($ar=='') {
                header('location: inventario.php');
              }else{

                if ($agregar=='') {
                     echo '
                          <script src="../../bootstrap/js/jquery.js"></script>
                          <script src="../../vendors/js/sweetalert.min.js"></script>
                          <script>
                            $(document).ready(function(){
                              swal("Error","Por favor, llene el campo correspondiente", "error");
                            });
                          </script>

                      ';
                }else{
                  if ($agregar<=0) {
                    
                        echo '
                          <script src="../../bootstrap/js/jquery.js"></script>
                          <script src="../../vendors/js/sweetalert.min.js"></script>
                          <script>
                            $(document).ready(function(){
                              swal("Error","Por favor, Introduzca una cantidad mayor a cero (0)", "error");
                            });
                          </script>

                      ';  
                  }else{

                    include('../../Modelos/conexion.php');

                    $sql="SELECT * FROM productos where id='$ar'";
                    $resultado=mysqli_query($conectar,$sql);
                    $i=0;
                    while ($consulta=mysqli_fetch_array($resultado)) {
                      
                        $stock=$consulta['stock'];
                        $stock_maximo=$consulta['stock_maximo'];
                        $i++;
                    }

                    if ($i==0) {
                            echo '
                              <script src="../../bootstrap/js/jquery.js"></script>
                              <script src="../../vendors/js/sweetalert.min.js"></script>
                              <script>
                                $(document).ready(function(){
                                  swal("Error","Producto no encontrado", "error");
                                });
                              </script>
                          ';  
                    }else{

                      if ($i>1) {
                       header('location: inventario.php');
                        }

                        $nuevo_stock=$stock+$agregar;

                        if ($nuevo_stock>$stock_maximo) {
                        
                         include('../../Modelos/desconectar.php');
                         echo '
                            <script src="../../bootstrap/js/jquery.js"></script>
                            <script src="../../vendors/js/sweetalert.min.js"></script>
                            <script>
                              $(document).ready(function(){
                                swal("Error", "El stock no puede superar el stock maximo establecido en el inventario." , "error");
                              });
                            </script>

                        '; 
                      }else{ 

                        $sql="UPDATE productos SET stock='$nuevo_stock' where id='$ar'";

                        $resultado=mysqli_query($conectar,$sql);

                        if ($resultado) {

                            include('funcion-inventario.php');

                            $res=sumar_articulo($ar,$agregar);

                            header('location: inventario.php?act=1');

                        }else{
                             include('../../Modelos/desconectar.php');
                            header('location: inventario.php?act=2');
                  
                        }

                        

                      }
                    }

                    
                  }
                }
              }     
          }
      
             if ($er==1) {
                            echo '
                              <script src="../../bootstrap/js/jquery.js"></script>
                              <script src="../../vendors/js/sweetalert.min.js"></script>
                              <script>
                                $(document).ready(function(){
                                  swal("Error","El producto que desea enviar no se encuentra activo", "error");
                                });
                              </script>
                          ';  
                        }
             
         if ($er==2) {
             echo '
       <script src="../../bootstrap/js/jquery.js"></script>
        <script src="../../vendors/js/sweetalert.min.js"></script>
         <script>
           $(document).ready(function(){
             swal("Error","El producto que desea enviar no se almacená en la ubicación seleccionada", "error");
              });
            </script>
             ';  
          }
         // retirar

         if (isset($_POST['btn-retirar'])){

             extract($_REQUEST);
             $ar=id_clean($ar);
              if ($ar=='') {
                header('location: inventario.php');
              }else{

                if ($retirar=='') {
                     echo '
                          <script src="../../bootstrap/js/jquery.js"></script>
                          <script src="../../vendors/js/sweetalert.min.js"></script>
                          <script>
                            $(document).ready(function(){
                              swal("Error","Por favor, llene el campo correspondiente", "error");
                            });
                          </script>

                      ';
                }else{
                  if ($retirar<=0) {
                    
                        echo '
                          <script src="../../bootstrap/js/jquery.js"></script>
                          <script src="../../vendors/js/sweetalert.min.js"></script>
                          <script>
                            $(document).ready(function(){
                              swal("Error","Por favor, Introduzca una cantidad mayor a cero (0)", "error");
                            });
                          </script>

                      ';  
                  }else{

                  include('../../Modelos/conexion.php');

                    $sql="SELECT * FROM productos where id='$ar'";
                    $resultado=mysqli_query($conectar,$sql);
                    $i=0;
                    while ($consulta=mysqli_fetch_array($resultado)) {
                      
                        $stock=$consulta['stock'];
                        $stock_maximo=$consulta['stock_maximo'];
                        $i++;
                    }

                    if ($i==0) {
                            echo '
                              <script src="../../bootstrap/js/jquery.js"></script>
                              <script src="../../vendors/js/sweetalert.min.js"></script>
                              <script>
                                $(document).ready(function(){
                                  swal("Error","Artículo no encontrado", "error");
                                });
                              </script>
                          ';  
                          include('../../Modelos/desconectar.php');
                    }else{

                      if ($i>1) {
                       include('../../Modelos/desconectar.php');
                       header('location: inventario.php');
                    }

                      $nuevo_stock=$stock-$retirar;

                      if ($nuevo_stock<0) {
                        
                        echo '

                        <script src="../../bootstrap/js/jquery.js"></script>
                              <script src="../../vendors/js/sweetalert.min.js"></script>
                              <script>
                                $(document).ready(function(){
                                  swal("Error", "No se cuenta con la cantidad requerida en el inventario para realizar esta operación" , "error");
                                });
                        </script>

                        ';



                      }else{

                        $sql="UPDATE productos SET stock='$nuevo_stock' where id='$ar'";

                          $resultado=mysqli_query($conectar,$sql);

                          if ($resultado) {

                                include('funcion-inventario.php');

                                restar_articulo($ar,$retirar);                       
                              header('location: inventario.php?act=1');
                          }else{
                              header('location: inventario.php?act=2');
                    
                          }

                          include('../../Modelos/desconectar.php');
                      }
                    }

                    
                  }
                }
              }     
        
         }  


         if ($borrado='') {
           # code...
         }else{


         }
?>
<?php 
include_once "../includes/menu.php";
?>
  <div class="contenido" style="padding-left: 15px">
    <div class="content-2">
    <section  class="content-header">
      <ol class="breadcrumb">
       
         <h1 align="center">  <span style="margin-left: 6cm;" class="badge badge-info">Materia Prima <i class="menu-icon fa fa-book"></i> </span></h1>
        
      </ol>
   </section >
    <!--nav inventario -->
         <ul class="nav nav-tabs" >
          <li class="nav-item">
            <a class="nav-link active" href="inventario.php">Materia Prima
              <?php
                $res_busqueda=$contador[0];

                if ($res_busqueda>99) {
                  echo ' <span class="badge badge-primary badge-pill" style="float: right;">99+</span>';
                }else if($res_busqueda>0){
                  echo ' <span class="badge badge-primary badge-pill" style="float: right;">'.$res_busqueda.'</span>';
                }
              ?>
            </a>
          </li>

          <?php

           
              echo '

               
                  <li class="nav-item">
                  <a class="nav-link " href="../inventario/ubicacion_inventario.php">Ubicación</a>
                </li><div></div>
                <li class="nav-item">
                  <a class="nav-link" href="../inventario/proveedores.php">Proveedores</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../inventario/pedidos-internos.php">Pedidos <span class="badge badge-primary badge-pill" style="float: right;"> </span> '.$cont_interno.'</a>
                 
                </li>

              ';
            
          ?>
        </ul><br>
        <?php
          // Alertas

          include('../../Modelos/conexion.php');

          $resultado= mysqli_query($conectar,"SELECT productos.stock FROM productos WHERE productos.stock <productos.stock_minimo AND borrado='N' AND activo='S'");
          $i=0;
          while ($consulta = mysqli_fetch_array($resultado)) {
            $i++;
            break;
          }

           include('../../Modelos/desconectar.php');

         
              echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  '.$i.' materia Prima requiere atención
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
            ';
           

           
        ?>
        <?php
            
              echo '

                <center>
                    <a href="../inventario/registro-inventario.php" class="btn btn-primary"><i class="ti-pencil-alt"></i> Registrar Materia</a>

                    <a href="../../reportes/reporte_materiaprima.php" class="btn btn-secondary" title="Descargar PDF"><i class="ti ti-import"></i> Descargar PDF</a>

                    <a href="../inventario/producto_enviar.php" class="btn btn-success"><i class="fa fa-truck"></i> Enviar Materia</a>   
              </center><br>

              ';
            
        ?>
        <div class="table-responsive">
            <table class="table table-striped table-sm " id="table">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Presentación</th>
                    <th>Activo</th>
                    <th>Stock</th>
                     <th>Unidad</th>
                    <!--th>Ubicación Actual</th-->
                    <?php
                      
                        
                        echo '
                          <th>Opciones</th>
                        ' ;
                      
                    ?>
                    
                  </tr>
                </thead>
                  <tbody>
                   <?php 
                  include('../../Modelos/conexion.php');

                    $sql="SELECT * FROM productos  WHERE borrado='N'";

                    $resultado=mysqli_query($conectar,$sql);

                    while($consulta=mysqli_fetch_array($resultado)) {

                      echo "   
                      <tr>
                        <td>".$consulta['codigo']."</td>
                        <td>".$consulta['nombre']."</td>
                        <td>".$consulta['presentacion']."</td>"
                        ;


                      /*  if ($consulta['id_categoria']!='') {
                            $sql2="SELECT * FROM categorias WHERE id=".$consulta['id_categoria'];
                            $res2=mysqli_query($conexion,$sql2);

                            while ($con=mysqli_fetch_array($res2)) {
                              echo '<td>'.$con['categoria'].'</td>';
                            }
                        }else{

                          echo "<td>N/A</td>";
                        }
*/
                         if ($consulta['activo']=='S') {
                            
                            $activo='<strong>Si</strong>';
                            $alert2="class='estado-re'";
                        }
                        if ($consulta['activo']=='N') {
                            $activo='<strong>No</strong>';
                            $alert2="class='estado-r'";
                        }

                        if ($consulta["stock"]<$consulta['stock_minimo'] AND $consulta['activo']=='S'){

                          $alert="class='estado-r'";
                        }else{
                          $alert="";
                        }

                      echo "
                        <td ".$alert2.">".$activo."</td>
                        <td><strong ".$alert." >".$consulta['stock']."</strong></td>
                         <td><strong>".$consulta['unidad']."</strong></td>
                     
                        ";
                           

                    
                          /*
                            echo "

                              <td>
                                <a href='javascript:ver(".$consulta['id'].")' class='ver'  title='Ver'><span class='fa fa-eye'></span></a>

                            " ;
                        */
                      
                            echo "  <td>
                            <a href='javascript:ver(".$consulta['id'].")' class='ver'  title='Ver'><span class='fa fa-eye'></span></a>
                           <a href='../inventario/editar_inventario.php?art=".$consulta['id']."' class='editar'  title='Editar'><span class='fa fa-edit'></span></a>
                            
                                                     
                        
                            " ;

                            if ($consulta['stock']==0 or $_SESSION['tipo_usuario']=='Admin') {
                              
                              echo "<a href='javascript: eliminar(".$consulta['id'].")' class='x' title='Eliminar'><span class='fa fa-times'></span></a>";

                            }

                               echo "
                                  </td>

                              </tr> ";

                           
                        }

                    

                     include('../../Modelos/desconectar.php');
                  ?>
                </tbody>
            </table>
            <br><br><br><br><br><br><br>
        </div>
        </div>
      </div>
    <!-- Modal -->
    
    <!-- Agregar-->
    <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Agregar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
              <div class="modal-body">
               <form action="#" method="POST" id="modal-agregar">
                  <div class="row">
                    <div class="col">
                      <label><strong>Introduzca la cantidad a agregar</strong></label>
                      <input type="number" class="form-control input-number" placeholder="Ej. 2" title="Ingrese la cantidad a agregar" required="required" name="agregar" min="1">
                    </div>
                  </div>
                
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary" name="btn-agregar" id="btn-agregar">Añadir</button>
                </div>
              </form>
          </div>
        </div>
      </div>

      <!-- retirar-->
      <div class="modal fade" id="retirar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Retirar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <div class="modal-body">
                <form action="#" method="POST" id="modal-retirar">
                  <div class="row">
                    <div class="col">
                      <label><strong>Introduzca la cantidad a retirar</strong></label>
                      <input type="number" class="form-control input-number retirar_stock" placeholder="Ej. 2" name="retirar" min='1' id="retirar_stock" required="required">
                    </div>
                  </div>
                
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-danger" name="btn-retirar" id="btn-eliminar">Retirar</button>
                </div>
              </form>
          </div>
        </div>
      </div>
      <style>
        .ver_articulo_modal .modal-header{
          background: rgba(0, 34, 79, 1);
          color: #fff;
        }
        .ver_articulo_modal .aria-hidden{
          color: #fff;
        }
        .ver_articulo_modal .close{
          color: #fff;
          text-shadow: 0 1px 0 #fff;
          opacity: 1;
        }
      </style>
      <div class="modal fade ver_articulo_modal" id="ver_articulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document"><!-- modal-dialog-centered-->
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><div id="titulo"></div></h5>

              <button class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="aria-hidden">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="body">
                  
              </div>
                            
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                 <a href="#" id="ver-historial" class="btn btn-primary">Ver historial</a>
              </div>
            
          </div>
        </div>
      </div>  
      <!--Fin Modal-->

         <?php include_once "../includes/footer.php"; ?>


  <script src="../../bootstrap/js/jquery.js"></script>
  <script src="../../vendors/js/popper.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script>
      feather.replace();
    </script>
    <!-- <script type="text/javascript">var X=3</script>
    <script src="js/main.js"></script>
    <script src="js/iziToast.min.js"></script>-->
    
    <script type="text/javascript" src="../../vendors/js/inventario.js"></script> 
    <script>


      <?php
        error_reporting(0);
        extract($_REQUEST);
        //Registro
        if ($reg==1) {
            echo "
              iziToast.success({
                title: '¡Registrado! ',
                message: ' registrado correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($reg==2){
          echo
               "iziToast.error({
                title: '¡Error al registrar! ',
                message: ' no pudo ser registrado',
                color: '#ffb6bb',
            
              });";
        } 

        //Actualizar artículos 
        if ($act==1) {
            echo "
              iziToast.success({
                title: '¡Actualizado! ',
                message: ' actualizado correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($act==2){
          echo
               "iziToast.error({
                title: '¡Error al actualizar! ',
                message: ' no pudo ser actualizado',
                color: '#ffb6bb',
            
              });";
        }

        //Eliminar productos

        if ($e==1) {
            echo "
              iziToast.success({
                title: '¡Eliminado! ',
                message: ' eliminado correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($e==2){
          echo
               "iziToast.error({
                title: '¡Error al eliminar! ',
                message: 'no pudo ser eliminado',
                color: '#ffb6bb',
            
              });";
        }


        //Enviar productos
   if ($env==1) {
            echo "
              iziToast.success({
                title: '¡Enviado! ',
                message: ' enviado correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($env==2){
          echo
               "iziToast.error({
                title: '¡Error al enviar! ',
                message: ' no pudo ser enviado',
                color: '#ffb6bb',
            
              });";
        } 


      ?>
    </script>
     <script>
      feather.replace();
    </script>
    <script src="../../vendors/js/sweetalert.min.js"></script>
    <script src="../../vendors/js/datatables.min.js"></script>
    <script type="text/javascript">

          $('#table').DataTable({
            "searching": true,
            language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "Mostrando 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
              }
            }
            
          });

  </script>
