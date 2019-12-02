<?php
    extract($_REQUEST);
    include('../../Modelos/conexion.php');
    $sql="SELECT empleado.*, cargos.nombre AS car, departamentos.nombre AS dep FROM empleado, departamentos, cargos WHERE departamentos.id=empleado.id_departamento AND cargos.id=empleado.id_cargo AND empleado.id='$cod'";

    $resultado=mysqli_query($conectar,$sql);

    while ($consulta=mysqli_fetch_array($resultado)) {
        if ($inf==1) {
            ?>
            <b>
            <?php
            echo $consulta['apellidos'];
            ?>
            <b>
            <?php
            echo $consulta['nombres'];

                    }else if ($inf==2){

            ?>
            

           <!--  <label><strong><h4>Detalles del Empleados:</h4></strong></label><br><br> -->
            <div class="row">
            <!--    <div class="col">
                 <label><strong>Imagen del Producto:</strong></label><br>
             <?php
        
         
  echo "<img class=\"foto\" src=\""."img/".$consulta['foto']."\"/ width='40%' heigth='40%' >";
           ?>
            </div> -->
                
               
            </div><hr>
        <div class="row">

                <div class="col-md-4">
               <label><strong>Cedula:</strong></label>
                    <?php echo $consulta['cedula']; ?>
                </div>

                <div class="col-md-4">
                <label><strong>Nombres:</strong></label>
                <?php echo $consulta['nombres']; ?>    
                </div>

                <div class="col-md-4">
                <label><strong>Apellidos:</strong></label>
                <?php echo $consulta['apellidos']; ?>  
                </div>

                
        </div>
       
       <div class="row">
                
                <div class="col-md-4">
                <label><strong>Dirección:</strong></label>
                <?php echo $consulta['direccion']; ?>  
                </div>

                <div class="col-md-4">
               <label><strong>Teléfono:</strong></label>
                    <?php echo $consulta['telefono']; ?>
                </div>

                <div class="col-md-4">
                <label><strong>Condición:</strong></label>
                <?php echo $consulta['condicion']; ?>  
                </div>

                

        </div>

        <div class="row">
             

                <div class="col-md-4">
                <label><strong>Fecha de Ingreso:</strong></label>
                <?php echo $consulta['fecha_ingreso']; ?>    
                </div>

                <div class="col-md-5">
                <label><strong>Fecha de Vencimiento:</strong></label>
                <?php echo $consulta['fecha_venc']; ?>  
                </div>   

                <div class="col-md-3">
                <label><strong>Cargo:</strong></label>
                <?php  echo $consulta['car'];?>  
                </div>

                
             
        </div>


        <div class="row">
           


                <div class="col-md-5">
                <label><strong>Departamento:</strong></label>
                <?php  echo $consulta['dep'];?>  
                </div>


                <div class="col-md-6">
                <label><strong>Número de Cuenta:</strong></label>
                <?php  echo $consulta['ncuenta'];?>  
                </div>


        
        </div>

         <div class="row">
           

                
           
                

            
        </div>
                
                    
 <!-- <?php
$sql="SELECT * FROM empleado WHERE id='$cod'";
$result=mysqli_query($conectar,$sql);

        //declaramos arreglo para guardar codigos
$arrayCodigos=array();
?>
 -->

<!-- 
    <div class="col">
    
    <LABEL><STRONG>Código de Barras</STRONG></LABEL> <br>
            <?php 
            while($ver=mysqli_fetch_row($result)):
                $arrayCodigos[]=(string)$ver[16]; 
                ?>
                <tr>

                    <td>
                        <svg id='<?php echo "barcode".$ver[16]; ?>'>
                        </td>
                    </tr>
                <?php endwhile; ?>
            
        </div> -->
    
</div>
            <?php
        }
        
    }

/*  include('../../Modelos/desconectar.php');*/

?>


<!-- <script src="js/JsBarcode.all.min.js"></script>
    <script type="text/javascript">

        function arrayjsonbarcode(j){
            json=JSON.parse(j);
            arr=[];
            for (var x in json) {
                arr.push(json[x]);
            }
            return arr;
        }

        jsonvalor='<?php echo json_encode($arrayCodigos) ?>';
        valores=arrayjsonbarcode(jsonvalor);

        for (var i = 0; i < valores.length; i++) {

            JsBarcode("#barcode" + valores[i], valores[i].toString(), {
                format: "code128",
                lineColor: "#000",
                width: 2,
                height: 30,
                displayValue: true
            });
        }
        
    </script> -->