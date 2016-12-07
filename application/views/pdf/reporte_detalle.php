<?php

    require('mc_table_detalle.php');

    $pdf = new PDF_MC_Table();
    $pdf->data($fecha,$hora,$usuario);
    $pdf->SetMargins(4, 10,1);
    $pdf->AliasNbPages();
    $pdf->AddPage('L');
    $pdf->SetFont('Arial','',14);

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
    $pdf->Cell('50','10',utf8_decode('Transición'),1,0,'C');
    $pdf->Cell('80','10',utf8_decode('Estados'),1,0,'C');
    $pdf->Cell('30','10',utf8_decode('Usuario'),1,0,'C');
    $pdf->Cell('69','10',utf8_decode('Descripción'),1,1,'C');
    $pdf->SetFont('Times','',12);

    $pdf->SetWidths(array(11,46,50,80,30,69));
    if (isset($data['procesos']))
        foreach ($data['procesos'] as $value) {
            $date = new DateTime($value['fecha']);
            $fecha = date_format($date,'d-m-Y h:i:s A');
            $estados = $value['nombre_estado_asociado'].' -----> '.$value['nombre_estado_siguiente'];


            $pdf->Row(array(utf8_decode($value['id_proceso']),utf8_decode($fecha),utf8_decode($value['nombre']),utf8_decode($estados),utf8_decode($value['id_usuario']),utf8_decode($value['descripcion'])));   
        }
    $name_file = "detalle_flujo_nro_".$data['datos']['id_instancia'].".pdf";
    $pdf->Output($name_file,'I');

    unset($pdf);

?>
