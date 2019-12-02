 <?php 
include_once "../includes/menu.php";
extract($_REQUEST);

?>
 <div class="contenido">
    <div class="content-2">
 <form action="registro_enviar_producto.php" method="POST" enctype="multipart/form-data">
      <section  class="content-header">
      <ol class="breadcrumb">
         
         <h2 style="text-align: center"><a href="inventario.php" class="atras" title="Atras"><span data-feather="arrow-left"></span></a></h2>
          <br>
         <h1 align="center">  <span style="margin-left: 3.5cm;" class="badge badge-info">Enviar Materia Prima <i class="menu-icon fa fa-edit"></i> </span></h1>
        
      </ol>
   </section >
     
        <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>
        <div class="row">
          <div class="col-md-4">
            <label><strong>Código</strong> <strong class="estado-r">*</strong></label>
            <input type="text" name="codigo" id="code" class="form-control codarticulo" required="required" placeholder="Ej. RJ-59014a">
    </div>
       
          <div class="col-md-4">
             <label><strong>Producto</strong> <strong class="estado-r">*</strong></label>
            <input type="text" name="id_articulo"  id="art"  class="form-control" required="required"  maxlength="120" disabled="disabled"><br>
          </div>
        <div class="col-md-4">
            <label><strong>Cantidad</strong> <strong class="estado-r">*</strong></label>
            <input type="number" class="form-control" name="stock" id="stock" required="required"  min="0" placeholder="Ej. 50"><br>
          </div>
            
             <input type="hidden" name="id_articulo" value="<?=$consulta['id']?>" id="id_articulo" >
          <!--     <input type="hidden" name="id_usuario" id="id_usuario" > -->
    </div>
        <div class="row">
          
              
       <div class="col-md-4">
                    <div id="ubicacion"><label><strong>Almacén Retiro</strong></label></div>
                   <input type="text" class="form-control" name="retiro" value="Materia Prima" disabled="disabled">
                  </div>
           
              
       <div class="col-md-4">
                    <div id="ubicacion"><label><strong>Ubicación Destino</strong></label></div>
                    <select class="form-control " name="destino" id="input_destino" required="required">
                      <option id="empresa_select" value="">Seleccione una ubicación</option>
                      <?php 
                       include("../../Modelos/conexion.php");
                     $sql="SELECT * FROM ubicacion WHERE borrado='N'";
                    $res_emp=$conectar->query($sql);
                        while ($ubicacion=$res_emp->fetch_array()) {
                       ?>
                      <option value="<?=$ubicacion['id']?>" class="id_vaue_externo"><?=$ubicacion['nombre']?></option>
                      <?php } 

  
                      ?> 
                    </select><br>
                  </div>
             </div>

         <center>
         <button type="reset" class="btn btn-danger btn-sm col-md-1">
          <i class="fa fa-ban"></i></button>

          <button type="submit" name="btn_registrar_art" value="Registrar" class="btn btn-primary btn-sm col-md-1"><i class="fa fa-check"></i>&nbsp;</button>
        </center>
  </form>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          
        </div>
        </div>
          
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

     

      $("#code").keyup(function(e) {
        
        $.ajax({

              type: "POST",
              url : "funciones/buscar_articulos.php",
              data: "id="+$("#code").val() ,
               beforeSend: function(){
                //$('#result').html('verificando');

              },
              success: function( respuesta ){  

                 $('#art').val(respuesta);
              }

            });

     

        $.ajax({

              type: "POST",
              url : "funciones/buscar_stock_articulo.php",
              data: "producto="+$("#code").val(),
              success: function( respuesta ){
             
                $('#stock').prop('max',respuesta);
                  
              }

            });

       $.ajax({

              type: "POST",
              url : "funciones/buscar_articulo.php",
              data: "producto="+$("#code").val(),
              success: function( respuesta ){
              
                $('#id_articulo').val(respuesta);
                  
              }

            });

      });


    </script>
    <script type="text/javascript">var X=3</script>
