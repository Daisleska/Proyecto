<?php
    extract($_REQUEST);
    error_reporting(0);
      session_start();

    if (isset($_POST['btn_registrar_art'])) {

      if ($codigo=='' or $nombre=='' or $presentacion=='' or $unidad=='' or $stock=='' or $stock_minimo=='' or $activo=='' or $stock_maximo=='') {
        
        echo '
            <script src="../../bootstrap/js/jquery.js"></script>
            <script src="../../vendors/js/sweetalert.min.js"></script>
            <script>
              $(document).ready(function(){
                swal("Error","Por favor, debe llenar todos los campos correspondientes con un *", "error");
              });
            </script>

        ';  

      }else{

      if ($stock<0 or $stock_minimo<0 or $stock_maximo<0 ) {
              

        echo '
            <script src="../../bootstrap/js/jquery.js"></script>
            <script src="../../vendors/js/sweetalert.min.js"></script>
            <script>
              $(document).ready(function(){
                swal("Error", "Datos invalidos, por favor intente nuevamente" , "error");
              });
            </script>

        '; 
        }else{

            if ($stock>$stock_maximo) {
                
                echo '
                    <script src="../../bootstrap/js/jquery.js"></script>
                    <script src="../../vendors/js/sweetalert.min.js"></script>
                    <script>
                      $(document).ready(function(){
                        swal("Error", "El stock no puede superar el stock maximo." , "error");
                      });
                    </script>

                '; 


            }else{

              include('../../Modelos/conexion.php');
              $sql="SELECT * FROM productos WHERE codigo='$codigo' AND borrado='N'";
              $resultado=mysqli_query($conectar,$sql);
              $res_busqueda=mysqli_num_rows($resultado);
              include('../../Modelos/desconectar.php');

              if ($res_busqueda>0) {
                
                  echo '
                    <script src="../../bootstrap/js/jquery.js"></script>
                    <script src="../../vendors/js/sweetalert.min.js"></script>
                    <script>
                      $(document).ready(function(){
                        swal("Error", "Disculpe. El código que ingreso ya existe en el inventario" , "error");
                      });
                    </script>

                '; 
              }else{

                
                include('../../Modelos/conexion.php');

                error_reporting(0);

                    $sql="INSERT INTO productos(codigo,nombre,presentacion,unidad,stock, stock_minimo, stock_maximo,activo) VALUES ('$codigo','$nombre','$presentacion','$unidad','$stock','$stock_minimo', '$stock_maximo','$activo')"; 

                 $resultado=mysqli_query($conectar,$sql);
                   
                }

                if ($resultado) {

                  include('funcion-inventario.php');

                  $ar=mysqli_insert_id($conectar);
                  registro($ar,$stock);
  $codigo=$ar.date('is');//milisegundos
  $sql="UPDATE productos
      set codigo='$codigo'
      where id='$ar'";
    
  $result=mysqli_query($conectar,$sql);
           

   $sql="INSERT INTO almacen(id_producto, id_ubicacion,stock) VALUES ('".$ar."','".$ubicacion."','".$stock."','".$id_usuario."')";

  $result=mysqli_query($conectar,$sql);
                  


                  header('location: inventario.php?reg=1');
                }else{
                 header('location: inventario.php?reg=2');
                  
                  

                }
                include('../../Modelos/desconectar.php');

              }
        
            }

      }
  }
   include_once "../includes/menu.php"; 
?>

  <div class="contenido">
    <div class="content-2">
 <form action="registro-inventario.php" method="POST" enctype="multipart/form-data">
      <h2 style="text-align: center"><a href="inventario.php" class="atras" title="Atras"><span data-feather="arrow-left" ></span></a><strong>Registrar Producto</strong></h2>
      <hr><br>
     
        <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>
        <div class="row">
          <div class="col-md-6">
            <label><strong>Código</strong> <strong class="estado-r">*</strong></label>
            <input type="text" name="codigo" class="form-control codarticulo" required="required" placeholder="Ej. RJ-59014a">

            <div id="result"></div>
              <div class="valid-feedback">
                Disponible
              </div>
              <div class="invalid-feedback">
                El código ya se encuentra registrado 
              </div><br>
          </div>
          
          <div class="col-md-6">
            <label><strong>Activo</strong> <strong class="estado-r">*</strong></label>
            <select class="form-control" name="activo" required="required">
              <option value="S">Si</option>
              <option value="N">No</option>
            </select><br>
          </div>
        </div>

         <div class="row">
          <div class="col-md-6">
             <label><strong>Presentación</strong> <strong class="estado-r">*</strong></label>
            <input type="text" name="presentacion"  class="form-control" required="required" maxlength="120" placeholder="Ej. Paletas"><br>
          </div>

          <div class="col-md-6">
            <label><strong>Unidad</strong> <strong class="estado-r">*</strong></label>
            <select class="form-control" name="unidad" required="required">
              <option value="lts">Ltrs</option>
              <option value="kgs">Klgs</option>
            </select><br>
          </div>
        </div>
       
        <div class="row">
          <div class="col-md-6">
             <label><strong>Nombre</strong> <strong class="estado-r">*</strong></label>
            <input type="text" name="nombre"  class="form-control" required="required" maxlength="120" placeholder="Metal"><br>
          </div>

          <div class="col-md-6">
            <label><strong>Cantidad</strong> <strong class="estado-r">*</strong></label>
            <input type="number" class="form-control" name="stock" id="stock" required="required"  min="0" placeholder="Ej. 50"><br>
          </div>
        </div>
        <div class="row">
          
          <div class="col-md-6">
            <label><strong>Cantidad minima</strong> <strong class="estado-r">*</strong></label>
            <input type="number" class="form-control" name="stock_minimo" id="stock_minimo" required="required" min="0" placeholder="Ej. 10"><br>
          </div>

          <div class="col-md-6">
            <label><strong>Cantidad maxima</strong> <strong class="estado-r">*</strong></label>
            <input type="number" name="stock_maximo" id="stock_maximo" class="form-control" required="required" placeholder="Ej. 60"><br>
          </div>
        </div>
       
         
          <a href="inventario.php" class="btn btn-danger">Cancelar</a>
          <input type="submit" value="Registrar" class="btn btn-primary btn-reg" name="btn_registrar_art">
        </center>
