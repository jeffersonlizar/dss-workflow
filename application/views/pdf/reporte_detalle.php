<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    var $fecha;
    var $hora;
    var $usuario;

     
    // Cabecera de página
    function data($fecha,$hora,$usuario){
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->usuario = $usuario;
    }

    function Header()
    {
        // Logo
        $this->Image(base_url().'public/img/dss-icon.png',10,8,12);
        // Arial bold 15
        $this->SetFont('Arial','B',10);
        // Movernos a la derecha
        $this->Cell(107);
        // Título
        $this->SetFont('Arial','B',10);
        $this->Cell(82,10,utf8_decode('Sistema de Soporte a Decisiones'),0,0,'C');
        $this->Cell(65);
        $this->SetFont('Arial','',10);
        $this->Cell(33,5,utf8_decode('Fecha: '.$this->fecha),0,2,'C');
        $this->Cell(33,5,utf8_decode('Hora: '.$this->hora),0,2,'C');
        $this->Cell(27,5,utf8_decode('Usuario: '.$this->usuario),0,1,'C');
        
        $this->Cell(128);
        $this->SetFont('Arial','BU',12);
        $this->Cell(40,10,utf8_decode('Detalle de Flujo de trabajo'),0,0,'C');
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
$pdf->data($fecha,$hora,$usuario);
$pdf->SetMargins(4, 10,1);
$pdf->AliasNbPages();
$pdf->AddPage('L');
$pdf->SetFont('Times','B',12);
$pdf->Cell('11','8',utf8_decode('Nro: '),0,0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell('275','8',utf8_decode($data['datos']['id_instancia']),0,1,'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell('22','8',utf8_decode('Categoría: '),0,0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell('264','8',utf8_decode($data['datos']['categoria']),0,1,'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell('44','8',utf8_decode('Tipo Flujo de Trabajo: '),0,0,'L');
$pdf->SetFont('Times','',12);
$pdf->MultiCell('242','8',utf8_decode($data['datos']['nombre']),0,'J');
$pdf->SetFont('Times','B',12);
$pdf->Cell('24','8',utf8_decode('Creado por:'),0,0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell('260','8',utf8_decode($data['datos']['id_usuario']),0,1,'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell('18','8',utf8_decode('Nombre:'),0,0,'L');
$pdf->SetFont('Times','',12);
$pdf->MultiCell('268','8',utf8_decode($data['datos']['titulo']),0,'J');
$pdf->SetFont('Times','B',12);
$pdf->Cell('24','8',utf8_decode('Descripción:'),0,0,'L');
$pdf->SetFont('Times','',12);
$pdf->MultiCell('262','8',utf8_decode($data['datos']['descripcion_instancia']),0,'J');
$pdf->SetFont('Times','B',12);
$pdf->Cell('31','8',utf8_decode('Fecha de Inicio:'),0,0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell('255','8',utf8_decode($data['datos']['fecha_inicio']),0,1,'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell('43','8',utf8_decode('Fecha de Finalización:'),0,0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell('243','8',utf8_decode($data['datos']['fecha_final']),0,1,'L');
$pdf->SetFont('Times','',12);
$pdf->Ln(1);
$pdf->Cell(133);
$pdf->SetFont('Times','BU',12);
$pdf->Cell('26','10',utf8_decode('Transiciones'),0,1,'C');
$pdf->Ln(5);
$pdf->SetFont('Times','B',12);
$pdf->Cell('11','10',utf8_decode('Nro'),1,0,'C');
$pdf->Cell('46','10',utf8_decode('Fecha'),1,0,'C');
$pdf->Cell('80','10',utf8_decode('Estados'),1,0,'C');
$pdf->Cell('30','10',utf8_decode('Usuario'),1,0,'C');
$pdf->Cell('50','10',utf8_decode('Nombre'),1,0,'C');
$pdf->Cell('69','10',utf8_decode('Descripción'),1,1,'C');
$pdf->SetFont('Times','',12);
$max_tam = 30;
foreach ($data['procesos'] as $value) {
    $estados = $value['nombre_estado_asociado'].' -----> '.$value['nombre_estado_siguiente'];
    $tam1 = strlen($estados);
    /*
    $nombre = $value['nombre_instancia'];
    $workflow = $value['workflow'];
    $tam1 = strlen($nombre);
    $tam2 = strlen($workflow);
    $ln1 = intval($tam1/$max_tam)+1;
    $ln2 = intval($tam2/$max_tam)+1;
    if ($ln1>=$ln2){
        $cell_height = 10*$ln1;
    }
    else{
        $cell_height = 10*$ln2;
    }
    */
    $estados = $value['nombre_estado_asociado'].' -----> '.$value['nombre_estado_siguiente'];
    $date = new DateTime($value['fecha']);
    $fecha = date_format($date,'d-m-Y h:i:s A');
    $pdf->Cell('11','10',utf8_decode($value['id_proceso']),1,0,'C');
    $pdf->Cell('46','10',utf8_decode($value['fecha']),1,0,'C');
    
    $current_y = $pdf->GetY();
    $current_x = $pdf->GetX();
    
    
    //$pdf->Cell('80','10',utf8_decode('hola mundo'),1,0,'C');
    $pdf->MultiCell('80','10',utf8_decode($estados),'1','C');
    $pdf->SetXY($current_x + '80', $current_y);
    $pdf->Cell('30','10',utf8_decode($value['id_usuario']),1,0,'C');
    $pdf->Cell('50','10',utf8_decode($value['nombre']),1,0,'C');
    $pdf->MultiCell('69','10',utf8_decode($value['descripcion']),'1','C');

    /*
    $pdf->MultiCell($cell_width,'10',utf8_decode($workflow),'T','C');
    $pdf->SetXY($current_x + $cell_width, $current_y);
    $pdf->Cell('30',$cell_height,utf8_decode($value['id_usuario']),1,0,'C');
    $current_y = $pdf->GetY();
    $current_x = $pdf->GetX();
    $cell_width = 60;
    $pdf->MultiCell($cell_width,'10',utf8_decode($nombre),'T','C');
    $pdf->SetXY($current_x + $cell_width, $current_y);
    */
    //$pdf->Cell('46','10',utf8_decode($fecha),1,1,'C'); 
}
/*
$pdf->Cell('11','10','','T',0,'C');
$pdf->Cell('55','10','','T',0,'C');
$pdf->Cell('30','10','','T',0,'C');
$pdf->Cell('60','10','','T',0,'C');
$pdf->Cell('46','10','','T',1,'C');
$pdf->SetFont('Arial','B',12);
$cant = count($data);
$pdf->Cell(50,5,utf8_decode('Total Flujos de trabajo: '.$cant),0,2,'C');
*/
$pdf->Output();


?>
