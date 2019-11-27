<?php
    error_reporting(0);
      session_start();
     function id_clean($id){

      $cadena = preg_replace("/[^0-9]+/", "*", $id);
      return $cadena;
    }
    extract($_REQUEST);

    if (isset($_POST['btn_registrar_art'])) {

      if ($codarticulo=='' or $articulo=='' or $stock=='' or $stock_minimo=='' or $activo=='' or $stock_maximo==''  or $presentacion==''  or $unidad=='') {
        
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

      if ($stock<0 or $stock_minimo<0 or $stock_maximo<0) {
              

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
              $sql="SELECT * FROM productos WHERE codigo='$codarticulo' AND borrado='N' AND id!='$art'";
              $resultado=mysqli_query($conectar,$sql);
              $res_busqueda=mysqli_num_rows($resultado);
            

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
                

                      $sql="UPDATE productos SET codigo='$codarticulo',  nombre='$articulo',presentacion='$presentacion', unidad='$unidad',stock='$stock', stock_minimo='$stock_minimo', stock_maximo='$stock_maximo',activo='$activo' WHERE id='$art'";
                    
                  }
                }

                $resultado=mysqli_query($conectar,$sql);
                if ($resultado) {
                  include ('funcion-inventario.php');

                  actualizar($stock,$stock_actual,$art);

                  header('location: inventario.php?act=1');
                  
                }else{
                  header('location: inventario.php?act=2');

                }
          

              }
        

      }
  }

    include('../../Modelos/conexion.php');
    $sql="SELECT * FROM productos WHERE id='$art'";
    $resultado=mysqli_query($conectar,$sql);

    $art=id_clean($art);

    $x=0;
    while ($consulta=mysqli_fetch_array($resultado)) {
      $codarticulo=$consulta['codigo'];
      $articulo=$consulta['nombre'];
      $presentacion=$consulta['presentacion'];
      $unidad=$consulta['unidad'];
      $stock=$consulta['stock'];
      $stock_minimo=$consulta['stock_minimo'];
      $stock_maximo=$consulta['stock_maximo'];
      $activo=$consulta['activo'];
      $x=1;
    }

    if ($x==0) {
      header('location: inventario.php');
    }

?>


      <script type="text/javascript">



    $(document).ready(function(){

      $("#seleccionar").on('change',function(){

        var selectValue = $(this).val();
        switch (selectValue) {

          // formEstudiante=formUsuarios
          // formTrabajador=formClases
          // PAGOS=formPagos

          case "0":
          $("#formPrincipal").css('display','none');
          $("#formSecundario").css('display','none');
          $("#formActual").css('display','none');
          break;

          case "Deposito Principal":
          $("#formPrincipal").css('display','block');
          $("#formSecundario").css('display','none');
          $("#formActual").css('display','none');
          break;

          case "Cuarto de Inventario":
          $("#formPrincipal").css('display','none');
          $("#formSecundario").css('display','block');
          $("#formActual").css('display','none');
          break;

          case "Depositos Externos":
          $("#formPrincipal").css('display','none');
          $("#formSecundario").css('display','none');
          $("#formActual").css('display','block');
          break;



        }

      }).change();

    
    });
    </script>
