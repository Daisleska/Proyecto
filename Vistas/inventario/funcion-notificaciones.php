<?php
	//Conexiones con la base de datos
	function conexion(){

		include('../../Modelos/conexion.php');
		return $conectar;
	}

	function desconexion($conexion){

		include('../../Modelos/desconectar.php');
	}

	function verificar_inventario(){

		$conexion=conexion();

		$sql="SELECT * FROM productos WHERE stock<=stock_minimo AND activo='S' AND borrado='N'";

		$resultado=mysqli_query($conectar,$sql);

		$res_busqueda=mysqli_num_rows($resultado);


		if ($res_busqueda!=0) {

			$titulo="Inventario";

			if ($res_busqueda==1) {
				$mensaje=$res_busqueda." artículo requiere atención";
			}else{
				$mensaje=$res_busqueda." artículos requieren atención";
			}
			
			
			$sql="INSERT INTO notificaciones(titulo,mensaje) VALUES('$titulo','$mensaje')";
			$resultado=mysqli_query($conectar,$sql);

			$id_notificaciones=mysqli_insert_id($conexion);


			$sql2="SELECT * FROM usuarios WHERE activo='Si' AND cargo='1' or cargo='4'";
			$resultado2=mysqli_query($conectar,$sql2);

			while ($consulta=mysqli_fetch_array($resultado2)) {
				
				$id_usuario=$consulta['id'];

				$sql3="INSERT INTO notificaciones_detalles(id_notificaciones,id_usuario) VALUES('$id_notificaciones','$id_usuario')";

				$res2=mysqli_query($conectar,$sql3);

			}
			
		}

		desconexion($conectar);
	}


	function verificar_pedido_interno(){

		$conexion=conexion();

		$sql="SELECT * FROM pedido WHERE tipo='Interno' AND estado='En espera...'";

		$resultado=mysqli_query($conexion,$sql);

		$res_busqueda=mysqli_num_rows($resultado);

		if ($res_busqueda!=0) {
		
			$titulo="Pedido interno";

			if ($res_busqueda==1) {
				$mensaje='Tienes un pedido interno en espera';
			}else{
				$mensaje='Tienes '.$res_busqueda.' pedidos internos en espera';
			}
			
			
			$sql="INSERT INTO notificaciones(titulo,mensaje) VALUES('$titulo','$mensaje')";
			$resultado=mysqli_query($conexion,$sql);

			$id_notificaciones=mysqli_insert_id($conexion);


			$sql2="SELECT * FROM usuarios WHERE activo='Si' AND cargo='1' or cargo='4'";
			$resultado2=mysqli_query($conexion,$sql2);

			while ($consulta=mysqli_fetch_array($resultado2)) {
				
				$id_usuario=$consulta['id'];

				$sql3="INSERT INTO notificaciones_detalles(id_notificaciones,id_usuario) VALUES('$id_notificaciones','$id_usuario')";

				$res2=mysqli_query($conexion,$sql3);

			}
		}
		desconexion($conexion);

	}

	function verificar_pedido_externo(){

		$conexion=conexion();

		$sql="SELECT * FROM pedido WHERE tipo='Externo' AND estado='En espera...'";

		$resultado=mysqli_query($conexion,$sql);

		$res_busqueda=mysqli_num_rows($resultado);

		if ($res_busqueda!=0) {
		
			$titulo="Pedido interno";

			if ($res_busqueda==1) {
				$mensaje='Tienes un pedido externo en espera';
			}else{
				$mensaje='Tienes '.$res_busqueda.' pedidos externos en espera';
			}
			
			
			$sql="INSERT INTO notificaciones(titulo,mensaje) VALUES('$titulo','$mensaje')";
			$resultado=mysqli_query($conexion,$sql);

			$id_notificaciones=mysqli_insert_id($conexion);


			$sql2="SELECT * FROM usuarios WHERE activo='Si' AND cargo='1' or cargo='4'";
			$resultado2=mysqli_query($conexion,$sql2);

			while ($consulta=mysqli_fetch_array($resultado2)) {
				
				$id_usuario=$consulta['id'];

				$sql3="INSERT INTO notificaciones_detalles(id_notificaciones,id_usuario) VALUES('$id_notificaciones','$id_usuario')";

				$res2=mysqli_query($conexion,$sql3);

			}
		}
		desconexion($conexion);
		
	}

	function verificar_pedido(){

		verificar_pedido_interno();
		verificar_pedido_externo();
	}


	function contador_inventario(){

		$conexion=conexion();

		$resultado= mysqli_query($conexion,"SELECT productos.stock FROM productos WHERE productos.stock <productos.stock_minimo AND borrado='N' AND activo='S'");
	    $res_busqueda=mysqli_num_rows($resultado);

	    $contador[0]=$res_busqueda;

	    $sql="SELECT * FROM pedido WHERE tipo='Externo' AND estado='En espera...'";
	    $resultado=mysqli_query($conexion,$sql);
	    $res_busqueda=mysqli_num_rows($resultado);

	    $contador[1]=$res_busqueda;

	    $sql="SELECT * FROM pedido WHERE tipo='interno' AND estado='En espera...'";
	    $resultado=mysqli_query($conexion,$sql);
	    $res_busqueda=mysqli_num_rows($resultado);

	    $contador[2]=$res_busqueda;

	    //Total

	    $contador[3]=$contador[2]+$contador[1];

	    $contador[4]=$contador[2]+$contador[1]+$contador[0];

	    desconexion($conexion);

	    return $contador;
	}


	// Vehículos


	function verificar_vehiculo ($o) {

		$conexion=conexion();

		$sql="SELECT consumo_actual.*, consumo_tope.km_maximo FROM consumo_actual,consumo_tope WHERE consumo_actual.id_consumo_tope=consumo_tope.id AND consumo_actual.activo='S' AND consumo_actual.km_actual*100/consumo_tope.km_maximo>=80";

		$resultado=mysqli_query($conexion,$sql);
		$i=0;
		$cont=1;
		$alerta=0;

		while ($consulta=mysqli_fetch_array($resultado)) {
			
			$ve[$i]=$consulta['id_vehiculo'];
			$i++;
		}

          for ($z=0; $z <$i ; $z++) { 
                
               for ($y=0; $y <$i ; $y++) { 
                  
                if ($ve[$z]==$ve[$y]) {

                   if ($ve[$z]=='' or $z==$y) {

                     continue;

                   }else{
                     $ve[$y]='';
                   }
                      
                 }
               }
           }


           for ($x=0; $x <$i ; $x++) { 
           		
           		if ($ve[$x]=='') {
           			continue;
           		}else{

           			$vehiculo[$alerta]=$ve[$x];
           			$alerta++;
           		}
           }


		desconexion($conectar);

		if ($o==1) {
			return $alerta;

		}else if ($o==2){
			return $vehiculo;

		}else if ($o==3){
			return $sql;
		}

	 }
    
    //Mantenimiento

    function verificar_plan_mantenimiento(){

		$conexion=conexion();

		$fec=getdate ();
		$fecha=$fec['year'].'-'.$fec['mon'].'-'. $fec['mday'];
		$sql="SELECT * FROM plan_mantenimiento WHERE start='$fecha'";

		$resultado=mysqli_query($conexion,$sql);

		$res_busqueda=mysqli_num_rows($resultado);

		if ($res_busqueda!=0) {
		
			$titulo="Hay un mantenimiento programado";

			if ($res_busqueda==1) {
				$mensaje='Valla al plan de mantenimiento para verificar';
			}else{
				$mensaje='Tienes '.$res_busqueda.' eventos por realizar hoy';
			}
			
			
			$sql="INSERT INTO notificaciones(titulo,mensaje) VALUES('$titulo','$mensaje')";
			$resultado=mysqli_query($conexion,$sql);

			$id_notificaciones=mysqli_insert_id($conexion);


			$sql2="SELECT * FROM usuarios WHERE activo='Si' AND cargo='1' or cargo='4'";
			$resultado2=mysqli_query($conexion,$sql2);

			while ($consulta=mysqli_fetch_array($resultado2)) {
				
				$id_usuario=$consulta['id'];

				$sql3="INSERT INTO notificaciones_detalles(id_notificaciones,id_usuario) VALUES('$id_notificaciones','$id_usuario')";

				$res2=mysqli_query($conexion,$sql3);

			}
		}
		desconexion($conexion);

	}
?>