<?php

    require('mc_table_categoria.php');
    $pdf = new PDF_MC_Table();
    $pdf->data($fecha,$hora,$usuario,$fecha_inicial,$fecha_final,$categoria);
    $pdf->SetMargins(4, 10,1);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','B',12);
    $pdf->Cell('11','10',utf8_decode('Nro'),1,0,'C');
    $pdf->Cell('55','10',utf8_decode('Tipo Flujo de Trabajo'),1,0,'C');
    $pdf->Cell('30','10',utf8_decode('Usuario'),1,0,'C');
    $pdf->Cell('60','10',utf8_decode('Nombre'),1,0,'C');
    $pdf->Cell('46','10',utf8_decode('Fecha'),1,1,'C');
    $pdf->SetFont('Times','',12);

    $pdf->SetWidths(array(11,55,30,60,46));

    foreach ($data as $value) {
        $date = new DateTime($value['fecha_inicio']);
        $fecha = date_format($date,'d-m-Y h:i:s A');

        $pdf->Row(array(utf8_decode($value['id_instancia']),utf8_decode($value['nombre']),utf8_decode($value['id_usuario']),utf8_decode($value['titulo']),utf8_decode($fecha))); 
    }
    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',12);
    $cant = count($data);
    $pdf->Cell(50,5,utf8_decode('Total Flujos de trabajo: '.$cant),0,2,'C');
    $pdf->Output();


?>