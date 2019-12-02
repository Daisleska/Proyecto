<?php
  extract($_REQUEST);
  error_reporting(0);
  include('../../Modelos/conexion.php');
  $sql="SELECT * FROM productos WHERE id='$articulo'";
  $resultados=mysqli_query($conectar,$sql);
  $res_busqueda=mysqli_num_rows($resultados);

  if ($res_busqueda==0) {
      
      header('location: inventario.php');
      include('desconectar.php');
      exit();
  } 
    include('../../Modelos/desconectar.php');

  if ($a=='') {
      $a=date('o');
  }else{
    $a=$a;
  }

  $tiempo_inicio = $a.'-01-01 00:00:00';

  $tiempo_fin = $a.'-12-31 23:59:59';

  include('../../Modelos/conexion.php');

  $sql="SELECT * FROM historial WHERE tiempo BETWEEN '$tiempo_inicio' AND '$tiempo_fin' AND id_producto='$articulo'";  

  $ingreso=0;
  $egreso=0;

  $resultados=mysqli_query($conectar,$sql);

  while ($consulta=mysqli_fetch_array($resultados)) {
    
    //Ingreso y egreso

    if ($consulta['cantidad'] > 0) {
        
        $ingreso=$ingreso+$consulta['cantidad'];


    }else if ($consulta['cantidad'] < 0) {
        
        $egreso=$egreso+$consulta['cantidad'];
    }

  }
  $egreso= preg_replace("/[^0-9]+/","", $egreso);
  include('../../Modelos/desconectar.php');

  include_once "../includes/menu.php";
