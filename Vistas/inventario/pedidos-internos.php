<?php
  error_reporting(0);
  extract($_REQUEST);
  if ($i=='') {
    $i=0;
  }
  if ($i>0) {

      include('funcion-inventario.php'); //pedidos-internos.php?cancelar=1&id=2

      if ($i=='' or $cantidad=='' or $articulo=='') {
        # code...
      }else{
        error_reporting(0);

        for ($j=0; $j <$i ; $j++) { 
          $valor[$j]=-1;
        }

        $resultado = pedido_interno($i,$articulo,$cantidad,$id);

        if ($resultado=='S') {
         include('../../Modelos/conexion.php');
          $motivo="Egreso";

    $sql="INSERT INTO historial ( motivo,id_producto, cantidad) VALUES ( '$motivo','$articulo[0]','$cantidad[0]')";

    $resutado=mysqli_query($conectar,$sql);



          header('location: pedidos-internos.php?pp=1');
        }else{
          header('location: pedidos-internos.php?pp=2');
        }

      }
  }

    error_reporting(0);
    extract($_REQUEST);

    if ($cancelar=='') {
        
    }else{

      include('../../Modelos/conexion.php');

      $sql="UPDATE pedido set estado='Cancelado' WHERE id='$cancelar'";

      $resultado=mysqli_query($conectar,$sql);

      if ($resultado) {
          header('location: pedidos-internos.php?canc=1');
      }else{
        header('location: pedidos-internos.php?canc=2');
      }

      include('../../Modelos/desconectar.php');
    }
    include_once "../includes/menu.php";

