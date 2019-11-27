<?php

  session_start();
  error_reporting(0);

  if (isset($_POST['guardar-solicitud'])) {
      extract($_REQUEST);
      
      include('../../Modelos/conexion.php');
      extract($_REQUEST);
      $tipo="interno";

      $sql="INSERT INTO pedido(tipo) VALUES('$tipo')";

      $resultado=mysqli_query($conectar,$sql);

          if ($resultado) {

            if ($i=='') {
            $i=1;
          }

            for ($z=0; $z <$i ; $z++) { 
                
                for ($y=0; $y <$i ; $y++) { 
                  
                  if ($articulos[$z]==$articulos[$y]) {

                    if ($articulos[$z]=='' or $z==$y) {
                      continue;
                    }else{

                      $cantidad[$z]=$cantidad[$z]+$cantidad[$y];

                      $cantidad[$y]=0;
                      $articulos[$y]='';


                    }
                      
                  }

                }
            }

        $id=mysqli_insert_id($conectar);

        $errror_pedido=0;
        $error_registro=0;
        $error_var_empty=0;
        
        for($j=0; $j<$i; $j++){

          if ($articulos[$j]==''  or $cantidad[$j]=='' or $cantidad[$j]==0) {


            $error_var_empty++;
            continue;

          }

            $sql="SELECT * FROM productos WHERE id='$articulos[$j]'";

            $resultado=mysqli_query($conectar,$sql);

            while ($consulta=mysqli_fetch_array($resultado)) {
              
              $pedidomax=$consulta['stock_maximo']-$consulta['stock'];
            }

            if ($cantidad[$j]>$pedidomax) {
              $errror_pedido=$errror_pedido+1;
              continue;
            }else{

                  $sql="INSERT INTO pedido_detalles (id_pedido,id_producto,cantidad_solicitada) VALUES ('$id','$articulos[$j]','$cantidad[$j]') ";

                  $resultado=mysqli_query($conectar,$sql);


                  if ($resultado) {


                  }else{

                    $error_registro=$error_registro+1;

                  }

                }
            }

            include('funciones/funcion-notificaciones.php');
            verificar_pedido();

      }else{
        include('../../Modelos/desconectar.php');
        header('location: pedidos-internos.php=reg=2');
        exit();
      }

      include('../../Modelos/desconectar.php');

      if ($error_registro==0 and $errror_pedido==0) {
          header('location: pedidos-internos.php?reg=1');
          exit();
      }

      if ($error_registro!=0 and $error_registro==$i or $error_var_empty==$i) {
        include('../../Modelos/conexion.php');
        $sql="DELETE  FROM pedido WHERE id='$id'";
        $resultado=mysqli_query($conectar,$sql);
        include('../../Modelos/desconectar.php');
        # ni un solo artículo fue registrado en el pedido
        header('location: pedidos-internos.php?reg=3');
        exit();
      }

      if ($errror_pedido!=0 AND $errror_pedido==$i or $errror_pedido== $i-$error_var_empty) {
        include('../../Modelos/conexion.php');
        $sql="DELETE  FROM pedido WHERE id='$id'";
        $resultado=mysqli_query($conectar,$sql);
        include('../../Modelos/desconectar.php');
          
        # las cantidades solicitada superan el stock maximo establecido
        header('location: pedidos-internos.php?reg=4');
        exit();
      }

      if ($error_registro>0 AND $errror_pedido!=$i) {
          
          header('location: pedidos-internos.php?reg=5');

          exit();
      }

      if ($errror_pedido>0 AND $errror_pedido!=$i) {
          
          header('location: pedidos-internos.php?reg=6');
          exit();
      }

  }
      include_once "../includes/menu.php";