</form>
          </div>

        
       

  <?php include_once "../includes/footer.php"; ?>

  <script src="../../bootstrap/js/jquery.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script src="../../vendors/js/sweetalert.min.js"></script>
  <script  src="../../vendors/js/inventario.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script>
      feather.replace();

      //validar codigo del artículo

      $('.codigo').keyup(function(){
          var cod=$(this).val();

          cod = $.trim(cod);// Elimino los espacio al inicio y final de la cadena

            if($('.codigo').hasClass('is-valid')){

                $('.codigo').removeClass('is-valid');
            }else{

             if($('.codigo').hasClass('is-invalid')){
              $('.codigo').removeClass('is-invalid');
             }
                  
             }

          if (cod!='') {

            $.ajax({

              type: "POST",
              url : "funciones/validar-codigo.php",
              data: "codigo="+ cod,
               beforeSend: function(){
                $('#result').html('verificando');
              },
              success: function( respuesta ){
                if(respuesta == '1'){
                    
                 $('.codigo').addClass('is-valid');
                  $('#result').html('');
                }else{
                 
                 $('.codigo').addClass('is-invalid');
                  $('#result').html('');
                }
                  
              }

            });
              
          }
          

      });
      $('.btn-reg').click(function(e){

          if ($('.codigo').hasClass('is-invalid')) {
              e.preventDefault();
              swal("Error", "Disculpe. El código que ingreso ya existe en el inventario" , "error");


          }

          var X=$('#stock').val();
          var Y=$('#stock_maximo').val();
          if (parseInt(X) > parseInt(Y)) {
            e.preventDefault();
            swal("Error", "El stock no puede superar el stock maximo.", "error");
          }

      });

      $('body').keyup(function(e) {
          if(e.keyCode == 13) {

            e.preventDefault();       
          }
      });

     
        var cont=1;
      var i=0;
      function nuevos_campos(){

        $('.eliminar-2').prop('id',cont);

        $('.campos_nuevos').before(
          '<div class="row" id="campos_nuevos'+cont+'">'+
          
            '<div class="col-md-5">'+

              '<label><strong>Ubicación Actual</strong> <strong class="estado-r required_ext">*</strong></label>'+
              '<input type="text" name="ubicacion['+cont+']" class="form-control form-n'+cont+' ubicacion'+cont+'" placeholder="Ej. Nombre de la Empresa o Ubicación" required="required" ><br>'+

            '</div>'+//fin3

            '<div class="col-md-1 iconos_x">'+
              '<a href="#" class="control-sr control-sr_x mantenimiento_externo_show eliminar-1" id="'+cont+'" title="Eliminar"><img src="img/x.svg" class="control-sr control-sr_x mantenimiento_externo_show x x2" title="Eliminar"></a>'+
            '</div>'+

          '</div>'//fin row



          );

            $('.eliminar-1').click(function(e){

              e.preventDefault();
              var id = $(this).attr('id');
              
              var cod ='.form-n'+id;
              var divcod='#campos_nuevos'+id;
              var value='.value'+id;

              $(value).prop('selected',true);
              $(cod).val('');

              $(cod).prop('disabled',true);
              $(divcod).css({'display': 'none'});

            }); 
        i=1;
        cont=cont+1;

        $('#form').prop('action','registro-inventario?i='+cont);// URL para registrar
      }


      $('.eliminar-2').click(function(e){

          e.preventDefault();
          var id =$(this).attr('id');
          if (id!='#') {

              var cod ='.form-n'+id;
              var divcod='#campos_nuevos'+id;
              var value='.value'+id;

              $(value).prop('selected',true);
              $(cod).val('');

              $(cod).prop('disabled',true);
              $(divcod).css({'display': 'none'});
          }

      });

    </script>
    </script>
    <script type="text/javascript">var X=3</script>