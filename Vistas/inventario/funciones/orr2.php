<?php
	include('funciones/funcion-notificaciones.php');

	function conectar(){
		//(error_reporting(0);
		//(include('../conectar.php');
		include('conectar.php');

		return $conexion;
	}

	function desconectar($conexion){
		//(error_reporting(0);
		//(include ('../desconectar.php');
		include ('desconectar.php');
	}

	function registro($id_producto,$cantidad,$id_usuario){

		$conexion=conectar();

		$motivo="Registro";

		$sql="INSERT INTO art_historial (id_articulo, motivo, cantidad , id_usuario) VALUES ('$id_producto', '$motivo' ,'$cantidad','$id_usuario')";

		$resutado=mysqli_query($conexion,$sql);

		desconectar($conexion);

		if ($resutado) {
			return 1;
			verificar_inventario();
		}else{
			return 2;
		}
	}


	function sumar_articulo($id_producto,$cantidad,$id_usuario){

		$conexion=conectar();

		$motivo="Ingreso";

		$sql="INSERT INTO art_historial (id_articulo, motivo, cantidad , id_usuario) VALUES ('$id_producto', '$motivo' ,'$cantidad','$id_usuario')";
		$resutado=mysqli_query($conexion,$sql);

		desconectar($conexion);
		if ($resutado) {
			verificar_inventario();
			return 1;
		}else{

			return 2;
		}
	}

	function sumar_articulo_pedido($id_producto,$cantidad,$id_usuario,$id_pedido){

		$conexion=conectar();

		$motivo="Ingreso";

		$sql="INSERT INTO art_historial (id_articulo, motivo, cantidad , id_usuario,id_pedido) VALUES ('$id_producto', '$motivo' ,'$cantidad','$id_usuario','$id_pedido')";
		$resutado=mysqli_query($conexion,$sql);

		desconectar($conexion);
		if ($resutado) {
			return 1;
		}else{
			return 2;
		}
	}

	function restar_articulo ($id_producto,$cantidad,$id_usuario){


		$conexion=conectar();

		$motivo="Egreso";

		$cantidad='-'.$cantidad;

		$sql="INSERT INTO art_historial (id_articulo, motivo, cantidad , id_usuario) VALUES ('$id_producto', '$motivo' ,'$cantidad','$id_usuario')";
		$resutado=mysqli_query($conexion,$sql);

		desconectar($conexion);

		if ($resutado) {

            verificar_inventario();

			return 1;
		}else{
			return 2;
		}



	}

	function actualizar ($stock_nue,$stock_act,$id_usuario,$art){

		$conexion=conectar();

		if ($stock_nue==$stock_act) {

			desconectar($conexion);
			
		}else if( $stock_nue>$stock_act){

			$resultado=$stock_nue-$stock_act;

			sumar_articulo($art,$resultado,$id_usuario);
		}else if( $stock_nue<$stock_act){

			$resultado=$stock_act-$stock_nue;

			restar_articulo($art,$resultado,$id_usuario);
		}
	}
	
	function pedido_interno($i,$articulos,$cantidad,$pedido,$usuario,$valor_u){



		$conexion=conectar();
		$error_stock=0;
		for ($j=0; $j <$i ; $j++) { 
			
			if ($cantidad[$j]=='' or $articulos[$j]=='' ) {
				
				continue;
			}

			

			$sql="UPDATE pedido_detalles set cantidad_despachada='$cantidad[$j]' WHERE id_pedido='$pedido' AND id_articulo='$articulos[$j]'";

			$resultado=mysqli_query($conexion,$sql);

			if ($resultado) {

				$res1='S';

				$sql2="SELECT * FROM articulos WHERE id='$articulos[$j]'";	

				$resultado2=mysqli_query($conexion,$sql2);

				while ($consulta=mysqli_fetch_array($resultado2)) {
					
					$stock_max=$consulta['stock_maximo'];
					$stock=$consulta['stock'];
				}

				$stock_pedido=$stock_max-$stock;

				if ($cantidad[$j]>$stock_pedido) {

					continue;
				}else{
					$stock_nuevo=$stock+$cantidad[$j];
					$sql3="UPDATE articulos SET stock='$stock_nuevo' WHERE id='$articulos[$j]'";
					$resultado3=mysqli_query($conexion,$sql3);


					if ($resultado3) {



						$res2[$j]='S';

						$valor_unitario=$valor_u['$j'];

						if ($valor_u[$j]=='' or $valor_u[$j]==-1) {
							# code...
						}else{
							$sql4="UPDATE articulos SET valor_unitario = '$valor_u[$j]' WHERE id = '$articulos[$j]' ";

							$resultado4=mysqli_query($conexion,$sql4);
						}

						
						
						sumar_articulo_pedido($articulos[$j],$cantidad[$j],$usuario,$pedido);
					}else{
						$res2[$j]='N';
					}
				}

			}
		}

		$sql="UPDATE pedido SET estado='Completada' WHERE id='$pedido'";
		$resultado=mysqli_query($conexion,$sql);


		if ($resultado) {
			verificar_inventario();
			verificar_pedido();
			return 'S';
		}else{
			return 'N';
		}
		desconectar($conexion);
	}
