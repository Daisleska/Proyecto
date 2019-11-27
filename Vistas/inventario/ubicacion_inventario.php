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
          include('desconectar.php');
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
      

        if ($resultado) {
            header('location: ubicacion_inventario.php?e=1');
        }else{
          header('location: ubicacion_inventario.php?e=2');
        }
      }
  }
 include_once "../includes/menu.php"; 
?>
  <div class="contenido">
    <div class="content-2">
    <section style="padding-left: 20px;" class="content-header">
      <ol class="breadcrumb">
       
         <h1 align="center">  <span style="margin-left: 8.5cm;" class="badge badge-info">Inventario <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >
    <!--nav inventario -->
         <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="inventario.php">Materia Prima 
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
                  <a class="nav-link active" href="ubicacion_inventario.php">Ubicación</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="proveedores.php">Proveedores</a>
                </li>
               <li class="nav-item ">
                  <a class="nav-link" href="../inventario/pedidos-internos.php">Pedidos <span class="badge badge-primary badge-pill" style="float: right;"> </span> '.$cont_interno.'</a>
                 
                </li>

              ';
            
          ?>
        </ul><br>

        <?php
      
            echo '
                <center>
                  <button class="btn btn-primary agregar"><i class="ti-pencil-alt"></i> Registrar Ubicación</button>
                </center>
            ';
          
        ?>


    <br>
    <div class="table-responsive" style="padding-left: 20px;">
        <table class="table table-striped table-sm " id="table">
        <thead>
          <th>#</th>
          <th>Ubicación</th>
          <th>Tipo</th>
           <?php
                     
                        
                        echo '
                          <th>Opciones</th>
                        ' ;
                      
                    ?>
        </thead>
        <tbody>
          <?php

            include('../../Modelos/conexion.php');
            $sql="SELECT * FROM ubicacion WHERE borrado='N'";

            $resultado=mysqli_query($conectar,$sql);
            $i=0;
            while ($consulta=mysqli_fetch_array($resultado)){
              $i++;
if ($consulta['tipo']=='I') {
  $consulta['tipo']= 'Interno';

} 
elseif ($consulta['tipo']=='E') {

  $consulta['tipo']='Externo';
}

              echo '  
              <tr>
                <td>'.$i.'</td>
                <td>'.$consulta["nombre"].'</td>
                <td>'.$consulta["tipo"].'</td>
              ';




              if ($consulta['bloqueado']=='S') {
                  
                  $link1="javascript: bloqueado()";
                  $link2="javascript: bloqueado()";
              }else{
                  $link1="javascript: editar(".$consulta['id'].")";
                  $link2="javascript: eliminar(".$consulta['id'].")";
              }

if ($consulta['tipo']=='Interno' or $consulta['tipo']=='Externo') {
 


              echo "
              <td>
              <a href='historial_almacen_interno.php?ubicacion=".$consulta['id']."' class='ver'  title='Ver'><span class='fa fa-eye'></span></a>
               <a href='../../reportes/reporte_almacen_interno.php?ubicacion=".$consulta['id']."' class='ver'  title='File'><span class='fa fa-file-o'></span></a>


              ";
} 
/*elseif ($consulta['tipo']=='Externo') {



              echo "
              <td>
              <a href='historial_almacen_externo.php?ubicacion=".$consulta['id']."' class='ver'  title='Ver'><span data-feather='eye'></span></a>
               <a href='reporte_almacen_externo.php?ubicacion=".$consulta['id']."' class='ver'  title='File'><span data-feather='file'></span></a>


              ";

}*/


           
              echo "


                <a href='".$link1."' class='editar' name='".$consulta['ubicacion']."' id='editar-".$consulta['id']."' title='Editar'><span class='fa fa-edit'></span></a>

                <a href='".$link2."' class='x' title='Eliminar' id='".$consulta["id"]."'><span class='fa fa-trash-o'></span></a

              ";
            

            echo " </td>
              </tr>";
            }



            include('../../Modelos/desconectar.php');
          ?>
        </tbody>
      </table> 
    </div>
                <!--modal-->
     <div class="modal fade" id="modal-registrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Registrar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="ubicacion_inventario.php" method="POST" id="form-modificar">
                    <div class="modal-body">
                       <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>
                      <label><strong>Ubicación</strong></label>
                      <input type="text" name="ubicacion_registro" id="ubicacion_edit" class="form-control ubicacion" placeholder="Ubicación" required="required">
                      <div id="result"></div>
                      <div class="valid-feedback">
                          Disponible
                        </div>
                        <div class="invalid-feedback">
                         Ubicación ya registrada 
                        </div>
                        <label><strong>Tipos</strong> <strong class="estado-r">*</strong></label>
            <select class="form-control" name="tipo" required="required">
              <option selected="selected">Seleccione el tipo de ubicación</option>
              <option value="I">Interno</option>
              <option value="E">Externo</option>
            </select><br>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn enviar btn-primary" name="btn_registrar">Registrar</button>
                    </div>
                  </form> 
                </div>
              </div>
        </div>

        <div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Registrar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="ubicacion_inventario.php" method="POST" id="form-act">
                    <div class="modal-body">
                       <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>
                      <label><strong>Ubicación</strong></label>
                      <input type="text" name="ubicacion_edit" id="ubicacion_modif" class="form-control ubicacion" placeholder="Ubicación" value="" required="required">
                      <div id="result"></div>
                      <div class="valid-feedback">
                        Disponible
                      </div>
                      <div class="invalid-feedback">
                       Ubicación ya registrada 
                      </div>
                       <label><strong>Ubicación</strong></label>
                      <input type="text" name="ubicacion_edit" id="ubicacion_modif" class="form-control ubicacion" placeholder="Ubicación" value="" required="required">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn enviar btn-primary">Actualizar</button>
                    </div>
                  </form> 
                </div>
              </div>
        </div>

                                                 <!--Editar -->

        <div class="modal fade" id="modal-modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modificar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="#" method="POST" id="form-act-2">
                    <div class="modal-body">
                       <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>
                      <label><strong>Ubicación</strong></label>
                      <input type="text" name="ubicacion_act" id="ubicacion_act" class="form-control" placeholder="Ubicación" value="" required="required">
                      <div id="result"></div>
                      <div class="valid-feedback">
                        Disponible
                      </div>
                      <div class="invalid-feedback">
                       Ubicación ya registrada 
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn enviar-2 btn-primary" name="actualizar">Actualizar</button>
                    </div>
                  </form> 
                </div>
              </div>
        </div>


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
    <script src="../../vendors/js/iziToast.min.js"></script>
    <script>
      <?php
        error_reporting(0);
        extract($_REQUEST);
        //Registro
        if ($reg==1) {
            echo "
              iziToast.success({
                title: '¡Registrado! ',
                message: 'Ubicación registrada correctamente',
                color: 'rgb(174, 240, 191)',
                
                  });
                ";
            }else if($reg==2){
              echo
                   "iziToast.error({
                    title: '¡Error al registrar! ',
                    message: 'La ubicación no pudo ser registrada',
                    color: '#ffb6bb',
                
                  });";
            }

                    //Actualizar artículos 
            if ($act==1) {
                echo "
                  iziToast.success({
                    title: '¡Actualizado! ',
                    message: 'Ubicación actualizada correctamente',
                    color: 'rgb(174, 240, 191)',
                    
                  });
                ";
            }else if($act==2){
              echo
                   "iziToast.error({
                    title: '¡Error al eliminar! ',
                    message: 'La ubicación no pudo ser actualizada',
                    color: '#ffb6bb',
                
                  });";
            }


          ?>


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


          $('.agregar').click(function(){

            $('#modal-registrar').modal('show');
          });

           $('.ubicacion').keyup(function(){
          var cod=$(this).val();

          cod = $.trim(cod);// Elimino los espacio al inicio y final de la cadena

            if($('.ubicacion').hasClass('is-valid')){

                $('.ubicacion').removeClass('is-valid');
            }else{

             if($('.ubicacion').hasClass('is-invalid')){
              $('.ubicacion').removeClass('is-invalid');
             }
                  
             }

              if (cod!='') {

                $.ajax({

                  type: "POST",
                  url : "funciones/validar-ubicacion.php",
                  data: "ubicacion="+ cod,
                   beforeSend: function(){
                    $('#result').html('verificando');
                  },
                  success: function( respuesta ){
                    if(respuesta == '1'){
                        
                     $('.ubicacion').addClass('is-valid');
                      $('#result').html('');
                    }else{
                     
                     $('.ubicacion').addClass('is-invalid');
                      $('#result').html('');
                    }
                      
                  }

                });
                  
              }
              

          });

          //modificar

          function editar (id){

              $('#modal-modificar').modal('show');

              var name =$("#editar-"+id).attr('name');

             $('#ubicacion_act').attr('value',name);
             $('#form-act-2').attr('action','ubicacion_inventario.php?id='+id);

              $('#ubicacion_act').keyup(function(){

                  var cod=$(this).val();

                   cod = $.trim(cod);// Elimino los espacio al inicio y final de la cadena

                    if($('#ubicacion_act').hasClass('is-valid')){

                        $('#ubicacion_act').removeClass('is-valid');
                    }else{

                     if($('#ubicacion_act').hasClass('is-invalid')){
                      $('#ubicacion_act').removeClass('is-invalid');
                     }
                          
                     }



                  if (cod!='') {

                    if (cod!=name) {

                        $.ajax({

                        type: "POST",
                        url : "funciones/validar-ubicacion.php?op="+id,
                        data: "ubicacion="+ cod,
                         beforeSend: function(){
                          $('#result').html('verificando');
                        },
                        success: function( respuesta ){
                          if(respuesta == '1'){
                              
                           $('#ubicacion_act').addClass('is-valid');
                            $('#result').html('');
                          }else{
                           
                           $('#ubicacion_act').addClass('is-invalid');
                            $('#result').html('');
                          }
                            
                        }

                      }); 
                    }
                      
                  }

              });
          }

          $('.enviar').click(function(e){

              if ($('.ubicacion').hasClass('is-invalid')) {
                  e.preventDefault();
                  swal("Error", "Disculpe. Está ubicación ya se encuentra registrada" , "error");
              }


          });

          $('form').keyup(function(e) {
              if(e.keyCode == 13) {

                if ($('.ubicacion').hasClass('is-invalid')) {
                  e.preventDefault();
                  swal("Error", "Disculpe. Está ubicación ya se encuentra registrada" , "error");
                }

                   
              }
          });
          ////////////////////////////////////////////////////////////////////////////////

         $('.enviar-2').click(function(e){

              if ($('#ubicacion_act').hasClass('is-invalid')) {
                  e.preventDefault();
                  swal("Error", "Disculpe. Está ubicación ya se encuentra registrada" , "error");
              }


          });

          $('#form-act-2').keyup(function(e) {
              if(e.keyCode == 13) {

                if ($('#ubicacion_act').hasClass('is-invalid')) {
                  e.preventDefault();
                  swal("Error", "Disculpe. Está ubicación ya se encuentra registrada" , "error");
                }

                   
              }
          });

          function eliminar (id){

              swal({
                  title: "¡Advertencia!",
                  text: "Si la ubicación  esta enlazada a un producto del inventario no se podra eliminar la ubicación. ¿Ésta seguro que deseas eliminar esta ubicación?.",
                  icon: "warning",
                  buttons: ['Cancelar','Eliminar'],
                  dangerMode: 'Eliminar',
                })
                .then((willDelete) => {
                  if (willDelete) {
                    
                    window.location="ubicacion_inventario.php?borrar="+id;

                  } else {
                    


                  }
              });      
          }

          //Eliminar

        <?php

        if ($e==1) {
            echo "
              iziToast.success({
                title: '¡Eliminado! ',
                message: 'Ubicación eliminada correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($e==2){
          echo
               "iziToast.error({
                title: '¡Error al eliminar! ',
                message: 'La ubicación  no pudo ser eliminada',
                color: '#ffb6bb',
            
              });";
        }else if($e==3) {
            echo
               "  
                swal('¡Ubicación  enlazada!','Ésta Ubicación  se encuentra enlazada a uno o varios artículos del inventario','warning');

               ";
        }
        ?>


        function bloqueado(){
          swal('¡Ubicación bloqueada!','La ubicación no puede ser eliminada o editada por que se encuentra bloqueada','warning');
        }
  </script>
