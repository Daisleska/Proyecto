<?php
  extract($_REQUEST);

  if (isset($_POST['guardar-proveedor'])){
        
    if ($cod_rif=='' or $cedula=='' or $telefono=='' or $nombre=='') {
      echo '
      <script src="../../bootstrap/js/jquery.js"></script>
      <script src="../../vendors/js/sweetalert.min.js"></script>
      <script>
        $(document).ready(function(){
          swal("Error","Por favor, llene todo los campos correspondiente con un *", "error");
        });
      </script>';
    }else{

      include('../../Modelos/conexion.php');

      $sql="SELECT * FROM proveedor WHERE borrado='N' AND cedula='".$cod_rif.$cedula."'";
      $resultado=mysqli_query($conectar,$sql);

      $busqueda = mysqli_num_rows($resultado);

      if ($busqueda>0) {
         echo '
          <script src="../../bootstrap/js/jquery.js"></script>
          <script src="../../vendors/js/sweetalert.min.js"></script>
          <script>
            $(document).ready(function(){
              swal("Error","El RIF ya se encuentra registrado", "error");
            });
          </script>';
      }else{
         include('../../Modelos/conexion.php');

        $sql="INSERT INTO proveedor(cedula,nombre,email,direccion,telefono) VALUES ('".$cod_rif.$cedula."','$nombre','$correo','$direccion','$telefono')";

        $resultado=mysqli_query($conectar,$sql);

        if ($resultado) {
          
          header('location: proveedores.php?reg=1');

        }else{

          header('location: proveedores.php?reg=2');
        }

        include('../../Modelos/desconectar.php');
        }

      }
  }
   include_once "../includes/menu.php"; 
?>

  <div class="contenido" style="padding-left: 20px">
    <div class="content-2">
     <section style="padding-left: 20px;" class="content-header">
      <ol class="breadcrumb">
         
         <h2 style="text-align: center"><a href="proveedores.php" class="atras" title="Atras"><span data-feather="arrow-left"></span></a></h2>
          <br>
         <h1 align="center">  <span style="margin-left: 3.5cm;" class="badge badge-info">Registro Proveedor <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >

      <form action="proveedor-registro.php" method="POST" name="form" class="form">
        <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>
        <div class="row" style="padding-left: 20px">
          <div class="col-md-6">
            <label><strong>RIF:</strong> <strong class='estado-r'>*</strong></label>
              <div style="width: 100%;">
                <div style="width: 20%; float: left;">
                  <select class="form-control" name="cod_rif" required="required"  >
                    <option value="V">V</option>
                    <option value="J">J</option>
                    <option value="E">E</option>
                    <option value="G">G</option>
                  </select>
                </div>
                <div class="col-md-8">
                  <input type="text" name="cedula" class="form-control" placeholder="Ej.112345" required="required" min="0" maxlength="15">
                <!--   <div id="result"></div>id="documento_numero"
                  <div class="valid-feedback">
                    Disponible
                  </div>
                  <div class="invalid-feedback">
                    RIF ya registrado
                  </div><br> -->
                </div>
              </div>
              
          </div>
          <div class="col-md-5">
            <label><strong>Nombre de la empresa</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" class="form-control" name="nombre" placeholder="Ej. Corporación.C.A" required="required"><br>
          </div>
        </div>
        <div class="row" style="padding-left: 20px">
          <div class="col-md-5">
          <div style="width: 100%; float: left;">
            <label><strong>Teléfono</strong> <strong class='estado-r'>*</strong></label>
            <input type="number" class="form-control" name="telefono" placeholder="Ej.0424987654 " required="required"><br>
          </div>
        </div>
          <div class="col-md-5">
          <div style="width: 100%; float: left; margin-left: 1.5cm;">
            <label><strong>Correo</strong></label>
            <input type="email" class="form-control" name="correo" placeholder="Ej. ejemplo@ejemplo.com"><br>
          </div>
        </div>
      </div>
       
         <div class="row" style="padding-left: 20px">
            <div class="col-md-5">
            <div style="width: 100%; float: left;">
              <label><strong>Dirección</strong></label>
              <textarea class="form-control" name="direccion"></textarea><br>
            </div>
          </div>
          </div>
        <center>
          <button type="reset" class="btn btn-danger btn-sm col-md-1">
          <i class="fa fa-ban"></i></button>

          <button type="submit" name="guardar-proveedor" class="btn btn-primary btn-sm col-md-1"><i class="fa fa-check"></i>&nbsp;</button>
        </center>
      </form>
      <br><br><br><br><br><br><br><br><br>
    </div>
   </div>    
   <?php include_once "../includes/footer.php"; ?>
    <script src="../../bootstrap/js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script>
      feather.replace();

      $('#select_d').on('change',function(){

        var value =$(this).val();

         if($('#documento_numero').hasClass('is-valid')){

                $('#documento_numero').removeClass('is-valid');
            }else{

             if($('#documento_numero').hasClass('is-invalid')){
              $('#documento_numero').removeClass('is-invalid');
             }
                  
            }
        $('#documento_numero').val('');
        if (value!='') {

          $('#documento_numero').prop('disabled',false);
        }else{
          $('#documento_numero').val('');
          $('#documento_numero').prop('disabled',true); 

        }

      });

      //Validacion Ajax

      $('#documento_numero').keyup(function(){


          var cod_rif= $('#select_d').val();

          var value =$(this).val();

          value = $.trim(value);// Elimino los espacio al inicio y final de la cadena

          if($(this).hasClass('is-valid')){

                $(this).removeClass('is-valid');
            }else{

             if($(this).hasClass('is-invalid')){
              $(this).removeClass('is-invalid');
             }
                  
            } 

          if (value!='') {

                $.ajax({

              type: "POST",
              url : "funciones/validar-rif-proveedor.php?rs="+cod_rif,
              data: "documento_numero="+value,
               beforeSend: function(){
                $('#result').html('verificando');
              },
              success: function( respuesta ){
                if(respuesta == '1'){
                    // 1 si esta disponible en la base de dato
                 $('#documento_numero').addClass('is-valid');
                  $('#result').html('');
                }else{
                 // si ya se encuentra registrado
                 $('#documento_numero').addClass('is-invalid');
                  $('#result').html('');
                }
                  
              }

            });
          }

      });

      $('.btn-reg').click(function(e){

          if ($('#documento_numero').hasClass('is-invalid')) {
              e.preventDefault();
              swal("Error", "El RIF ya se encuentra registrada en el sistema", "error");
          }

      });

      $('.form').keyup(function(e) {
          if(e.keyCode == 13) {

            if ($('#documento_numero').hasClass('is-invalid')) {
              e.preventDefault();
              swal("Error", "El RIF ya se encuentra registrada en el sistema", "error");
            }            
              
          }
      });
    </script>
    <script type="text/javascript">var X=3</script>
    <script src="../../vendors/js/main.js"></script>
    <script src="../../vendors/js/iziToast.min.js"></script>
    <script src="../../vendors/js/sweetalert.min.js"></script>
 