<?php 
include_once "../includes/menu.php";
?>

  <div class="contenido">
    <div class="content-2">

      <h2 style="text-align: center"><a href="inventario.php" class="atras" title="Atras"><span data-feather="arrow-left" ></span></a><strong>Editar Materia Prima</strong></h2>
      <hr><br>
      <form action="editar_inventario.php?art=<?php echo $art ?>" method="POST">
        <div class="row">
          <div class="col-md-4">
            <label><strong>Código</strong> <strong class="estado-r">*</strong></label>
            <input type="text" name="codarticulo" class="form-control codarticulo" required="required" placeholder="Ej. RJ-59014a" value="<?php echo $codarticulo; ?>">

            <div id="result"></div>
              <div class="valid-feedback">
                Disponible
              </div>
              <div class="invalid-feedback">
                El código ya se encuentra registrado
              </div><br>
          </div>
          
           <div class="col-md-4">
            <label><strong>Activo</strong> <strong class="estado-r">*</strong></label>
            <select class="form-control" name="activo" required="required">
              <option value="S" <?php if ($activo=='S'){echo "selected='selected'";} ?> >Si</option>
              <option value="N" <?php if ($activo=='N'){echo "selected='selected'";} ?> >No</option>
            </select><br>
          </div>
           <div class="col-md-4">
             <label><strong>Producto</strong> <strong class="estado-r">*</strong></label>
            <input type="text" name="articulo" class="form-control" required="required" maxlength="120" placeholder="Cauchos" value="<?php echo $articulo; ?>"><br>
          </div>

        </div>
        
        <div class="row">
          <div class="col-md-4">
            <label><strong>Cantidad</strong> <strong class="estado-r">*</strong></label>
            <input type="number" class="form-control" name="stock" id="stock" required="required"  min="0" placeholder="Ej. 50" value="<?php echo $stock; ?>" ><br>
          </div>
          <div class="col-md-4">
            <label><strong>Cantidad mínima</strong> <strong class="estado-r">*</strong></label>
            <input type="number" class="form-control" name="stock_minimo" id="stock_minimo" required="required" min="0" placeholder="Ej. 10" value="<?php echo $stock_minimo; ?>"><br>
          </div>

           <div class="col-md-4">
            <label><strong>Cantidad máxima</strong> <strong class="estado-r">*</strong></label>
            <input type="number" name="stock_maximo" id="stock_maximo" class="form-control" required="required" placeholder="Ej. 60" value="<?php echo $stock_maximo; ?>"><br>
          </div>
        </div>

        <div class="row">
           <div class="col-md-4">
            <label><strong>Presentación</strong> <strong class="estado-r">*</strong></label>
            <input type="text" name="presentacion" id="presentacion" class="form-control" required="required" value="<?php echo $presentacion; ?>"><br>
          </div>

          <div class="col-md-4">
            <label><strong>Unidad</strong> <strong class="estado-r">*</strong></label>
            <input type="text" name="unidad" id="unidad" class="form-control" required="required"  value="<?php echo $unidad; ?>"><br>
          </div>
        </div>
      
             <br>
        <input type="hidden" name="stock_actual" value="<?php echo $stock ?>">
        <center>
          <a href="inventario.php" class="btn btn-danger">Cancelar</a>
          <input type="submit" value="Actualizar" class="btn btn-primary btn-reg" name="btn_registrar_art">
        </center>
      </form>
    </div>
 </div>
 <br><br><br><br>

     <?php include_once "../includes/footer.php"; ?>

    <script src="../../bootstrap/js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../vendors/js/inventario.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script src="../../vendors/js/iziToast.min.js"></script>
    <script>
      feather.replace();

      //validar codigo del artículo

      $('.codarticulo').keyup(function(){
          var cod=$(this).val();

          cod = $.trim(cod);// Elimino los espacio al inicio y final de la cadena

            if($('.codarticulo').hasClass('is-valid')){

                $('.codarticulo').removeClass('is-valid');
            }else{

             if($('.codarticulo').hasClass('is-invalid')){
              $('.codarticulo').removeClass('is-invalid');
             }
                  
             }

          if (cod!='') {

            if (cod=='<?php echo $codarticulo ?>') {

            }else{

            $.ajax({

              type: "POST",
              url : "funciones/validar-codigo.php?act=<?php echo $art?>",
              data: "codarticulo="+ cod,
               beforeSend: function(){
                $('#result').html('verificando');
              },
              success: function( respuesta ){
                if(respuesta == '1'){
                    
                 $('.codarticulo').addClass('is-valid');
                  $('#result').html('');
                }else{
                 
                 $('.codarticulo').addClass('is-invalid');
                  $('#result').html('');
                }
                  
              }

            });
              
          }
          }

      });
      $('.btn-reg').click(function(e){

          if ($('.codarticulo').hasClass('is-invalid')) {
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

      $('form').keyup(function(e) {
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
    <script type="text/javascript">var X=3</script>