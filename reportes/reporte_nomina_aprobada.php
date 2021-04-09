<?php
  date_default_timezone_set("America/Caracas");
  session_start();

  require("../Modelos/conexion.php");
  extract($_REQUEST);

  require('../fpdf/fpdf.php');

class PDF extends FPDF {
  function Header() {
    $this->SetFont('Times','B',12);
    $this->Image('../images/servi.jpg',10,10,30,30);
    $this->Ln(10);
    $this->Cell(0,0,utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'),0,0,'C');    
    $this->Ln(1); 
    $this->Cell(0,8,utf8_decode('SERVIFORM C.A'),0,0,'C');
    $this->Ln(1); 
    $this->Cell(0,16,utf8_decode('LA VICTORIA - ESTADO ARAGUA'),0,0,'C');
    $this->Ln(0); 
 
    $this->SetFont('Times','BU',12);
    $this->Ln(4);
    $this->Cell(0,40,utf8_decode('LISTADO DE NOMINAS APROBADAS'),0,0,'C');
    $this->Cell(-30,35,utf8_decode ('RIF: J-30478166-0'),0,0,'C');
    $this->Ln(20);

    $this->SetX(25);
    $this->SetY(25);
    $this->SetFont('Times','B',10);

    $this->Cell(350,50," Fecha: ".date('d/m/Y')." ",0,0,'C');
    $this->Ln(4); 
    $this->SetX(25); 
    $this->SetY(55);
    $this->Cell(10,7,utf8_decode('ID'),1,0,'C');
    $this->Cell(35,7,utf8_decode('Quincena #'),1,0,'C');
    $this->Cell(45,7,utf8_decode ('Cantidad Empleados'),1,0,'C');
    $this->Cell(55,7,utf8_decode ('Mes / Año'),1,0,'C');
    $this->Cell(40,7,utf8_decode ('Status'),1,0,'C');
    
    /*$this->Cell(35,7,utf8_decode('Fecha de Vencimiento'),1,0,'C');*/
    $this->SetFont('Times','',10);
    $this->Ln(); 
  }
  function Footer() {
    $this->SetY(-60);
    $this->SetFont('Times','',10);
    $this->Ln(20); 
    $this->SetX(100);
    $this->Cell(10,60,utf8_decode('La Victoria, Estado Aragua, Municipio José Félix Ribas, Parroquia Juan Vicente Bolívar y Ponte, Calle Final la Redoma Zona Industrial la Chapa.'),0,0,'C');
    $this->Ln(4); 
    $this->SetX(100);
    $this->Cell(10,60,utf8_decode('Telf.: 0244-511.15.98 - Código Postal 2121 '),0,0,'C');
    $this->Ln(0);
    $this->SetX(100);
    $this->Cell(110,60,utf8_decode('Página: '.$this->PageNo().'/{nb}'),0,0,'R');
 }
}

$pdf=new PDF('P', 'mm', 'A4');
$pdf -> AliasNbPages();
$pdf->AddPage();

    $count=0;
  $anio=date("Y");
  $sql="SELECT id FROM pre_nomina WHERE status=2 AND anio=".$anio."";
  $res=mysqli_query($conectar, $sql);
  while($fila=mysqli_fetch_array($res)){
    $id=$fila['id'];
    $sql2="SELECT pre_nomina.quincena, COUNT(prenomina_empleado.id_prenomina) AS cantidad, pre_nomina.status, pre_nomina.id, pre_nomina.mes, pre_nomina.anio FROM pre_nomina INNER JOIN prenomina_empleado ON pre_nomina.id=prenomina_empleado.id_prenomina WHERE pre_nomina.id='$id'";
    $resultado=mysqli_query($conectar, $sql2);
   
    while ($fila=mysqli_fetch_array($resultado)) {

    setlocale(LC_TIME, 'es_ES', 'esp_esp');
    $fech=date_create_from_format('!m', $fila['mes']);
    $mes=strftime("%B", $fech->getTimestamp());
    $month=ucfirst($mes);

     /* $fecha=date("d/m/Y", strtotime($fila["fecha_entrega"]));*/
      $pdf->Cell(10,7,utf8_decode($fila['id'].' '),1,0,'C');
      $pdf->Cell(35,7,utf8_decode($fila['quincena'].' '),1,0,'C');
      $pdf->Cell(45,7,utf8_decode($fila['cantidad'].' '),1,0,'C');
      $pdf->Cell(55,7,utf8_decode($month.-$fila['anio'].' '),1,0,'C');
      $pdf->Cell(40,7,utf8_decode($fila['status']),1,0,'C');
    /*  $pdf->Cell(29,7,utf8_decode($fecha),1,0,'C');*/
      $pdf->SetFont('Times','',10);
      $pdf->Ln(); 
    } }
    $pdf->Ln(1); 
    $pdf->Output();
?>