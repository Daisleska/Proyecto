<?php 
  require_once('../../Modelos/conexion.php');

  extract($_REQUEST);
  $sql= "SELECT * FROM inventario WHERE id='$id_inventario'";
  $query = mysqli_query($conectar,$sql);
  while($row=mysqli_fetch_assoc($query)){
    if($cantidad_usar > $row['cantidad']){
      echo" <script type='text/javascript'>
      alert('Cantidad Seleccionada es Mayor a la del Inventario');
      window.open('../menu/ControladorMenu.php?operacion=inventario','_self');
      </script>";
    } else {
      $sql1="UPDATE inventario SET cantidad='$cantidad' - '$cantidad_usar' WHERE id='$id_inventario'";
      $query1=mysqli_query($conectar,$sql1);
      if($query>0){
        echo" <script type='text/javascript'>
        alert('Producto de Inventario Enviado a producción');
        window.open('../menu/ControladorMenu.php?operacion=inventario','_self');
        </script>";
    }
    }
  }

  $sql5 = "SELECT cantidad FROM inventario WHERE id='$id_inventario'";
  $query5= mysqli_query($conectar,$sql5);
  while($row1=mysqli_fetch_assoc($query5)){

  if (($row1['cantidad']) == 0 ) {
    $sql5="DELETE FROM inventario WHERE id='$id_inventario'";
    $query5 = mysqli_query($conectar,$sql5);
  }
}
?> 