?>
  <div class="contenido">
    <div class="content-2">
      <h2 style="text-align: center"><a href="pedidos-internos.php" class="atras" title="Atras"><span data-feather="arrow-left" ></span></a><strong>solicitud de pedido interno</strong></h2>
      <hr><br> 

      <form action="solicitud-pedido-interno.php" name="form" method="POST" id="form">
         <h6 class="nota-input">Los campos con un <i class="estado-r">*</i> son obligatorios </h6><br>
        <!--Articulos-->
        <div class="row">
          <div class="col-md-6">
            <label><strong>Materia Prima</strong> <strong class="estado-r required_ext">*</strong></label>
            <select class="form-control form-n0" name="articulos[0]" required="required" onchange="javascript:verificar(0)">
              <option value="" class="id_vaue_externo">Seleccione el artículo</option>
              <?php

                include('../../Modelos/conexion.php');

                $sql="SELECT * FROM productos WHERE borrado='N' AND activo='S' ";
                $resultado=mysqli_query($conectar,$sql);

                while ($consulta=mysqli_fetch_array($resultado)) {
                    
                    echo "<option value='".$consulta['id']."' id='nombre-".$consulta['id']."'> ".$consulta['nombre']."</option> ";
                }

                include('../../Modelos/desconectar.php');

              ?>
            </select><br>
          </div>
          <div class="col-md-6">
            <label><strong>Cantidad</strong> <strong class="estado-r required_ext">*</strong></label>
            <input type="number" name="cantidad[0]" class="form-control cantidad0" placeholder="Ej. 2" required="required" min="1" ><br>
          </div>
        </div>
        <div class="campos_nuevos">
          
        </div>
        <center>
          <a href="javascript:nuevos_campos()" class="control-sr mantenimiento_externo_show" title="Añadir" ><span data-feather="plus" style=" width: 35px; height: 35px;"></span></a>

          <a href="#" class="control-sr control-sr_x mantenimiento_externo_show x control-sr_x_resposive eliminar-2" title="Eliminar" id="#"><span data-feather="trash" style=" width: 35px; height: 35px;"></span></a>
        </center>
        <hr>
        <!--Fin-->
        
          <a href="pedidos-internos.php" class="btn btn-danger">Cancelar</a>
          <button type="sumbit" class="btn btn-primary" name="guardar-solicitud">Guardar</button>

        </center>
      </form>       
    </div>
  </div>
    <!-- Modal -->
     <?php include_once "../includes/footer.php"; ?>
    
  
    <script src="../../bootstrap/js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script>
      feather.replace();
    </script>
    <script type="text/javascript">var X=3</script>
    <script src="../../vendors/js/sweetalert.min.js"></script>
    <script>

      var cont=1;
      var i=0;
      function nuevos_campos(){

        $('.eliminar-2').prop('id',cont);

        $('.campos_nuevos').before(
          '<div class="row" id="campos_nuevos'+cont+'">'+
            '<div class="col-md-6">'+

            '<label><strong>Artículo</strong> <strong class="estado-r required_ext">*</strong></label>'+
            '<select onchange="javascript:verificar('+cont+')"  class=" articulo form-control form-n'+cont+'" name="articulos['+cont+']" required="required">'+
            '<option value="" class="value'+cont+'">Seleccione el artículo</option>'+

              <?php

                include('../../Modelos/conexion.php');

                $sql="SELECT * FROM productos WHERE borrado='N' AND activo='S' ";
                $resultado=mysqli_query($conectar,$sql);

                while ($consulta=mysqli_fetch_array($resultado)) {

                  $id='artículo-'.$consulta['id'];
                    
                  echo "'<option id=".$id." value=".$consulta['id'].">".$consulta['nombre']."</opion>'+";
                }

                include('../../Modelos/desconectar.php');

              ?>
            '</select><br>'+
            '</div>'+//fin 1

            '<div class="col-md-5">'+

              '<label><strong>Cantidad</strong> <strong class="estado-r required_ext">*</strong></label>'+
              '<input type="number" name="cantidad['+cont+']" class="form-control form-n'+cont+' cantidad'+cont+'" placeholder="Ej. 2" required="required" min="1"><br>'+

            '</div>'+//fin3

            '<div class="col-md-1 iconos_x">'+
              '<a href="#" class="control-sr control-sr_x mantenimiento_externo_show eliminar-1" id="'+cont+'" title="Eliminar"><img src="../../images/img/x.svg" class="control-sr control-sr_x mantenimiento_externo_show x x2" title="Eliminar"></a>'+
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

        $('#form').prop('action','solicitud-pedido-interno.php?i='+cont);// URL para registrar
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

      function verificar (cont){

        
        var cod=$('.form-n'+cont).val();

        $.ajax({

              type: "POST",
              url : "funciones/buscar-stock-maximo.php",
              data: "id="+ cod,
               beforeSend: function(){
                $('#result').html('verificando');
              },
              success: function( respuesta ){
               
                $('.cantidad'+cont).prop('max',respuesta);
                  
              }

            });

      }

    </script>