?>

  <div class="contenido">
    <div class="content-2">
      

     <?php
        include('../../Modelos/conexion.php');
        $sql="SELECT * FROM productos WHERE id='$articulo'";
        $resultados=mysqli_query($conectar,$sql);

        while ($consulta=mysqli_fetch_array($resultados)) {
                    
          
        ?>

        <section style="padding-left: 20px;" class="content-header">
      <ol class="breadcrumb">
         
         <h2 style="text-align: center"><a href="inventario.php" class="atras" title="Atras"><span data-feather="arrow-left"></span></a></h2>
          <br>
         <h1 align="center"><span style="margin-left: 6.5cm;" class="badge badge-info"><?php echo $consulta['nombre']; ?> <i class="fa ti-spray"></i> </span></h1>
        
      </ol>
   </section >
   <?php

        }

        include('../../Modelos/desconectar.php');
      ?>

    </strong></h2><hr>

      <div class="row">
        <div class="col">
          <h2 style="text-align: center;"><strong>Historial del año</strong></h2>
        </div>
        <div class="col-md-3">
          <select class="form-control" id="anio">
            <?php

              $anio_min=2000;

              $anio_max=date('o');

              for ($i=$anio_min; $i<=$anio_max;$i++) { 
                  
                  if ($a=='') {
                      
                      if ($i==$anio_max) {
                        $S='selected';
                      }else{
                        $S='';
                      }
                  }else{

                    if ($i==$a) {
                      $S='selected';
                    }else{
                      $S='';
                    }
                  }

                  echo "<option value='".$i."'  ".$S." >".$i."</option>";
              }

            ?>
          </select>
        </div>
      </div>

      <div style="width: 100%; padding: 10px;">
        <div class="row">
        <div class="col-md-4">
          <div class="card mb-1 box-shadow"> <!--card mb-1 box-shadow-->
            <div class="row">
            <div class="col NHA" style=";padding: 0; text-align: left; ">
                <img src="../../images/img/cube.png" class="img-responsive" height="100%">
              </div>
              <div class="col NHA" style=";text-align: justify;">
                <label><strong>En stock:</strong></label>
                <small>Actualmente</small>
                <p style="font-size: 20px;">

                <?php
                  include('../../Modelos/conexion.php');
                  $sql="SELECT * FROM productos WHERE id='$articulo' ";
                  $resultados=mysqli_query($conectar,$sql);

                  while ($consulta=mysqli_fetch_array($resultados)) {
                    
                    echo $consulta['stock'];

                  }

                  include('../../Modelos/desconectar.php');
                ?>

                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4" >
          <div class="card mb-1 box-shadow"> <!--card mb-1 box-shadow-->
            <div class="row">
            <div class="col NHA" style=";padding: 0; text-align: left; ">
                <img src="../../images/img/up2.png" class="img-responsive" height="100%">
              </div>
              <div class="col NHA" style=";text-align: justify;">
                <label><strong>Ingresos</strong></label><br>
                <small>Por año</small>
                <p style="font-size: 20px;"><?php echo $ingreso;?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-1 box-shadow"> <!--card mb-1 box-shadow-->
            <div class="row">
            <div class="col NHA" style=";padding: 0; text-align: left; ">
                <img src="../../images/img/down.png" class="img-responsive" height="100%">
              </div>
              <div class="col NHA" style=";text-align: justify;">
                <label><strong>Egresos</strong></label><br>
                <small>Por año</small>
                <p style="font-size: 20px;"><?php echo $egreso; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div><hr><br>

      <style type="text/css">
        .grafica-contenedor{
          padding: 10px;
          box-shadow: 0px 0px 3px grey;
          border-radius: 5px;
        }
      </style>

      <div style="padding: 20px; box-shadow: 0 0 3px grey; border-radius: 5px;">
        <div class="table-responsive">
          <center><h2>Movimientos</h2></center>
          <table class="table table-striped table-sm " id="table">
          <thead>
            <th>Fecha</th>
            <th>Acción</th>
            <th>Cantidad</th>
            <th>Motivo</th>
          <!--   <th>Realizado por</th> -->
          </thead>
          <tbody>
            <?php
              include('../../Modelos/conexion.php');

              $sql="SELECT * FROM historial WHERE historial.id_producto='$articulo' AND historial.tiempo BETWEEN '$tiempo_inicio' AND '$tiempo_fin' order by id desc ";

                $resultado=mysqli_query($conectar,$sql);

                while ($consulta=mysqli_fetch_array($resultado)) {

                    if ($consulta['cantidad']>0) {

                      $class='class="estado-re"';
                    }else{
                      $class='class="estado-r"';
                    }
                    
                    if ($consulta['motivo']=='Actualización') {
                        $class2='class="estado-es"';
                    }else{
                      $class2=$class;
                    }

                    echo "
                      <tr>
                        <td>".$consulta['tiempo']."</td>
                        <td><strong ".$class2.">".$consulta['motivo']."</strong></td>
                        <td><strong ".$class." > ".$consulta['cantidad']."</strong></td>
                        ";

                    if ($consulta['motivo']=='Ingreso') {
                     $motivo='Pedido';
                    }else{
                       $motivo='Enviado';
                    }
                    

                    if ($consulta['id_pedido']=='') {
                        
                    }else{

                      $motivo='<a target="_blank" href="ver-pedido-pdf.php?id='.$consulta['id_pedido'].'">Pedido</a>';
                    }

                   /* if ($consulta['id_mantenimiento']=='') {
                        
                    }else{

                      $motivo='<a href="#?id="'.$consulta['id_mantenimiento'].'">Mantenimiento</a>';
                    }*/

                    echo "
                          <td>".$motivo."</td>
                          
                        </tr>

                      ";
                  }
           
            ?>
          </tbody>
        </table>
        </div>
      </div>
      <br>
    </div>
  </div>  
   <?php include_once "../includes/footer.php"; ?>   
      <!--Fin Modal-->
  <script src="../../bootstrap/js/jquery.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script>
      feather.replace();
    </script>
    <script type="text/javascript">var X=3</script>
    <script src="../../vendors/js/sweetalert.min.js"></script>
    <script src="../../vendors/js/datatables.min.js"></script>
    <script src="../../vendors/js/Chart.min.js"></script>
    
    <script type="text/javascript">

          $('#table').DataTable({
            "searching": true,
             "order": [[ 0, "desc" ]],
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

      var barChartData = {
      labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
      datasets: [{
        label: 'Ingreso',
        backgroundColor: '#007bff',
        data: [
          
          <?php
            include('../../Modelos/conexion.php');

            for ($i=1; $i <=12 ; $i++) { 
                
                $cont1=0;
                $cont2=0;
                $tiempo_inicio = $a.'-'.$i.'-01 00:00:00';

                $tiempo_fin = $a.'-'.$i.'-31 23:59:59';

                $sql="SELECT * FROM historial WHERE tiempo BETWEEN '$tiempo_inicio' AND '$tiempo_fin' AND id_producto='$articulo'";

                $resultados=mysqli_query($conectar,$sql);

                while ($consulta=mysqli_fetch_array($resultados)) {
                    
                    if ($consulta['cantidad']>0) {

                      $cont1=$cont1+$consulta['cantidad'];
                    }elseif ($consulta['cantidad']<0) {
                        
                        $cont2=$cont2+$consulta['cantidad'];
                    }
                }

                $cont_array[$i-1]=$cont2;
                echo $cont1;
                echo ",";

            }

          include('../../Modelos/desconectar.php');
          $cont_array = preg_replace("/[^0-9]+/","", $cont_array);
          ?>
          0,10
        ]
      }, {
        label: 'Egreso',
        backgroundColor: '#6c757d',
        data: [
          <?php

            for ($i=0;$i<12;$i++){

                echo $cont_array[$i];
                echo ",";


            }

          ?>
          0,10
        ]
      }]

    };
    window.onload = function() {

      var ctx = document.getElementById("canvas").getContext('2d');;
      var myChart = new Chart(ctx,{
        type: 'bar',
        data: barChartData,
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false,
              }
            }]
          },
          legend: {
            display: true,
          }
        },
        responsive: false,
          
      });

    };

    $('#anio').on('change',function(){

      var anio=$(this).val();

      window.location='ver-historial-inventario.php?articulo=<?php echo $articulo ?>&a='+anio;

    });

  </script>
