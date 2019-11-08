<?php
  extract($_REQUEST);

  if (isset($_POST['guardar-proveedor'])){
        
    if ($nacionalidad=='' or $numero_documento=='' or $telef1=='' or $nombre=='') {
      echo '
      <script src="bootstrap/js/jquery.js"></script>
      <script src="js/sweetalert.min.js"></script>
      <script>
        $(document).ready(function(){
          swal("Error","Por favor, llene todo los campos correspondiente con un *", "error");
        });
      </script>';
    }else{

      include('conectar.php');

      $sql="SELECT * FROM proveedores WHERE borrado='N' AND cod_rif='$nacionalidad' AND rif='$numero_documento' AND id!='$proveedor'";
      $resultado=mysqli_query($conexion,$sql);

      $busqueda = mysqli_num_rows($resultado);

      if ($busqueda>0) {
         echo '
          <script src="bootstrap/js/jquery.js"></script>
          <script src="js/sweetalert.min.js"></script>
          <script>
            $(document).ready(function(){
              swal("Error","El RIF ya se encuentra registrado", "error");
            });
          </script>';
      }else{
         include('conectar.php');


        $sql="UPDATE proveedores SET cod_rif='$nacionalidad', rif='$numero_documento',empresa='$nombre',telef1='$telef1',telef2='$telef2',otros='$otro', correo='$correo' WHERE id='$proveedor'";

        $resultado=mysqli_query($conexion,$sql);

        if ($resultado) {
          
          header('location: proveedores.php?act=1');
          //echo $sql;

        }else{

          header('location: proveedores.php?act=2');

          //echo $sql;
        }

        include('desconectar.php');
        }

      }
  }

  include('conectar.php');

  $sql="SELECT * FROM proveedores WHERE id='$proveedor'";
  $resultado=mysqli_query($conexion,$sql);

  while ($consulta=mysqli_fetch_array($resultado)) {
    
    $codrif=$consulta['cod_rif'];
    $rif=$consulta['rif'];
    $empresa=$consulta['empresa'];
    $telef1=$consulta['telef1'];
    $telef2=$consulta['telef2'];
    $otros=$consulta['otros'];
  }

  if (mysqli_num_rows($resultado)==0) {
    header('location: proveedores.php');
  }
  include('desconectar.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/iziToast.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventario</title>
  </head>
  <body>
      <?php
        include("nav.php");
      ?>
  <div class="contenido">
    <div class="content-2">
      <h2 style="text-align: center"><a href="proveedores.php" class="atras" title="Atras"><span data-feather="arrow-left"></span></a><strong>Editar proveedor</strong></h2>
      <hr><br>

      <form action="editar-proveedor.php?proveedor=<?php echo $proveedor ?>" method="POST" name="form" class="form">
        <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>
        <div class="row">
          <div class="col-md-6">
            <label><strong>RIF:</strong> <strong class='estado-r'>*</strong></label>
              <div style="width: 100%;">
                <div style="width: 20%; float: left;">
                  <select class="form-control" name="nacionalidad" required="required" id="select_d" >
                    <option value=""></option>
                    <?php
                      include('conectar.php');

                      $sql="SELECT * FROM rif_categoria WHERE borrado='N'";

                      $resultado=mysqli_query($conexion,$sql);

                      while ($consulta=mysqli_fetch_array($resultado)) {

                          if ($codrif==$consulta['id']) {
                              $s='selected';
                          }else{
                            $s='';
                          }
                          
                          echo "<option ".$s." value='".$consulta['id']."'>".$consulta['simbologia']."</option>";
                      }
                      include('desconectar.php');
                    ?>
                  </select>
                </div>
                <div style="width: 77%; float: right;">
                  <input type="number" name="numero_documento" class="form-control" placeholder="Ej.112345" required="required" id="documento_numero" min="0" value="<?php echo $rif; ?>">
                  <div id="result"></div>
                  <div class="valid-feedback">
                    Disponible
                  </div>
                  <div class="invalid-feedback">
                    RIF ya registrado
                  </div><br>
                </div>
              </div>
              
          </div>
          <div class="col-md-6">
            <label><strong>Nombre de la empresa</strong> <strong class='estado-r'>*</strong></label>
            <input type="text" class="form-control" name="nombre" placeholder="Ej. Corporación.C.A" required="required" value="<?php echo $empresa; ?>"><br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label><strong>Teléfono 1</strong> <strong class='estado-r'>*</strong></label>
            <input type="number" class="form-control" name="telef1" placeholder="Ej.0424987654 " required="required" value="<?php echo $telef1; ?>"><br>
          </div>
          <div class="col-md-6">
            <label><strong>Teléfono 2</strong></label>
            <input type="number" class="form-control" name="telef2" placeholder="Ej. 0424987654" value="<?php echo $telef2; ?>"><br>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label><strong>Correo</strong></label>
            <input type="email" class="form-control" name="correo" placeholder="Ej. ejemplo@ejemplo.com"><br>
          </div>
        </div>
         <div class="row">
            <div class="col">
              <label><strong>Otros</strong></label>
              <textarea class="form-control" name="otro"><?php echo $otros; ?></textarea><br>
            </div>
          </div>
        <center>
          <a href="proveedores.php" class="btn btn-danger">Cancelar</a>
          <button  type="submit" class="btn btn-primary btn-reg" name="guardar-proveedor">Actualizar</button>
        </center>
      </form>
    </div>
   </div>    
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/feather.min.js"></script>
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
    <script src="js/main.js"></script>
    <script src="js/iziToast.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <script type="text/javascript">
        
    </script>
  </body>
</html>

