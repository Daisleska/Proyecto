<?php




  extract($_REQUEST);
  if (isset($_POST['btn_registrar'])) {

      if ($ubicacion_registro==''){
            echo '
            <script src="../../bootstrap/js/jquery.js"></script>
            <script src="../../vendors/js/sweetalert.min.js"></script>
            <script>
              $(document).ready(function(){
                swal("Error"," Debe llenar el campo de ubicación  ", "error");
              });
            </script>
        '; 

      }else{

        include('../../Modelos/conexion.php');

        $sql="SELECT * FROM ubicacion WHERE nombre='$ubicacion_registro' AND borrado='N'";

        $res=mysqli_query($conectar,$sql);

        $res_busqueda=mysqli_num_rows($res);

        if ($res_busqueda>0) {
          include('../../Modelos/desconectar.php');
           echo '
            <script src="../../bootstrap/js/jquery.js"></script>
            <script src="../../vendors/js/sweetalert.min.js"></script>
            <script>
              $(document).ready(function(){
                swal("Error", "Disculpe. Está ubicación ya se encuentra registrada" , "error");
              });
            </script>

        '; 

        }else{
          $sql="INSERT INTO ubicacion (nombre,tipo) VALUES ('$ubicacion_registro','$tipo')";
          $resultado=mysqli_query($conectar,$sql);
          include('../../Modelos/desconectar.php');
          if ($resultado) {
            header('location: ubicacion_inventario.php?reg=1');
          }else{
            header('location: ubicacion_inventario.php?reg=2');
          }

        }

       
        
      }
  }

  if (isset($_POST['actualizar'])) {
    if ($ubicacion_act==''){
            echo '
            <script src="../../bootstrap/js/jquery.js"></script>
            <script src="../../vendors/js/sweetalert.min.js"></script>
            <script>
              $(document).ready(function(){
                swal("Error"," Debe llenar el campo de ubicación  ", "error");
              });
            </script>

        '; 

      }else{

        include('../../Modelos/conexion.php');

        $sql="SELECT * FROM ubicacion WHERE nombre='$ubicacion_act' AND borrado='N' AND id!='$id'";

        $res=mysqli_query($conectar,$sql);

        $res_busqueda=mysqli_num_rows($res);

        if ($res_busqueda>0) {
          include('../../Modelos/desconectar.php');
           echo '
            <script src="../../bootstrap/js/jquery.js"></script>
            <script src="../../vendors/js/sweetalert.min.js"></script>
            <script>
              $(document).ready(function(){
                swal("Error", "Disculpe. Está ubicación ya se encuentra registrada" , "error");
              });
            </script>

        '; 

        }else{
          
          if ($id=='') {
            # code...
          }else{

            $sql="UPDATE ubicacion SET nombre='$ubicacion_act' WHERE id='$id'";
            $resultado=mysqli_query($conectar,$sql);
            include('../../Modelos/desconectar.php');
            if ($resultado) {
              header('location: ubicacion_inventario.php?act=1');
            }else{
              header('location: ubicacion_inventario.php?act=2');
            }
          }

        }
        
      }  
  }

  error_reporting(0);
  if ($borrar=='') {
    
  }else{

      include('../../Modelos/conexion.php');
      $sql="SELECT * FROM productos WHERE id_ubicacion=".$borrar;
      $resultado=mysqli_query($conectar,$sql);
      $res_busqueda=mysqli_num_rows($resultado);

      if ($res_busqueda>0) {
        header('location: ubicacion_inventario.php?e=3');
      }else{

        $sql="SELECT * FROM ubicacion WHERE id=".$borrar;
        $res=mysqli_query($conectar,$sql);
        $res_busqueda=mysqli_num_rows($res);
        if ($res_busqueda<=0) {
            header('location: ubicacion_inventario.php');
            exit();
        }

        $sql="SELECT * FROM ubicacion WHERE id='$borrar' AND bloqueado='S'";
        $res=mysqli_query($conectar,$sql);
        $res_busqueda=mysqli_num_rows($res);

        if ($res_busqueda>0) {
          header('location: ubicacion_inventario.php?e=4');
          exit();
        }

        $sql="UPDATE ubicacion SET borrado='S' WHERE id=".$borrar;
        $resultado=mysqli_query($conectar,$sql);
        include("../../Modelos/desconectar.php");

        if ($resultado) {
            header('location: ubicacion_inventario.php?e=1');
        }else{
          header('location: ubicacion_inventario.php?e=2');
        }
      }
  }

  include_once "../includes/menu.php";

