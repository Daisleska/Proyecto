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
    $this->Cell(0,40,utf8_decode('Nomina 1'),0,0,'C');
    $this->Cell(-30,35,utf8_decode ('RIF: J-30478166-0'),0,0,'C');
    $this->Ln(20);

    $this->SetX(25);
    $this->SetY(25);
    $this->SetFont('Times','B',10);

   
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

    
    $pdf->Ln(1); 
    $pdf->Output();
?>