<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    var $fecha_inicial;
    var $fecha_final;
    var $fecha;
    var $hora;
    var $usuario;

     
    // Cabecera de página
    function data($fecha,$hora,$usuario,$fecha_inicial,$fecha_final){
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->usuario = $usuario;
        $this->fecha_inicial = $fecha_inicial;
        $this->fecha_final = $fecha_final;
    }
    function Header()
    {
        // Logo
        $this->Image(base_url().'public/img/dss-icon.png',10,8,12);
        // Arial bold 15
        $this->SetFont('Arial','B',10);
        // Movernos a la derecha
        $this->Cell(17);
        // Título
        $this->SetFont('Arial','B',10);
        $this->Cell(58,10,utf8_decode('Sistema de Soporte a Decisiones'),0,0,'C');
        $this->Cell(90);
        $this->SetFont('Arial','',10);
        $this->Cell(33,5,utf8_decode('Fecha: '.$this->fecha),0,2,'C');
        $this->Cell(33,5,utf8_decode('Hora: '.$this->hora),0,2,'C');
        $this->Cell(27,5,utf8_decode('Usuario: '.$this->usuario),0,1,'C');
        $this->Cell(34,5,utf8_decode('Desde: '.$this->fecha_inicial),0,2,'C');
        $this->Cell(33,5,utf8_decode('Hasta: '.$this->fecha_final),0,1,'C');
        $this->Cell(80);
        $this->SetFont('Arial','BU',12);
        $this->Cell(40,10,utf8_decode('Reporte de Actividad Transiciones'),0,0,'C');
        // Salto de línea
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->data($fecha,$hora,$usuario,$fecha_inicial,$fecha_final);
$pdf->SetMargins(4, 10,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->Cell('11','10',utf8_decode('Nro'),1,0,'C');
$pdf->Cell('55','10',utf8_decode('Flujo de Trabajo'),1,0,'C');
$pdf->Cell('30','10',utf8_decode('Usuario'),1,0,'C');
$pdf->Cell('60','10',utf8_decode('Transición'),1,0,'C');
$pdf->Cell('46','10',utf8_decode('Fecha'),1,1,'C');
$pdf->SetFont('Times','',12);
$max_tam = 30;
//var_dump($data);
foreach ($data as $value) {
    $workflow = $value['workflow'];
    $tam = strlen($workflow);
    $nombre_workflow = substr($workflow,0,$max_tam);
    if ($tam>$max_tam){
        $nombre_workflow = $nombre_workflow.'...';
    }
    $transicion = $value['transicion'];
    $tam = strlen($workflow);
    $nombre_transicion = substr($transicion,0,$max_tam);
    if ($tam>$max_tam){
        $nombre_transicion = $nombre_transicion.'...';
    }
    $date = new DateTime($value['fecha']);
    $fecha = date_format($date,'d-m-Y h:i:s A');
    $pdf->Cell('11','10',utf8_decode($value['proceso']),1,0,'C');
    $pdf->Cell('55','10',utf8_decode($nombre_workflow),1,0,'C');
    $pdf->Cell('30','10',utf8_decode($value['usuario']),1,0,'C');
    $pdf->Cell('60','10',utf8_decode($nombre_transicion),1,0,'C');
    $pdf->Cell('46','10',utf8_decode($fecha),1,1,'C'); 
}
$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$cant = count($data);
$pdf->Cell(50,5,utf8_decode('Total Transiciones: '.$cant),0,2,'C');
$pdf->Output();


?>