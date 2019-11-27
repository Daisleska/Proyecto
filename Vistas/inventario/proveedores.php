
<?php

  error_reporting(0);
  extract($_REQUEST);

  if ($borrar=='') {
    # code...
  }else{

      include('../../Modelos/conexion.php');

    $sql="UPDATE proveedor SET borrado='S' WHERE id='$borrar'";

    $resultado=mysqli_query($conectar,$sql);

    if ($resultado) {
      
      header('location: proveedores.php?e=1');
    }else{

      header('location: proveedores.php?e=2');
    }

    include('../../Modelos/desconectar.php');
  }
 include_once "../includes/menu.php"; 

?>

  <div class="contenido" style="padding-left: 20px">
    <div class="content-2">
    <section style="padding-left: 20px;" class="content-header">
      <ol class="breadcrumb">
       
         <h1 align="center">  <span style="margin-left: 6.5cm;" class="badge badge-info">Inventario <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >
       <!--nav inventario -->
         <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link " href="inventario.php">Materia Prima 
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
                  <a class="nav-link " href="ubicacion_inventario.php">Ubicación</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="proveedores.php">Proveedores</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../inventario/pedidos-internos.php">Pedidos <span class="badge badge-primary badge-pill" style="float: right;"> </span> '.$cont_interno.'</a>
                 
                </li>

              ';
            
          ?>
        </ul><br>
    <center>
      <a href="proveedor-registro.php" class="btn btn-primary"><i class="ti-pencil-alt"></i> Registrar Proveedor</a>
    </center><br>
    <div class="table-responsive" style="padding-left: 20px;">
      <table class="table table-striped table-sm " id="table">
        <thead>
          <th>RIF</th>
          <th>Nombre</th>
          <th>Teléfono</th>
          <th>Dirección</th>
          <th>Opciones</th>
        </thead>
        <tbody>
          <?php

            include('../../Modelos/conexion.php');
            $sql="SELECT * FROM proveedor WHERE borrado='N'";

            $resultado=mysqli_query($conectar,$sql);
            $i=0;
            while ($consulta=mysqli_fetch_array($resultado)){
             
              echo '
              <tr>
                <td>'.$consulta["cod_rif"].'-'.$consulta['cedula'].' </td>
                <td>'.$consulta["nombre"].'</td>
                <td>'.$consulta["telefono"].'</td>
                <td>'.$consulta["direccion"].'</td>
              ';

              echo "
              <td>
              <a href='javascript:ver(".$consulta['id'].")' class='ver' title='Ver'><span class='fa fa-eye'></span></a>

                <a href='editar-proveedor.php?proveedor=".$consulta['id']."' class='editar' title='Editar'><span class='fa fa-edit'></span></a>

                <a href='javascript:eliminar(".$consulta['id'].")' class='x' title='Eliminar' id='".$consulta["id"]."'><span class='fa fa-times'></span></a>                        
                </td>
              </tr>
              ";

            }
            include('../../Modelos/desconectar.php');
          ?>
        </tbody>
      </table> 
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
      <div class="modal fade ver_articulo_modal" id="ver_proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              </div>
            
          </div>
        </div>
      </div>  
    </div></div>
      <?php include_once "../includes/footer.php"; ?>
   <script src="../../vendors/js/feather.min.js"></script>
       <script src="../../vendors/js/popper.min.js"></script>
     <script>
      feather.replace();
    </script>
   
                <?php
       
        extract($_REQUEST);
        //Registro
        if ($reg==1) {
            echo "
              iziToast.success({
                title: '¡Registrado! ',
                message: 'Proveedor registrado correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($reg==2){
          echo
               "iziToast.error({
                title: '¡Error al registrar! ',
                message: 'El proveedor no pudo ser registrado',
                color: '#ffb6bb',
            
              });";
        }

        //Actualizar artículos 
        if ($act==1) {
            echo "
              iziToast.success({
                title: '¡Actualizado! ',
                message: 'Proveedor actualizado correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($act==2){
          echo
               "iziToast.error({
                title: '¡Error al actualizar! ',
                message: 'El proveedor no pudo ser actualizado',
                color: '#ffb6bb',
            
              });";
        }

        //Eliminar articulos

        if ($e==1) {
            echo 
            "  iziToast.success({
                title: '¡Eliminado! ',
                message: 'Proveedor eliminado correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";

        }else if($e==2){
          echo
               "iziToast.error({
                title: '¡Error al eliminar! ',
                message: 'El proveedor no pudo ser eliminado',
                color: '#ffb6bb',
            
              });";
        }
      ?>

<script type="text/javascript">
      function eliminar(id){

        swal({
        title: "¡Advertencia!",
        text: "¿Ésta seguro que deseas eliminar a este proveedor?",
        icon: "warning",
        buttons: ['Cancelar','Eliminar'],
        dangerMode: 'Eliminar',
      })
      .then((willDelete) => {
        if (willDelete) {
                    
          window.location="proveedores.php?borrar="+id;

        } else {
                    

         }
        });      
      }

      function ver(id){

         $.ajax({
      type: "POST",
      url : "ver_proveedor.php?inf=1",
      data: "cod="+id,
       beforeSend: function(){
        $('#titulo').html('...');
      },
      success: function(respuesta){
        $('#titulo').html(respuesta);
      }

    });

    $.ajax({

      type: "POST",
      url : "ver_proveedor.php?inf=2",
      data: "cod="+id,
       beforeSend: function(){
        $('#body').html('...');
      },
      success: function(respuesta){
        $('#body').html(respuesta);
      }

    });

      $('#ver_proveedor').modal('show');

    }
  </script>
   <script src="../../vendors/js/sweetalert.min.js"></script>
    <script src="../../vendors/js/datatables.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
     <script src="../../vendors/js/feather.min.js"></script>
    <script>
      feather.replace();
    </script>
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
