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
    $this->Cell(0,40,utf8_decode('LISTADO DE USUARIOS REGISTRADOS'),0,0,'C');
    $this->Cell(-30,35,utf8_decode ('RIF: j-293901039'),0,0,'C');
    $this->Ln(20);

    $this->SetX(25);
    $this->SetY(25);
    $this->SetFont('Times','B',10);

    $this->Cell(350,50," Fecha: ".date('d/m/Y')." ",0,0,'C');
    $this->Ln(4); 
    $this->SetX(25); 
    $this->SetY(55);
    $this->Cell(10,7,utf8_decode('ID'),1,0,'C');
    $this->Cell(45,7,utf8_decode ('Nombre'),1,0,'C');
    $this->Cell(50,7,utf8_decode('Correo'),1,0,'C');
    $this->Cell(39,7,utf8_decode('Pregunta'),1,0,'C');
    $this->Cell(40,7,utf8_decode('Respuesta'),1,0,'C');
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

    $sql="SELECT empleado.id, empleado.nombres, empleado.apellidos, empleado.cedula, cargos.nombre, cargos.salario FROM empleado, cargos WHERE empleado.id_cargo=cargos.id AND empleado.id=".$id_empleado."";


    $sql="SELECT asignacion_deduccion.descripcion, asignacion_deduccion.monto FROM empleado INNER JOIN empleado_asig ON empleado.id=empleado_asig.id_empleado INNER JOIN asignacion_deduccion ON empleado_asig.id_asignaciones=asignacion_deduccion.id WHERE empleado.id=".$id_empleado." AND asignacion_deduccion.tipo='Asignacion'";



    $consulta = mysqli_query($conectar, $sql) or die ("ERROR en la consulta ". mysqli_error($conectar));

    while ($fila=mysqli_fetch_array($consulta)) {

     /* $fecha=date("d/m/Y", strtotime($fila["fecha_entrega"]));*/
      $pdf->Cell(10,7,utf8_decode($fila['id']),1,0,'C');
      $pdf->Cell(45,7,utf8_decode($fila['nombres'].' '),1,0,'C');
      $pdf->Cell(50,7,utf8_decode($fila['apellidos'].' '),1,0,'C');
      $pdf->Cell(39,7,utf8_decode($fila['cedula']),1,0,'C');
      $pdf->Cell(40,7,utf8_decode($fila['nombre']),1,0,'C');
      $pdf->Cell(40,7,utf8_decode($fila['salario']),1,0,'C');
    /*  $pdf->Cell(29,7,utf8_decode($fecha),1,0,'C');*/
      $pdf->SetFont('Times','',10);
      $pdf->Ln(); 
    }
    $pdf->Ln(1); 
    $pdf->Output();
?>