function almacen($i,$ubicacion,$cantidad,$art){


		$conexion=conectar();
		$error_stock=0;
		for ($j=0; $j <$i ; $j++) { 
			
			if ($cantidad[$j]=='' or $ubicacion[$j]=='' ) {
				
				continue;
			}

			$sql="UPDATE art_almacen set stock='$cantidad[$j]' WHERE id_articulo='$ar' AND id_ubicacion='$ubicacion[$j]'";

			$resultado=mysqli_query($conexion,$sql);

			if ($resultado) {

			
				$sql2="SELECT * FROM articulos WHERE id='$ubicacion[$j]'";	

				$resultado2=mysqli_query($conexion,$sql2);

				while ($consulta=mysqli_fetch_array($resultado2)) {
					
					$stock_max=$consulta['stock_maximo'];
					$stock=$consulta['stock'];
				}

				$stock_pedido=$stock_max-$stock;

				if ($cantidad[$j]>$stock_pedido) {

					continue;
				}else{
					$stock_nuevo=$stock+$cantidad[$j];
					$sql3="UPDATE articulos SET stock='$stock_nuevo' WHERE id='$ubicacion[$j]'";
					$resultado3=mysqli_query($conexion,$sql3);
				}

			}
		}

	}


	function mantenimiento_correctivo($id_mantenimiento,$articulos,$cantidad,$i,$id_usuario){

		$conexion=conectar();
		//Limpiamos variables repetidad y las sumamos, de tal forma que quede una sola variable
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
       for ($j=0; $j <$i ; $j++) { 
	        //Verificamos que los articulo no llegen vacio
	        if ($articulos[$j]==''  or $cantidad[$j]=='' or $cantidad[$j]==0) {
	            continue;
	        }


	        $sql="SELECT * FROM articulos WHERE id='$articulos[$j]'";

	        $resultado=mysqli_query($conexion,$sql);

	        while ($consulta=mysqli_fetch_array($resultado)) {
	              
	          $pedidomax=$consulta['stock'];
	        }

	        if ($cantidad[$j]>$pedidomax) {
	        	
	        	$error_stock=1;

	        }else{

	        	$stock_new=$pedidomax-$cantidad[$j];

	        	$sql="UPDATE articulos SET stock='$stock_new' WHERE id='$articulos[$j]'";

	        	$resultado=mysqli_query($conexion,$sql);

	        	if ($resultado) {
	        		
	        		$motivo="Egreso";
	        		$cantidad='-'.$cantidad[$j];
					$sql="INSERT INTO art_historial (id_articulo, motivo, cantidad , id_usuario,id_mantenimiento) VALUES ('$articulos[$j]','$motivo','$cantidad','$id_usuario','$id_mantenimiento')";

					$resultado=mysqli_query($conexion,$sql);

					desconectar($conexion);
					if ($resultado) {
						return 1;

					}else{
						return 2;
					}


	        	}else{

	        	}
	        }
       }

       if ($error_stock==1) {
       		return '2';
       }else{
	       	return '1';
	       	verificar_inventario();
       }
		desconectar($conexion);
	}
?>