?>


  <br><br>
 <div class="contenido">
    <div class="content-2">
    <h2 style="text-align: center"><strong>Inventario</strong><br></h2><hr>
    <!--nav inventario -->
         <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="inventario.php">Productos 
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

           


              if ($contador[3]>0) {
                  
                  if ($contador[3]>99) {
                    $res_busqueda='99+';
                  }else{

                    $res_busqueda=$contador[3];
                  }
              }else{

                $res_busqueda='';
              }

               if ($contador[2]>0) {
                  
                  if ($contador[2]>99) {
                    $cont_interno='99+';
                  }else{

                    $cont_interno=$contador[3];
                  }
              }else{

                $cont_interno='';
              }

              if ($contador[1]>0) {
                  
                  if ($contador[1]>99) {
                    $cont_externo='99+';
                  }else{

                    $cont_externo=$contador[3];
                  }
              }else{

                $cont_externo='';
              }
              echo '

             <li class="nav-item">
                  <a class="nav-link " href="../inventario/materiaprima.php">Materia Prima</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="ubicacion_inventario.php">Ubicación</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="proveedores.php">Proveedores</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pedidos <span class="badge badge-primary badge-pill" style="float: right;">'.$res_busqueda.'</span></a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="pedidos-internos.php">Internos <span class="badge badge-primary badge-pill" style="float: right;">'.$cont_interno.'</span></a>
                    <a class="dropdown-item" href="pedidos-externos.php">Externos <span class="badge badge-primary badge-pill" style="float: right;">'.$cont_externo.'</span></a>
                  </div>
                </li>

              ';
            
          ?>
        </ul><br>


  
 <h4><a href="ubicacion_inventario.php" class="atras" title="Atras"><span data-feather="arrow-left" ></span></a><?php 

        include('../../Modelos/conexion.php');

        $sql="SELECT nombre FROM ubicacion WHERE id='$ubicacion'";

        $res=mysqli_query($conectar,$sql);

        while ($consulta=mysqli_fetch_array($res)) {
            
          echo $consulta['nombre'];
        }

   
include ("../../Modelos/desconectar.php");
      ?>
      <hr>
      </h4>
        <table class="table table-striped table-sm " id="table">
        <thead>
          <th>#</th>
          <th>Productos</th>
           <!--  <th>Responsable</th> -->
          <th>Stock</th>
        </thead>
        <tbody>
          <script type="text/javascript">
            
              


          </script>
          <?php
          include("../../Modelos/conexion.php");




include("../../Modelos/conexion.php");
   

  $sql="SELECT almacen.*,productos.nombre FROM almacen,productos WHERE id_ubicacion='$ubicacion' AND productos.id=almacen.id_producto ";

 $resultado=mysqli_query($conectar,$sql);
            $i=0;
            while ($consulta=mysqli_fetch_array($resultado)){
              $i++;

              echo '  
              <tr>
                <td>'.$i.'</td>
                <td>'.$consulta["nombre"].'</td>
                <td>'.$consulta["stock"].'</td>
                ';

            echo " </td>
              </tr>";
     }

            include('../../Modelos/desconectar.php');
          ?>
        </tbody>
      </table> 
  </div>
</div>
       <?php include_once "../includes/footer.php"; ?>   
  <script src="../../bootstrap/js/jquery.js"></script>
    <script src="../../vendors/js/popper.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script>
      feather.replace();
    </script>
  

    <script type="text/javascript">var X=3</script>
    <script src="../../vendors/js/datatables.min.js"></script>
    <script src="../../vendors/js/sweetalert.min.js"></script>
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
