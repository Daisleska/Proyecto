<?php
  extract($_REQUEST);

  if (isset($_POST['guardar-proveedor'])){
        
    if ($nacionalidad=='' or $numero_documento=='' or $telef1=='' or $nombre=='') {
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

      $sql="SELECT * FROM proveedor WHERE borrado='N' AND cod_rif='$nacionalidad' AND cedula='$numero_documento' AND id!='$proveedor'";
      $resultado=mysqli_query($conectar,$sql);

      $busqueda = mysqli_num_rows($resultado);

      if ($busqueda>0) {
         echo '
          <script src="../../bootstrap/js/jquery.js"></script>
          <script src="../../vendors/sweetalert.min.js"></script>
          <script>
            $(document).ready(function(){
              swal("Error","El RIF ya se encuentra registrado", "error");
            });
          </script>';
      }else{
         include('../../Modelos/conexion.php');


        $sql="UPDATE proveedor SET cod_rif='$nacionalidad', cedula='$numero_documento',nombre='$nombre',telefono='$telef1',direccion='$otros', email='$correo' WHERE id='$proveedor'";

        $resultado=mysqli_query($conectar,$sql);

        if ($resultado) {
          
          header('location: proveedores.php?act=1');
          //echo $sql;

        }else{

          header('location: proveedores.php?act=2');

          //echo $sql;
        }

    
        }

      }
  }

  include('../../Modelos/conexion.php');

  $sql="SELECT * FROM proveedor WHERE id='$proveedor'";
  $resultado=mysqli_query($conectar,$sql);

  while ($consulta=mysqli_fetch_array($resultado)) {
    
    $codrif=$consulta['cod_rif'];
    $rif=$consulta['cedula'];
    $empresa=$consulta['nombre'];
    $telef1=$consulta['telefono'];
    $correo=$consulta['email'];
    $otros=$consulta['direccion'];
  }

  if (mysqli_num_rows($resultado)==0) {
    header('location: proveedores.php');
  }


  include_once "../includes/menu.php";
?>


  <div class="contenido">
    <div class="content-2">
     <section style="padding-left: 20px;" class="content-header">
      <ol class="breadcrumb">
         
         <h2 style="text-align: center"><a href="proveedores.php" class="atras" title="Atras"><span data-feather="arrow-left"></span></a></h2>
          <br>
         <h1 align="center">  <span style="margin-left: 4.5cm;" class="badge badge-info">Modificar Proveedor <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >

      <form action="editar-proveedor.php?proveedor=<?php echo $proveedor ?>" method="POST" name="form" class="form">
        <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>
        <div class="row" style="padding-left: 20px">
          <div class="col-md-6">
            <label><strong>RIF:</strong> <strong class='estado-r'>*</strong></label>
              <div style="width: 100%;">
                <div style="width: 20%; float: left;">
                  <select class="form-control" name="nacionalidad" required="required" id="select_d">
                    <option selected="selected" ><?php echo $codrif; ?></option>
                    <option value="V">V</option>
                    <option value="J">J</option>
                    <option value="E">E</option>
                    <option value="G">G</option>
                  
                  </select>
                </div>
                <div class="col-md-8">
                  <input type="number" name="numero_documento" class="form-control" placeholder="Ej.112345" required="required" id="documento_numero" min="0" value="<?php echo $rif; ?>">
                
                </div>
              </div>
              
          </div>
          <div class="col-md-5">
            <label><strong>Nombre de la empresa</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" class="form-control" name="nombre" placeholder="Ej. Corporación.C.A" required="required" value="<?php echo $empresa; ?>"><br>
          </div>
        </div>
        <div class="row" style="padding-left: 20px">
          <div class="col-md-5">
          <div style="width: 100%; float: left;">
            <label><strong>Teléfono</strong> <strong class='estado-r'>*</strong></label>
            <input type="number" class="form-control" name="telef1" placeholder="Ej.0424987654 " required="required" value="<?php echo $telef1; ?>"><br>
          </div>
        </div>

          <div class="col-md-5">
            <div style="width: 100%; float: left; margin-left: 1.5cm;">
            <label><strong>Correo</strong></label>
            <input type="email" class="form-control" value="<?php echo $correo; ?>" name="correo" placeholder="Ej. ejemplo@ejemplo.com"><br>
          </div>
        </div>
        </div>


        <div class="row" style="padding-left: 20px">
          <div class="col-md-5">
            <div style="width: 100%; float: left;">
            <label><strong>Dirección</strong></label>
            <input type="text" class="form-control" value="<?php echo $otros; ?>" name="otros" placeholder="Ej: La Victoria"><br>
          </div>
        </div>
        </div>
         
        <center>
          <button type="reset" class="btn btn-danger btn-sm col-md-1">
          <i class="fa fa-ban"></i></button>

          <button type="submit" name="guardar-proveedor" class="btn btn-primary btn-sm col-md-1"><i class="fa fa-check"></i>&nbsp;</button>
        </center>
      </form>
      <br><br><br><br><br><br><br><br><br><br>
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

          var nacionalidad= $('#select_d').val();

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

                var codrif=$('#select_d').val();
                value=codrif+'-'+value;

               if (value!='<?php echo $codrif.'-'.$rif ?>') {

                 $.ajax({

                    type: "POST",
                    url : "funciones/validar-rif-proveedor.php?rs="+nacionalidad,
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