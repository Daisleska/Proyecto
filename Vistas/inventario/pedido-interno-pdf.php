<?php

	extract($_REQUEST);

	if ($id=='') {
		header('location: pedidos-internos.php');
		exit();
	}

	include('../../Modelos/conexion.php');

	$sql="SELECT pedido_detalles.*, pedido.fecha_registro , productos.nombre, productos.codigo FROM pedido_detalles,productos,pedido WHERE pedido_detalles.id_pedido='$id' AND  pedido_detalles.id_producto=productos.id  AND pedido.id='$id'";

	$resultado=mysqli_query($conectar,$sql);
	$i=0;
	while ($consulta=mysqli_fetch_array($resultado)) {
		
		$codarticulo[$i]=$consulta['codigo'];
		$articulos[$i]=$consulta['nombre'];
		$cantidad_solicitada[$i]=$consulta['cantidad_solicitada'];
		$cantidad_despachada[$i]=$consulta['cantidad_despachada'];
		$observacion[$i]=$consulta['observaciones'];
		$tiempo=$consulta['fecha_registro'];
		$i++;
	}

	function articulos ($i,$codarticulo,$articulos,$cantidad_solicitada,$cantidad_despachada,$observacion){

		$html='';

		for ($j=0;$j<$i;$j++){
			$cont=$j+1;
			$text='';
			$text='
				<tr>
					<th width="5%" >'.$cont.'</th>
					<th width="10.5%" >'.$codarticulo[$j].'</th>
					<th width="30%" >'.$articulos[$j].'</th>
					<th width="10%" >Unidades</th>
					<th width="11%" >'.$cantidad_solicitada[$j].'</th>
					<th width="11%" >'.$cantidad_despachada[$j].'</th>
					<th width="22.5%" >'.$observacion[$j].'</th>
				</tr>
			';

			$html=$html.$text;
			
		}

		/*for ($y=$j; $y <36 ; $y++) { 
				$text='

				<tr>
					<th width="5%" style="font-size: 10.5px;"></th>
					<th width="10.5%" style="font-size: 10.5px;"></th>
					<th width="30%" style="font-size: 10.5px;"></th>
					<th width="8%" style="font-size: 10.5px;"></th>
					<th width="8%" style="font-size: 10.5px;"></th>
					<th width="8%" style="font-size: 10.5px;"></th>
					<th width="12.5%" style="font-size: 10.5px;"></th>
					<th width="18%" style="font-size: 10.5px;"></th>
				</tr>


				';
				$html=$html.$text;
			}*/

		return $html;
	}

	$fecha=$tiempo[8].$tiempo[9].$tiempo[4].$tiempo[5].$tiempo[6].$tiempo[7].$tiempo[0].$tiempo[1].$tiempo[2].$tiempo[3];

	require_once('../../tcpdf/tcpdf.php');
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// remove default header/footer
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->SetTitle('pedido-interno-'.$id);


	$pdf->SetFont('times', '', 20);
	$pdf->AddPage();



$pdf->SetFont('times', '', 12);
$pdf->writeHTMLCell(0, 0, '', '', '<style type="text/css">
 th, td {
    border: 1px solid black;

}

.col {

height: 30%;

}
</style>
<br><br><br>
<table>
  <tr height="30px;" >
    <th colspan="2"  style="text-align: center;">
    <br><br>
    <img src="../../images/servi.jpg" width="70px;" >
<h4 text-align="center">SERVIFORM C.A. <br>
RIF J-31537859-0</h4>
   <br>  
    </th>
    <th  colspan="6"  style=" "><h5> SERVIFORM C.A.<br> CALLE 3 Nro. 123-Local C.Urb. Los Samanes. Maracay-Aragua<br>

 RIF J-31537859-0<br>
 TELÉFONO&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
OFICINA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       0243-235.6141<br> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
CELULARES&nbsp;&nbsp;&nbsp;   0414-147.9025                 Luis Alfredo Chacón<br>  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0424-335.1384               Myriam Zambrano García 
<br>
&nbsp;Próximamente WWW.SERVIFORM.COM <br>
 Correos: servi.form@gmail.com; servi1234.adm@gmail.com
 </h5>  </th>
    <th colspan="2" Style="text-align: center;"><br><strong>Fecha:</strong> '.$fecha.'
    <br> N°'.$id.' <br> 
    </th>
  </tr>
  <tr>
    <th colspan="10" style=""> LISTA DE ARTÍCULOS A SOLICITAR </th>
  </tr>
</table>' , 0, 1, 0, true, '', true);


$pdf->SetFont('times', '',8);

$datos=articulos($i,$codarticulo,$articulos,$cantidad_solicitada,$cantidad_despachada,$observacion);

	$pdf->writeHTMLCell(0, 0, '', '', '<style type="text/css">
 th, td {
    border: 1px solid black;
    text-align: center;
}
</style>
<table>
  <tr>
	  <th width="5%"  >ITEN</th>
	  <th width="10.5%"  >COD</th>
	  <th width="30%"  >DESCRIPCIÓN DEL ARTÍCULO</th>
	  <th width="10%"  >U.M</th>
	  <th width="11%"  >CANT PEDIDA</th>
	  <th width="11%"  >CANT DESP.</th>
	  <th width="22.5%"  >Observación</th>
  </tr>
  '.$datos.'
  <tr>
  	<td colspan="7"  >USO DEL MATERIAL Y/O EQUIPO: OFICINA DE SERVICIOS GENERALES.</td>
  </tr>
</table>' , 0, 1, 0, true, '', true);


$pdf->SetFont('times', '',8);

$pdf->writeHTMLCell(0, 0, '', '', '<style type="text/css">
 th, td {
    border: 1px solid black;
    text-align: center;
}
</style>
<table>
	<tr>
		<td colspan="2" width="16.66%" > 
			SOLICITANTE<br><br><br><br>
		 </td>
		<td colspan="2" width="16.66%" > 
			SUPERVISOR<br><br><br><br><br>FIRMA Y SELLO
		 </td>
		<td colspan="1" width="16.66%" > 
			AUTORIZADO DPTO. SERV ADM<br><br><br><br>FIRMA Y SELLO
		 </td>
		<td colspan="1" width="16.66%" > 
			CONFORMADO POR<br><br><br><br>FIRMA Y SELLO ALMACÉN
		 </td>
		<td colspan="1" width="16.66%" > 
			DESPACHADO POR<br><br><br><br>FIRMA
		 </td>
		<td colspan="1" width="16.66%" > 
			RECIBIDO CONFORME<br><br><br><br>FIRMA DEPEN.SOLICITANTE
		 </td>
	</tr>
</table>' , 0, 1, 0, true, '', true);


$pdf->Output('pedido_interno1.pdf', 'I');

?>