?>
  <div class="contenido">
    <div class="content-2">
        <ol class="breadcrumb">
       
         <h1 align="center">  <span style="margin-left: 8.5cm;" class="badge badge-info">Pedidos <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
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
                  <a class="nav-link " href="../inventario/ubicacion_inventario.php">Ubicación</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link" href="../inventario/proveedores.php">Proveedores</a>
                </li>
               <li class="nav-item ">
                  <a class="nav-link" href="../inventario/pedidos-internos.php">Pedidos <span class="badge badge-primary badge-pill" style="float: right;"> </span> '.$cont_interno.'</a>
                 
                </li>

              ';
            
          ?>
        </ul><br>
        <center>
          <a href="solicitud-pedido-interno.php" class="btn btn-primary agregar">Nuevo pedido interno</a>
        </center><br>
        <div class="table-responsive">
            <table class="table table-striped table-sm " id="table">
            <thead>
              <th>#</th>
              <th>Fecha de solicitud</th>
              <th>Estado</th>
          
              <th>Opciones</th>
            </thead>
            <tbody>
              <?php
                include ('../../Modelos/conexion.php');

                $sql="SELECT * FROM pedido WHERE pedido.tipo='interno' order by pedido.id desc  ";

                $resultado=mysqli_query($conectar,$sql);
                $cont=1;
                while ($consulta=mysqli_fetch_array($resultado)) {
                  if ($consulta['estado']=='En Espera') {
                      
                      $class='class="estado-e"';
                  }
                  if ($consulta['estado']=='Completado') {
                      
                      $class='class="estado-re"';
                  }
                  if ($consulta['estado']=='Cancelado') {
                      
                      $class='class="estado-r"';
                  }
                  echo "

                      <tr>
                        <td>".$cont."</td>
                        <td>".$consulta['fecha_registro']."</td>
                        <td ".$class."> <strong> ".$consulta['estado']." </strong> </td>
                      


                        <td>
                            <a href='pedido-interno-pdf.php?id=".$consulta['id']."' target='_blank' class='ver'  title='Ver'><span data-feather='eye'></span></a>";

                      if ($consulta['estado']=='En Espera') {
                          echo "<a href='javascript:aprobartodo(".$consulta['id'].")' class='mas'  title='Aprobar pedido'><span data-feather='check'></span></a>";
                          echo "<a href='javascript:rechazar(".$consulta['id'].")' class='x'  title='cancelar pedido'><span data-feather='x'></span></a>";
                      }

                      echo "  </td>
                      </tr>";

                      $cont++;
                }

                include('../../Modelos/desconectar.php');
              ?>
            </tbody>
          </table> 
        </div>

      <!--Modal-->

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
              <h5 class="modal-title" id="exampleModalLabel">Listado del pedido</center></h5>

              <button class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="aria-hidden">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <form action="pedidos-internos.php" method="POST" id="form-pedido" onsubmit="return validar()">
               <div id="body">
                  
              </div>
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                 <a href="javascript: comfirmar()" id='btn-aprobar-pedido' name="btn-pedido-act" class="btn btn-success">¡Recibido!</a>
            </div>
            </form>
            
          </div>
        </div>
      </div>

      </div>
    </div>
        <?php include_once "../includes/footer.php"; ?>
    <script src="../../vendors/js/popper.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script src="../../vendors/js/sweetalert.min.js"></script>
    <script>
      feather.replace();
    </script>
    <script>
      //$('#ver_articulo').modal('show');
      <?php
        error_reporting(0);
        extract($_REQUEST);
        //Registro
        if ($reg==1) {
            echo "
              iziToast.success({
                title: '¡Solicitud exitosa! ',
                message: 'Pedido solicitado correctamente',
                color: 'rgb(174, 240, 191)',
                
                  });
                ";
            }else if($reg==2){
              echo
                   "iziToast.error({
                    title: '¡Error al solicitar el pedido! ',
                    message: 'El pedido no pudo ser procesado',
                    color: '#ffb6bb',
                
                  });";
            }else if($reg==3){
              echo
                   "
                    swal('Error','Error al registrar los artículos del pedido','error');
                   ";
            }else if($reg==4){
              echo "

                swal('Error', 'Las cantidades solicitadas superan el estock maximo establecidos en el inventario' ,'error')
              ";
                   
            }else if($reg==5){
              echo "

                swal('Solicitud con errores', 'Se encontraron errores al registrar algunos artículos' ,'info');
              ";
                   
            }else if($reg==6){
              echo "

               swal('algunos artículos no registrado', 'Se encontraron artículos que superan stock maximo establecidos en el inventario' ,'info');
              ";
                   
            }
          ?>

          function aprobartodo(id){

            $.ajax({

              type: "POST",
              url : "funciones/ver-pedido-interno.php?o=1",
              data: "id="+ id,
               beforeSend: function(){
                
              },
              success: function(respuesta){

                $('#body').html(respuesta);

                $('#ver_articulo').modal('show');
              }
            });

          }


          function rechazar(id){

            //
             swal({
                  title: "¡Advertencia!",
                  text: "Ésta seguro que deseas cancelar este pedido?",
                  icon: "warning",
                  buttons: ['Cancelar','Eliminar'],
                  dangerMode: 'Eliminar',
                })
                .then((willDelete) => {
                  if (willDelete) {
                    
                    window.location="pedidos-internos.php?cancelar="+id;

                  } else {
                    


                  }
              });
          }

          function comfirmar(){

             swal({
              title: 'Confirmar pedido',
              text: 'Confirma usted que recibio todo los artículos solicitado pedidos',
              icon: 'info',

                buttons:{

                  cancel:'Cancelar',
                  
                  si:{

                      text : 'Si',
                      value : 'S',
                  },
                  
                },
              },       

              ).then((value)=>{

                switch (value) {

                    case 'S':

                     $('#form-pedido').submit();

                    break;

                    case 'N':

                      return false;
                      break;

                 }

              });
          }  

          function validar() {
            var cont= $('#contador').val();
            var validar=0;
            for (var i=0; i<cont ; i++){
              var val= $('#input_cant1-'+i).val();
              val = $.trim(val);
              var max= $('.max-'+i).val();

              if (val>max){

                validar=1;
              }

              if (val % 1 != 0) {
                validar=1;
              }

              if (val == '') {
                validar=1;
              }
            }
            
            if (validar==1) {
              swal('Error','La cantidad recibida ingresada es invalida','error');
              return false;
            }else{
              return true;
            }
          }

        </script>
    <script type="text/javascript">var X=3</script>
    <script src="../../vendors/js/datatables.min.js"></script>
    <script src="../../vendors/js/sweetalert.min.js"></script>
    <script src="../../vendors/js/main.js"></script>
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





        <?php

        if ($pp==1) {
            echo "
              iziToast.success({
                title: '¡Pedido procesado correctamente! ',
                message: 'EL pedido se realizó correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($pp==2){
          echo
               "iziToast.error({
                title: '¡Error al procesar el pedido! ',
                message: 'El pedido no pudo ser procesado',
                color: '#ffb6bb',
            
              });";
        }


        if ($canc==1) {
            echo "
              iziToast.success({
                title: '¡Pedido eliminado! ',
                message: 'EL pedido se elimino correctamente',
                color: 'rgb(174, 240, 191)',
                
              });
            ";
        }else if($canc==2){
          echo
               "iziToast.error({
                title: '¡Error al eliminar! ',
                message: 'El pedido no pudo ser eliminado',
                color: '#ffb6bb',
            
              });";
        }

        ?>
  </script>